<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiKeluar extends Model
{
    use HasFactory;
    protected $table = 'transaksi_keluar';
    protected $fillable= ['kode_transaksi_keluar', 'barang_id', 'user_id', 'tanggal', 'jumlah', 'keterangan'];
    public function User(){
        return $this->belongsTo(User::class);
    }
    public function Barang(){
        return $this->belongsTo(Barang::class);
    }
}
