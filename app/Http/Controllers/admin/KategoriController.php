<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kategori;

class KategoriController extends Controller
{
    public function index(){ $kategoris = Kategori::all(); return view('admin.kategori.index',compact('kategoris')); }

    public function store(Request $r){
        $r->validate(['nama_kategori'=>'required']);
        Kategori::create(['nama_kategori'=>$r->nama_kategori]);
        return back()->with('success','Kategori dibuat');
    }

    public function update(Request $r,$id){
        $r->validate(['nama_kategori'=>'required']);
        $k = Kategori::findOrFail($id);
        $k->update(['nama_kategori'=>$r->nama_kategori]);
        return back()->with('success','Kategori diperbarui');
    }

    public function destroy($id){ Kategori::findOrFail($id)->delete(); return back()->with('success','Kategori dihapus'); }
}
