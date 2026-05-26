<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Product;
use App\Models\InventoryLog;
use Illuminate\Support\Facades\Mail;
use Midtrans\Config;

class PaymentCallbackController extends Controller
{
    public function callback(Request $request)
    {
        $serverKey = config('midtrans.server_key');
        
        $grossAmount = number_format($request->gross_amount, 0, '.', '');
        $hashed = hash("sha512", $request->order_id . $request->status_code . $request->gross_amount . $serverKey);
        
        \Log::info("Midtrans Callback Masuk. Invoice: {$request->order_id}, Status: {$request->transaction_status}");

        if ($hashed == $request->signature_key) {
            
            $transaction = Transaction::where('invoice_number', $request->order_id)->first();
            
            if ($transaction) {
                
                // LUNAS
                if ($request->transaction_status == 'capture' || $request->transaction_status == 'settlement') {
                    if ($transaction->payment_status == 'pending') {
                        $metodeBayar = strtoupper(str_replace('_', ' ', $request->payment_type));
                        
                        $transaction->update([
                            'payment_status' => 'success',
                            'payment_method' => $metodeBayar,
                            'amount_paid' => $request->gross_amount,
                        ]);

                        if ($transaction->customer_email) {
                            $linkInvoice = config('app.url') . '/checkout/invoice/' . $transaction->invoice_number;
                            try {
                                Mail::to($transaction->customer_email)->send(new \App\Mail\InvoicePaidMail($transaction, $linkInvoice));
                            } catch (\Exception $e) {
                                \Log::error("Gagal mengirim email lunas: " . $e->getMessage());
                            }
                        }
                        \Log::info("Invoice {$request->order_id} BERHASIL Lunas.");
                    }
                } 
                
                // PENDING
                else if ($request->transaction_status == 'pending') {
                    $metodeBayar = strtoupper(str_replace('_', ' ', $request->payment_type));
                    
                    $transaction->update([
                        'payment_method' => $metodeBayar . ' (Pending)'
                    ]);

                    if ($transaction->customer_email) {
                        $linkInvoice = config('app.url') . '/checkout/invoice/' . $transaction->invoice_number;
                        try {
                            Mail::to($transaction->customer_email)->send(new \App\Mail\InvoiceMail($transaction, $linkInvoice));
                        } catch (\Exception $e) {
                            \Log::error("Gagal mengirim email pending: " . $e->getMessage());
                        }
                    }
                    \Log::info("Invoice {$request->order_id} Pending. Email Tagihan Dikirim.");
                }
                
                // GAGAL / EXPIRED
                else if (in_array($request->transaction_status, ['deny', 'cancel', 'expire', 'failure'])) {
                    if ($transaction->payment_status == 'pending') {
                        $transaction->update([
                            'payment_status' => 'failed'
                        ]);

                        if ($transaction->details) {
                            foreach ($transaction->details as $detail) {
                                $product = Product::find($detail->product_id);
                                if ($product) {
                                    $product->increment('stok', $detail->qty);
                                    InventoryLog::create([
                                        'product_id' => $product->id,
                                        'tipe' => 'masuk',
                                        'jumlah' => $detail->qty,
                                        'keterangan' => 'Restore Stok Gagal Bayar (' . $transaction->invoice_number . ')',
                                    ]);
                                }
                            }
                        }
                        \Log::info("Invoice {$request->order_id} Batal/Expired. Stok dikembalikan.");
                    }
                }

            }
        } else {
            \Log::error("Verifikasi Signature Midtrans GAGAL untuk Invoice: {$request->order_id}");
        }
        
        return response()->json(['message' => 'Callback diproses']);
    }
}
