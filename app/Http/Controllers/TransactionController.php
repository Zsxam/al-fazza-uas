<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Services\CheckoutService;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    protected $checkoutService;

    public function __construct(CheckoutService $checkoutService)
    {
        $this->checkoutService = $checkoutService;
    }

    public function processCheckout(Request $request)
    {
        $customerData = [
            'user_id' => Auth::id() ?? null,
            'customer_name' => $request->customer_name,
            'customer_email' => $request->customer_email,
            'customer_phone' => $request->customer_phone,
            'delivery_date' => $request->delivery_date,
            'delivery_address' => $request->delivery_address,
            'notes' => $request->notes,
        ];

        $result = $this->checkoutService->processCheckout(
            $request->items,
            $customerData,
            'online',
            'Midtrans (Pending)',
            0,
            0,
            'pending'
        );

        if (!$result['success']) {
            return response()->json(['error' => $result['message']], 500);
        }

        return response()->json([
            'snap_token' => $result['snap_token'],
            'invoice' => $result['invoice']
        ]);
    }

    public function checkoutInvoice($invoice)
    {
        $transaksi = Transaction::with('details.product')->where('invoice_number', $invoice)->firstOrFail();
        
        $ui = [];
        if ($transaksi->payment_status == 'success') {
            $ui = [
                'color' => '#388e3c',
                'bg_color' => '#e8f5e9',
                'icon' => 'fa-check',
                'title' => 'Pembayaran Berhasil!',
                'message' => 'Terima kasih, pesanan Anda sedang kami proses.',
                'badge' => 'LUNAS'
            ];
        } else if ($transaksi->payment_status == 'pending') {
            $ui = [
                'color' => '#ef6c00',
                'bg_color' => '#fff3e0',
                'icon' => 'fa-clock',
                'title' => 'Menunggu Pembayaran',
                'message' => 'Selesaikan pembayaran sebelum batas waktu habis.',
                'badge' => 'PENDING'
            ];
        } else {
            $ui = [
                'color' => '#d32f2f',
                'bg_color' => '#ffebee',
                'icon' => 'fa-xmark',
                'title' => 'Pembayaran Gagal/Kedaluwarsa',
                'message' => 'Mohon maaf, transaksi Anda telah dibatalkan.',
                'badge' => 'GAGAL'
            ];
        }

        return view('checkout-invoice', compact('transaksi', 'ui'));
    }

    public function processCustomCheckout(Request $request)
    {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'required|email|max:255',
            'customer_phone' => 'required|string|max:20',
            'delivery_date' => 'required|date',
            'delivery_address' => 'required|string',
            'custom_details' => 'required|string',
        ]);

        $invoice = 'CST-' . date('YmdHis');
        $totalAmount = $request->total_price ?? 150000;
        
        $transaction = Transaction::create([
            'invoice_number' => $invoice,
            'user_id' => Auth::id() ?? null,
            'customer_name' => $request->customer_name,
            'customer_email' => $request->customer_email,
            'customer_phone' => $request->customer_phone,
            'delivery_date' => $request->delivery_date,
            'delivery_address' => $request->delivery_address,
            'notes' => $request->custom_details . "\nCatatan Tambahan: " . ($request->notes ?? '-'),
            'order_type' => 'custom-order',
            'total_amount' => $totalAmount, 
            'payment_status' => 'pending',
            'payment_method' => 'Midtrans (Pending)',
        ]);

        // Konfigurasi Midtrans
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        \Midtrans\Config::$isProduction = config('midtrans.is_production', false);
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;
        \Midtrans\Config::$curlOptions = [
            CURLOPT_SSL_VERIFYHOST => 0,
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_HTTPHEADER => [], // Fix bug SDK Midtrans (Undefined array key 10023)
        ];

        $params = [
            'transaction_details' => [
                'order_id' => $invoice,
                'gross_amount' => (int) $totalAmount,
            ],
            'customer_details' => [
                'first_name' => $request->customer_name,
                'email' => $request->customer_email,
                'phone' => $request->customer_phone,
            ],
        ];

        try {
            $snapToken = \Midtrans\Snap::getSnapToken($params);
            $transaction->update(['snap_token' => $snapToken]);

            return response()->json([
                'success' => true,
                'snap_token' => $snapToken,
                'invoice' => $invoice
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 500);
        }
    }
}