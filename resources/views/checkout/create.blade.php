@extends('layouts.app')
@section('title', 'Checkout - ' . $package->name)
@section('content')
<form method="POST" action="{{ route('checkout.store') }}">
    @csrf
    <input type="hidden" name="package_id" value="{{ $package->id }}">

    <div x-data="{
            location: 'basic',
            basePrice: {{ $package->price_monthly }},
            premiumAddon: {{ $package->price_premium_addon }},
            get totalPrice() {
                let total = this.basePrice;
                if (this.location === 'premium') {
                    total += this.premiumAddon;
                }
                return total;
            },
            formatCurrency(amount) {
                return new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', minimumFractionDigits: 0 }).format(amount);
            }
        }" 
        class="pt-32 pb-20 md:pt-40 md:pb-24 bg-[#101115]">
        <div class="container mx-auto px-4">
            
            {{-- Menampilkan pesan error jika ada --}}
            @if($errors->any())
                <div class="bg-red-500/20 border border-red-500 text-red-300 px-4 py-3 rounded-lg relative mb-6 max-w-4xl mx-auto" role="alert">
                    <strong class="font-bold">Error!</strong>
                    <span class="block sm:inline">{{ $errors->first() }}</span>
                </div>
            @endif

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 lg:gap-12">
                
                <!-- Kolom Kiri: Detail & Opsi -->
                <div class="lg:col-span-2 space-y-8">
                    <!-- Detail Paket -->
                    <div>
                        <h1 class="text-3xl font-bold text-white mb-4">Basic Hosting {{ $package->name }}</h1>
                        <div class="grid grid-cols-2 md:grid-cols-3 gap-4 text-sm">
                            <div class="glassmorphism rounded-lg p-4 flex items-center space-x-3"><i data-feather="hard-drive" class="w-5 h-5 text-indigo-400"></i><span>{{ $package->ram }} Ram</span></div>
                            <div class="glassmorphism rounded-lg p-4 flex items-center space-x-3"><i data-feather="cpu" class="w-5 h-5 text-indigo-400"></i><span>{{ $package->cpu }}</span></div>
                            <div class="glassmorphism rounded-lg p-4 flex items-center space-x-3"><i data-feather="database" class="w-5 h-5 text-indigo-400"></i><span>{{ $package->storage }} Storage</span></div>
                        </div>
                    </div>

                    <!-- Opsi Billing (Dinamis) -->
                    <div class="border-2 border-indigo-500 rounded-xl p-4">
                        <p class="text-xl font-bold text-white" x-text="`${formatCurrency(totalPrice)} / Bulanan`"></p>
                        <p class="text-xs text-gray-400">bulan Pertama <span x-text="formatCurrency(totalPrice)"></span> lalu <span x-text="formatCurrency(totalPrice)"></span> Bulan</p>
                    </div>

                    <!-- Custom Options -->
                    <div>
                        <h2 class="text-xl font-semibold text-white mb-4">Custom Options</h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            {{-- PERBAIKAN: Dropdown lokasi dihubungkan dengan state 'location' dan memiliki value --}}
                            <select x-model="location" name="location" class="w-full bg-gray-800/60 border border-gray-700 rounded-md px-4 py-3 text-white focus:ring-indigo-500 focus:border-indigo-500">
                                <option value="basic">Location - Basic</option>
                                <option value="premium">Location - Premium (Asia)</option>
                            </select>
                             <select name="server_type" class="w-full bg-gray-800/60 border border-gray-700 rounded-md px-4 py-3 text-white focus:ring-indigo-500 focus:border-indigo-500">
                                <option>Server Type - {{ $package->game->name }}</option>
                            </select>
                             <select name="egg" class="w-full bg-gray-800/60 border border-gray-700 rounded-md px-4 py-3 text-white focus:ring-indigo-500 focus:border-indigo-500">
                                <option>Egg - Paper</option>
                            </select>
                        </div>
                    </div>

                    <!-- Metode Pembayaran -->
                    <div>
                        <h2 class="text-xl font-semibold text-white mb-4">Metode Pembayaran</h2>
                        <div class="space-y-3">
                            {{-- PERBAIKAN: Menambahkan atribut 'value' --}}
                            <label class="flex items-center glassmorphism rounded-lg p-4 cursor-pointer border border-transparent hover:border-indigo-500"><input type="radio" name="payment_method" value="qris" class="form-radio bg-gray-700 text-indigo-500" checked> <span class="ml-4">QRIS</span></label>
                            <label class="flex items-center glassmorphism rounded-lg p-4 cursor-pointer border border-transparent hover:border-indigo-500"><input type="radio" name="payment_method" value="va" class="form-radio bg-gray-700 text-indigo-500"> <span class="ml-4">Virtual Account (Bank)</span></label>
                            <label class="flex items-center glassmorphism rounded-lg p-4 cursor-pointer border border-transparent hover:border-indigo-500"><input type="radio" name="payment_method" value="ewallet" class="form-radio bg-gray-700 text-indigo-500"> <span class="ml-4">E-Wallet (GoPay, OVO)</span></label>
                        </div>
                    </div>
                </div>

                <!-- Kolom Kanan: Rincian Pesanan (Dinamis) -->
                <div class="lg:col-span-1">
                    <div class="glassmorphism rounded-xl p-6 sticky top-28">
                        <h2 class="text-2xl font-bold text-white mb-6">Rincian Pesanan</h2>
                        <div class="space-y-3 border-b border-gray-700 pb-4 mb-4 text-sm">
                            <div class="flex justify-between"><span class="text-gray-400">Berulang</span> <span x-text="formatCurrency(totalPrice)"></span></div>
                            <div class="flex justify-between"><span class="text-gray-400">Biaya Pengaturan</span> <span>Rp0,00</span></div>
                            <div class="flex justify-between"><span class="text-gray-400">Diskon</span> <span class="text-red-400">-Rp0,00</span></div>
                        </div>
                        <div class="text-gray-400 mb-1">Jatuh Tempo Hari Ini</div>
                        <div class="text-3xl font-black text-white mb-6" x-text="formatCurrency(totalPrice)"></div>
                        <button type="submit" class="w-full text-center bg-indigo-600 px-6 py-3 rounded-md text-white font-bold hover:bg-indigo-500 transition-colors">
                            Selesaikan Pembayaran
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
