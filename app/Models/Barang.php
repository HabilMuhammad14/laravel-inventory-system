<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $table = 'barangs';
    protected $fillable = ['kode_barang', 'nama_barang', 'kategori_id', 'satuan','harga','stok',];

    public function transaksiMasuk(){
        return $this->hasMany(transaksiMasuk::class);
    }
    public function transaksiKeluar(){
        return $this->hasMany(transaksiKeluar::class);
    }
    public function transaksiRetur(){
        return $this->hasMany(transaksiRetur::class);
    }
}
