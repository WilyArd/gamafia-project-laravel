@extends('layouts.app')
@section('title', 'Gamafia - Hosting Server Game Premium')
@section('content')

    <!-- Hero Section -->
    <section class="relative pt-32 pb-20 md:pt-48 md:pb-32 hero-bg">
        <div class="absolute inset-0 bg-black/70"></div>
        <div class="container mx-auto px-4 relative z-10 text-center text-white">
            <h1 class="text-4xl md:text-6xl lg:text-7xl font-black mb-4 leading-tight">
                Hosting Server <span class="gradient-text">Game Premium</span><br> Performa Tanpa Batas
            </h1>
            <p class="max-w-3xl mx-auto text-base md:text-lg text-gray-300 mb-8">
                Server game berperforma tinggi dengan jaminan uptime 99.9%. Bergabunglah dengan ribuan gamer puas di seluruh
                dunia untuk pengalaman gaming terbaik.
            </p>
            <div class="flex justify-center items-center space-x-4">
                <a href="{{ url('games') }}"
                    class="bg-indigo-600 px-8 py-3 rounded-md text-white font-bold hover:bg-indigo-500 transition-all transform hover:scale-105 shadow-lg shadow-indigo-600/30">
                    Lihat Paket Server
                </a>
            </div>
        </div>
        <!-- Key Stats -->
        <div class="hidden md:block absolute bottom-0 left-0 right-0 z-10">
            <div class="container mx-auto px-4">
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4 max-w-4xl mx-auto -mb-12">
                    <div class="glassmorphism rounded-lg p-4 text-center">
                        <h3 class="text-2xl font-bold text-white">99.9%</h3>
                        <p class="text-xs text-gray-400">Jaminan Uptime</p>
                    </div>
                    <div class="glassmorphism rounded-lg p-4 text-center">
                        <h3 class="text-2xl font-bold text-white">&lt;20ms</h3>
                        <p class="text-xs text-gray-400">Ping Rata-rata</p>
                    </div>
                    <div class="glassmorphism rounded-lg p-4 text-center">
                        <h3 class="text-2xl font-bold text-white">10Gbps</h3>
                        <p class="text-xs text-gray-400">Kecepatan Jaringan</p>
                    </div>
                    <div class="glassmorphism rounded-lg p-4 text-center">
                        <h3 class="text-2xl font-bold text-white">24/7</h3>
                        <p class="text-xs text-gray-400">Dukungan Ahli</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Fitur Section -->
    <section id="fitur" class="py-20 md:py-32 bg-[#101115]">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-white">Kenapa Memilih <span
                        class="gradient-text">Gamafia</span>?</h2>
                <p class="max-w-2xl mx-auto mt-4 text-gray-400">
                    Fitur hosting premium yang dirancang khusus untuk para gamer serius yang menginginkan performa dan
                    keandalan.
                </p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Feature Card 1 -->
                <div
                    class="glassmorphism p-8 rounded-xl transition-all duration-300 hover:border-indigo-500 hover:-translate-y-2">
                    <div
                        class="bg-indigo-600/20 text-indigo-400 w-14 h-14 rounded-lg flex items-center justify-center mb-6">
                        <i data-feather="zap" class="w-7 h-7"></i>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-2">Performa Cepat</h3>
                    <p class="text-gray-400">Server berperforma tinggi dengan storage NVMe SSD dan prosesor terkini untuk
                        pengalaman gaming yang mulus.</p>
                </div>
                <!-- Feature Card 2 -->
                <div
                    class="glassmorphism p-8 rounded-xl transition-all duration-300 hover:border-indigo-500 hover:-translate-y-2">
                    <div
                        class="bg-indigo-600/20 text-indigo-400 w-14 h-14 rounded-lg flex items-center justify-center mb-6">
                        <i data-feather="shield" class="w-7 h-7"></i>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-2">Proteksi DDoS</h3>
                    <p class="text-gray-400">Perlindungan tingkat enterprise menjaga server Anda online 24/7 dengan mitigasi
                        otomatis.</p>
                </div>
                <!-- Feature Card 3 -->
                <div
                    class="glassmorphism p-8 rounded-xl transition-all duration-300 hover:border-indigo-500 hover:-translate-y-2">
                    <div
                        class="bg-indigo-600/20 text-indigo-400 w-14 h-14 rounded-lg flex items-center justify-center mb-6">
                        <i data-feather="globe" class="w-7 h-7"></i>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-2">Lokasi Global</h3>
                    <p class="text-gray-400">Pilih dari berbagai lokasi server di seluruh dunia untuk ping dan performa
                        optimal.</p>
                </div>
                <!-- Feature Card 4 -->
                <div
                    class="glassmorphism p-8 rounded-xl transition-all duration-300 hover:border-indigo-500 hover:-translate-y-2">
                    <div
                        class="bg-indigo-600/20 text-indigo-400 w-14 h-14 rounded-lg flex items-center justify-center mb-6">
                        <i data-feather="terminal" class="w-7 h-7"></i>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-2">Panel Kontrol Mudah</h3>
                    <p class="text-gray-400">Panel kontrol berbasis web yang intuitif dengan instalasi mod satu klik dan
                        pemantauan real-time.</p>
                </div>
                <!-- Feature Card 5 -->
                <div
                    class="glassmorphism p-8 rounded-xl transition-all duration-300 hover:border-indigo-500 hover:-translate-y-2">
                    <div
                        class="bg-indigo-600/20 text-indigo-400 w-14 h-14 rounded-lg flex items-center justify-center mb-6">
                        <i data-feather="trending-up" class="w-7 h-7"></i>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-2">Scaling Instan</h3>
                    <p class="text-gray-400">Tingkatkan sumber daya server dengan mudah saat komunitas Anda berkembang tanpa
                        downtime.</p>
                </div>
                <!-- Feature Card 6 -->
                <div
                    class="glassmorphism p-8 rounded-xl transition-all duration-300 hover:border-indigo-500 hover:-translate-y-2">
                    <div
                        class="bg-indigo-600/20 text-indigo-400 w-14 h-14 rounded-lg flex items-center justify-center mb-6">
                        <i data-feather="users" class="w-7 h-7"></i>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-2">Dukungan Komunitas</h3>
                    <p class="text-gray-400">Bergabunglah dengan komunitas Discord kami dengan dukungan staf 24/7 dan basis
                        pemain aktif.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Supported Games Section -->
    <section id="games" class="py-20 md:py-24 bg-repeat"
        style="background-image: url('data:image/svg+xml,%3Csvg width=%2240%22 height=%2240%22 viewBox=%220 0 40 40%22 xmlns=%22http://www.w3.org/2000/svg%22%3E%3Cg fill=%22%231a202c%22 fill-opacity=%220.4%22 fill-rule=%22evenodd%22%3E%3Cpath d=%22M0 40L40 0H20L0 20M40 40V20L20 40%22/%3E%3C/g%3E%3C/svg%3E');">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-white">Game yang <span class="gradient-text">Didukung</span>
                </h2>
                <p class="max-w-2xl mx-auto mt-4 text-gray-400">
                    Kami mengoptimalkan server untuk berbagai game favorit Anda. Instalasi mudah dengan satu klik.
                </p>
            </div>
            <div class="flex flex-wrap justify-center gap-6">
                <div
                    class="group relative rounded-lg overflow-hidden aspect-w-3 aspect-h-4 transform transition-all duration-300 hover:scale-105 hover:shadow-2xl hover:shadow-indigo-500/30 w-full sm:w-1/3 md:w-1/4 lg:w-1/5">
                    <img src="https://i.pinimg.com/736x/8a/8a/b4/8a8ab42e93738010d9c6af363bc7446a.jpg" alt="Minecraft"
                        class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent"></div>
                    <div class="absolute bottom-0 left-0 p-4">
                        <h4 class="text-white font-bold text-lg">Minecraft</h4>
                    </div>
                </div>
                <div
                    class="group relative rounded-lg overflow-hidden aspect-w-3 aspect-h-4 transform transition-all duration-300 hover:scale-105 hover:shadow-2xl hover:shadow-teal-500/30 w-full sm:w-1/3 md:w-1/4 lg:w-1/5">
                    <img src="https://upload.wikimedia.org/wikipedia/en/2/2b/ArkSurvivalEvolved.png" alt="ARK"
                        class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent"></div>
                    <div class="absolute bottom-0 left-0 p-4">
                        <h4 class="text-white font-bold text-lg">ARK</h4>
                    </div>
                </div>
                <div
                    class="group relative rounded-lg overflow-hidden aspect-w-3 aspect-h-4 transform transition-all duration-300 hover:scale-105 hover:shadow-2xl hover:shadow-rose-500/30 w-full sm:w-1/3 md:w-1/4 lg:w-1/5">
                    <img src="https://upload.wikimedia.org/wikipedia/en/thumb/1/1a/Terraria_Steam_artwork.jpg/250px-Terraria_Steam_artwork.jpg"
                        alt="Terraria" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent"></div>
                    <div class="absolute bottom-0 left-0 p-4">
                        <h4 class="text-white font-bold text-lg">Terraria</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section id="testimoni" class="py-20 md:py-24 bg-[#101115]">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-white">Apa Kata <span class="gradient-text">Komunitas
                        Kami</span></h2>
                <p class="max-w-2xl mx-auto mt-4 text-gray-400">
                    Jangan hanya percaya kata kami. Lihat apa yang dikatakan para gamer tentang Gamafia.
                </p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="glassmorphism p-8 rounded-xl">
                    <div class="flex items-center mb-4">
                        <img src="https://placehold.co/48x48/7C3AED/FFFFFF?text=R" alt="User Avatar"
                            class="w-12 h-12 rounded-full mr-4">
                        <div>
                            <h4 class="font-bold text-white">Komunitas Rust Legenda</h4>
                            <p class="text-sm text-indigo-400">Server Owner</p>
                        </div>
                    </div>
                    <p class="text-gray-300 italic">"Setelah mencoba banyak penyedia hosting, Gamafia adalah yang terbaik.
                        Server Rust kami tidak ada lag dengan 300+ pemain dan tim support mereka benar-benar kompeten."</p>
                </div>
                <div class="glassmorphism p-8 rounded-xl">
                    <div class="flex items-center mb-4">
                        <img src="https://placehold.co/48x48/0EA5E9/FFFFFF?text=J" alt="User Avatar"
                            class="w-12 h-12 rounded-full mr-4">
                        <div>
                            <h4 class="font-bold text-white">Jaringan BlockCraft</h4>
                            <p class="text-sm text-sky-400">Minecraft Network</p>
                        </div>
                    </div>
                    <p class="text-gray-300 italic">"Performanya server Minecraft sangat luar biasa. Fasih pencari
                        down/downtime sejak pindah ke Gamafia, dan pemain kami menyukai pengalaman yang mulus."</p>
                </div>
                <div class="glassmorphism p-8 rounded-xl">
                    <div class="flex items-center mb-4">
                        <img src="https://placehold.co/48x48/10B981/FFFFFF?text=L" alt="User Avatar"
                            class="w-12 h-12 rounded-full mr-4">
                        <div>
                            <h4 class="font-bold text-white">Los Santos RP</h4>
                            <p class="text-sm text-emerald-400">FiveM Community</p>
                        </div>
                    </div>
                    <p class="text-gray-300 italic">"Sebagai pemilik server FiveM, saya butuh keandalan dan kekuatan.
                        Gamafia menyediakan keduanya dengan server yang dioptimasi dan staf support yang berpengetahuan."
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Final CTA Section -->
    <section class="py-20 md:py-24">
        <div class="container mx-auto px-4">
            <div class="relative rounded-2xl p-10 md:p-16 overflow-hidden text-center bg-gray-900">
                <div class="absolute inset-0 bg-gradient-to-r from-indigo-600/50 to-sky-500/50 opacity-30"></div>
                <div class="relative z-10">
                    <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">Siap Meningkatkan Pengalaman Gaming Anda?
                    </h2>
                    <p class="max-w-2xl mx-auto text-gray-300 mb-8">
                        Bergabunglah dengan ribuan gamer yang mempercayai Gamafia untuk kebutuhan hosting server mereka.
                    </p>
                    <div class="flex justify-center items-center space-x-4">
                        <a href="{{ url('games') }}"
                            class="bg-indigo-600 px-8 py-3 rounded-md text-white font-bold hover:bg-indigo-500 transition-all transform hover:scale-105 shadow-lg shadow-indigo-600/30">
                            Mulai Sekarang
                        </a>
                        <a href="#"
                            class="bg-gray-700/50 border border-gray-600 px-8 py-3 rounded-md text-white font-bold hover:bg-gray-600/50 transition-colors">
                            Hubungi Support
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection