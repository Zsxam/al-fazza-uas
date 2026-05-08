@extends('layouts.admin')

@section('title', 'Riwayat Stok')

@section('content')
    <div class="header-action">
        <div>
            <h1>Riwayat Barang Masuk/Keluar</h1>
            <p>Pantau pergerakan stok roti dan kue di sini.</p>
        </div>
        <a href="{{ route('admin.stok.create') }}" class="btn-tambah"><i class="fa-solid fa-plus"></i> Catat Stok Baru</a>
    </div>

    @if(session('success'))
        <div class="alert-success">
            <i class="fa-solid fa-circle-check"></i> {{ session('success') }}
        </div>
    @endif

    <div class="table-container">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Waktu</th>
                    <th>Nama Roti</th>
                    <th>Tipe</th>
                    <th>Jumlah</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                @forelse($logs as $log)
                <tr>
                    <td>{{ \Carbon\Carbon::parse($log->created_at)->format('d M Y, H:i') }}</td>
                    <td><strong>{{ $log->product->nama }}</strong></td>
                    <td>
                        @if($log->tipe == 'masuk')
                            <span class="badge-masuk"><i class="fa-solid fa-arrow-down"></i> Masuk</span>
                        @else
                            <span class="badge-keluar"><i class="fa-solid fa-arrow-up"></i> Keluar</span>
                        @endif
                    </td>
                    <td><strong>{{ $log->jumlah }} pcs</strong></td>
                    <td>{{ $log->keterangan ?? '-' }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" style="text-align: center; color: #888;">Belum ada riwayat stok.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection