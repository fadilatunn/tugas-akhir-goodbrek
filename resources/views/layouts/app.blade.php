<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <style>
        html{
            scroll-behavior: smooth;
        }

        .navbar-blur {
            background: rgba(255, 229, 124, 0.63); /* kuning transparan */
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            transition: background 0.3s ease, backdrop-filter 0.3s ease;
        }
    </style>

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Flowbite CDN -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" />
</head>
<body class="bg-white">

        <!-- navbar -->

<nav class="navbar-blur fixed w-full z-50 top-0 start-0 border-b border-default">
  <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
    
    <!-- Logo -->
    <a href="#hero" class="flex items-center space-x-3 rtl:space-x-reverse">
        <img src="{{ asset('image/GoodBrek logo.png') }}" class="h-10 rounded-full" alt="goodbrek Logo" />
        <span class="self-center text-xl text-heading font-semibold whitespace-nowrap">GoodBrek</span>
    </a>

    <!-- Hamburger -->
    <button data-collapse-toggle="navbar-default" 
            type="button" 
            class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm md:hidden">
        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M5 7h14M5 12h14M5 17h14"/>
        </svg>
    </button>

    <!-- Menu -->
    <div class="hidden w-full md:block md:w-auto" id="navbar-default">
      <ul class="font-medium flex flex-col md:flex-row md:space-x-6 items-center p-4 md:p-0 mt-4 md:mt-0">
        
        <li><a href="{{ url('/') }}#hero" class="block py-2 px-3 hover:text-white">Beranda</a></li>
        <li><a href="{{ url('/') }}#tentang" class="block py-2 px-3 hover:text-white">Tentang</a></li>
        <li><a href="{{ url('/') }}#gallery" class="block py-2 px-3 hover:text-white">Menu</a></li>
        <li><a href="{{ url('/') }}#ulasan" class="block py-2 px-3 hover:text-white">Ulasan</a></li>

        @auth
            @if(auth()->user()->role === 'admin')
                <li>
                    <a href="{{ route('menus.index') }}"
                       class="px-4 py-2 bg-yellow-400 text-black font-semibold rounded-lg shadow-md 
                              hover:bg-yellow-500 hover:shadow-lg transition">
                        Kelola Menu
                    </a>
                </li>
            @endif
        @endauth

        @guest
            <li>
                <a href="{{ route('login') }}"
                   class="px-4 py-2 bg-yellow-300 text-black font-semibold rounded-lg shadow-md
                          hover:bg-yellow-400 hover:shadow-lg transition">
                    Login
                </a>
            </li>
        @endguest

        @auth
            <li>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit"
                        class="px-4 py-2 bg-yellow-300 text-black font-semibold rounded-lg shadow-md
                               hover:bg-yellow-400 hover:shadow-lg transition">
                        Logout
                    </button>
                </form>
            </li>
        @endauth

      </ul>
    </div>

  </div>
</nav>




    @yield('content')

    <!-- Flowbite Script -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>

</body>
</html>