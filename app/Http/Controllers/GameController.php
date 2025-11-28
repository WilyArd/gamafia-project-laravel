<?php

namespace App\Http\Controllers;

use App\Models\Game; // Pastikan baris ini ada
use Illuminate\Http\Request;

class GameController extends Controller
{
    /**
     * Menampilkan halaman daftar semua game.
     */
    public function index()
    {
        // 1. Ambil semua data game dari database
        $games = Game::all(); 
        
        // 2. Kirim variabel $games ke view 'games.index'
        return view('games.index', compact('games'));
    }

    /**
     * Menampilkan halaman detail dan paket harga untuk satu game.
     */
    public function show($slug)
    {
        // Ambil game berdasarkan slug dari database
        // dan muat relasi 'packages' untuk ditampilkan di view
        $game = Game::where('slug', $slug)->with('packages')->firstOrFail();

        // Kirim data game yang ditemukan ke view
        return view('games.show', compact('game'));
    }
}
