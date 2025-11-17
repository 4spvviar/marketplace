<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Toko;
use App\Models\User;

class TokoSeeder extends Seeder {
    public function run(){
        $user = User::where('username','member1')->first();
        if ($user){
            Toko::create([
                'nama_toko'=>'Toko Siswa',
                'deskripsi'=>'Toko contoh siswa',
                'gambar'=>null,
                'id_user'=>$user->id_user,
                'kontak_toko'=>$user->kontak,
                'alamat'=>'Sekolah A'
            ]);
        }
    }
}
