@extends('layouts.admin')

@section('title', 'Edit Produk')

@section('content')
    <div class="header-action">
        <h1>Edit Produk</h1>
        <p>Ubah detail roti atau kue yang sudah ada di sistem.</p>
    </div>

    <div class="form-container">
        <form action="{{ route('admin.produk.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT') <div class="form-grid">
                <div class="form-group">
                    <label>Nama Roti</label>
                    <input type="text" name="nama" class="form-input" value="{{ old('nama', $product->nama) }}" required>
                    @error('nama') <span class="error-text">{{ $message }}</span> @enderror
                </div>
                
                <div class="form-group">
                    <label>Kategori</label>
                    <select name="kategori" class="form-input" required>
                        <option value="bolu" {{ old('kategori', $product->kategori) == 'bolu' ? 'selected' : '' }}>Bolu</option>
                        <option value="cookies" {{ old('kategori', $product->kategori) == 'cookies' ? 'selected' : '' }}>Cookies</option>
                        <option value="pastry" {{ old('kategori', $product->kategori) == 'pastry' ? 'selected' : '' }}>Pastry</option>
                        <option value="roti" {{ old('kategori', $product->kategori) == 'roti' ? 'selected' : '' }}>Roti</option>
                    </select>
                    @error('kategori') <span class="error-text">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label>Tipe Produk</label>
                    <input type="text" name="tipe" class="form-input" value="{{ old('tipe', $product->tipe) }}" required>
                    @error('tipe') <span class="error-text">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label>Harga (Rp)</label>
                    <input type="number" name="harga" class="form-input" min="0" value="{{ old('harga', $product->harga) }}" required>
                    @error('harga') <span class="error-text">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label>Stok Saat Ini</label>
                    <input type="number" name="stok" class="form-input" min="0" value="{{ old('stok', $product->stok) }}" required>
                    @error('stok') <span class="error-text">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label>Foto Produk Baru (Opsional)</label>
                    <input type="file" name="gambar" class="form-input" accept="image/png, image/jpeg, image/jpg">
                    <small style="color: #666; margin-top: 5px;">Biarkan kosong jika tidak ingin mengganti foto.</small>
                    @error('gambar') <span class="error-text">{{ $message }}</span> @enderror
                    
                    <div style="margin-top: 10px;">
                        <span style="font-size: 0.85rem; color: #888; display: block; margin-bottom: 5px;">Foto Saat Ini:</span>
                        <img src="{{ asset($product->gambar) }}" alt="Foto Lama" style="height: 80px; border-radius: 5px; border: 1px solid #ddd;">
                    </div>
                </div>

                <div class="form-group full-width">
                    <label>Bahan-Bahan Utama</label>
                    <input type="text" name="bahan" class="form-input" value="{{ old('bahan', $product->bahan) }}" required>
                    @error('bahan') <span class="error-text">{{ $message }}</span> @enderror
                </div>

                <div class="form-group full-width">
                    <label>Deskripsi Produk</label>
                    <textarea name="deskripsi" class="form-input" required>{{ old('deskripsi', $product->deskripsi) }}</textarea>
                    @error('deskripsi') <span class="error-text">{{ $message }}</span> @enderror
                </div>
            </div>

            <div style="margin-top: 30px; text-align: right;">
                <a href="{{ route('admin.produk.index') }}" class="btn-kembali">Batal</a>
                <button type="submit" class="btn-submit"><i class="fa-solid fa-save"></i> Perbarui Produk</button>
            </div>
        </form>
    </div>
@endsection