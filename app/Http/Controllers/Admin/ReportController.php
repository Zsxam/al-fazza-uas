<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaction;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;

class ReportController extends Controller
{
    public function laporanIndex(Request $request)
    {
        $query = $this->buildReportQuery($request);

        $totalPendapatan = (clone $query)->sum('total_amount');
        $totalTransaksi  = (clone $query)->count();
        $transaksi       = $query->orderBy('created_at', 'desc')->paginate(10)->withQueryString();

        return view('admin.laporan.index', compact('transaksi', 'totalPendapatan', 'totalTransaksi'));
    }

    public function laporanPdf(Request $request)
    {
        $query = $this->buildReportQuery($request);

        $transaksi       = $query->orderBy('created_at', 'desc')->get();
        $totalPendapatan = $transaksi->sum('total_amount');
        $totalTransaksi  = $transaksi->count();

        $pdf = Pdf::loadView('admin.laporan.pdf', compact('transaksi', 'totalPendapatan', 'totalTransaksi'));

        return $pdf->stream('Laporan_Keuangan_AlFazza.pdf');
    }

    public function laporanExcel(Request $request)
    {
        $query = $this->buildReportQuery($request);
        $transaksi = $query->orderBy('created_at', 'desc')->get();

        $filename = "laporan_penjualan_" . date('Ymd_His') . ".csv";

        $headers = [
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$filename",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        ];

        $columns = ['Waktu', 'No Invoice', 'Tipe Pesanan', 'Metode Bayar', 'Total Belanja'];

        $callback = function() use($transaksi, $columns) {
            $file = fopen('php://output', 'w');
            
            // Add UTF-8 BOM for Excel compatibility
            fputs($file, chr(0xEF) . chr(0xBB) . chr(0xBF));

            fputcsv($file, $columns, ';'); // Gunakan semicolon untuk region Indonesia

            foreach ($transaksi as $t) {
                $orderTypeMap = [
                    'kasir' => 'Kasir (Offline)',
                    'custom-order' => 'Custom Cake',
                    'online' => 'Web (Online)'
                ];
                
                $row = [
                    $t->created_at->format('Y-m-d H:i'),
                    $t->invoice_number,
                    $orderTypeMap[$t->order_type] ?? $t->order_type,
                    $t->payment_method ?? 'Cash',
                    $t->total_amount
                ];
                fputcsv($file, $row, ';');
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    /**
     * Bangun query laporan berdasarkan filter dari request.
     * Dipakai oleh laporanIndex (paginated) dan laporanPdf (semua data).
     */
    private function buildReportQuery(Request $request)
    {
        $query = Transaction::where('payment_status', 'success');

        if ($request->filled('search')) {
            $query->where('invoice_number', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('range')) {
            if ($request->range == 'minggu') {
                $query->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]);
            } elseif ($request->range == 'bulan') {
                $query->whereMonth('created_at', Carbon::now()->month)
                      ->whereYear('created_at', Carbon::now()->year);
            } elseif ($request->range == 'tahun') {
                $query->whereYear('created_at', Carbon::now()->year);
            }
        }

        if ($request->filled('start_date') && $request->filled('end_date')) {
            $query->whereBetween('created_at', [$request->start_date . ' 00:00:00', $request->end_date . ' 23:59:59']);
        }

        return $query;
    }
}
