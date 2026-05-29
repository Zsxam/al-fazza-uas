<?php

namespace App\Services;

use App\Models\Product;
use App\Models\InventoryLog;
use Illuminate\Support\Facades\DB;
use Exception;

class InventoryService
{
    public function updateStockManual(array $data)
    {
        DB::beginTransaction();
        try {
            // Gunakan Pessimistic Locking untuk keamanan stok saat modifikasi manual
            $product = Product::where('id', $data['product_id'])->lockForUpdate()->firstOrFail();
            
            InventoryLog::create($data);
            
            if ($data['tipe'] === 'masuk') {
                $product->stok += $data['jumlah'];
            } else {
                if ($product->stok < $data['jumlah']) {
                    throw new Exception('Stok produk tidak mencukupi untuk dikeluarkan.');
                }
                $product->stok -= $data['jumlah'];
            }
            
            $product->save();
            
            DB::commit();
            return [
                'success' => true,
                'message' => 'Riwayat stok berhasil dicatat dan stok produk telah diperbarui!'
            ];
        } catch (Exception $e) {
            DB::rollBack();
            return [
                'success' => false,
                'message' => 'Gagal mengubah stok: ' . $e->getMessage()
            ];
        }
    }
}
