@extends('layouts.main')

@section('content')
    <section class="py-12 px-5 md:px-[15%] flex justify-center">
        <div class="bg-[#FFF5F5] rounded-[30px] border border-[#F0E6DD] shadow-[0_8px_20px_rgba(0,0,0,0.05)] p-8 md:p-12 w-full flex flex-col items-center text-center">
            <div class="w-full max-w-sm mb-6">
                <img loading="lazy" src="{{ asset('assets/img/pisangbolen 1.png') }}" alt="Pisang Bolen" class="w-full h-auto drop-shadow-md">
            </div>
            <h1 class="text-3xl md:text-4xl lg:text-5xl mb-4 font-extrabold text-black tracking-wide">Pisang Bolen</h1>
            <p class="font-medium text-text-medium md:text-lg max-w-2xl text-sm leading-relaxed">Perpaduan pisang dan cokelat lumer atau keju gurih yang dibalut kulit pastry berlapis yang renyah di luar namun lembut di dalam.</p>
        </div>
    </section>

    <section class="bg-[#A58B76] text-center p-8 pb-12 text-white">
        <h2 class="text-2xl md:text-3xl font-extrabold mb-6 mt-0 text-white flex justify-center items-center gap-2">
            <i class="fas fa-star text-yellow-400"></i> Terlaris
        </h2>
        <div class="grid grid-cols-2 md:grid-cols-4 justify-center gap-4 md:gap-6 mx-auto max-w-5xl">
            @foreach($terlaris as $item)
            <div class="bg-white rounded-xl p-2.5 cursor-pointer transition-transform duration-300 ease-in hover:scale-105 flex items-center justify-center aspect-square" onclick="window.location.href='{{ url('/detail/') }}/{{ $item->id }}'">
                <img loading="lazy" src="{{ asset($item->gambar) }}" alt="{{ $item->nama }}" class="w-full h-full object-contain rounded-lg">
            </div>
            @endforeach
        </div>
    </section>

    <section class="new-bakery mt-5">
        <h2 class="text-center my-10 font-extrabold text-2xl md:text-3xl flex justify-center items-center gap-3 text-black">
            <span class="bg-[#FF4A8D] text-white text-xs md:text-sm px-2.5 py-1 rounded-md font-black tracking-wide">NEW</span> Bakery Terbaru
        </h2>
        <div class="bg-primary-brown grid grid-cols-2 md:grid-cols-2 lg:grid-cols-3 gap-3 md:gap-5 p-3 md:p-5 lg:mx-[13%] mx-[5%] my-5 rounded">
            @foreach($products as $p)
                <div class="bg-white rounded-xl shadow-sm flex flex-col h-full">
                    <div class="flex justify-between pt-3 md:pt-5 px-3 md:px-8 pb-0">
                        <div class="title-cat w-full">
                            <h3 class="text-sm md:text-xl text-text-darker mb-1 font-extrabold truncate">{{ $p->nama }}</h3>
                            <span class="text-xs md:text-base text-text-slate font-semibold">{{ ucfirst($p->kategori) }}</span>
                        </div>
                    </div>
                    <div class="relative w-full mb-2 md:mb-4 flex-1">
                        <div class="absolute top-1 left-3 md:top-2.5 md:left-10 bg-white/95 py-0.5 px-1.5 md:py-1.5 md:px-2.5 rounded text-xs md:text-sm font-extrabold text-text-dark flex items-center gap-1 shadow-[0_2px_5px_rgba(0,0,0,0.1)] z-10"><i class="fa-solid fa-star text-star"></i>{{ number_format($p->rating, 1) }}</div>
                        <img loading="lazy" src="{{ asset($p->gambar) }}" alt="{{ $p->nama }}" class="w-full rounded px-2 md:px-8 object-cover block">
                    </div>
                    <div class="flex flex-col md:flex-row justify-between items-start md:items-center px-3 md:px-8 pb-3 md:pb-5 mt-auto gap-2">
                        <p class="text-sm md:text-xl font-bold">Rp {{ number_format($p->harga, 0, ',', '.') }}</p>
                        <div class="flex flex-row gap-1.5 md:gap-2.5 w-full md:w-auto">
                            <button class="flex-1 md:flex-none bg-secondary text-white border-none py-1.5 md:py-2.5 px-0 md:px-5 rounded font-bold cursor-pointer hover:bg-dark-brown text-xs md:text-base" onclick="addToCart('{{ $p->id }}', '{{ $p->nama }}', {{ $p->harga }}, '{{ asset($p->gambar) }}')">Beli</button>
                            <a href="{{ url('/detail/' . $p->id) }}" class="flex-1 md:flex-none bg-primary-brown text-white border-none py-1.5 md:py-2.5 px-0 md:px-5 rounded font-bold cursor-pointer no-underline block text-center hover:bg-dark-brown text-xs md:text-base">Detail</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <h2 class="text-center my-10 font-extrabold text-2xl md:text-3xl text-black">Wujudkan Kue Impianmu!</h2>
    <section class="bg-cover bg-center lg:mx-[13%] mx-[5%] mb-16 rounded-xl text-center py-12 md:py-16 px-6 md:px-10 text-white shadow-[0_10px_30px_rgba(0,0,0,0.2)] relative overflow-hidden" style="background-image: linear-gradient(rgba(30, 20, 15, 0.75), rgba(30, 20, 15, 0.75)), url('{{ asset('assets/img/hero-bg.png') }}');">
        <!-- Inner Border for custom order banner -->
        <div class="absolute inset-2 border-2 border-[#D8C4A9]/40 rounded-lg pointer-events-none"></div>
        <div class="custom-cake-content relative z-10">
            <h3 class="text-xl md:text-3xl mb-4 font-extrabold tracking-wide flex justify-center items-center gap-3">
                Rancang Kue Sendiri
            </h3>
            <p class="text-xs md:text-base leading-[1.7] mb-6 max-w-3xl mx-auto text-[#E8DED3]">Pesan kue ulang tahun, anniversary, atau perayaan spesial lainnya dengan desain, rasa, dan ukuran yang sepenuhnya bisa disesuaikan dengan keinginanmu. Jadikan momen spesialmu lebih berkesan bersama Al-Fazza Bakery.</p>
            <button class="bg-[#BFA186] text-white border-none py-2.5 px-6 md:py-3 md:px-8 rounded shadow-lg text-sm md:text-base font-bold cursor-pointer mt-2 transition-colors duration-300 ease-in hover:bg-[#A58B76]" onclick="window.location.href='{{ url('/custom-order') }}'">Pesan Sekarang</button>
        </div>
    </section>

    <h2 class="text-center my-10 font-extrabold text-2xl md:text-3xl text-black">Tentang Kami</h2>
    <section class="flex flex-wrap lg:flex-nowrap items-center lg:mx-[13%] mx-[5%] mb-12 bg-[#FFF5F5] rounded-3xl shadow-[0_8px_20px_rgba(0,0,0,0.05)] overflow-hidden border border-[#F0E6DD]">
        <div class="lg:w-1/2 w-full h-full">
            <img loading="lazy" src="{{ asset('assets/img/tempat.png') }}" alt="Dapur Al-Fazza Bakery" class="w-full h-full lg:min-h-132.5 min-h-64 object-cover block"> 
        </div>
        <div class="lg:w-1/2 w-full py-10 px-8 md:px-12 text-center lg:text-left flex flex-col items-center lg:items-start">
            <h3 class="text-2xl md:text-3xl text-black mb-5 font-extrabold">Kisah di Balik Al-Fazza</h3>
            <p class="text-sm md:text-base text-text-medium leading-[1.8] mb-6 text-center lg:text-justify max-w-md">Berawal dari dapur keluarga, Al-Fazza Bakery hadir untuk menyajikan aneka roti dan kue dengan cita rasa autentik. Setiap produk kami dibuat dengan penuh cinta dan dipanggang langsung oleh tangan terampil sang Ayah yang berdedikasi tinggi dalam menjaga kualitas bahan dan rasa.</p>
            <button class="bg-[#BFA186] text-white border-none py-3 px-8 rounded shadow-sm text-sm md:text-base font-bold cursor-pointer transition-colors duration-300 ease-in hover:bg-[#A58B76]" onclick="window.location.href='{{ url('/about') }}'">Jelajahi Kami</button>
        </div>
    </section>
    <script src="{{ asset('assets/js/script.js') }}?v={{ time() }}"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            if (!sessionStorage.getItem('welcome_shown')) {
                Swal.fire({
                    html: `
                        <div class="flex flex-col items-center justify-center p-1 md:p-3">
                            <div class="bg-[#F8EEE4] rounded-full p-2 mb-6 shadow-sm w-28 h-28 flex items-center justify-center border-4 border-white">
                                <img src="{{ asset('assets/img/footer-logo.png') }}" alt="Logo" class="w-20 h-20 object-contain drop-shadow-md">
                            </div>
                            <h2 class="text-2xl md:text-3xl font-extrabold text-[#4A3B32] mb-5 tracking-tight">Selamat Datang di Al-Fazza</h2>
                            <p class="text-[15px] md:text-lg text-[#5A4B42] mb-8 font-medium">
                                <span class="underline decoration-1 underline-offset-4">Yuk, Tekan lanjutkan untuk melihat</span><br>
                                <span class="underline decoration-1 underline-offset-4">etalase produk kami</span>
                            </p>
                        </div>
                    `,
                    showConfirmButton: true,
                    confirmButtonText: 'Lanjutkan',
                    background: '#F0E7DE',
                    customClass: {
                        popup: 'rounded-[30px] shadow-2xl border border-[#E8DED3]',
                        confirmButton: 'bg-[#A68469] text-white px-8 py-3.5 rounded-xl text-base md:text-lg font-semibold w-[85%] md:w-[70%] mx-auto block mb-2 shadow-md hover:bg-[#8F7057] transition-all',
                    },
                    buttonsStyling: false,
                    allowOutsideClick: false
                });
                sessionStorage.setItem('welcome_shown', 'true');
            }
        });
    </script>
@endsection