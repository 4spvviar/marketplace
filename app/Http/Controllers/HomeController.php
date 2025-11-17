<?php

namespace App\Http\Controllers;
use App\Models\Produk;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {
        $produk = Produk::with('toko','kategori')->latest()->take(12)->get();
        return view('home.index', compact('produk'));
    }
}
