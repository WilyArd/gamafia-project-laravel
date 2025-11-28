@extends('layouts.app')

@section('title', 'Harga Hosting - Gamafia')

@section('content')
<div class="pt-32 pb-20 md:pt-40 md:pb-24 bg-[#101115]">
    <div class="container mx-auto px-4">
        
        <!-- Judul Halaman -->
        <div class="max-w-4xl mx-auto text-center mb-16">
            <h1 class="text-4xl md:text-5xl font-bold text-white">Harga untuk <span class="gradient-text">Basic Hosting</span></h1>
            <p class="max-w-3xl mx-auto mt-4 text-gray-400">
                Pilih paket yang paling sesuai dengan kebutuhan Anda. Semua paket kami hadir dengan performa terbaik dan perlindungan DDoS gratis.
            </p>
        </div>

        <!-- Daftar Harga -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse ($packages as $package)
                <div class="glassmorphism rounded-xl p-6 flex flex-col border border-transparent hover:border-indigo-500 transition-all duration-300">
                    <div class="flex-grow">
                        <h3 class="text-lg font-bold text-white">{{ $package->name }}</h3>
                        
                        {{-- Visual Box --}}
                        <div class="my-4 rounded-lg bg-gradient-to-br from-gray-800 to-gray-900 h-32 flex items-center justify-center text-center p-4">
                            <div>
                                <p class="text-4xl font-black text-white">{{ $package->ram }}</p>
                                <p class="text-sm font-bold gradient-text">BASIC</p>
                            </div>
                        </div>

                        {{-- Harga --}}
                        <div class="text-4xl font-black text-white mb-4">
                            Rp{{ number_format($package->price_monthly, 0, ',', '.') }}<span class="text-base font-medium text-gray-400">/bln</span>
                        </div>

                        {{-- Fitur --}}
                        <ul class="space-y-3 text-gray-300 text-sm mb-6">
                            <li class="flex items-center"><i data-feather="cpu" class="w-4 h-4 text-indigo-400 mr-3"></i><span>{{ $package->cpu }}</span></li>
                            <li class="flex items-center"><i data-feather="database" class="w-4 h-4 text-indigo-400 mr-3"></i><span>{{ $package->storage }} Storage</span></li>
                            <li class="flex items-center"><i data-feather="share-2" class="w-4 h-4 text-indigo-400 mr-3"></i><span>2 Port Allocation</span></li>
                            <li class="flex items-center"><i data-feather="archive" class="w-4 h-4 text-indigo-400 mr-3"></i><span>1 Free Database</span></li>
                        </ul>
                    </div>

                    <div class="mt-auto">
                        {{-- Indikator Stok --}}
                        <div class="mb-4">
                            <div class="flex justify-between text-xs text-gray-400 mb-1">
                                <span>Stok Tersedia</span>
                                <span>{{ $package->stock }} Unit</span>
                            </div>
                            <div class="w-full bg-gray-700 rounded-full h-2">
                                {{-- Lebar progress bar dihitung berdasarkan sisa stok --}}
                                <div class="bg-gradient-to-r from-indigo-500 to-sky-500 h-2 rounded-full" style="width: {{ $package->stock > 0 ? ($package->stock / 20) * 100 : 0 }}%"></div>
                            </div>
                        </div>

                        {{-- Tombol Beli --}}
                        @if ($package->stock > 0)
                            <a href="{{ route('checkout.create', $package->id) }}" class="w-full text-center bg-indigo-600 px-6 py-3 rounded-md text-white font-bold hover:bg-indigo-500 transition-colors inline-block">
                                Beli
                            </a>
                        @else
                            <button class="w-full text-center bg-gray-700 px-6 py-3 rounded-md text-gray-400 font-bold cursor-not-allowed" disabled>
                                Stok Habis
                            </button>
                        @endif
                    </div>
                </div>
            @empty
                <p class="text-center text-gray-400 col-span-full">Saat ini belum ada paket yang tersedia.</p>
            @endforelse
        </div>

    </div>
</div>
@endsection
