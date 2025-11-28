<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    /**
     * Menampilkan halaman checkout untuk paket yang dipilih.
     */
    public function create(Package $package)
    {
        // Memuat relasi game untuk ditampilkan di view
        $package->load('game');
        return view('checkout.create', compact('package'));
    }

    /**
     * Memvalidasi, membuat pesanan, mengurangi stok, dan redirect.
     */
    public function store(Request $request)
    {
        // 1. Validasi data yang dikirim dari form
        $request->validate([
            'package_id' => 'required|exists:packages,id',
            'location' => 'required|in:basic,premium',
            'payment_method' => 'required|string',
        ]);

        $package = Package::findOrFail($request->package_id);
        $user = Auth::user();

        // 2. Pastikan stok masih tersedia
        if ($package->stock <= 0) {
            return back()->withErrors(['stok' => 'Maaf, stok untuk paket ini telah habis.']);
        }

        // 3. Hitung total harga di backend untuk keamanan
        $totalPrice = $package->price_monthly;
        if ($request->location === 'premium') {
            $totalPrice += $package->price_premium_addon;
        }

        try {
            // 4. Gunakan transaction untuk memastikan semua proses berhasil
            DB::transaction(function () use ($package, $user, $request, $totalPrice) {
                // Buat pesanan (Order) baru
                Order::create([
                    'user_id' => $user->id,
                    'package_id' => $package->id,
                    'total_amount' => $totalPrice,
                    'billing_cycle' => 'monthly', // Bisa dibuat dinamis jika perlu
                    'payment_method' => $request->payment_method,
                    'status' => 'paid', // Asumsikan pembayaran langsung berhasil
                ]);

                // Kurangi stok paket
                $package->decrement('stock');
            });
        } catch (\Exception $e) {
            // Jika terjadi error, kembali dengan pesan
            return back()->withErrors(['error' => 'Terjadi kesalahan saat memproses pesanan. Silakan coba lagi.']);
        }

        // 5. Redirect ke dashboard dengan pesan sukses
        return redirect()->route('client.dashboard')->with('success', 'Pembayaran berhasil! Layanan Anda telah ditambahkan.');
    }
}
