<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
 /**
     * Menampilkan dashboard.
     */
    public function index()
    {
        // Menghitung jumlah laporan dan transaksi
        $jumlahLaporan = Laporan::count();
        $jumlahTransaksi = Transaksi::count();

        // Menampilkan view dashboard dengan data
        return view('dashboard.index', compact('jumlahLaporan', 'jumlahTransaksi'));
    }
}   //
