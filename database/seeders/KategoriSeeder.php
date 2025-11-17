<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Kategori;

class KategoriSeeder extends Seeder {
    public function run(){
        $list = ['Makanan','Minuman','Kerajinan','Baju','Alat Tulis'];
        foreach($list as $l) Kategori::create(['nama_kategori'=>$l]);
    }
}
