<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;
    protected $table = 'suppliers';
    protected $fillable = ['id_supplier', 'nama_supplier', 'alamat', 'no_telepon'];

    public function transaksiMasuk(){
        return $this->hasMany(transaksiMasuk::class);
    }
}
