<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
     Schema::create('transaksi_keluar', function (Blueprint $table) {
         $table->id();
         $table->string('kode_transaksi_keluar')->unique();
         $table->foreignId('barang_id')->constrained('barangs')->cascadeOnUpdate()->restrictOnDelete();
         $table->foreignId('user_id')->constrained('users')->cascadeOnUpdate()->restrictOnDelete();
         $table->date('tanggal');
         $table->integer('jumlah');
         $table->text('keterangan')->nullable();
         $table->timestamps();
     });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
