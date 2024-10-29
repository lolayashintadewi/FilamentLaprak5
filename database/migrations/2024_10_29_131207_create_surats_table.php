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
        Schema::create('surat_table', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_surat'); // Kolom dengan tipe data string
            $table->integer('kode_surat'); // Kolom dengan tipe data integer
            $table->enum('jenis_surat', ['resmi', 'pribadi', 'undangan']); // Kolom dengan tipe data enum
            $table->boolean('status'); // Kolom dengan tipe data boolean
            $table->string('lampiran')->nullable(); // Kolom untuk menyimpan gambar (lampiran)
            $table->string('file_surat')->nullable(); // Kolom untuk menyimpan file surat
            $table->date('tanggal_dikirim'); // Kolom untuk tanggal
            $table->timestamps(); // Kolom timestamps untuk created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat_table');
    }
};
