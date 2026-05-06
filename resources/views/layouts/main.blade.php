<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AL-Fazza Bakery</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/logo.png') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
</head>
<body>
    <header>
        <nav class="navbar">
            <div class="nav-logo">
                <div class="logo"><img src="{{ asset('assets/img/footer-logo.png') }}" alt=""></div>
                <h2>AL - Fazza Bakery</h2>
            </div>
            <button class="hamburger" id="hamburger-btn" aria-label="Toggle menu">
                <span></span>
                <span></span>
                <span></span>
            </button>
            <div class="nav" id="main-nav">
                <ul class="nav-links">
                    <li><a href="{{ url('/') }}" class="active">Beranda</a></li>
                    <li class="dropdown" id="categories-dropdown">
                        <a href="#" class="dropbtn">Kategori</a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ url('/kategori?jenis=bolu') }}">Aneka Bolu</a></li>
                            <li><a href="{{ url('/kategori?jenis=pastry') }}">Pastry</a></li>
                            <li><a href="{{ url('/kategori?jenis=cookies') }}">Cookies</a></li>
                            <li><a href="{{ url('/kategori?jenis=roti') }}">Roti</a></li>
                        </ul>
                    </li>
                    <li><a href="{{ url('/about') }}">Tentang Kami</a></li>
                </ul>
                <div class="cart-icon" id="cart-btn">
                    <i class="fas fa-shopping-cart"></i>
                    <span class="cart-count" id="cart-count">0</span>
                </div>
            </div>
        </nav>
        <div class="nav-overlay" id="nav-overlay"></div>

        <div class="cart-sidebar" id="cart-sidebar">
            <div class="cart-header">
                <h3>Keranjang</h3>
                <button id="close-cart"><i class="fas fa-times"></i></button>
            </div>
            
            <div class="cart-items">
            </div>

            <div class="cart-footer">
                <div class="cart-total">
                    <span>Total :</span>
                    <span>Rp 0</span> 
                </div>
                <button class="btn-checkout">BELI SEKARANG</button>
            </div>
        </div>

        <div class="cart-overlay" id="cart-overlay"></div>
    </header>

    <main>
        @yield('content') 
    </main>
    
    <footer class="footer">
        <div class="footer-content">
            <div class="footer-right">
                <img src="{{ asset('assets/img/footer-logo.png') }}" alt="AL - Fazza Bakery Logo">
                <div class="social-icons">
                    <span><i class="fa-brands fa-instagram"></i></span> 
                    <span><i class="fa-brands fa-x-twitter"></i></span> 
                    <span><i class="fa-brands fa-facebook"></i></span> 
                    <span><i class="fa-brands fa-youtube"></i></span>
                </div>
            </div>
            <div class="footer-col">
                <h4>Contact</h4>
                <div class="footer-list">
                    <div class="footer-icons">
                        <p><i class="fa-brands fa-whatsapp"></i></p>
                        <p><i class="fa-solid fa-envelope"></i></p>
                        <p><i class="fa-solid fa-map-marker-alt"></i></p>
                    </div>
                    <div class="footer-contact">
                        <p>+62 812 2131 5946</p>
                        <p>info@alfazzabakery.com</p>
                        <p>Jl. Edelweis III No.16 blok J2</p>
                    </div>
                </div>
                <div class="location-map">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d585.0202218415826!2d107.72891651234013!3d-6.948490799376005!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68c3cb151da7c1%3A0xa36f4d617456d7cc!2sAL-FAZZA!5e0!3m2!1sen!2sus!4v1775194929280!5m2!1sen!2sus" 
                        width="100%" 
                        height="200" 
                        style="border:0;" 
                        allowfullscreen="" 
                        loading="lazy" 
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>
        </div>
    </footer>
    
    <script src="{{ asset('assets/js/script.js') }}"></script>
</body>
</html>