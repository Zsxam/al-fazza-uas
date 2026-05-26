<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\InventoryLog;
use App\Http\Requests\StoreInventoryRequest;

class InventoryController extends Controller
{
    public function stokIndex()
    {
        $logs = InventoryLog::with('product')->orderBy('created_at', 'desc')->get();
        return view('admin.stok.index', compact('logs'));
    }

    public function stokCreate()
    {
        $products = Product::orderBy('nama', 'asc')->get();
        return view('admin.stok.create', compact('products'));
    }

    public function stokStore(StoreInventoryRequest $request)
    {
        $data = $request->validated();
        
        InventoryLog::create($data);

        $product = Product::findOrFail($data['product_id']);
        
        if ($data['tipe'] === 'masuk') {
            $product->increment('stok', $data['jumlah']);
        } else {
            $product->decrement('stok', $data['jumlah']);
        }

        return redirect()->route('admin.stok.index')->with('success', 'Riwayat stok berhasil dicatat dan stok produk telah diperbarui!');
    }
}
