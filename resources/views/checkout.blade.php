@extends('layouts.main')

@section('content')
    <div class="checkout-container">
        <div class="checkout-form-section">
            <h2>Informasi Pemesan</h2>
            <form id="checkoutForm">
                
                <div class="form-row" style="display: flex; gap: 15px; margin-bottom: 25px; flex-wrap: wrap;">
                    <div class="form-group" style="flex: 1; min-width: 200px;">
                        <label style="font-weight: bold; margin-bottom: 5px; display: block;">Nama Pemesan *</label>
                        <input type="text" id="nama" required placeholder="Masukkan nama lengkap" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 6px; box-sizing: border-box;">
                    </div>
                    
                    <div class="form-group" style="flex: 1; min-width: 200px;">
                        <label style="font-weight: bold; margin-bottom: 5px; display: block;">Email *</label>
                        <input type="email" id="email" required placeholder="Masukkan email aktif" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 6px; box-sizing: border-box;">
                    </div>
                    
                    <div class="form-group" style="flex: 1; min-width: 200px;">
                        <label style="font-weight: bold; margin-bottom: 5px; display: block;">No. WhatsApp *</label>
                        <input type="tel" id="nohp" required placeholder="Contoh: 081234567890" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 6px; box-sizing: border-box;">
                    </div>
                </div>

                <h2>Informasi Pengiriman</h2>
                
                <div class="form-group" style="margin-bottom: 20px;">
                    <label style="font-weight: bold; margin-bottom: 5px; display: block;">Waktu Pengiriman *</label>
                    <input type="date" id="tanggal_kirim" required min="{{ date('Y-m-d') }}" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 6px; box-sizing: border-box;">
                </div>
                
                <div class="form-group" style="margin-bottom: 25px;">
                    <label style="font-weight: bold; margin-bottom: 5px; display: block;">Detail Alamat Pengiriman *</label>
                    <textarea id="alamat" rows="4" required placeholder="Isi dengan detail tambahan seperti nomor rumah, blok, nama gedung, patokan, dll." style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 6px; box-sizing: border-box;"></textarea>
                </div>

                <div class="payment-info" style="background: #e8f5e9; padding: 15px; border-radius: 8px; border-left: 5px solid #2e7d32; display: flex; align-items: center; gap: 10px;">
                    <i class="fa-solid fa-shield-halved" style="color: #2e7d32; font-size: 1.5rem;"></i>
                    <p style="margin: 0; color: #2e7d32; font-size: 0.9rem; line-height: 1.5;">Pembayaran diproses secara aman dan otomatis melalui Midtrans. <strong>Invoice akan dikirimkan ke Email Anda.</strong></p>
                </div>
                
            </form>
        </div>

        <div class="checkout-summary-section">
            <div class="summary-card">
                <div class="summary-header">
                    <h3>Ringkasan Pesanan</h3>
                </div>
                
                <div class="order-list" id="checkout-order-list">
                    </div>

                <div class="summary-totals">
                    <div class="total-row">
                        <span>Total Harga</span>
                        <span id="checkout-subtotal">Rp 0</span>
                    </div>
                    <div class="total-row grand-total">
                        <span>Total Bayar</span>
                        <span id="checkout-grandtotal">Rp 0</span>
                    </div>
                </div>
            </div>

            <div class="summary-card note-card">
                <div class="summary-header">
                    <h3>Catatan</h3>
                </div>
                <textarea id="catatan" rows="3" placeholder="Tulis catatan pesanan (Opsional)" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 6px; box-sizing: border-box;"></textarea>
            </div>

            <button type="button" class="btn-bayar-wa" onclick="payNow()" style="background: #1a365d; color: white; border: none; padding: 15px 20px; border-radius: 8px; font-size: 1.1rem; font-weight: bold; width: 100%; cursor: pointer; display: flex; justify-content: center; align-items: center; gap: 10px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); margin-top: 20px;">
                <i class="fa-solid fa-credit-card"></i> PESAN & BAYAR SEKARANG
            </button>
        </div>
    </div>

    <script src="https://app{{ config('midtrans.is_production') ? '' : '.sandbox' }}.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>
    
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            if (typeof renderCheckoutSummary === "function") {
                renderCheckoutSummary();
            }
        });
    </script>
@endsection