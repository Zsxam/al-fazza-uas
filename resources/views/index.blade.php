@extends('layouts.main')

@section('content')
    <section class="hero">
        <div class="hero-content">
            <h1>Pisang Bolen</h1>
            <p>Perpaduan pisang dan cokelat lumer atau keju gurih yang dibalut kulit pastry berlapis yang renyah di luar namun lembut di dalam.</p>
            <button class="btn-buy" onclick="window.location.href='{{ url('/detail?id=49') }}'">Beli Sekarang</button>
        </div>
        <div class="hero-image">
            <img src="{{ asset('assets/img/pisangbolen 1.png') }}" alt="Pisang Bolen">
        </div>
    </section>

    <section class="brown-section">
            <h2>Terlaris</h2>
            <div class="item-list">
                <div class="circular-item" onclick="window.location.href='{{ url('/detail?id=49') }}'">
                    <img src="{{ asset('assets/img/pisangbolen 1.png') }}" alt="Pisang Bolen">
                </div>
                
                <div class="circular-item" onclick="window.location.href='{{ url('/detail?id=50') }}'">
                    <img src="{{ asset('assets/img/cheeseroll 1.png') }}" alt="Cheese Roll">
                </div>
                <div class="circular-item" onclick="window.location.href='{{ url('/detail?id=51') }}'">
                    <img src="{{ asset('assets/img/krasong 1.png') }}" alt="Krasong">
                </div>
                <div class="circular-item" onclick="window.location.href='{{ url('/detail?id=52') }}'">
                    <img src="{{ asset('assets/img/corong 1.png') }}" alt="Kue Corong">
                </div>
            </div>
        </section>

    <section class="new-bakery">
        <h2 class="section-title" >Bakery Terbaru</h2>
        <div class="product-grid">
            <div class="card">
                <div class="card-header">
                    <div class="title-cat">
                        <h3>Cheese</h3>
                        <span>Kue Bolu</span>
                    </div>
                </div>
                <div class="card-img-wrapper">
                    <div class="rating"><i class="fa-solid fa-star"></i>4.9</div>
                    <img src="{{ asset('assets/img/bolu/1-bolukeju.png') }}" alt="Cheese Cake">
                </div>
                <div class="card-footer">
                    <p>Rp 13.500</p>
                    <div>
                        <button class="btn-add-cart" onclick="addToCart('Cheese Cake', 13600, '{{ asset('assets/img/bolu/1-bolukeju.png') }}')">Beli</button>
                        <button class="btn-brown" onclick="window.location.href='{{ url('/detail?id=1') }}'">Detail</button>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <div class="title-cat">
                        <h3>Meses</h3>
                        <span>Kue Bolu</span>
                    </div>
                </div>
                <div class="card-img-wrapper">
                    <div class="rating"><i class="fa-solid fa-star"></i>4.9</div>
                    <img src="{{ asset('assets/img/bolu/2-bolumeses.png') }}" alt="Meses">
                </div>
                <div class="card-footer">
                    <p>Rp 11.900</p>
                    <div>
                        <button class="btn-add-cart" onclick="addToCart('Meses', 11900, '{{ asset('assets/img/bolu/2-bolumeses.png') }}')">Beli</button>
                        <button class="btn-brown" onclick="window.location.href='{{ url('/detail?id=2') }}'">Detail</button>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <div class="title-cat">
                        <h3>Coffee Raisin</h3>
                        <span>Bolu Puding</span>
                    </div>
                </div>
                <div class="card-img-wrapper">
                    <div class="rating"><i class="fa-solid fa-star"></i>4.9</div>
                    <img src="{{ asset('assets/img/bolu/3-bolupuding.png') }}" alt="Coffee Raisin">
                </div>
                <div class="card-footer">
                    <p>Rp 31.700</p>
                    <div>
                        <button class="btn-add-cart" onclick="addToCart('Coffee Raisin', 31700, '{{ asset('assets/img/bolu/3-bolupuding.png') }}')">Beli</button>
                        <button class="btn-brown" onclick="window.location.href='{{ url('/detail?id=3') }}'">Detail</button>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <div class="title-cat">
                        <h3>Roti Coklat</h3>
                        <span>Roti</span>
                    </div>
                </div>
                <div class="card-img-wrapper">
                    <div class="rating"><i class="fa-solid fa-star"></i>4.9</div>
                    <img src="{{ asset('assets/img/roti/9-roti-coklat.png') }}" alt="Roti Coklat">
                </div>
                <div class="card-footer">
                    <p>Rp 11.000</p>
                    <div>
                        <button class="btn-add-cart" onclick="addToCart('Roti Coklat', 11000, '{{ asset('assets/img/roti/9-roti-coklat.png') }}')">Beli</button>
                        <button class="btn-brown" onclick="window.location.href='{{ url('/detail?id=45') }}'">Detail</button>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <div class="title-cat">
                        <h3>Coklat</h3>
                        <span>Bolu Coklat</span>
                    </div>
                </div>
                <div class="card-img-wrapper">
                    <div class="rating"><i class="fa-solid fa-star"></i>4.9</div>
                    <img src="{{ asset('assets/img/bolu/4-bolucoklat.png') }}" alt="Coklat">
                </div>
                <div class="card-footer">
                    <p>Rp 79.500</p>
                    <div>
                        <button class="btn-add-cart" onclick="addToCart('Coklat', 79500, '{{ asset('assets/img/bolu/4-bolucoklat.png') }}')">Beli</button>
                        <button class="btn-brown" onclick="window.location.href='{{ url('/detail?id=4') }}'">Detail</button>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <div class="title-cat">
                        <h3>Chiffon Pandan</h3>
                        <span>Bolu Pandan</span>
                    </div>
                </div>
                <div class="card-img-wrapper">
                    <div class="rating"><i class="fa-solid fa-star"></i>4.9</div>
                    <img src="{{ asset('assets/img/bolu/5-bolupandan.png') }}" alt="Chiffon Pandan">
                </div>
                <div class="card-footer">
                    <p>Rp 76.500</p>
                    <div>
                        <button class="btn-add-cart" onclick="addToCart('Chiffon Pandan', 76500, '{{ asset('assets/img/bolu/5-bolupandan.png') }}')">Beli</button>
                        <button class="btn-brown" onclick="window.location.href='{{ url('/detail?id=5') }}'">Detail</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="promo-container">
        <div class="promo-card">
            <i class="fa-solid fa-motorcycle"></i>
            <div class="promo-text">
                <h3>Gratis Ongkir untuk di Kota Bandung!</h3>
            </div>
        </div>
        <div class="promo-card">
            <i class="fa-solid fa-tag"></i>
            <div class="promo-text">
                <h3>Diskon 5% Untuk Pesananan Custom!</h3>
            </div>
        </div>
    </section>

    <h2 class="section-title">Tentang Kami</h2>
    <section class="about-us">
        <div class="about-image">
            <img src="{{ asset('assets/img/tempat.png') }}" alt="Dapur Al-Fazza Bakery"> 
        </div>
        <div class="about-content">
            <h3>Kisah di Balik Al-Fazza</h3>
            <p>Berawal dari dapur keluarga, Al-Fazza Bakery hadir untuk menyajikan aneka roti dan kue dengan cita rasa autentik. Setiap produk kami dibuat dengan penuh cinta dan dipanggang langsung oleh tangan terampil sang Ayah yang berdedikasi tinggi dalam menjaga kualitas bahan dan rasa.</p>
            <p>Sementara itu, sang Ibu dengan hangat akan menyapa dan memastikan setiap pesanan sampai ke tangan Anda dengan pelayanan terbaik. Kami percaya, setiap gigitan dari kue Al-Fazza membawa kehangatan rumah untuk Anda nikmati bersama orang-orang tersayang.</p>
            <button class="btn-primary-about" onclick="window.location.href='{{ url('/about') }}'">Jelajahi Kami</button>
        </div>
    </section>

    <h2 class="section-title">Wujudkan Kue Impianmu!</h2>
    <section class="custom-cake-banner">
        <div class="custom-cake-content">
            <h3>Rancang Kue Sendiri</h3>
            <p>Pesan kue ulang tahun, anniversary, atau perayaan spesial lainnya dengan desain, rasa, dan ukuran yang sepenuhnya bisa disesuaikan dengan keinginanmu. Jadikan momen spesialmu lebih berkesan bersama Al-Fazza Bakery.</p>
            <button class="btn-primary-about" onclick="window.location.href='{{ url('/custom-order') }}'">Pesan Sekarang</button>
        </div>
    </section>
    
@endsection