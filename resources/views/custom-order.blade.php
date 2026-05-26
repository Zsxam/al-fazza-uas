@extends('layouts.main')

@section('content')
    <div class="checkout-container">
        <div class="checkout-form-section">
            <h2>Informasi Pemesan</h2>
            <form id="customOrderForm">
                
                <div class="form-row" style="display: flex; gap: 15px; margin-bottom: 25px; flex-wrap: wrap;">
                    
                    <div class="form-group" style="flex: 1; min-width: 200px;">
                        <label style="font-weight: bold; color: #555; display: block; margin-bottom: 5px;">Nama Lengkap *</label>
                        <input type="text" id="co_nama" required placeholder="Masukkan nama (hanya huruf)" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 6px; box-sizing: border-box;">
                    </div>

                    <div class="form-group" style="flex: 1; min-width: 200px;">
                        <label style="font-weight: bold; color: #555; display: block; margin-bottom: 5px;">Email *</label>
                        <input type="email" id="co_email" required placeholder="Contoh: nama@email.com" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 6px; box-sizing: border-box;">
                    </div>

                    <div class="form-group" style="flex: 1; min-width: 200px;">
                        <label style="font-weight: bold; color: #555; display: block; margin-bottom: 5px;">No. WhatsApp *</label>
                        <input type="tel" id="co_nohp" required placeholder="Contoh: 08123456789" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 6px; box-sizing: border-box;">
                    </div>

                </div>

                <h2>Spesifikasi Kue</h2>
                
                <div class="form-row" style="display: flex; gap: 15px; margin-bottom: 15px; flex-wrap: wrap;">
                    <div class="form-group" style="flex: 1; min-width: 200px;">
                        <label style="font-weight: bold; margin-bottom: 5px; display: block;">Ukuran Kue *</label>
                        <select id="co_ukuran" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 6px; box-sizing: border-box;">
                            <option value="" disabled selected>-- Pilih Ukuran --</option>
                            <option value="16 cm">16 cm</option>
                            <option value="18 cm">18 cm</option>
                            <option value="20 cm">20 cm</option>
                            <option value="22 cm">22 cm</option>
                            <option value="24 cm">24 cm</option>
                            <option value="30 cm">30 cm</option>
                        </select>
                    </div>
                    <div class="form-group" style="flex: 1; min-width: 200px;">
                        <label style="font-weight: bold; margin-bottom: 5px; display: block;">Bentuk Kue *</label>
                        <select id="co_bentuk" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 6px; box-sizing: border-box;">
                            <option value="" disabled selected>-- Pilih Bentuk --</option>
                            <option value="Bulat">Bulat</option>
                            <option value="Kotak">Kotak</option>
                            <option value="Hati (Heart)">Hati</option>
                        </select>
                    </div>
                </div>

                <div class="form-row" style="display: flex; gap: 15px; margin-bottom: 25px; flex-wrap: wrap;">
                    <div class="form-group" style="flex: 1; min-width: 200px;">
                        <label style="font-weight: bold; margin-bottom: 5px; display: block;">Base Cake (Rasa) *</label>
                        <select id="co_rasa" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 6px; box-sizing: border-box;">
                            <option value="" disabled selected>-- Pilih Rasa --</option>
                            <option value="Bolu Coklat">Bolu Coklat</option>
                            <option value="Bolu Pandan">Bolu Pandan</option>
                            <option value="Bolu Vanilla">Bolu Vanilla</option>
                            <option value="Bolu Mocca">Bolu Mocca</option>
                        </select>
                    </div>
                    <div class="form-group" style="flex: 1; min-width: 200px;">
                        <label style="font-weight: bold; margin-bottom: 5px; display: block;">Filling / Isian *</label>
                        <select id="co_isian" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 6px; box-sizing: border-box;">
                            <option value="" disabled selected>-- Pilih Isian --</option>
                            <option value="Selai Strawberry">Selai Strawberry</option>
                            <option value="Selai Blueberry">Selai Blueberry</option>
                            <option value="Coklat Ganache">Coklat Ganache</option>
                            <option value="Cream Cheese">Cream Cheese</option>
                        </select>
                    </div>
                </div>

                <h2>Detail Desain</h2>
                
                <div class="form-group" style="margin-bottom: 15px;">
                    <label style="font-weight: bold; margin-bottom: 5px; display: block;">Tema & Warna Dominan *</label>
                    <input type="text" id="co_tema" required placeholder="Contoh: Tema Spiderman, dominan merah dan biru" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 6px; box-sizing: border-box;">
                </div>
                <div class="form-group" style="margin-bottom: 25px;">
                    <label style="font-weight: bold; margin-bottom: 5px; display: block;">Tulisan di Atas Kue *</label>
                    <input type="text" id="co_tulisan" required placeholder="Contoh: Happy Birthday Mama ke-50" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 6px; box-sizing: border-box;">
                </div>

                <h2>Waktu & Pengiriman</h2>
                
                <div class="form-row" style="display: flex; gap: 15px; margin-bottom: 15px; flex-wrap: wrap;">
                    <div class="form-group" style="flex: 1; min-width: 200px;">
                        <label style="font-weight: bold; margin-bottom: 5px; display: block;">Tanggal Diperlukan *</label>
                        <input type="date" id="co_tanggal" required min="{{ date('Y-m-d') }}" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 6px; box-sizing: border-box;">
                    </div>
                    <div class="form-group" style="flex: 1; min-width: 200px;">
                        <label style="font-weight: bold; margin-bottom: 5px; display: block;">Metode *</label>
                        <select id="co_metode" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 6px; box-sizing: border-box;" onchange="toggleAlamatCustom()">
                            <option value="" disabled selected>-- Metode Pengiriman --</option>
                            <option value="Ambil di Toko">Ambil di Toko</option>
                            <option value="Dikirim">Dikirim ke Alamat</option>
                        </select>
                    </div>
                </div>
                
                <div class="form-group" id="co_alamat_group" style="display: none; margin-bottom: 20px;">
                    <label style="font-weight: bold; margin-bottom: 5px; display: block;">Alamat Pengiriman *</label>
                    <textarea id="co_alamat" rows="3" placeholder="Isi detail alamat pengiriman secara lengkap" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 6px; box-sizing: border-box;"></textarea>
                </div>
            </form>
        </div>

        <div class="checkout-summary-section">
            <div class="summary-card">
                <div class="summary-header">
                    <h3>Cara Pesan Custom Cake</h3>
                </div>
                
                <div class="instruction-box" style="padding: 15px; background: #f9f9f9; border-radius: 8px;">
                    <ol style="line-height: 1.8; color: #555; padding-left: 15px; margin: 0;">
                        <li>Isi formulir spesifikasi <em>Custom Cake</em> Anda dengan lengkap.</li>
                        <li><strong>Total harga</strong> otomatis terhitung berdasarkan <strong>Ukuran Kue</strong>.</li>
                        <li>Klik <strong>"PESAN & BAYAR SEKARANG"</strong> untuk melakukan pembayaran otomatis via Midtrans.</li>
                        <li>Setelah lunas, harap <strong>kirimkan foto desain referensi</strong> Anda ke WhatsApp <strong>08952338283</strong> dengan melampirkan Nomor Invoice.</li>
                    </ol>
                </div>
            </div>
            <div class="summary-card">
                <div class="summary-header">
                    <h3>Petunjuk Harga Custom Cake</h3>
                </div>
                
                <div class="instruction-box" style="padding: 15px; background: #f9f9f9; border-radius: 8px;">                    
                    <ul style="list-style: none; padding: 0; margin: 0; color: #333; font-size: 0.95rem;">
                        <li style="display: flex; justify-content: space-between; padding: 8px 0; border-bottom: 1px dashed #ccc;">
                            <span>Ukuran 16 cm</span> <strong>Rp 150.000</strong>
                        </li>
                        <li style="display: flex; justify-content: space-between; padding: 8px 0; border-bottom: 1px dashed #ccc;">
                            <span>Ukuran 18 cm</span> <strong>Rp 180.000</strong>
                        </li>
                        <li style="display: flex; justify-content: space-between; padding: 8px 0; border-bottom: 1px dashed #ccc;">
                            <span>Ukuran 20 cm</span> <strong>Rp 220.000</strong>
                        </li>
                        <li style="display: flex; justify-content: space-between; padding: 8px 0; border-bottom: 1px dashed #ccc;">
                            <span>Ukuran 22 cm</span> <strong>Rp 260.000</strong>
                        </li>
                        <li style="display: flex; justify-content: space-between; padding: 8px 0; border-bottom: 1px dashed #ccc;">
                            <span>Ukuran 24 cm</span> <strong>Rp 300.000</strong>
                        </li>
                        <li style="display: flex; justify-content: space-between; padding: 8px 0;">
                            <span>Ukuran 30 cm</span> <strong>Rp 450.000</strong>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="summary-card note-card" style="margin-top: 20px;">
                <div class="summary-header">
                    <h3>Catatan Tambahan</h3>
                </div>
                <textarea id="co_catatan" rows="3" placeholder="Contoh: Krim jangan terlalu manis, dll." style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 6px; box-sizing: border-box;"></textarea>
            </div>

            <button type="button" onclick="prosesCustomOrderMidtrans()" style="background: #1a365d; color: white; border: none; padding: 15px 20px; border-radius: 8px; font-size: 1.1rem; font-weight: bold; width: 100%; cursor: pointer; display: flex; justify-content: center; align-items: center; gap: 10px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); margin-top: 20px;">
                <i class="fa-solid fa-credit-card"></i> PESAN & BAYAR SEKARANG
            </button>   
        </div>
    </div>

    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>
@endsection