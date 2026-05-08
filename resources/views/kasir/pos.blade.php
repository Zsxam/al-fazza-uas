<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mesin Kasir - Al-Fazza Bakery</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/logo.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
    
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Poppins', sans-serif; }
        body { background-color: #f4f6f9; display: flex; flex-direction: column; height: 100vh; overflow: hidden; }
        
        /* Navbar Kasir */
        .pos-header { background-color: #4a3b32; color: white; padding: 15px 20px; display: flex; justify-content: space-between; align-items: center; box-shadow: 0 2px 10px rgba(0,0,0,0.1); z-index: 10; }
        .pos-user { display: flex; align-items: center; gap: 15px; }
        .btn-logout { background-color: #d32f2f; color: white; border: none; padding: 8px 15px; border-radius: 5px; cursor: pointer; font-weight: bold; transition: 0.3s; }
        .btn-logout:hover { background-color: #c62828; }

        /* Layout Utama 2 Kolom */
        .pos-layout { display: flex; flex: 1; overflow: hidden; }

        /* Kolom Kiri: Daftar Menu */
        .pos-menu-section { flex: 2; padding: 20px; overflow-y: auto; background-color: #fdfaf6; }
        .pos-search { width: 100%; padding: 12px 20px; border: 1px solid #ddd; border-radius: 8px; font-size: 1rem; margin-bottom: 20px; outline: none; transition: 0.3s; }
        .pos-search:focus { border-color: #a67c52; box-shadow: 0 0 0 2px rgba(166, 124, 82, 0.2); }
        
        .pos-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(180px, 1fr)); gap: 15px; }
        .pos-card { background: white; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 5px rgba(0,0,0,0.05); cursor: pointer; border: 2px solid transparent; transition: 0.2s; }
        .pos-card:hover { border-color: #a67c52; transform: translateY(-2px); }
        .pos-card img { width: 100%; height: 120px; object-fit: cover; }
        .pos-card-body { padding: 10px; text-align: center; }
        .pos-card-title { font-weight: bold; font-size: 0.95rem; color: #333; margin-bottom: 5px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }
        .pos-card-price { color: #a67c52; font-weight: bold; }
        .pos-card-stock { font-size: 0.8rem; color: #888; margin-top: 5px; }

        /* Kolom Kanan: Struk Keranjang */
        .pos-cart-section { flex: 1; background: white; border-left: 1px solid #eee; display: flex; flex-direction: column; box-shadow: -2px 0 10px rgba(0,0,0,0.05); z-index: 5; }
        .cart-header { padding: 20px; background-color: #f8f9fa; border-bottom: 1px solid #eee; text-align: center; }
        .cart-items { flex: 1; overflow-y: auto; padding: 20px; }
        
        /* Item di Keranjang (Dummy) */
        .cart-item { display: flex; justify-content: space-between; align-items: center; padding-bottom: 15px; margin-bottom: 15px; border-bottom: 1px dashed #eee; }
        .cart-item-info h4 { font-size: 0.95rem; color: #333; }
        .cart-item-price { font-size: 0.85rem; color: #888; }
        .cart-item-qty { display: flex; align-items: center; gap: 10px; }
        .btn-qty { background: #eee; border: none; width: 25px; height: 25px; border-radius: 50%; cursor: pointer; font-weight: bold; }
        .btn-qty:hover { background: #ddd; }

        /* Area Total & Bayar */
        .cart-footer { padding: 20px; background-color: #f8f9fa; border-top: 1px solid #eee; }
        .cart-total-row { display: flex; justify-content: space-between; margin-bottom: 15px; font-size: 1.2rem; font-weight: bold; color: #333; }
        .btn-pay { width: 100%; background-color: #388e3c; color: white; border: none; padding: 15px; border-radius: 8px; font-size: 1.2rem; font-weight: bold; cursor: pointer; transition: 0.3s; }
        .btn-pay:hover { background-color: #2e7d32; }
        .modal-overlay { display: none; position: fixed; inset: 0; background: rgba(0,0,0,0.6); z-index: 2000; justify-content: center; align-items: center; }
        .modal-overlay.active { display: flex; }
        .modal-content { background: white; padding: 25px; border-radius: 10px; width: 100%; max-width: 400px; box-shadow: 0 10px 30px rgba(0,0,0,0.2); }
    </style>
</head>
<body>

    <header class="pos-header">
        <h2><i class="fa-solid fa-cash-register"></i> POS Al-Fazza</h2>
        <div class="pos-user">
            <span><i class="fa-solid fa-user-tie"></i> Kasir: <strong>{{ Auth::user()->name ?? 'Kasir Tamu' }}</strong></span>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn-logout"><i class="fa-solid fa-power-off"></i> Keluar</button>
            </form>
        </div>
    </header>

    <div class="pos-layout">
        <div class="pos-menu-section">
            <input type="text" id="pos-search-input" class="pos-search" placeholder="Cari nama roti (Contoh: Cheese Cake)...">
            
            <div class="pos-grid">
                @foreach($products as $p)
                <div class="pos-card" onclick="addToPosCart('{{ $p->id }}', '{{ $p->nama }}', '{{ $p->harga }}')">
                    <img src="{{ asset($p->gambar) }}" alt="{{ $p->nama }}">
                    <div class="pos-card-body">
                        <div class="pos-card-title">{{ $p->nama }}</div>
                        <div class="pos-card-price">Rp {{ number_format($p->harga, 0, ',', '.') }}</div>
                        <div class="pos-card-stock">Sisa: {{ $p->stok }} pcs</div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <div class="pos-cart-section">
            <div class="cart-header">
                <h3>Pesanan Saat Ini</h3>
                <p style="color: #888; font-size: 0.85rem;">Kasir: {{ Auth::user()->name ?? 'Kasir Tamu' }}</p>
            </div>
            
            <div class="cart-items" id="pos-cart-items">
                </div>

            <div class="cart-footer">
                <div class="cart-total-row">
                    <span>Total Tagihan:</span>
                    <span id="pos-grand-total" style="color: #d32f2f;">Rp 0</span>
                </div>
                
                <form action="{{ route('kasir.proses') }}" method="POST" id="form-pos">
                    @csrf
                    <input type="hidden" name="cart_data" id="cart-data-input">
                    <input type="hidden" name="payment_method" id="input-method">
                    <input type="hidden" name="amount_paid" id="input-paid">
                    <input type="hidden" name="change_amount" id="input-change">

                    
                    <button type="button" class="btn-pay" onclick="openModal()"><i class="fa-solid fa-money-bill-wave"></i> PROSES PEMBAYARAN</button>
                </form>
            </div>

        </div>

    </div>
       <div id="payment-modal" class="modal-overlay">
        <div class="modal-content">
            <h3 style="margin-bottom: 15px; border-bottom: 2px solid #eee; padding-bottom: 10px;">Detail Pembayaran</h3>
            <div style="font-size: 1.2rem; margin-bottom: 20px; display: flex; justify-content: space-between;">
                <span>Total Tagihan:</span>
                <strong id="modal-total-text" style="color: #d32f2f;">Rp 0</strong>
            </div>

            <div style="margin-bottom: 15px;">
                <label style="display: block; font-weight: bold; margin-bottom: 5px;">Metode Pembayaran</label>
                <select id="modal-method" class="pos-search" style="margin-bottom: 0;" onchange="toggleCashInput()">
                    <option value="Cash">Tunai (Cash)</option>
                    <option value="QRIS">QRIS</option>
                    <option value="Transfer">Transfer Bank</option>
                </select>
            </div>

            <div id="cash-input-group" style="margin-bottom: 15px;">
                <label style="display: block; font-weight: bold; margin-bottom: 5px;">Uang Diterima (Rp)</label>
                <input type="number" id="modal-paid" class="pos-search" style="margin-bottom: 0;" placeholder="Contoh: 50000" onkeyup="calculateChange()">
            </div>

            <div id="non-cash-info" style="display: none; text-align: center; margin-bottom: 15px; background: #fdfaf6; padding: 15px; border-radius: 8px; border: 1px dashed #a67c52;">
                <p id="payment-instruction" style="font-size: 0.9rem; margin-bottom: 10px;"></p>
                
                <div id="qris-image" style="display: none;">
                    <i class="fa-solid fa-qrcode" style="font-size: 5rem; color: #333;"></i>
                    <p style="font-size: 0.8rem; margin-top: 5px;">Scan dengan M-Banking / Gopay / OVO</p>
                </div>
                
                <div id="transfer-info" style="display: none; font-weight: bold; color: #4a3b32; font-size: 1.1rem;">
                    BCA: 1234 5678 90<br>a.n Al-Fazza Bakery
                </div>
                
                <p style="font-size: 0.8rem; color: #d32f2f; margin-top: 15px; font-weight: bold;">
                    <i class="fa-solid fa-triangle-exclamation"></i> Kasir wajib cek mutasi masuk sebelum klik Simpan!
                </p>
            </div>

            <div style="margin-bottom: 20px;">
                <label style="display: block; font-weight: bold; margin-bottom: 5px;">Kembalian</label>
                <input type="text" id="modal-change" class="pos-search" style="margin-bottom: 0; background: #eee; font-weight: bold;" value="Rp 0" readonly>
            </div>

            <div style="display: flex; justify-content: flex-end; gap: 10px;">
                <button type="button" class="btn-logout" style="background: #999;" onclick="closeModal()">Batal</button>
                <button type="button" class="btn-pay" style="padding: 10px 20px; width: auto;" onclick="submitFinalPayment()">Bayar & Simpan</button>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/js/script.js') }}"></script>
</body>
</html>
