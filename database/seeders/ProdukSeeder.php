<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Produk;
use App\Models\Toko;
use App\Models\Kategori;

class ProdukSeeder extends Seeder {
    public function run(){
        $toko = Toko::first();
        $kat = Kategori::first();
        if ($toko && $kat){
            Produk::create([
                'id_kategori'=>$kat->id_kategori,
                'nama_produk'=>'Buku Tulis A5',
                'harga'=>8000,
                'stok'=>20,
                'deskripsi'=>'Buku tulis 80 halaman.',
                'tanggal_upload'=>now()->toDateString(),
                'id_toko'=>$toko->id_toko
            ]);
        }
    }
}
