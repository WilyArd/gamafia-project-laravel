@extends('layouts.app')

@section('title', 'Daftar Paket Server Game - Gamafia')

@section('content')
<div class="pt-32 pb-20 md:pt-40 md:pb-24 bg-[#101115]">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16">
            <h1 class="text-4xl md:text-5xl font-bold text-white">Daftar Paket <span class="gradient-text">Server Game</span></h1>
            <p class="max-w-2xl mx-auto mt-4 text-gray-400">
                Pilih game untuk melihat pilihan paket yang tersedia.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse ($games as $game)
                <div class="bg-gray-800/40 rounded-xl overflow-hidden group transform transition-all duration-300 hover:-translate-y-2 hover:shadow-2xl hover:shadow-indigo-500/20">
                    <a href="{{ route('games.show', $game->slug) }}" class="block">
                        <img src="{{ $game->image_url ?? 'https://placehold.co/600x400/1f2937/FFFFFF?text=Gamafia' }}" alt="Gambar {{ $game->name }}" class="w-full h-48 object-cover">
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-white mb-4">{{ $game->name }}</h3>
                            <span class="w-full text-center bg-yellow-500 px-6 py-3 rounded-md text-gray-900 font-bold group-hover:bg-yellow-400 transition-colors inline-block">
                                Lihat Paket
                            </span>
                        </div>
                    </a>
                </div>
            @empty
                <div class="md:col-span-2 lg:col-span-3 text-center glassmorphism rounded-xl p-8">
                    <i data-feather="server" class="w-16 h-16 mx-auto text-sky-400 mb-4"></i>
                    <h3 class="text-2xl font-bold text-white mb-2">Belum Ada Game</h3>
                    <p class="text-gray-400">Saat ini belum ada game yang tersedia. Silakan cek kembali nanti!</p>
                </div>
            @endforelse
        </div>
    </div>
</div>
@endsection
