@extends('layouts.main')

@section('content')
    <main class="max-w-6xl my-8 mx-auto px-5">
        <div class="flex flex-col md:flex-row gap-5 mb-10">
            <div class="flex-1 bg-bg-banner text-white p-10 rounded-xl relative overflow-hidden">
                <h2 class="text-3xl mb-2.5">Platform Terbaik untuk order Pastry & Bakery</h2>
                <p class="text-sm text-border-dark mb-5">Nikmati Pastry & Bakery sesuai selera lidah dan dompetmu!</p>
                <!-- <button class="btn-brown">Beli Sekarang</button> -->
            </div>
            <div class="flex-1 bg-bg-banner text-white p-10 rounded-xl relative overflow-hidden">
                <h2 class="text-3xl mb-2.5">Pastry unik Bakery menarik, seleramu pasti melirik!</h2>
                <p class="text-sm text-border-dark mb-5">Ayo dapatkan aneka cemilan keseharianmu dari sekarang!</p>
                <!-- <button class="btn-brown">Beli Sekarang</button> -->
            </div>
        </div>

        
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-5 mb-10">
            @foreach($products as $p)
                <div class="bg-white rounded-xl">
                    <div class="flex justify-between pt-5 px-8 pb-0">
                        <div class="title-cat">
                            <h3 class="text-xl text-text-darker mb-1 font-extrabold">{{ $p->nama }}</h3>
                            <span class="text-base text-text-slate font-semibold">{{ $p->tipe }}</span>
                        </div>
                    </div>
                    <div class="relative w-full mb-4">
                        <div class="absolute top-2.5 left-10 bg-white/95 py-1.5 px-2.5 rounded text-sm font-extrabold text-text-dark flex items-center gap-1.5 shadow-[0_2px_5px_rgba(0,0,0,0.1)]"><i class="fa-solid fa-star text-star"></i>{{ $p->rating }}</div>
                        <img src="{{ asset($p->gambar) }}" alt="{{ $p->nama }}" class="w-full h-56 rounded my-2.5 px-8 object-cover block">
                    </div>
                    <div class="flex-col justify-between items-center px-8 pb-5">
                        <p class="text-xl font-bold mb-2" >Rp {{ number_format($p->harga, 0, ',', '.') }}</p>
                        <div class="flex gap-2.5">
                            <button class="bg-secondary text-white border-none py-2.5 px-5 rounded font-bold cursor-pointer hover:bg-dark-brown" onclick="addToCart('{{ $p->id }}', '{{ $p->nama }}', {{ $p->harga }}, '{{ asset($p->gambar) }}')">Beli</button>
                            <a href="{{ url('/detail/' . $p->id) }}" class="bg-primary-brown text-white border-none py-2.5 px-5 rounded font-bold cursor-pointer no-underline inline-block text-center hover:bg-dark-brown">Detail</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="flex justify-center items-center mb-5">
            <h3 class="text-text-darker text-3xl font-extrabold">{{ $judul }}</h3>
        </div>
    </main>
    
    <script>
        document.addEventListener("DOMContentLoaded", renderKategoriProduk);
    </script>
    @endsection
