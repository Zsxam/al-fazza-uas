<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryLog extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // Relasi: 1 Log Stok ini milik 1 Produk
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
