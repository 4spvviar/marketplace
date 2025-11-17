<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = 'produk';
    protected $primaryKey = 'id_produk';
    protected $fillable = [
        'id_kategori','nama_produk','harga','stok','deskripsi','tanggal_upload','id_toko'
    ];

    public function kategori() { return $this->belongsTo(Kategori::class,'id_kategori','id_kategori'); }
    public function toko() { return $this->belongsTo(Toko::class,'id_toko','id_toko'); }
    public function gambar() { return $this->hasMany(GambarProduk::class,'id_produk','id_produk'); }
}
