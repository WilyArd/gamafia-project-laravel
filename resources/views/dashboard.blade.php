@extends('layouts.app')
@section('title', 'Dashboard Klien - Gamafia')
@section('footer')
@endsection

@section('content')
<div class="pt-24 pb-12 bg-[#141824]">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">

            <!-- Kolom Kiri: Profil & Discord -->
            <aside class="lg:col-span-3 space-y-8">
                <!-- Profil Card -->
                <div class="glassmorphism p-6 rounded-xl text-center">
                    <div class="w-20 h-20 rounded-full bg-indigo-500 mx-auto flex items-center justify-center text-3xl font-bold text-white mb-4">
                        {{ substr(Auth::user()->name, 0, 2) }}
                    </div>
                    <h2 class="text-xl font-bold text-white">{{ Auth::user()->name }}</h2>
                    <p class="text-sm text-gray-400 mb-4">{{ Auth::user()->email }}</p>
                    <button class="w-full bg-gray-700/50 border border-gray-600 px-4 py-2 rounded-md text-white hover:bg-gray-600/50 transition-colors">
                        Pembaruan
                    </button>
                </div>

                <!-- Info Lain -->
                <div class="glassmorphism p-6 rounded-xl text-sm space-y-3">
                    <div class="flex justify-between">
                        <span class="text-gray-400">Visibilitas</span>
                        <span class="flex items-center text-green-400"><i data-feather="circle" class="w-3 h-3 fill-current mr-2"></i> Daring</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-400">Terlihat</span>
                        <span class="text-white">2 bulan yang lalu</span>
                    </div>
                </div>

                <!-- Discord Widget -->
                <div class="glassmorphism rounded-xl overflow-hidden">
                    <div class="p-4 bg-gray-900/50 flex justify-between items-center">
                        <div class="flex items-center space-x-2">
                            <svg class="w-6 h-6 text-indigo-400" fill="currentColor" viewBox="0 0 24 24"><path d="M20.317 4.3698a19.7913 19.7913 0 0 0-4.885-1.5152.0741.0741 0 0 0-.0785.0371c-.211.3753-.4464.8254-.6184 1.2525a17.7362 17.7362 0 0 0-5.4884 0 17.3073 17.3073 0 0 0-.6184-1.2525.0741.0741 0 0 0-.0785-.0371A19.7364 19.7364 0 0 0 3.683 4.3698a.0741.0741 0 0 0-.0371.0785c.1725.9352.385 1.8425.6184 2.6999a18.14 18.14 0 0 0-1.6384 3.553.0741.0741 0 0 0 .016.096c.3753.287.7725.5347 1.177.744a.0741.0741 0 0 0 .086-.016c.0785-.096.149-.208.2275-.32a12.6377 12.6377 0 0 0 1.3848-.9996.0741.0741 0 0 0-.016-.112c-.2275-.157-.455-.32-.6742-.482a.0741.0741 0 0 1-.0371-.086c.0371-.024.0785-.048.112-.0785a12.1554 12.1554 0 0 0 2.1493-1.485.0741.0741 0 0 0 .0371-.086l-.008-.016a13.2174 13.2174 0 0 0-1.4168-2.1493.0741.0741 0 0 1 .008-.096c.149-.096.306-.184.455-.272a.0741.0741 0 0 1 .086.008c.07.056.132.12.184.192a12.292 12.292 0 0 1 6.1524 0c.052-.072.114-.136.184-.192a.0741.0741 0 0 1 .086-.008c.149.088.306.176.455.272a.0741.0741 0 0 1 .008.096 13.2323 13.2323 0 0 0-1.4168 2.1493l-.008.016a.0741.0741 0 0 0 .0371.086 12.1554 12.1554 0 0 0 2.1493 1.485c.0345.0305.0745.0545.112.0785a.0741.0741 0 0 1-.0371.086c-.2192.162-.4467.325-.6742.482a.0741.0741 0 0 0-.016.112c.0785.112.149.224.2275.32a.0741.0741 0 0 0 .086.016c.4045-.2093.8017-.457 1.177-.744a.0741.0741 0 0 0 .016-.096 18.14 18.14 0 0 0-1.6384-3.553c.2334-.8574.446-1.7647.6184-2.6999a.0741.0741 0 0 0-.0371-.0785Z"/></svg>
                            <span class="font-bold text-white">Discord</span>
                        </div>
                        <span class="text-xs text-gray-400">1182 Members Online</span>
                    </div>
                    <div class="p-4 space-y-2 text-sm">
                        <p class="text-gray-400">Panggung Cafe</p>
                        <p class="text-gray-400">Public Voice</p>
                        <p class="text-gray-400">Music I</p>
                        <p class="text-xs font-bold uppercase text-gray-500 mt-4">Members Online</p>
                        {{-- Daftar member online --}}
                    </div>
                </div>
            </aside>

            <!-- Kolom Kanan: Konten Utama -->
            <main class="lg:col-span-9 space-y-8">
                <!-- Stat Cards -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="glassmorphism p-6 rounded-xl flex items-center space-x-4">
                        <div class="bg-blue-600/20 text-blue-400 p-3 rounded-lg"><i data-feather="server" class="w-6 h-6"></i></div>
                        <div>
                            <p class="text-3xl font-bold text-white">0</p>
                            <p class="text-sm text-gray-400">Layanan</p>
                        </div>
                    </div>
                    <div class="glassmorphism p-6 rounded-xl flex items-center space-x-4">
                        <div class="bg-yellow-600/20 text-yellow-400 p-3 rounded-lg"><i data-feather="file-text" class="w-6 h-6"></i></div>
                        <div>
                            <p class="text-3xl font-bold text-white">0</p>
                            <p class="text-sm text-gray-400">Faktur</p>
                        </div>
                    </div>
                    <div class="glassmorphism p-6 rounded-xl flex items-center space-x-4">
                        <div class="bg-green-600/20 text-green-400 p-3 rounded-lg"><i data-feather="dollar-sign" class="w-6 h-6"></i></div>
                        <div>
                            <p class="text-3xl font-bold text-white">Rp21K</p>
                            <p class="text-sm text-gray-400">Saldo</p>
                        </div>
                    </div>
                </div>

                <!-- Layanan Anda -->
                <div class="glassmorphism p-6 rounded-xl">
                    <div class="flex flex-col md:flex-row justify-between items-center mb-4">
                        <h3 class="text-xl font-bold text-white">Layanan Anda <span class="text-base font-normal text-gray-500">0 hasil</span></h3>
                        <div class="flex items-center space-x-2 mt-4 md:mt-0">
                            <button class="bg-gray-700/50 border border-gray-600 px-4 py-2 rounded-md text-sm text-white hover:bg-gray-600/50">Filter</button>
                            <button class="bg-green-600 px-4 py-2 rounded-md text-sm text-white font-semibold hover:bg-green-500">Tambahkan Saldo</button>
                            <button class="bg-indigo-600 px-4 py-2 rounded-md text-sm text-white font-semibold hover:bg-indigo-500">+ Pesan Layanan Baru</button>
                        </div>
                    </div>
                    <div class="text-center py-12 border-2 border-dashed border-gray-700 rounded-lg">
                        <h4 class="text-lg font-semibold text-white">Belum ada pesanan</h4>
                        <p class="text-gray-400">Anda belum melakukan pemesanan, pesanan baru akan terlihat di sini.</p>
                    </div>
                </div>

                <!-- Your Tickets -->
                <div class="glassmorphism p-6 rounded-xl">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-xl font-bold text-white">Your Tickets <span class="text-base font-normal text-gray-500">0 results</span></h3>
                        <button class="bg-indigo-600 px-4 py-2 rounded-md text-sm text-white font-semibold hover:bg-indigo-500">+ New Ticket</button>
                    </div>
                    <div class="text-center py-12 border-2 border-dashed border-gray-700 rounded-lg">
                        <h4 class="text-lg font-semibold text-white">No tickets found</h4>
                        <p class="text-gray-400">You haven't created any tickets yet.</p>
                    </div>
                </div>

            </main>
        </div>
    </div>
</div>
@endsection
