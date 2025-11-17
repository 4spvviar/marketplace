<?php
namespace App\Http\Controllers;
use App\Models\Toko;

class TokoController extends Controller
{
    public function show($id){
        $toko = Toko::with('produk.gambar')->findOrFail($id);
        return view('toko.show', compact('toko'));
    }
}
