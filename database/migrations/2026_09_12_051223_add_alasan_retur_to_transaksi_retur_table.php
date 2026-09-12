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
        Schema::table('transaksi_retur', function (Blueprint $table) {
            $table->enum('alasan_retur', ['rusak', 'hilang', 'salah_kirim', 'lainnya'])->after('jumlah');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('transaksi_retur', function (Blueprint $table) {
            $table->dropColum('alasan_retur');
        });
    }
};
