@extends('layouts.app')
@section('title', 'Tentang Kami - Gamafia')
@section('content')
<div class="pt-32 pb-20 md:pt-40 md:pb-24 bg-[#101115]">
    <div class="container mx-auto px-4">
        
        <!-- Judul Halaman -->
        <div class="max-w-4xl mx-auto text-center mb-16">
            <h1 class="text-4xl md:text-5xl font-bold text-white">Tentang <span class="gradient-text">Gamafia</span></h1>
            <p class="max-w-3xl mx-auto mt-4 text-gray-400">
                Kami adalah para gamer, sama seperti Anda. Kami membangun Gamafia dari hasrat untuk menyediakan hosting server game yang tidak hanya cepat dan andal, tetapi juga didukung oleh layanan yang benar-benar mengerti kebutuhan para gamer.
            </p>
        </div>

        <!-- Bagian Misi Kami -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center mb-24">
            <div>
                <h2 class="text-3xl font-bold text-white mb-4">Misi Kami</h2>
                <p class="text-gray-400 mb-4">
                    Misi kami sederhana: memberdayakan komunitas gaming dengan infrastruktur server terbaik. Kami percaya bahwa setiap gamer berhak mendapatkan pengalaman bermain yang lancar, bebas lag, dan tanpa gangguan. Oleh karena itu, kami berinvestasi pada teknologi terkini dan tim support yang responsif untuk memastikan server Anda selalu dalam kondisi prima.
                </p>
                <ul class="space-y-3 text-gray-300">
                    <li class="flex items-start"><i data-feather="zap" class="w-5 h-5 text-indigo-400 mr-3 mt-1"></i><span>Menyediakan performa server tanpa kompromi.</span></li>
                    <li class="flex items-start"><i data-feather="shield" class="w-5 h-5 text-indigo-400 mr-3 mt-1"></i><span>Menjamin keamanan dan uptime 99.9%.</span></li>
                    <li class="flex items-start"><i data-feather="users" class="w-5 h-5 text-indigo-400 mr-3 mt-1"></i><span>Membangun komunitas yang solid dan suportif.</span></li>
                </ul>
            </div>
            <div>
                <img src="https://images.unsplash.com/photo-1554744512-d6c603f27c54?q=80&w=2070&auto=format&fit=crop" alt="Tim Gamafia sedang berdiskusi" class="rounded-xl shadow-2xl shadow-indigo-500/10">
            </div>
        </div>

        <!-- Bagian Tim Kami -->
        <div class="text-center mb-24">
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-12">Tim Inti <span class="gradient-text">Gamafia</span></h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Anggota Tim 1 -->
                <div class="text-center">
                    <img src="https://placehold.co/200x200/141824/FFFFFF?text=CEO" class="w-32 h-32 rounded-full mx-auto mb-4 border-4 border-gray-700">
                    <h4 class="text-xl font-bold text-white">Rahmanda Ahmad Wilyan J.</h4>
                    <p class="text-indigo-400">CEO & Founder</p>
                </div>
                <!-- Anggota Tim 2 -->
                <div class="text-center">
                    <img src="https://placehold.co/200x200/141824/FFFFFF?text=CTO" class="w-32 h-32 rounded-full mx-auto mb-4 border-4 border-gray-700">
                    <h4 class="text-xl font-bold text-white">Zen</h4>
                    <p class="text-indigo-400">Chief Technology Officer</p>
                </div>
                <!-- Anggota Tim 3 -->
                <div class="text-center">
                    <img src="https://placehold.co/200x200/141824/FFFFFF?text=CS" class="w-32 h-32 rounded-full mx-auto mb-4 border-4 border-gray-700">
                    <h4 class="text-xl font-bold text-white">Farhan</h4>
                    <p class="text-indigo-400">Head of Customer Support</p>
                </div>
                <!-- Anggota Tim 4 -->
                <div class="text-center">
                    <img src="https://placehold.co/200x200/141824/FFFFFF?text=CM" class="w-32 h-32 rounded-full mx-auto mb-4 border-4 border-gray-700">
                    <h4 class="text-xl font-bold text-white">Danu</h4>
                    <p class="text-indigo-400">Community Manager</p>
                </div>

                <div class="text-center">
                    <img src="https://placehold.co/200x200/141824/FFFFFF?text=CM" class="w-32 h-32 rounded-full mx-auto mb-4 border-4 border-gray-700">
                    <h4 class="text-xl font-bold text-white">Octopus</h4>
                    <p class="text-indigo-400">Community Manager</p>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
