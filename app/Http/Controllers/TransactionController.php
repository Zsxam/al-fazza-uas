<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use App\Models\Product;
use App\Models\InventoryLog;
use Illuminate\Support\Facades\Auth;
use Midtrans\Config;
use Midtrans\Snap;

class TransactionController extends Controller
{
    public function __construct()
    {
        // Set konfigurasi Midtrans
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = config('midtrans.is_sanitized');
        Config::$is3ds = config('midtrans.is_3ds');
    }

    public function processCheckout(Request $request)
    {
        try {
            $invoice = 'ALF-' . date('YmdHis');
            
            // 1. Simpan Transaksi Utama (Ubah default Cash jadi Online)
            $transaction = Transaction::create([
                'invoice_number' => $invoice,
                'user_id' => Auth::id() ?? null, 
                'customer_name' => $request->customer_name,
                'total_amount' => $request->total_price,
                'payment_status' => 'pending',
                'order_type' => 'online',
                'payment_method' => 'Midtrans (Pending)', // Set default sementara
                'amount_paid' => 0,
            ]);

            // 2. SIMPAN RINCIAN PESANAN (Biar rotinya tidak hilang)
            if ($request->items) {
                foreach ($request->items as $item) {
                    // Cari ID roti berdasarkan namanya (karena dari JS cuma ngirim nama)
                    $product = Product::where('nama', $item['name'])->first();
                    
                    if ($product) {
                        TransactionDetail::create([
                            'transaction_id' => $transaction->id,
                            'product_id' => $product->id,
                            'qty' => $item['quantity'],
                            'price' => $item['price'],
                            'subtotal' => $item['price'] * $item['quantity'],
                        ]);
                    }
                }
            }

            // 3. Siapkan data untuk dikirim ke Midtrans
            $params = [
                'transaction_details' => [
                    'order_id' => $invoice,
                    'gross_amount' => (int) $request->total_price,
                ],
                'customer_details' => [
                    'first_name' => $request->customer_name,
                    'phone' => $request->customer_phone,
                ],
            ];

            // 4. Minta Snap Token dari Midtrans
            $snapToken = Snap::getSnapToken($params);
            
            return response()->json([
                'snap_token' => $snapToken,
                'invoice' => $invoice
            ]);
            
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    public function callback(Request $request)
    {
        $serverKey = config('midtrans.server_key');
        $hashed = hash("sha512", $request->order_id . $request->status_code . $request->gross_amount . $serverKey);
        
        if ($hashed == $request->signature_key) {
            if ($request->transaction_status == 'capture' || $request->transaction_status == 'settlement') {
                
                $transaction = Transaction::where('invoice_number', $request->order_id)->first();
                
                if ($transaction && $transaction->payment_status == 'pending') {
                    
                    // 1. UBAH STATUS, METODE BAYAR, DAN JUMLAH UANG
                    $metodeBayar = strtoupper(str_replace('_', ' ', $request->payment_type)); // Biar rapi (misal: bank_transfer jadi BANK TRANSFER)
                    
                    $transaction->update([
                        'payment_status' => 'success',
                        'payment_method' => $metodeBayar,
                        'amount_paid' => $request->gross_amount,
                    ]);

                    // 2. POTONG STOK & CATAT KE RIWAYAT INVENTORY
                    foreach ($transaction->details as $detail) {
                        $product = Product::find($detail->product_id);
                        if ($product) {
                            // Kurangi stok roti
                            $product->decrement('stok', $detail->qty);
                            
                            // Catat ke log admin
                            InventoryLog::create([
                                'product_id' => $product->id,
                                'tipe' => 'keluar',
                                'jumlah' => $detail->qty,
                                'keterangan' => 'Terjual Online (Invoice: ' . $transaction->invoice_number . ') via ' . $metodeBayar,
                            ]);
                        }
                    }
                }
            }
        }
        
        return response()->json(['message' => 'Callback diproses']);
    }
}