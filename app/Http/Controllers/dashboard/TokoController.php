<?php
namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Toko;
use Illuminate\Support\Facades\Auth;

class TokoController extends Controller
{
    public function index(){
        $toko = Toko::where('id_user', Auth::id())->first();
        return view('dashboard.toko.index', compact('toko'));
    }

    public function store(Request $r){ /* validasi + upload gambar -> store */ }
    public function update(Request $r,$id){ /* update toko milik owner */ }
}
