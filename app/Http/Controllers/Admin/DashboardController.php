<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $totalProduk = Product::count();
        $stokMenipis = Product::where('stok', '<', 10)->get();

        // Fix #11: filter hanya transaksi sukses agar angka pendapatan akurat
        $penjualanBulanIni = Transaction::where('payment_status', 'success')
                                        ->whereMonth('created_at', Carbon::now()->month)
                                        ->whereYear('created_at', Carbon::now()->year)
                                        ->sum('total_amount');

        // Fix #12: ganti 7 query terpisah (N+1) dengan 1 query GROUP BY
        $startDate = Carbon::now()->subDays(6)->startOfDay();
        $endDate   = Carbon::now()->endOfDay();

        $revenueRaw = Transaction::where('payment_status', 'success')
            ->whereBetween('created_at', [$startDate, $endDate])
            ->select(DB::raw('DATE(created_at) as tanggal'), DB::raw('SUM(total_amount) as total'))
            ->groupBy('tanggal')
            ->pluck('total', 'tanggal');

        $labels = [];
        $dataPendapatan = [];

        for ($i = 6; $i >= 0; $i--) {
            $tanggal          = Carbon::now()->subDays($i);
            $labels[]         = $tanggal->translatedFormat('l');
            $dataPendapatan[] = (int) ($revenueRaw[$tanggal->format('Y-m-d')] ?? 0);
        }

        return view('admin.dashboard', compact(
            'totalProduk', 'stokMenipis', 'penjualanBulanIni', 'labels', 'dataPendapatan'
        ));
    }
}
