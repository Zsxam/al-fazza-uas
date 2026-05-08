@extends('layouts.admin')

@section('title', 'Dashboard')

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@endpush

@section('content')
    <div class="header">
        <h1>Dashboard Ringkasan</h1>
        <p>Selamat datang, <strong>{{ Auth::user()->name }}</strong></p>
    </div>

    <div class="card-info-container">
        <div class="card-info">
            <h3>Total Varian Produk</h3>
            <div class="number">{{ $totalProduk }}</div>
        </div>
        <div class="card-info border-danger">
            <h3>Stok Menipis (< 10)</h3>
            <div class="number text-danger">{{ $stokMenipis->count() }}</div>
        </div>
        <div class="card-info border-success">
            <h3>Total Penjualan Bulan Ini</h3>
            <div class="number text-success">Rp {{ number_format($penjualanBulanIni, 0, ',', '.') }}</div>
        </div>
    </div>

    <div class="dashboard-grid">
        <div class="content-box">
            <h3><i class="fa-solid fa-triangle-exclamation" style="color: #d32f2f;"></i> Stok Menipis</h3>
            <hr class="content-divider">
            @if($stokMenipis->count() > 0)
                <ul class="stock-list">
                    @foreach($stokMenipis as $item)
                        <li class="stock-item">
                            <strong>{{ $item->nama }}</strong> <br> 
                            Sisa: <span class="text-danger font-bold">{{ $item->stok }} pcs</span>
                        </li>
                    @endforeach
                </ul>
            @else
                <p class="text-success"><i class="fa-solid fa-circle-check"></i> Stok aman!</p>
            @endif
        </div>

        <div class="content-box">
            <h3><i class="fa-solid fa-chart-line" style="color: var(--primary-brown);"></i> Pendapatan 7 Hari Terakhir</h3>
            <hr class="content-divider">
            <div class="chart-container">
                <canvas id="revenueChart"></canvas>
            </div>
        </div>
    </div>

    <script>
        window.chartLabels = @json($labels);
        window.chartData = @json($dataPendapatan);
    </script>
@endsection