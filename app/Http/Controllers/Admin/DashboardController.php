<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Transaction;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $totalProduk = Product::count();
        $stokMenipis = Product::where('stok', '<', 10)->get();

        $penjualanBulanIni = Transaction::whereMonth('created_at', Carbon::now()->month)
                                        ->whereYear('created_at', Carbon::now()->year)
                                        ->sum('total_amount'); 

        $labels = [];
        $dataPendapatan = [];

        for ($i = 6; $i >= 0; $i--) {
            $tanggal = Carbon::now()->subDays($i);
            $labels[] = $tanggal->translatedFormat('l'); 

            $totalHariIni = Transaction::whereDate('created_at', $tanggal->format('Y-m-d'))
                                       ->sum('total_amount');
            $dataPendapatan[] = $totalHariIni;
        }

        return view('admin.dashboard', compact(
            'totalProduk', 'stokMenipis', 'penjualanBulanIni', 'labels', 'dataPendapatan'
        ));
    }
}
