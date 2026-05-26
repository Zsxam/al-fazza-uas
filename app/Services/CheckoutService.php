<?php

namespace App\Services;

use App\Models\Product;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use App\Models\InventoryLog;
use Illuminate\Support\Facades\DB;
use Midtrans\Config;
use Midtrans\Snap;
use Exception;

class CheckoutService
{
    public function processCheckout($items, $customerData, $orderType, $paymentMethod, $amountPaid = 0, $changeAmount = 0, $paymentStatus = 'pending')
    {
        DB::beginTransaction();
        try {
            $invoice = ($orderType === 'kasir') ? 'POS-' . date('Ymd-His') : 'ALF-' . date('YmdHis');
            
            $serverGrandTotal = 0;
            $validItems = [];

            if (empty($items)) {
                throw new Exception('Keranjang kosong!');
            }

            foreach ($items as $item) {
                if (!isset($item['id'])) {
                    throw new Exception('Format keranjang sudah usang. Mohon kosongkan keranjang Anda dan tambahkan ulang produk.');
                }

                $product = Product::find($item['id']);
                
                if (!$product) {
                    throw new Exception('Produk tidak ditemukan!');
                }

                $qty = isset($item['quantity']) ? $item['quantity'] : (isset($item['qty']) ? $item['qty'] : 1);

                if ($product->stok < $qty) {
                    throw new Exception('Stok ' . $product->nama . ' tidak mencukupi! Sisa stok: ' . $product->stok);
                }

                $subtotal = $product->harga * $qty;
                $serverGrandTotal += $subtotal;

                $validItems[] = [
                    'product_id' => $product->id,
                    'qty' => $qty,
                    'price' => $product->harga,
                    'subtotal' => $subtotal,
                    'nama_produk' => $product->nama
                ];
            }

            $transactionData = array_merge([
                'invoice_number' => $invoice,
                'total_amount' => $serverGrandTotal,
                'payment_status' => $paymentStatus,
                'order_type' => $orderType,
                'payment_method' => $paymentMethod,
                'amount_paid' => $amountPaid,
                'change_amount' => $changeAmount,
            ], $customerData);

            $transaction = Transaction::create($transactionData);

            foreach ($validItems as $vItem) {
                TransactionDetail::create([
                    'transaction_id' => $transaction->id,
                    'product_id' => $vItem['product_id'],
                    'qty' => $vItem['qty'],
                    'price' => $vItem['price'],
                    'subtotal' => $vItem['subtotal'],
                ]);

                $product = Product::find($vItem['product_id']);
                $product->decrement('stok', $vItem['qty']);

                $logKeterangan = ($orderType === 'kasir') ? 'Terjual via Kasir (' . $invoice . ')' : 'Booking Online (' . $invoice . ')';

                InventoryLog::create([
                    'product_id' => $product->id,
                    'tipe' => 'keluar',
                    'jumlah' => $vItem['qty'],
                    'keterangan' => $logKeterangan,
                ]);
            }

            $snapToken = null;
            if ($orderType !== 'kasir') {
                
                // Konfigurasi Midtrans
                Config::$serverKey = config('midtrans.server_key');
                Config::$isProduction = config('midtrans.is_production', false);
                Config::$isSanitized = true;
                Config::$is3ds = true;

                // Bypass SSL untuk Localhost (Windows/XAMPP)
                Config::$curlOptions = [
                    CURLOPT_SSL_VERIFYHOST => 0,
                    CURLOPT_SSL_VERIFYPEER => 0,
                    CURLOPT_HTTPHEADER => [], // Fix bug SDK Midtrans (Undefined array key 10023)
                ];

                $params = [
                    'transaction_details' => [
                        'order_id' => $invoice,
                        'gross_amount' => (int) $serverGrandTotal,
                    ],
                    'customer_details' => [
                        'first_name' => $customerData['customer_name'] ?? 'Guest',
                        'phone' => $customerData['customer_phone'] ?? '',
                    ],
                ];

                $snapToken = Snap::getSnapToken($params);
                $transaction->update(['snap_token' => $snapToken]);
            }

            DB::commit();

            return [
                'success' => true,
                'transaction' => $transaction,
                'snap_token' => $snapToken,
                'invoice' => $invoice
            ];
            
        } catch (Exception $e) {
            DB::rollBack();
            return [
                'success' => false,
                'message' => $e->getMessage() . ' at ' . $e->getFile() . ':' . $e->getLine()
            ];
        }
    }
}
