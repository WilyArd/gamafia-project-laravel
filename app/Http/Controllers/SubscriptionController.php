<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SubscriptionController extends Controller
{
    /**
     * Membatalkan langganan (order).
     */
    public function cancel(Order $order)
    {
        // 1. Pastikan pengguna yang login adalah pemilik pesanan ini
        if (Auth::id() !== $order->user_id) {
            abort(403, 'Unauthorized action.');
        }

        // 2. Pastikan pesanan belum dibatalkan
        if ($order->status === 'cancelled') {
            return back()->withErrors(['error' => 'Layanan ini sudah dibatalkan.']);
        }

        try {
            // 3. Gunakan transaction untuk konsistensi data
            DB::transaction(function () use ($order) {
                // Ubah status pesanan menjadi 'cancelled'
                $order->update(['status' => 'cancelled']);

                // Kembalikan stok paket
                $order->package()->increment('stock');
            });
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Gagal membatalkan layanan. Silakan coba lagi.']);
        }

        // 4. Redirect kembali ke dashboard dengan pesan sukses
        return redirect()->route('client.dashboard')->with('success', 'Layanan berhasil dibatalkan.');
    }
}
