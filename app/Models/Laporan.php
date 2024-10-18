<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;

    protected $table = 'laporan'; // Nama tabel di database

    protected $fillable = [
        'jenis_laporan', // 'pendapatan' atau 'keluhan'
        'deskripsi',     // Deskripsi dari laporan
        'jumlah',        // Jumlah pendapatan (hanya untuk laporan 'pendapatan')
        'status',        // Status laporan ('baru', 'proses', 'selesai')
    ];

    protected $attributes = [
        'status' => 'baru', // Status default
    ];
}
