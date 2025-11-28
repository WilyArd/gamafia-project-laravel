<?php

namespace App\Http\Controllers;

use App\Models\Order; // Pastikan model Order di-import
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InvoiceController extends Controller
{
    /**
     * Menampilkan halaman daftar faktur.
     */
    public function index()
    {
 
        $invoices = Auth::user()->orders()->with('package')->latest()->get();

        return view('client.invoices.index', compact('invoices'));
    }

    /**
     * 
     * 
     */
    public function show(Order $order)
    {
        if (Auth::id() !== $order->user_id) {
            abort(403, 'Anda tidak diizinkan mengakses faktur ini.');
        }

        $order->load('user', 'package.game');

        return view('client.invoices.show', ['invoice' => $order]);
    }
}
