<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    // Menentukan field yang dapat diisi secara massal
    protected $fillable = [
        'tanggaltransaksi',
        'metodepembayaran',
        'totalpembayaran',
    ];
}
