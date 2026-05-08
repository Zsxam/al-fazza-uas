@extends('layouts.admin')

@section('title', 'Catat Stok Baru')

@section('content')
    <div class="header-action">
        <h1>Catat Pergerakan Stok</h1>
        <p>Catat stok roti baru matang (Masuk) atau roti rusak/kadaluarsa (Keluar).</p>
    </div>

    <div class="form-container" style="max-width: 600px;">
        <form action="{{ route('admin.stok.store') }}" method="POST">
            @csrf
            
            <div class="form-group" style="margin-bottom: 20px;">
                <label>Pilih Produk Roti</label>
                <select name="product_id" class="form-input" required>
                    <option value="">-- Klik untuk memilih roti --</option>
                    @foreach($products as $p)
                        <option value="{{ $p->id }}" {{ old('product_id') == $p->id ? 'selected' : '' }}>
                            {{ $p->nama }} (Sisa Stok: {{ $p->stok }})
                        </option>
                    @endforeach
                </select>
                @error('product_id') <span class="error-text">{{ $message }}</span> @enderror
            </div>

            <div class="form-grid">
                <div class="form-group">
                    <label>Jenis Pergerakan</label>
                    <select name="tipe" class="form-input" required>
                        <option value="masuk" {{ old('tipe') == 'masuk' ? 'selected' : '' }}>Barang Masuk (Produksi Baru)</option>
                        <option value="keluar" {{ old('tipe') == 'keluar' ? 'selected' : '' }}>Barang Keluar (Rusak/Expired)</option>
                    </select>
                    @error('tipe') <span class="error-text">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label>Jumlah (pcs)</label>
                    <input type="number" name="jumlah" class="form-input" min="1" value="{{ old('jumlah') }}" placeholder="Contoh: 20" required>
                    @error('jumlah') <span class="error-text">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="form-group" style="margin-bottom: 20px;">
                <label>Keterangan (Opsional)</label>
                <textarea name="keterangan" class="form-input" placeholder="Contoh: Roti baru matang dari oven shift pagi..." style="min-height: 80px;">{{ old('keterangan') }}</textarea>
                @error('keterangan') <span class="error-text">{{ $message }}</span> @enderror
            </div>

            <div style="text-align: right;">
                <a href="{{ route('admin.stok.index') }}" class="btn-kembali">Batal</a>
                <button type="submit" class="btn-submit"><i class="fa-solid fa-save"></i> Simpan Catatan Stok</button>
            </div>
        </form>
    </div>
@endsection