@extends('layouts.main')

@section('content')
    <main class="kategori-container">
        <div class="banner-wrapper">
            <div class="promo-banner dark-banner">
                <h2>Platform Terbaik untuk order Pastry & Bakery</h2>
                <p>Nikmati Pastry & Bakery sesuai selera lidah dan dompetmu!</p>
                <!-- <button class="btn-brown">Beli Sekarang</button> -->
            </div>
            <div class="promo-banner dark-banner">
                <h2>Pastry unik Bakery menarik, seleramu pasti melirik!</h2>
                <p>Ayo dapatkan aneka cemilan keseharianmu dari sekarang!</p>
                <!-- <button class="btn-brown">Beli Sekarang</button> -->
            </div>
        </div>

        
        <div class="kategori-grid" id="kategori-grid">
        </div>
        <div class="kategori-header">
            <h3 id="judul-kategori"></h3>
        </div>
    </main>
    
    <script>
        document.addEventListener("DOMContentLoaded", renderKategoriProduk);
    </script>
    @endsection
