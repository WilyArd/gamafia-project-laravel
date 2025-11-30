@extends('layouts.app')

@section('title', 'Detail Faktur ' . $invoice->invoice_id . ' - Gamafia')

@section('footer')
@endsection

@push('scripts')
<style>
    @media print {
        /* Sembunyikan elemen yang tidak perlu */
        header, footer, .no-print, button, a[href] {
            display: none !important;
        }

        /* Reset background dan warna teks */
        body, .min-h-screen, .bg-\[\#141824\], .glassmorphism {
            background: white !important;
            color: black !important;
            min-height: auto !important;
            padding: 0 !important;
            margin: 0 !important;
            border: none !important;
            box-shadow: none !important;
        }

        /* Pastikan teks terlihat jelas */
        .text-white, .text-gray-300, .text-gray-400, .text-indigo-400 {
            color: black !important;
        }

        /* Atur layout container */
        .container, .max-w-4xl {
            max-width: 100% !important;
            width: 100% !important;
            padding: 0 !important;
            margin: 0 !important;
        }

        /* Perbaiki tabel */
        table {
            width: 100% !important;
            border-collapse: collapse !important;
        }
        
        th, td {
            border: 1px solid #ddd !important;
            padding: 8px !important;
            color: black !important;
        }

        thead {
            background-color: #f3f4f6 !important; /* Abu-abu terang */
            color: black !important;
        }
        
        /* Hapus background badge status */
        .bg-green-900\/50, .bg-red-900\/50 {
            background: transparent !important;
            border: 1px solid black !important;
            color: black !important;
        }
    }
</style>
@endpush

@section('content')
<div class="pt-24 pb-12 bg-[#141824] min-h-screen">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            <div x-data="{}" class="glassmorphism p-8 md:p-10 rounded-xl">
                <!-- Header Faktur -->
                <div class="flex flex-col md:flex-row justify-between items-start mb-8 border-b border-gray-700 pb-6">
                    <div>
                        <h1 class="text-3xl font-bold text-white">Faktur</h1>
                        <p class="text-indigo-400 font-semibold">{{ $invoice->invoice_id }}</p>
                    </div>
                    <div class="text-left md:text-right mt-4 md:mt-0">
                        <p class="text-gray-400">Diterbitkan pada:</p>
                        <p class="text-white font-medium">{{ $invoice->created_at->format('d F Y') }}</p>
                    </div>
                </div>

                <!-- Info Pelanggan & Perusahaan -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
                    <div>
                        <h3 class="text-sm text-gray-400 uppercase tracking-wider mb-2">Ditagihkan Kepada</h3>
                        <p class="text-lg font-semibold text-white">{{ $invoice->user->name }}</p>
                        <p class="text-gray-300">{{ $invoice->user->email }}</p>
                    </div>
                    <div class="text-left md:text-right">
                        <h3 class="text-sm text-gray-400 uppercase tracking-wider mb-2">Ditagihkan Oleh</h3>
                        <p class="text-lg font-semibold text-white">Gamafia Hosting</p>
                        <p class="text-gray-300">support@gamafia.com</p>
                    </div>
                </div>

                <!-- Info Pembayaran & Status -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
                    <div>
                        <h3 class="text-sm text-gray-400 uppercase tracking-wider mb-2">Metode Pembayaran</h3>
                        <p class="text-lg font-semibold text-white">
                            @switch($invoice->payment_method)
                                @case('qris')
                                    QRIS
                                    @break
                                @case('va')
                                    Virtual Account (Bank)
                                    @break
                                @case('ewallet')
                                    E-Wallet (GoPay, OVO)
                                    @break
                                @default
                                    {{ ucfirst($invoice->payment_method) }}
                            @endswitch
                        </p>
                    </div>
                    <div class="text-left md:text-right">
                        <h3 class="text-sm text-gray-400 uppercase tracking-wider mb-2">Status Pembayaran</h3>
                        @if($invoice->status == 'paid')
                            <span class="px-4 py-2 text-sm font-bold rounded-full bg-green-900/50 text-green-300">
                                Telah Dibayar
                            </span>
                        @else
                             <span class="px-4 py-2 text-sm font-bold rounded-full bg-red-900/50 text-red-300">
                                Dibatalkan
                            </span>
                        @endif
                    </div>
                </div>

                <!-- Tabel Item Faktur -->
                <div class="overflow-x-auto mb-8">
                    <table class="min-w-full text-sm text-left">
                        <thead class="bg-gray-800/50 text-xs text-gray-400 uppercase">
                            <tr>
                                <th class="p-4">Deskripsi</th>
                                <th class="p-4 text-right">Jumlah</th>
                            </tr>
                        </thead>
                        <tbody class="text-white">
                            <tr class="border-b border-gray-700">
                                <td class="p-4">
                                    <p class="font-semibold">Layanan Hosting: {{ $invoice->package->game->name }} - {{ $invoice->package->name }}</p>
                                    <p class="text-xs text-gray-400">Siklus Penagihan: Bulanan</p>
                                </td>
                                <td class="p-4 text-right font-semibold">Rp{{ number_format($invoice->total_amount, 0, ',', '.') }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Total -->
                <div class="flex justify-end">
                    <div class="w-full md:w-1/2 lg:w-1/3">
                        <div class="flex justify-between text-gray-300 mb-2">
                            <span>Subtotal</span>
                            <span>Rp{{ number_format($invoice->total_amount, 0, ',', '.') }}</span>
                        </div>
                        <div class="flex justify-between text-gray-300 mb-4">
                            <span>Pajak (0%)</span>
                            <span>Rp0</span>
                        </div>
                        <div class="border-t border-gray-700 pt-4 flex justify-between font-bold text-white text-xl">
                            <span>Total</span>
                            <span>Rp{{ number_format($invoice->total_amount, 0, ',', '.') }}</span>
                        </div>
                    </div>
                </div>

                <!-- Tombol Aksi -->
                <div class="mt-10 pt-6 border-t border-gray-700 flex flex-col sm:flex-row items-center justify-center space-y-4 sm:space-y-0 sm:space-x-4 no-print">
                    <a href="{{ route('client.invoices.index') }}" class="bg-gray-700/50 border border-gray-600 px-6 py-2 rounded-md text-white hover:bg-gray-600/50 transition-colors w-full sm:w-auto text-center">
                        &larr; Kembali ke Daftar Faktur
                    </a>
                    <button @click="window.print()" class="bg-indigo-600 px-6 py-2 rounded-md text-white font-semibold hover:bg-indigo-500 transition-colors w-full sm:w-auto flex items-center justify-center">
                        <i data-feather="printer" class="w-4 h-4 mr-2"></i>
                        Cetak / Simpan PDF
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
