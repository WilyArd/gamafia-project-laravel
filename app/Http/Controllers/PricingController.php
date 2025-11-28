<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;

class PricingController extends Controller
{
    public function index()
    {
        $packages = Package::orderBy('price_monthly', 'asc')->get();
        return view('pricing.index', compact('packages'));
    }
}
