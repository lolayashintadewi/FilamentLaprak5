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
        Schema::create('lampiran_table', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lampiran'); // Kolom dengan tipe data string untuk nama lampiran
            $table->integer('ukuran'); // Kolom dengan tipe data integer untuk ukuran lampiran dalam KB
            $table->enum('tipe_lampiran', ['gambar', 'dokumen', 'lainnya']); // Kolom dengan tipe data enum untuk tipe lampiran
            $table->boolean('status'); // Kolom dengan tipe data boolean untuk status lampiran (misalnya, aktif/non-aktif)
            $table->string('path_gambar')->nullable(); // Kolom untuk menyimpan path gambar lampiran
            $table->string('file_lampiran')->nullable(); // Kolom untuk menyimpan file lampiran
            $table->timestamps(); // Kolom timestamps untuk created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lampiran_table');
    }
};
