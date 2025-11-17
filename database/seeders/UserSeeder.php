<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder {
    public function run(){
        User::create([
            'name'=>'Admin Sekolah',
            'kontak'=>'6281234567890',
            'username'=>'admin',
            'password'=>Hash::make('admin123'),
            'role'=>'admin',
        ]);
        User::create([
            'name'=>'Member Sekolah',
            'kontak'=>'6281111111111',
            'username'=>'member1',
            'password'=>Hash::make('member123'),
            'role'=>'member',
        ]);
    }
}
