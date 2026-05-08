@extends('layouts.admin')

@section('title', 'Daftar Produk')

@section('content')
    <div class="header-action">
        <div>
            <h1>Daftar Produk</h1>
            <p>Kelola menu roti dan kue Al-Fazza Bakery.</p>
        </div>
        <a href="{{ route('admin.produk.create') }}" class="btn-tambah"><i class="fa-solid fa-plus"></i> Tambah Produk</a>
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
                    <th>No</th>
                    <th>Gambar</th>
                    <th>Nama Roti</th>
                    <th>Kategori</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $index => $p)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td><img src="{{ asset($p->gambar) }}" alt="{{ $p->nama }}" class="img-thumbnail"></td>
                    <td><strong>{{ $p->nama }}</strong><br><small style="color: #888;">{{ $p->tipe }}</small></td>
                    <td>{{ ucfirst($p->kategori) }}</td>
                    <td>Rp {{ number_format($p->harga, 0, ',', '.') }}</td>
                    <td>
                        @if($p->stok < 10)
                            <span class="badge-stok stok-tipis">{{ $p->stok }} (Tipis!)</span>
                        @else
                            <span class="badge-stok stok-aman">{{ $p->stok }}</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.produk.edit', $p->id) }}" class="btn-action btn-edit" title="Edit"><i class="fa-solid fa-pen"></i></a>
                        <form action="{{ route('admin.produk.destroy', $p->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus produk ' . $p->nama . '?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-action btn-delete" title="Hapus"><i class="fa-solid fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection