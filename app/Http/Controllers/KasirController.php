<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Transaction;
use App\Services\CheckoutService;
use Illuminate\Support\Facades\Auth;

class KasirController extends Controller
{
    protected $checkoutService;

    public function __construct(CheckoutService $checkoutService)
    {
        $this->checkoutService = $checkoutService;
    }

    public function index()
    {
        $products = Product::where('stok', '>', 0)->get();
        return view('kasir.pos', compact('products'));
    }

    public function prosesPos(Request $request)
    {
        $cartData = json_decode($request->cart_data, true);
        
        $customerData = [
            'user_id' => Auth::id(),
            'customer_name' => 'Pelanggan Toko',
        ];

        $result = $this->checkoutService->processCheckout(
            $cartData,
            $customerData,
            'kasir',
            $request->payment_method,
            $request->amount_paid,
            $request->change_amount, // The service doesn't fully validate this right now, we can pass it
            'success'
        );

        if (!$result['success']) {
            return redirect()->back()->with('error', $result['message']);
        }

        return redirect()->route('kasir.selesai', $result['transaction']->id)
                        ->with('success', 'Transaksi berhasil disimpan!'); 
    }

    public function selesai($id)
    {
        $transaksi = Transaction::with('details.product')->findOrFail($id);
        return view('kasir.selesai', compact('transaksi'));
    }
}
