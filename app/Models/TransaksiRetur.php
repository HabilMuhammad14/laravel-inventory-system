<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiRetur extends Model
{
    use HasFactory;
    protected $table = 'transaksi_retur';
    protected $fillable= ['kode_transaksi_retur', 'barang_id', 'supplier_id', 'user_id', 'tanggal', 'jumlah', 'keterangan'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function supplier(){
        return $this->belongsTo(Supplier::class);
    }

    public function barang(){
        return $this->belongsTo(Barang::class);
    }
}
