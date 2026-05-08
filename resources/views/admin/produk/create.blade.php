@extends('layouts.admin')

@section('title', 'Tambah Produk')

@section('content')
    <div class="header-action">
        <h1>Tambah Produk Baru</h1>
        <p>Masukkan detail roti atau kue baru yang akan dijual.</p>
    </div>

    <div class="form-container">
        <form action="{{ route('admin.produk.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-grid">
                <div class="form-group">
                    <label>Nama Roti</label>
                    <input type="text" name="nama" class="form-input" placeholder="Contoh: Bolu Coklat Lumer" value="{{ old('nama') }}" required>
                    @error('nama') <span class="error-text">{{ $message }}</span> @enderror
                </div>
                
                <div class="form-group">
                    <label>Kategori</label>
                    <select name="kategori" class="form-input" required>
                        <option value="">-- Pilih Kategori --</option>
                        <option value="bolu" {{ old('kategori') == 'bolu' ? 'selected' : '' }}>Bolu</option>
                        <option value="cookies" {{ old('kategori') == 'cookies' ? 'selected' : '' }}>Cookies</option>
                        <option value="pastry" {{ old('kategori') == 'pastry' ? 'selected' : '' }}>Pastry</option>
                        <option value="roti" {{ old('kategori') == 'roti' ? 'selected' : '' }}>Roti</option>
                    </select>
                    @error('kategori') <span class="error-text">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label>Tipe Produk</label>
                    <input type="text" name="tipe" class="form-input" placeholder="Contoh: Kue Bolu / Kue Kering" value="{{ old('tipe') }}" required>
                    @error('tipe') <span class="error-text">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label>Harga (Rp)</label>
                    <input type="number" name="harga" class="form-input" placeholder="Contoh: 45000" min="0" value="{{ old('harga') }}" required>
                    @error('harga') <span class="error-text">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label>Stok Awal</label>
                    <input type="number" name="stok" class="form-input" placeholder="Contoh: 50" min="0" value="{{ old('stok') }}" required>
                    @error('stok') <span class="error-text">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label>Foto Produk</label>
                    <input type="file" name="gambar" class="form-input" accept="image/png, image/jpeg, image/jpg" required>
                    <small style="color: #666; margin-top: 5px;">Format: JPG, JPEG, PNG. Maksimal 2MB.</small>
                    @error('gambar') <span class="error-text">{{ $message }}</span> @enderror
                </div>

                <div class="form-group full-width">
                    <label>Bahan-Bahan Utama</label>
                    <input type="text" name="bahan" class="form-input" placeholder="Contoh: Tepung Terigu, Coklat, Telur, Mentega" value="{{ old('bahan') }}" required>
                    @error('bahan') <span class="error-text">{{ $message }}</span> @enderror
                </div>

                <div class="form-group full-width">
                    <label>Deskripsi Produk</label>
                    <textarea name="deskripsi" class="form-input" placeholder="Tuliskan deskripsi menarik tentang roti ini..." required>{{ old('deskripsi') }}</textarea>
                    @error('deskripsi') <span class="error-text">{{ $message }}</span> @enderror
                </div>
            </div>

            <div style="margin-top: 30px; text-align: right;">
                <a href="{{ route('admin.produk.index') }}" class="btn-kembali">Batal</a>
                <button type="submit" class="btn-submit"><i class="fa-solid fa-save"></i> Simpan Produk</button>
            </div>
        </form>
    </div>
@endsection