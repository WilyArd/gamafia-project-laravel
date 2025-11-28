<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientDashboardController extends Controller
{
    public function index()
    {
        $orders = Auth::user()->orders()->with('package.game')->latest()->get();
        return view('client.dashboard', compact('orders'));
    }
}
