<?php
namespace App\Http\Controllers;
use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index(Request $r){
        $query = Produk::with('toko','kategori')->latest();
        if ($r->filled('q')) $query->where('nama_produk','like','%'.$r->q.'%');
        if ($r->filled('kategori')) $query->where('id_kategori',$r->kategori);
        $produk = $query->paginate(12);
        $kategori = Kategori::all();
        return view('produk.index', compact('produk','kategori'));
    }

    public function show($id){
        $produk = Produk::with('toko','kategori','gambar')->findOrFail($id);
        return view('produk.show', compact('produk'));
    }
}
