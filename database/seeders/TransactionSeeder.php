<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Buat data transaksi utama
        Transaction::insert([
            [
                'invoice_number' => 'INV-001',
                'user_id' => 2,
                'customer_name' => 'Budi Santoso',
                'order_type' => 'kasir',
                'total_amount' => 135000,
                'payment_status' => 'success',
                'snap_token' => null,
                'created_at' => Carbon::now()->subDays(2),
                'updated_at' => Carbon::now()->subDays(2),
            ],
            [
                'invoice_number' => 'INV-002',
                'user_id' => null,
                'customer_name' => 'Siti Aminah',
                'order_type' => 'online',
                'total_amount' => 250000,
                'payment_status' => 'success',
                'snap_token' => 'dummy_snap_token_123',
                'created_at' => Carbon::now()->subDays(1),
                'updated_at' => Carbon::now()->subDays(1),
            ],
            [
                'invoice_number' => 'INV-003',
                'user_id' => 2,
                'customer_name' => 'Andi',
                'order_type' => 'kasir',
                'total_amount' => 85000,
                'payment_status' => 'success',
                'snap_token' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ]);

        // 2. Buat data rincian rotinya (Isi dari keranjang belanja)
        // Kita asumsikan product_id 1 dan 2 itu sudah ada dari ProductSeeder
        DB::table('transaction_details')->insert([
            // Isi keranjang untuk INV-001 (Transaksi ID 1)
            [
                'transaction_id' => 1,
                'product_id' => 1, // Misalnya Cheese Cake
                'qty' => 10,
                'price' => 13500,
                'subtotal' => 135000,
                'created_at' => Carbon::now()->subDays(2),
                'updated_at' => Carbon::now()->subDays(2),
            ],
            // Isi keranjang untuk INV-002 (Transaksi ID 2)
            [
                'transaction_id' => 2,
                'product_id' => 2, // Misalnya Meses
                'qty' => 10,
                'price' => 11900,
                'subtotal' => 119000,
                'created_at' => Carbon::now()->subDays(1),
                'updated_at' => Carbon::now()->subDays(1),
            ],
            [
                'transaction_id' => 2,
                'product_id' => 1, 
                'qty' => 9,
                'price' => 13500,
                'subtotal' => 131000, // Total keranjang INV-002 = 250.000
                'created_at' => Carbon::now()->subDays(1),
                'updated_at' => Carbon::now()->subDays(1),
            ],
            // Isi keranjang untuk INV-003 (Transaksi ID 3)
            [
                'transaction_id' => 3,
                'product_id' => 1, 
                'qty' => 6,
                'price' => 13500,
                'subtotal' => 81000,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ]);
    }
}
