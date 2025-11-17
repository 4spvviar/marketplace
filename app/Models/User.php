<?php
namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    protected $primaryKey = 'id_user';
    protected $fillable = ['nama','kontak','username','password','role'];
    public $timestamps = true;
    protected $hidden = ['password'];

    public function toko()
    {
        return $this->hasOne(Toko::class, 'id_user', 'id_user');
    }
}
