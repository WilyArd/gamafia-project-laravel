@extends('layouts.app')

@section('title', 'Paket ' . $game->name . ' - Gamafia')

@section('content')
    <div class="pt-32 pb-20 md:pt-40 md:pb-24 bg-[#101115]">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h1 class="text-4xl md:text-5xl font-bold text-white">Paket <span
                        class="gradient-text">{{ $game->name }}</span></h1>
                <p class="max-w-2xl mx-auto mt-4 text-gray-400">
                    {{ $game->description ?? 'Pilih paket yang sesuai dengan kebutuhan server Anda.' }}
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse ($game->packages as $package)
                    <div
                        class="glassmorphism rounded-xl p-8 relative overflow-hidden group hover:border-indigo-500/50 transition-all duration-300">
                        @if($package->is_popular)
                            <div
                                class="absolute top-0 right-0 bg-yellow-500 px-3 py-1 rounded-bl-lg text-xs font-bold text-gray-900">
                                POPULAR
                            </div>
                        @else
                            <div class="absolute top-0 right-0 bg-indigo-600 px-3 py-1 rounded-bl-lg text-xs font-bold text-white">
                                {{ $package->name }}
                            </div>
                        @endif

                        <div class="mb-6">
                            <h3 class="text-2xl font-bold text-white">{{ $package->name }}</h3>
                            <div class="mt-4 flex items-baseline">
                                <span
                                    class="text-4xl font-extrabold text-white">Rp{{ number_format($package->price_monthly, 0, ',', '.') }}</span>
                                <span class="ml-1 text-xl text-gray-400">/bln</span>
                            </div>
                        </div>

                        <ul class="space-y-4 mb-8 text-gray-300">
                            <li class="flex items-center">
                                <i data-feather="cpu" class="w-5 h-5 text-indigo-400 mr-3"></i>
                                <span>{{ $package->cpu }} vCore CPU</span>
                            </li>
                            <li class="flex items-center">
                                <i data-feather="hard-drive" class="w-5 h-5 text-indigo-400 mr-3"></i>
                                <span>{{ $package->ram }} GB RAM</span>
                            </li>
                            <li class="flex items-center">
                                <i data-feather="database" class="w-5 h-5 text-indigo-400 mr-3"></i>
                                <span>{{ $package->storage }} GB NVMe SSD</span>
                            </li>
                            <li class="flex items-center">
                                <i data-feather="shield" class="w-5 h-5 text-indigo-400 mr-3"></i>
                                <span>DDoS Protection</span>
                            </li>
                        </ul>

                        <div class="mb-6">
                            <div class="flex justify-between text-sm mb-1">
                                <span class="text-gray-400">Stok Tersedia</span>
                                <span
                                    class="font-bold {{ $package->stock < 5 ? 'text-red-400' : 'text-indigo-400' }}">{{ $package->stock }}
                                    Unit</span>
                            </div>
                            <div class="w-full bg-gray-700 rounded-full h-2.5">
                                <div class="{{ $package->stock < 5 ? 'bg-red-500' : 'bg-indigo-600' }} h-2.5 rounded-full transition-all duration-500"
                                    style="width: {{ min(($package->stock / 20) * 100, 100) }}%"></div>
                            </div>
                        </div>

                        <a href="{{ route('checkout.create', $package->id) }}"
                            class="block w-full py-3 px-6 text-center rounded-md bg-indigo-600 hover:bg-indigo-700 text-white font-bold transition-colors shadow-lg shadow-indigo-600/20">
                            Pilih Paket
                        </a>
                    </div>
                @empty
                    <div class="col-span-full text-center py-12">
                        <p class="text-gray-400">Belum ada paket yang tersedia untuk game ini.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
@endsection