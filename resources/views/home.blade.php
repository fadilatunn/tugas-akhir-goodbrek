@extends('layouts.app')

@section('title', 'Home')

@section('content')

<!-- hero -->
<section id="hero" 
    class="bg-cover bg-center bg-no-repeat relative bg-white"
    style="background-image: url('/image/background web2.png');">
    
    <!-- Overlay opsional agar teks tetap terbaca -->
    <div class="absolute inset-0 bg-black/40"></div>

    <div class="relative grid max-w-screen-xl px-4 py-32 mx-auto lg:gap-8 xl:gap-0 lg:py-56 lg:grid-cols-12">
        <div class="mr-auto place-self-center lg:col-span-7">
            <h1 class="max-w-2xl mb-4 text-4xl font-extrabold leading-none tracking-tight md:text-5xl xl:text-6xl text-white">
                Good day starts with GoodBrek.
            </h1>
            <p class="max-w-2xl mb-6 font-light text-gray-200 lg:mb-8 md:text-lg lg:text-xl">
                Mulai harimu dengan energi penuh! GoodBrek menyajikan sarapan bento cepat antar yang diracik seimbang gizi dan penuh cita rasa, khusus untuk kamu yang sibuk.
            </p>
            <a href="#ulasan" class="inline-flex items-center justify-center px-6 py-3 mr-3 text-base font-medium text-white bg-yellow-300 rounded-lg hover:bg-yellow-500">
                Beri Ulasan
                <svg class="w-5 h-5 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
            </a>
            <a href="#tentang" class="inline-flex items-center justify-center px-6 py-3 text-base font-medium text-gray-100 border border-gray-300 rounded-lg hover:bg-gray-100/20">
                Tentang kami
            </a>
        </div>

        <div class="hidden lg:mt-0 lg:col-span-5 lg:flex">
            <img class="transition hover:scale-105 hover:shadow-[0_0_28px_rgba(255,200,0,0.65)] rounded-lg" src="{{ asset('image/Gemini_Generated_Image_klpwpnklpwpnklpw.png') }}" alt="mockup">
        </div>
    </div>
</section>

<!-- tentang -->
<section id="tentang" class="bg-gray-50">
    <div class="grid max-w-screen-xl px-4 py-16 mx-auto lg:grid-cols-12 lg:gap-8 lg:py-32">
        <div class="mr-auto place-self-center lg:col-span-7">
            <h1 class="text-4xl font-extrabold leading-tight md:text-5xl xl:text-6xl mb-6">
                GoodBrek
            </h1>
            <p class="text-gray-500 text-lg lg:text-xl mb-8">
                GoodBrek adalah layanan makanan siap saji yang berfokus pada penyediaan sarapan sehat dan bernutrisi tinggi yang dirancang untuk kepraktisan sehari-hari. Dengan moto 'Pagi Ceria', GoodBrek menawarkan paket bento yang dikemas apik, berisi komposisi seimbang seperti nasi merah sebagai sumber serat, sayuran segar, dan protein berkualitas (misalnya Ayam Katsu), serta dilengkapi minuman sehat seperti jus atau susu. Merek ini menekankan pada kebahagiaan, kesehatan, dan kemudahan, menjadikan GoodBrek pilihan ideal bagi individu, pekerja sibuk, maupun keluarga yang ingin memastikan asupan sarapan bergizi tanpa perlu repot memasak.
            </p>
            <a href="#gallery" class="inline-flex items-center justify-center px-6 py-3 text-lg font-medium text-white bg-yellow-300 rounded-lg hover:bg-yellow-500">
                Menu
            </a>
        </div>
        <div class="hidden lg:flex lg:col-span-5 lg:justify-end">
            <img src="{{ asset('image/deskripsi.png') }}" alt="Perusahaan" class="transition hover:scale-105 rounded-lg">
        </div>
    </div>
</section>

<!-- menu / gallery -->
<div id="gallery" class="relative w-full mt-16 max-w-screen-xl mx-auto px-4 z-0 pt-16" data-carousel="slide">
    <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
        @foreach(($menus ?? collect()) as $i => $menu)
            <div class="{{ $i==0 ? 'duration-700 ease-in-out' : 'hidden duration-700 ease-in-out' }}" @if($i==0) data-carousel-item="active" @else data-carousel-item @endif>
                <img src="{{ $menu->image ? asset('storage/'.$menu->image) : 'https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg' }}" class="absolute block max-w-full h-auto -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="{{ $menu->title }}">
                <div class="absolute left-4 bottom-4 bg-white/90 text-gray-900 p-3 rounded-lg max-w-xs">
                    <h4 class="font-semibold text-lg text-gray-900">{{ $menu->title }}</h4>
                    <p class="text-sm text-gray-700">{{ $menu->description }}</p>
                    <div class="mt-2 font-bold text-yellow-600">Rp {{ number_format($menu->price,0,',','.') }}</div>
                </div>
            </div>
        @endforeach

        @if(($menus ?? collect())->isEmpty())
            <div class="duration-700 ease-in-out" data-carousel-item="active">
                <img src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg" class="absolute block max-w-full h-auto -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="">
                <div class="absolute left-4 bottom-4 bg-white/90 text-gray-900 p-3 rounded-lg max-w-xs">
                    <h4 class="font-semibold text-lg text-gray-900">Menu Kosong</h4>
                    <p class="text-sm text-gray-700">Belum ada data menu.</p>
                </div>
            </div>
        @endif
    </div>

    <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 group-hover:bg-white/50">
            <svg class="w-5 h-5 text-white rtl:rotate-180" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m15 19-7-7 7-7"/></svg>
        </span>
    </button>
    <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 group-hover:bg-white/50">
            <svg class="w-5 h-5 text-white rtl:rotate-180" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m9 5 7 7-7 7"/></svg>
        </span>
    </button>
</div>

<!-- ulasan -->
<section id="ulasan" class="w-full bg-grey py-10 pt-16">
    
    <div class="grid grid-cols-1 md:grid-cols-2 gap-10 px-6">
        <div class="flex justify-center items-center">
            <img src="{{ asset('image/GoodBrek logo.png') }}" class="w-full max-w-sm rounded-lg shadow-lg transition hover:scale-105">
        </div>

        <div class="max-w-md p-6 bg-white rounded-lg shadow ml-auto w-full">
            <h2 class="text-3xl font-bold mb-6">Berikan Ulasan</h2>

            <!-- ALERT (disembunyikan dulu) -->
            <div id="alertSuccess" class="hidden mb-4 p-3 rounded-lg bg-green-500 text-white font-medium">
                ✓ Ulasan terkirim!
            </div>

            <form class="space-y-6" action="{{ route('ulasan.store') }}" method="POST">
            @csrf
                <div>
                    <label class="block mb-2 font-medium">Nama</label>
                    <input name="nama" type="text" class="w-full p-3 border rounded-lg bg-white">
                </div>
                <div>
                    <label class="block mb-2 font-medium">Pesan</label>
                    <textarea name="pesan" class="w-full p-3 border rounded-lg h-28 bg-white"></textarea>
                </div>
                <div>
                    <label class="block mb-2 font-medium">Rating</label>
                    <select name="rating" class="w-full p-3 border rounded-lg bg-white">
                        <option value="">-- Pilih --</option>
                        <option value="1">⭐ 1</option>
                        <option value="2">⭐⭐ 2</option>
                        <option value="3">⭐⭐⭐ 3</option>
                        <option value="4">⭐⭐⭐⭐ 4</option>
                        <option value="5">⭐⭐⭐⭐⭐ 5</option>
                    </select>
                </div>

                <button type="submit" class="w-full py-3 bg-yellow-300 text-white rounded-lg hover:bg-yellow-500">
                    Kirim Ulasan
                </button>
            </form>
        </div>
    </div>
</section>

<!-- DAFTAR ULASAN -->
<div class="mt-10 space-y-4">

    @foreach ($ulasans as $u)
        <div class="p-4 bg-white shadow rounded-lg border">
            <div class="flex justify-between">
                <h4 class="font-bold">{{ $u->nama }}</h4>
                <span class="text-yellow-500">
                    {{ str_repeat('⭐', $u->rating) }}
                </span>
            </div>
            <p class="text-gray-700 mt-2">{{ $u->pesan }}</p>
            <p class="text-gray-400 text-sm mt-1">{{ $u->created_at->diffForHumans() }}</p>
        </div>
    @endforeach

    @if ($ulasans->isEmpty())
        <p class="text-gray-500 text-center">Belum ada ulasan.</p>
    @endif

</div>


@if (session('success'))
    <div class="mb-4 p-3 rounded-lg bg-green-500 text-white font-medium">
        ✓ {{ session('success') }}
    </div>
@endif


@endsection