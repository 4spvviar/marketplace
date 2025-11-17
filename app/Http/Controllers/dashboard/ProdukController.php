<?php
namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Toko;
use Illuminate\Support\Facades\Auth;

class ProdukController extends Controller
{
    public function index(){
        $toko = Toko::where('id_user', Auth::id())->first();
        $produks = $toko ? $toko->produk()->with('gambar')->get() : collect();
        return view('dashboard.produk.index', compact('produks'));
    }

    public function create(){ /* form tambah */ }
    public function store(Request $r){ /* validasi, simpan, upload gambar */ }
    public function edit($id){ /* edit */ }
    public function update(Request $r,$id){ /* update */ }
    public function destroy($id){ Produk::findOrFail($id)->delete(); return back()->with('success','Dihapus'); }
}
