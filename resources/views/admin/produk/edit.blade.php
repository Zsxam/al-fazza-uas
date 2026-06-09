@extends('layouts.admin')

@section('title', 'Edit Produk')

@section('content')
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
        <h1 class="text-xl lg:text-3xl font-bold m-0 mb-2">Edit Produk</h1>
        <p>Ubah detail roti atau kue yang sudah ada di sistem.</p>
    </div>

    <div class="bg-white p-8 rounded-lg shadow-sm">
        <form action="{{ route('admin.produk.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-5">
                <div class="flex flex-col gap-2">
                    <label>Nama Roti</label>
                    <input type="text" name="nama" class="form-input" value="{{ old('nama', $product->nama) }}" required>
                    @error('nama') <span class="text-danger text-sm mt-1">{{ $message }}</span> @enderror
                </div>
                
                <div class="flex flex-col gap-2">
                    <label>Kategori</label>
                    <select name="kategori" class="form-input" required>
                        <option value="bolu" {{ old('kategori', $product->kategori) == 'bolu' ? 'selected' : '' }}>Bolu</option>
                        <option value="cookies" {{ old('kategori', $product->kategori) == 'cookies' ? 'selected' : '' }}>Cookies</option>
                        <option value="pastry" {{ old('kategori', $product->kategori) == 'pastry' ? 'selected' : '' }}>Pastry</option>
                        <option value="roti" {{ old('kategori', $product->kategori) == 'roti' ? 'selected' : '' }}>Roti</option>
                    </select>
                    @error('kategori') <span class="text-danger text-sm mt-1">{{ $message }}</span> @enderror
                </div>

                <div class="flex flex-col gap-2">
                    <label>Tipe Produk</label>
                    <input type="text" name="tipe" class="form-input" value="{{ old('tipe', $product->tipe) }}" required>
                    @error('tipe') <span class="text-danger text-sm mt-1">{{ $message }}</span> @enderror
                </div>

                <div class="flex flex-col gap-2">
                    <label>Harga (Rp)</label>
                    <input type="number" name="harga" class="form-input" min="0" value="{{ old('harga', $product->harga) }}" required>
                    @error('harga') <span class="text-danger text-sm mt-1">{{ $message }}</span> @enderror
                </div>

                <div class="flex flex-col gap-2">
                    <label>Stok Saat Ini</label>
                    <div class="form-input bg-gray-100 font-bold text-lg text-text-darker">{{ $product->stok }} pcs</div>
                    <div class="bg-blue-50 border-l-4 border-bg-info p-2 text-sm text-text-info mt-1">
                        <i class="fa-solid fa-circle-info"></i> Informasi: Perubahan stok produk hanya dapat dilakukan melalui menu Kelola Stok.
                    </div>
                </div>

                <div class="flex flex-col gap-2">
                    <label>Foto Produk Baru (Opsional)</label>
                    <input type="file" name="gambar" class="form-input" accept="image/png, image/jpeg, image/jpg" onchange="previewImage(event)">
                    <small class="text-text-muted mt-1">Biarkan kosong jika tidak ingin mengganti foto.</small>
                    <img id="image-preview" class="hidden mt-3 rounded-lg border border-border-medium max-h-48 object-cover">
                    @error('gambar') <span class="text-danger text-sm mt-1">{{ $message }}</span> @enderror
                    
                    <div class="mt-2.5" id="current-image-container">
                        <span class="text-sm text-text-light block mb-1">Foto Saat Ini:</span>
                        <img loading="lazy" src="{{ asset($product->gambar) }}" alt="Foto Lama" class="h-50 rounded border border-border-medium object-cover">
                    </div>
                </div>

                <div class="flex flex-col gap-2 col-span-1 md:col-span-2">
                    <label>Bahan-Bahan Utama</label>
                    <div id="bahan-tags" class="flex flex-wrap gap-2 mb-1"></div>
                    <input type="text" id="bahan-input" class="form-input" placeholder="Ketik bahan dan tekan spasi atau koma">
                    <input type="hidden" name="bahan" id="bahan-hidden" value="{{ old('bahan', $product->bahan) }}" required>
                    <small class="text-text-muted mt-1">Tekan spasi atau koma untuk memisahkan bahan.</small>
                    @error('bahan') <span class="text-danger text-sm mt-1">{{ $message }}</span> @enderror
                </div>

                <div class="flex flex-col gap-2 col-span-1 md:col-span-2">
                    <label class="flex justify-between w-full">Saran Penyimpanan <span id="saran-char-count" class="text-text-muted font-normal text-sm">0/500</span></label>
                    <textarea name="saran_penyimpanan" id="saran-input" class="form-input" placeholder="Contoh: Simpan di suhu ruang..." maxlength="500" oninput="updateSaranCharCount()">{{ old('saran_penyimpanan', $product->saran_penyimpanan) }}</textarea>
                    @error('saran_penyimpanan') <span class="text-danger text-sm mt-1">{{ $message }}</span> @enderror
                </div>

                <div class="flex flex-col gap-2 col-span-1 md:col-span-2">
                    <label class="flex justify-between w-full">Deskripsi Produk <span id="char-count" class="text-text-muted font-normal text-sm">0/500</span></label>
                    <textarea name="deskripsi" id="deskripsi-input" class="form-input" maxlength="500" required oninput="updateCharCount()">{{ old('deskripsi', $product->deskripsi) }}</textarea>
                    @error('deskripsi') <span class="text-danger text-sm mt-1">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="mt-8 text-right">
                <a href="{{ route('admin.produk.index') }}" class="bg-gray-400 text-white py-3 px-6 rounded-md font-bold hover:bg-gray-500 transition mr-2.5 inline-block no-underline">Batal</a>
                <button type="submit" class="bg-primary-brown text-white py-3 px-6 rounded-md font-bold hover:bg-dark-brown transition cursor-pointer border-none text-base"><i class="fa-solid fa-save"></i> Perbarui Produk</button>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
<script>
    // Image Preview
    function previewImage(event) {
        const preview = document.getElementById('image-preview');
        const currentImage = document.getElementById('current-image-container');
        const file = event.target.files[0];
        if(file) {
            preview.src = URL.createObjectURL(file);
            preview.classList.remove('hidden');
            if(currentImage) currentImage.classList.add('hidden');
        } else {
            preview.classList.add('hidden');
            if(currentImage) currentImage.classList.remove('hidden');
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