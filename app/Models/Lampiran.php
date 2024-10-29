<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lampiran extends Model
{
    use HasFactory;

    // Nama tabel yang digunakan oleh model ini
    protected $table = 'lampiran_table';

    // Kolom yang dapat diisi secara massal
    protected $fillable = [
        'nama_lampiran',
        'ukuran',
        'tipe_lampiran',
        'status',
        'path_gambar',
        'file_lampiran',
    ];

    // Jika Anda ingin menambahkan relasi dengan model lain, Anda bisa melakukannya di sini
    // Misalnya, jika ada relasi dengan model Surat
    // public function surat()
    // {
    //     return $this->belongsTo(Surat::class);
    // }
}
