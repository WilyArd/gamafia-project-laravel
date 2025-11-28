@extends('layouts.app')

@section('title', 'Dashboard Klien - Gamafia')

@section('footer')
@endsection

@section('content')
    {{-- Inisialisasi Alpine.js untuk mengelola status server dan modal --}}
    <div x-data="{
            showCancelModal: false,
            orderToCancel: null,
            cancelFormAction: '',
            servers: {{ json_encode($orders->pluck('id')) }},
            statuses: {},
            statusOptions: ['Online', 'Offline', 'Starting', 'Stopping'],
            init() {
                this.servers.forEach(id => {
                    this.statuses[id] = this.getRandomStatus();
                });
                setInterval(() => {
                    this.servers.forEach(id => {
                        if (Math.random() > 0.7) { 
                            this.statuses[id] = this.getRandomStatus();
                        }
                    });
                }, 3000);
            },
            openCancelModal(orderId) {
                this.orderToCancel = orderId;
                this.cancelFormAction = `/subscription/${orderId}/cancel`;
                this.showCancelModal = true;
            },
            getRandomStatus() {
                return this.statusOptions[Math.floor(Math.random() * this.statusOptions.length)];
            },
            getStatusColor(status) {
                switch (status) {
                    case 'Online': return 'bg-green-500';
                    case 'Offline': return 'bg-red-500';
                    case 'Starting': return 'bg-yellow-500 animate-pulse';
                    case 'Stopping': return 'bg-yellow-500 animate-pulse';
                    default: return 'bg-gray-500';
                }
            }
        }" class="pt-24 pb-12 bg-[#141824] min-h-screen">
        <div class="container mx-auto px-4">
            @if (session('success'))
                <div class="bg-green-500/20 border border-green-500 text-green-300 px-4 py-3 rounded-lg relative mb-6"
                    role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif
            @if($errors->any())
                <div class="bg-red-500/20 border border-red-500 text-red-300 px-4 py-3 rounded-lg relative mb-6" role="alert">
                    <span class="block sm:inline">{{ $errors->first() }}</span>
                </div>
            @endif

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">

                <!-- Kolom Kiri: Profil & Discord -->
                <aside class="lg:col-span-3 space-y-8">
                    <!-- Profil Card -->
                    <div class="glassmorphism p-6 rounded-xl text-center">
                        <div
                            class="w-20 h-20 rounded-full bg-indigo-500 mx-auto flex items-center justify-center text-3xl font-bold text-white mb-4">
                            {{ strtoupper(substr(Auth::user()->name, 0, 2)) }}
                        </div>
                        <h2 class="text-xl font-bold text-white">{{ Auth::user()->name }}</h2>
                        <p class="text-sm text-gray-400 mb-4">{{ Auth::user()->email }}</p>
                        <a href="{{ route('profile.edit') }}"
                            class="w-full bg-gray-700/50 border border-gray-600 px-4 py-2 rounded-md text-white hover:bg-gray-600/50 transition-colors">
                            Edit Profil
                        </a>
                    </div>

                    <!-- Info Lain -->
                    <div class="glassmorphism p-6 rounded-xl text-sm space-y-3">
                        <div class="flex justify-between">
                            <span class="text-gray-400">Visibilitas</span>
                            <span class="flex items-center text-green-400"><i data-feather="circle"
                                    class="w-3 h-3 fill-current mr-2"></i> Daring</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-400">Bergabung Sejak</span>
                            <span class="text-white">{{ Auth::user()->created_at->format('d M Y') }}</span>
                        </div>
                    </div>

                    <!-- Discord Widget -->
                    <div class="glassmorphism p-6 rounded-xl">
                        <h3 class="font-bold text-white">Komunitas Discord</h3>
                        <p class="text-sm text-gray-400 mt-2">Bergabunglah dengan komunitas kami untuk mendapatkan dukungan.
                        </p>
                        <a href="#"
                            class="mt-4 inline-block w-full text-center bg-indigo-600 px-4 py-2 rounded-md text-sm text-white font-semibold hover:bg-indigo-500">Gabung
                            Sekarang</a>
                    </div>
                </aside>

                <!-- Kolom Kanan: Konten Utama -->
                <main class="lg:col-span-9 space-y-8">
                    <!-- Stat Cards -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="glassmorphism p-6 rounded-xl flex items-center space-x-4">
                            <div class="bg-blue-600/20 text-blue-400 p-3 rounded-lg"><i data-feather="server"
                                    class="w-6 h-6"></i></div>
                            <div>
                                <p class="text-3xl font-bold text-white">{{ $orders->where('status', 'paid')->count() }}</p>
                                <p class="text-sm text-gray-400">Layanan Aktif</p>
                            </div>
                        </div>
                        <a href="{{ route('client.invoices.index') }}"
                            class="glassmorphism p-6 rounded-xl flex items-center space-x-4 hover:bg-gray-700/50 transition-colors">
                            <div class="bg-yellow-600/20 text-yellow-400 p-3 rounded-lg"><i data-feather="file-text"
                                    class="w-6 h-6"></i></div>
                            <div>
                                <p class="text-3xl font-bold text-white">{{ $orders->count() }}</p>
                                <p class="text-sm text-gray-400">Faktur</p>
                            </div>
                        </a>
                    </div>

                    <!-- Layanan Anda -->
                    <div class="glassmorphism p-6 rounded-xl">
                        <div class="flex flex-col md:flex-row justify-between items-center mb-4">
                            <h3 class="text-xl font-bold text-white">Layanan Anda</h3>
                            <a href="{{ route('games.index') }}"
                                class="bg-indigo-600 px-4 py-2 rounded-md text-sm text-white font-semibold hover:bg-indigo-500 mt-4 md:mt-0">+
                                Pesan Layanan Baru</a>
                        </div>

                        @if ($orders->isNotEmpty())
                            <div class="overflow-x-auto">
                                <table class="min-w-full text-sm text-left">
                                    <thead class="text-xs text-gray-400 uppercase">
                                        <tr>
                                            <th class="p-3">Status Server</th>
                                            <th class="p-3">Produk / Layanan</th>
                                            <th class="p-3">Jatuh Tempo</th>
                                            <th class="p-3 text-center">Status Langganan</th>
                                            <th class="p-3 text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-white">
                                        @foreach ($orders as $order)
                                            <tr class="border-b border-gray-700 hover:bg-gray-800/40">
                                                <td class="p-3">
                                                    <div class="flex items-center">
                                                        <template x-if="statuses[{{$order->id}}]">
                                                            <span class="w-3 h-3 rounded-full mr-2"
                                                                :class="getStatusColor(statuses[{{$order->id}}])"></span>
                                                        </template>
                                                        <span x-text="statuses[{{$order->id}}]">Loading...</span>
                                                    </div>
                                                </td>
                                                <td class="p-3 font-semibold">{{ $order->package->game->name }} -
                                                    {{ $order->package->name }}</td>
                                                <td class="p-3 text-gray-400">{{ $order->created_at->addMonth()->format('d M Y') }}
                                                </td>
                                                <td class="p-3 text-center">
                                                    <span
                                                        class="px-3 py-1 text-xs font-medium rounded-full 
                                                            {{ $order->status == 'paid' ? 'bg-green-900/50 text-green-300' : 'bg-red-900/50 text-red-300' }}">
                                                        {{ $order->status == 'paid' ? 'Aktif' : 'Dibatalkan' }}
                                                    </span>
                                                </td>
                                                <td class="p-3 text-center">
                                                    @if ($order->status == 'paid')
                                                        <button @click="openCancelModal({{ $order->id }})"
                                                            class="text-red-400 hover:text-red-300 text-xs font-semibold">Cancel</button>
                                                    @else
                                                        -
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="text-center py-12 border-2 border-dashed border-gray-700 rounded-lg">
                                <h4 class="text-lg font-semibold text-white">Belum ada pesanan</h4>
                                <p class="text-gray-400">Anda belum melakukan pemesanan, pesanan baru akan terlihat di sini.</p>
                            </div>
                        @endif
                    </div>
                </main>
            </div>
        </div>

        {{-- Modal Konfirmasi Pembatalan --}}
        <div x-show="showCancelModal" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
            class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-75" style="display: none;">
            <div @click.away="showCancelModal = false" x-show="showCancelModal" x-transition
                class="bg-[#141824] rounded-lg overflow-hidden shadow-xl transform transition-all sm:max-w-lg sm:w-full border border-gray-700">
                <div class="px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div
                            class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-500/20 sm:mx-0 sm:h-10 sm:w-10">
                            <i data-feather="alert-triangle" class="h-6 w-6 text-red-400"></i>
                        </div>
                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                            <h3 class="text-lg leading-6 font-bold text-white">Batalkan Langganan</h3>
                            <div class="mt-2">
                                <p class="text-sm text-gray-400">
                                    Apakah Anda yakin ingin membatalkan layanan ini? Tindakan ini tidak dapat diurungkan.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-800/50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <form :action="cancelFormAction" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 sm:ml-3 sm:w-auto sm:text-sm">
                            Ya, Batalkan
                        </button>
                    </form>
                    <button @click="showCancelModal = false" type="button"
                        class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-600 shadow-sm px-4 py-2 bg-gray-700 text-base font-medium text-gray-300 hover:bg-gray-600 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                        Tidak
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection