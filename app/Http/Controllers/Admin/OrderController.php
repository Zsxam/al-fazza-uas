<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Http\Requests\UpdateOrderStatusRequest;

class OrderController extends Controller
{
    public function pesananIndex(Request $request)
    {
        $query = Transaction::with('details.product')
                            ->where('payment_status', 'success');

        if ($request->filled('status')) {
            $query->where('order_status', $request->status);
        }

        if ($request->filled('jenis')) {
            $query->where('order_type', $request->jenis);
        }

        $pesanan = $query->orderBy('created_at', 'desc')->get();

        return view('admin.pesanan.index', compact('pesanan'));
    }

    public function pesananUpdateStatus(UpdateOrderStatusRequest $request, $id)
    {
        Transaction::findOrFail($id)->update([
            'order_status' => $request->order_status
        ]);

        return redirect()->route('admin.pesanan.index')->with('success', 'Status pesanan diperbarui!');
    }
}
