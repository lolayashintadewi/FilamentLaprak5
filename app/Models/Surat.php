<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    use HasFactory;

    // Nama tabel yang digunakan oleh model ini
    protected $table = 'surat_table';

    // Kolom yang dapat diisi secara massal
    protected $fillable = [
        'nomor_surat',
        'kode_surat',
        'jenis_surat',
        'status',
        'lampiran',
        'file_surat',
        'tanggal_dikirim',
    ];

    // Jika Anda ingin menambahkan relasi dengan model lain, Anda bisa melakukannya di sini
    // Misalnya, jika ada model Lampiran
    // public function lampiran()
    // {
    //     return $this->hasMany(Lampiran::class);
    // }
}
