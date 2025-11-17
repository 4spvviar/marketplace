<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin(){ return view('auth.login'); }
    public function showRegister(){ return view('auth.register'); }

    public function login(Request $r){
        $r->validate(['username'=>'required','password'=>'required']);
        if (Auth::attempt(['username'=>$r->username,'password'=>$r->password])){
            $r->session()->regenerate();
            return redirect()->intended('/');
        }
        return back()->withErrors(['username'=>'Username atau password salah']);
    }

    public function register(Request $r){
        $r->validate(['nama'=>'required','username'=>'required|unique:users,username','password'=>'required|min:5']);
        $user = User::create([
            'nama'=>$r->nama,
            'kontak'=>$r->kontak ?? null,
            'username'=>$r->username,
            'password'=>Hash::make($r->password),
            'role'=>'member'
        ]);
        return redirect()->route('login')->with('success','Akun dibuat, silakan login.');
    }

    public function logout(Request $r){
        Auth::logout();
        $r->session()->invalidate();
        return redirect('/');
    }
}
