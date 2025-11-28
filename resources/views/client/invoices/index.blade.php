@extends('layouts.app')

@section('title', 'Faktur Saya - Gamafia')

@section('footer')
@endsection

@section('content')
<div x-data="{ tab: 'paid' }" class="pt-24 pb-12 bg-[#141824] min-h-screen">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">

            <!-- Kolom Kiri: Profil & Discord -->
            <aside class="lg:col-span-3 space-y-8">
                <!-- Profil Card -->
                <div class="glassmorphism p-6 rounded-xl text-center">
                    <div class="w-20 h-20 rounded-full bg-indigo-500 mx-auto flex items-center justify-center text-3xl font-bold text-white mb-4">
                        {{ strtoupper(substr(Auth::user()->name, 0, 2)) }}
                    </div>
                    <h2 class="text-xl font-bold text-white">{{ Auth::user()->name }}</h2>
                    <p class="text-sm text-gray-400 mb-4">{{ Auth::user()->email }}</p>
                    <a href="{{ route('profile.edit') }}" class="w-full bg-gray-700/50 border border-gray-600 px-4 py-2 rounded-md text-white hover:bg-gray-600/50 transition-colors">
                        Edit Profil
                    </a>
                </div>

                <!-- Info Lain -->
                <div class="glassmorphism p-6 rounded-xl text-sm space-y-3">
                    <div class="flex justify-between">
                        <span class="text-gray-400">Visibilitas</span>
                        <span class="flex items-center text-green-400"><i data-feather="circle" class="w-3 h-3 fill-current mr-2"></i> Daring</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-400">Bergabung Sejak</span>
                        <span class="text-white">{{ Auth::user()->created_at->format('d M Y') }}</span>
                    </div>
                </div>

                <!-- Discord Widget -->
                <div class="glassmorphism p-6 rounded-xl">
                    <h3 class="font-bold text-white">Komunitas Discord</h3>
                    <p class="text-sm text-gray-400 mt-2">Bergabunglah dengan komunitas kami untuk mendapatkan dukungan.</p>
                    <a href="#" class="mt-4 inline-block w-full text-center bg-indigo-600 px-4 py-2 rounded-md text-sm text-white font-semibold hover:bg-indigo-500">Gabung Sekarang</a>
                </div>
            </aside>

            <!-- Kolom Kanan: Daftar Faktur -->
            <main class="lg:col-span-9 space-y-8">
                <div class="glassmorphism p-6 rounded-xl">
                    <div class="flex flex-col md:flex-row justify-between items-center mb-4">
                        <h2 class="text-2xl font-bold text-white">Faktur Saya</h2>
                        {{-- PERUBAHAN: Menambahkan link kembali ke dashboard --}}
                        <a href="{{ route('client.dashboard') }}" class="text-sm text-indigo-400 hover:text-indigo-300 mt-4 md:mt-0 flex items-center">
                            <i data-feather="arrow-left" class="w-4 h-4 mr-2"></i>
                            Kembali ke Layanan
                        </a>
                    </div>
                    
                    <!-- Tombol Tab -->
                    <div class="border-b border-gray-700 mb-4">
                        <nav class="-mb-px flex space-x-8" aria-label="Tabs">
                            <button @click="tab = 'paid'" :class="{ 'border-indigo-500 text-indigo-400': tab === 'paid', 'border-transparent text-gray-400 hover:text-gray-200 hover:border-gray-500': tab !== 'paid' }" class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">
                                Telah Dibayar
                            </button>
                            <button @click="tab = 'cancelled'" :class="{ 'border-indigo-500 text-indigo-400': tab === 'cancelled', 'border-transparent text-gray-400 hover:text-gray-200 hover:border-gray-500': tab !== 'cancelled' }" class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">
                                Dibatalkan
                            </button>
                        </nav>
                    </div>

                    <!-- Konten Tab -->
                    <div>
                        <!-- Tabel Faktur Lunas -->
                        <div x-show="tab === 'paid'" class="overflow-x-auto">
                            <table class="min-w-full text-sm text-left">
                                <thead class="text-xs text-gray-400 uppercase">
                                    <tr>
                                        <th class="p-3">Deskripsi</th>
                                        <th class="p-3">Jumlah</th>
                                        <th class="p-3">Tanggal</th>
                                        <th class="p-3"></th>
                                    </tr>
                                </thead>
                                <tbody class="text-white">
                                    @forelse ($invoices->where('status', 'paid') as $invoice)
                                    <tr class="border-b border-gray-700">
                                        <td class="p-3 font-semibold">Pembelian Layanan: {{ $invoice->package->name }}</td>
                                        <td class="p-3 text-gray-400">Rp{{ number_format($invoice->total_amount, 0, ',', '.') }}</td>
                                        <td class="p-3 text-gray-400">{{ $invoice->created_at->format('d M Y') }}</td>
                                        <td class="p-3 text-right"><a href="{{ route('client.invoices.show', $invoice->id) }}" class="font-medium text-indigo-400 hover:text-indigo-300">Lihat Faktur</a></td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="4" class="text-center py-8 text-gray-400">Tidak ada faktur yang telah dibayar.</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        <!-- Tabel Faktur Dibatalkan -->
                        <div x-show="tab === 'cancelled'" style="display: none;" class="overflow-x-auto">
                            <table class="min-w-full text-sm text-left">
                                <thead class="text-xs text-gray-400 uppercase">
                                    <tr>
                                        <th class="p-3">Deskripsi</th>
                                        <th class="p-3">Jumlah</th>
                                        <th class="p-3">Tanggal</th>
                                        <th class="p-3"></th>
                                    </tr>
                                </thead>
                                <tbody class="text-white">
                                    @forelse ($invoices->where('status', 'cancelled') as $invoice)
                                    <tr class="border-b border-gray-700">
                                        <td class="p-3 font-semibold">Layanan Dibatalkan: {{ $invoice->package->name }}</td>
                                        <td class="p-3 text-gray-400">Rp{{ number_format($invoice->total_amount, 0, ',', '.') }}</td>
                                        <td class="p-3 text-gray-400">{{ $invoice->created_at->format('d M Y') }}</td>
                                        <td class="p-3 text-right"><a href="{{ route('client.invoices.show', $invoice->id) }}" class="font-medium text-indigo-400 hover:text-indigo-300">Lihat Faktur</a></td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="4" class="text-center py-8 text-gray-400">Tidak ada faktur yang dibatalkan.</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</div>
@endsection
