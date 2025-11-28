<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- Judul halaman dinamis, dengan judul default --}}
    <title>@yield('title', 'Gamafia - Hosting Server Game Premium')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;900&display=swap"
        rel="stylesheet">
    {{-- @vite('resources/css/app.css') --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/feather-icons"></script>

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #0B0C10;
            /* Warna latar belakang utama yang lebih gelap */
            color: #C5C6C7;
        }

        /* Custom gradient untuk teks dan border */
        .gradient-text {
            background: linear-gradient(90deg, #4F46E5, #0EA5E9);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            text-fill-color: transparent;
        }

        .glassmorphism {
            background: rgba(22, 29, 47, 0.5);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .hero-bg {
            background-image: url('https://images.unsplash.com/photo-1593305842334-ce85d535f846?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
    </style>

</head>

<body class="antialiased flex flex-col min-h-screen">

    <!-- Header / Navbar -->
    <header class="fixed top-0 left-0 right-0 z-50 transition-all duration-300 glassmorphism">
        <div class="container mx-auto px-4">
            <nav class="flex items-center justify-between py-4">
                <a href="{{ url('/') }}" class="text-3xl font-bold tracking-wider">
                    GA<span class="gradient-text">MAFIA</span>
                </a>
                <div class="hidden md:flex items-center space-x-8 text-sm font-medium">
                    <a href="{{ url('/') }}" class="hover:text-white transition-colors">Home</a>
                    <a href="{{ url('games') }}" class="hover:text-white transition-colors">Games</a>
                    <a href="{{ url('/#testimoni') }}" class="hover:text-white transition-colors">Testimoni</a>
                    <a href="{{ url('company') }}" class="hover:text-white transition-colors">Company</a>

                </div>

                <div class="flex items-center space-x-4">
                    @auth
                        {{-- Dropdown menu kustom untuk pengguna yang sudah login --}}
                        <div x-data="{ open: false }" class="relative">
                            {{-- Tombol Trigger Dropdown --}}
                            <button @click="open = !open"
                                class="flex items-center space-x-2 text-sm font-medium text-gray-300 hover:text-white transition-colors">
                                <span>{{ Auth::user()->name }}</span>
                                <i data-feather="chevron-down" class="w-4 h-4"></i>
                            </button>

                            {{-- Konten Dropdown --}}
                            <div x-show="open" @click.away="open = false"
                                x-transition:enter="transition ease-out duration-200"
                                x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                                x-transition:leave="transition ease-in duration-75"
                                x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
                                class="absolute right-0 mt-2 w-48 origin-top-right rounded-md shadow-lg bg-gray-800 ring-1 ring-black ring-opacity-5 focus:outline-none"
                                style="display: none;">
                                <div class="py-1">
                                    <a href="{{ route('client.dashboard') }}"
                                        class="block px-4 py-2 text-sm text-gray-300 hover:bg-gray-700 hover:text-white">Dashboard</a>
                                    <!-- Form Logout -->
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); this.closest('form').submit();"
                                            class="block w-full px-4 py-2 text-left text-sm text-gray-300 hover:bg-gray-700 hover:text-white">
                                            Log Out
                                        </a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @else
                        {{-- Jika pengguna adalah tamu, tampilkan tombol Login & Daftar --}}
                        <a href="{{ route('login') }}"
                            class="hidden sm:inline-block text-sm px-5 py-2 rounded-md hover:bg-indigo-700 transition-colors">Login</a>
                        <a href="{{ route('register') }}"
                            class="text-sm bg-indigo-600 px-5 py-2 rounded-md text-white font-semibold hover:bg-indigo-500 transition-colors shadow-lg shadow-indigo-600/20">
                            Daftar
                        </a>
                    @endauth
                </div>
            </nav>
        </div>
    </header>

    <main class="flex-grow">
        {{-- PERBAIKAN: Mengganti {{ $slot }} kembali menjadi @yield('content') --}}
        @yield('content')
    </main>

    @section('footer')
    @include('layouts.partials.footer')
    @show

    <!-- Feather Icons -->
    <script src="https://unpkg.com/feather-icons"></script>
    <!-- AlpineJS -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <script>
        // Inisialisasi Feather Icons
        feather.replace();

        // Efek transparan pada navbar saat scroll
        const header = document.querySelector('header');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 20) {
                header.classList.add('bg-[#0B0C10]/80');
            } else {
                header.classList.remove('bg-[#0B0C10]/80');
            }
        });
    </script>
    @stack('scripts')
</body>

</html>