<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('perizinans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('import_history_id')->nullable()->constrained('import_histories')->cascadeOnDelete();
            $table->string('nomor_izin');
            $table->string('nomor_skrd');
            $table->date('tanggal_izin');
            $table->string('nama_perusahaan');
            $table->text('alamat');
            $table->string('jenis_izin');
            $table->string('lokasi_perusahaan');
            $table->date('masa_berlaku_izin');
            $table->date('tanggal_bayar')->nullable();
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('perizinans');
    }
};