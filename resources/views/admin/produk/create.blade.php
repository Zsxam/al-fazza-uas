@extends('layouts.admin')

@section('title', 'Tambah Produk')

@section('content')
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
        <h1 class="text-xl lg:text-3xl font-bold m-0 mb-2">Tambah Produk Baru</h1>
        <p>Masukkan detail roti atau kue baru yang akan dijual.</p>
    </div>

    <div class="bg-white p-8 rounded-lg shadow-sm">
        <form action="{{ route('admin.produk.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-5">
                <div class="flex flex-col gap-2">
                    <label>Nama Roti</label>
                    <input type="text" name="nama" class="form-input" placeholder="Contoh: Bolu Coklat Lumer" value="{{ old('nama') }}" required>
                    @error('nama') <span class="text-danger text-sm mt-1">{{ $message }}</span> @enderror
                </div>
                
                <div class="flex flex-col gap-2">
                    <label>Kategori</label>
                    <select name="kategori" class="form-input" required>
                        <option value="">-- Pilih Kategori --</option>
                        <option value="bolu" {{ old('kategori') == 'bolu' ? 'selected' : '' }}>Bolu</option>
                        <option value="cookies" {{ old('kategori') == 'cookies' ? 'selected' : '' }}>Cookies</option>
                        <option value="pastry" {{ old('kategori') == 'pastry' ? 'selected' : '' }}>Pastry</option>
                        <option value="roti" {{ old('kategori') == 'roti' ? 'selected' : '' }}>Roti</option>
                    </select>
                    @error('kategori') <span class="text-danger text-sm mt-1">{{ $message }}</span> @enderror
                </div>

                <div class="flex flex-col gap-2">
                    <label>Tipe Produk</label>
                    <input type="text" name="tipe" class="form-input" placeholder="Contoh: Kue Bolu / Kue Kering" value="{{ old('tipe') }}" required>
                    @error('tipe') <span class="text-danger text-sm mt-1">{{ $message }}</span> @enderror
                </div>

                <div class="flex flex-col gap-2">
                    <label>Harga (Rp)</label>
                    <input type="number" name="harga" class="form-input" placeholder="Contoh: 45000" min="0" value="{{ old('harga') }}" required>
                    @error('harga') <span class="text-danger text-sm mt-1">{{ $message }}</span> @enderror
                </div>

                <div class="flex flex-col gap-2">
                    <label>Stok Awal</label>
                    <input type="number" name="stok" class="form-input" placeholder="Contoh: 50" min="0" value="{{ old('stok') }}" required>
                    @error('stok') <span class="text-danger text-sm mt-1">{{ $message }}</span> @enderror
                </div>

                <div class="flex flex-col gap-2">
                    <label>Foto Produk</label>
                    <input type="file" name="gambar" class="form-input" accept="image/png, image/jpeg, image/jpg" required onchange="previewImage(event)">
                    <small class="text-text-muted mt-1">Format: JPG, JPEG, PNG. Maksimal 2MB.</small>
                    <img id="image-preview" class="hidden mt-3 rounded-lg border border-border-medium max-h-48 w-48">
                    @error('gambar') <span class="text-danger text-sm mt-1">{{ $message }}</span> @enderror
                </div>

                <div class="flex flex-col gap-2 col-span-1 md:col-span-2">
                    <label>Bahan-Bahan Utama</label>
                    <div id="bahan-tags" class="flex flex-wrap gap-2 mb-1"></div>
                    <input type="text" id="bahan-input" class="form-input" placeholder="Ketik bahan dan tekan spasi atau koma">
                    <input type="hidden" name="bahan" id="bahan-hidden" value="{{ old('bahan') }}" required>
                    <small class="text-text-muted mt-1">Tekan spasi atau koma untuk memisahkan bahan.</small>
                    @error('bahan') <span class="text-danger text-sm mt-1">{{ $message }}</span> @enderror
                </div>

                <div class="flex flex-col gap-2 col-span-1 md:col-span-2">
                    <label class="flex justify-between w-full">Saran Penyimpanan <span id="saran-char-count" class="text-text-muted font-normal text-sm">0/500</span></label>
                    <textarea name="saran_penyimpanan" id="saran-input" class="form-input" placeholder="Contoh: Simpan di suhu ruang..." maxlength="500" oninput="updateSaranCharCount()">{{ old('saran_penyimpanan') }}</textarea>
                    @error('saran_penyimpanan') <span class="text-danger text-sm mt-1">{{ $message }}</span> @enderror
                </div>

                <div class="flex flex-col gap-2 col-span-1 md:col-span-2">
                    <label class="flex justify-between w-full">Deskripsi Produk <span id="char-count" class="text-text-muted font-normal text-sm">0/500</span></label>
                    <textarea name="deskripsi" id="deskripsi-input" class="form-input" placeholder="Tuliskan deskripsi menarik tentang roti ini..." maxlength="500" required oninput="updateCharCount()">{{ old('deskripsi') }}</textarea>
                    @error('deskripsi') <span class="text-danger text-sm mt-1">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="mt-8 text-right">
                <a href="{{ route('admin.produk.index') }}" class="bg-gray-400 text-white py-3 px-6 rounded-md font-bold hover:bg-gray-500 transition mr-2.5 inline-block no-underline">Batal</a>
                <button type="submit" class="bg-primary-brown text-white py-3 px-6 rounded-md font-bold hover:bg-dark-brown transition cursor-pointer border-none text-base"><i class="fa-solid fa-save"></i> Simpan Produk</button>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
<script>
    // Image Preview
    function previewImage(event) {
        const preview = document.getElementById('image-preview');
        const file = event.target.files[0];
        if(file) {
            preview.src = URL.createObjectURL(file);
            preview.classList.remove('hidden');
        } else {
            preview.classList.add('hidden');
        }
    }

    document.addEventListener('DOMContentLoaded', function() {
        // Character Count Deskripsi
        const deskripsiInput = document.getElementById('deskripsi-input');
        const deskripsiCount = document.getElementById('char-count');
        
        window.updateCharCount = function() {
            if(deskripsiInput) deskripsiCount.textContent = deskripsiInput.value.length + '/500';
        }
        updateCharCount();

        // Character Count Saran Penyimpanan
        const saranInput = document.getElementById('saran-input');
        const saranCount = document.getElementById('saran-char-count');
        
        window.updateSaranCharCount = function() {
            if(saranInput) saranCount.textContent = saranInput.value.length + '/500';
        }
        updateSaranCharCount();

        // Tags Input Logic
        const bahanInput = document.getElementById('bahan-input');
        const bahanHidden = document.getElementById('bahan-hidden');
        const bahanTags = document.getElementById('bahan-tags');
        
        if(!bahanInput || !bahanHidden || !bahanTags) return;
        
        let tags = bahanHidden.value ? bahanHidden.value.split(',').map(t => t.trim()).filter(t => t) : [];

        function renderTags() {
            bahanTags.innerHTML = '';
            tags.forEach((tag, index) => {
                const tagEl = document.createElement('span');
                tagEl.className = 'bg-bg-gray-progress text-text-darker px-3 py-1 rounded-full text-sm font-semibold flex items-center gap-2 mb-2';
                tagEl.innerHTML = `${tag} <i class="fas fa-times cursor-pointer hover:text-danger" onclick="removeTag(${index})"></i>`;
                bahanTags.appendChild(tagEl);
            });
            bahanHidden.value = tags.join(', ');
        }

        window.removeTag = function(index) {
            tags.splice(index, 1);
            renderTags();
        };

        bahanInput.addEventListener('keydown', function(e) {
            if (e.key === ' ' || e.key === ',') {
                e.preventDefault();
                const val = this.value.trim().replace(/,/g, '');
                if (val && !tags.includes(val)) {
                    tags.push(val);
                    this.value = '';
                    renderTags();
                } else if (tags.includes(val)) {
                    this.value = '';
                }
            }
        });

        bahanInput.closest('form').addEventListener('submit', function() {
            const val = bahanInput.value.trim().replace(/,/g, '');
            if (val && !tags.includes(val)) {
                tags.push(val);
                renderTags();
            }
        });

        renderTags();
    });
</script>
@endpush