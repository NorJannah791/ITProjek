<?php

namespace App\Http\Controllers;

use App\Models\Laporan; // Menggunakan model Laporan
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    /**
     * Menampilkan daftar laporan pendapatan dan keluhan.
     */
    public function index()
    {
        // Mengambil semua laporan pendapatan dan keluhan dari database
        $laporanPendapatan = Laporan::where('jenis_laporan', 'pendapatan')->get();
        $laporanKeluhan = Laporan::where('jenis_laporan', 'keluhan')->get();

        // Menampilkan view dengan data laporan
        return view('laporan.index', compact('laporanPendapatan', 'laporanKeluhan'));
    }

    /**
     * Menampilkan form untuk membuat laporan baru.
     */
    public function create()
    {
        // Menampilkan view form tambah laporan
        return view('laporan.create');
    }

    /**
     * Menyimpan laporan baru ke database.
     */
    public function store(Request $request)
    {
        // Validasi data yang dikirimkan
        $validatedData = $request->validate([
            'jenis_laporan' => 'required|in:pendapatan,keluhan',
            'deskripsi' => 'required|string|max:255',
            'jumlah' => 'nullable|numeric|required_if:jenis_laporan,pendapatan',
        ]);

        // Simpan data laporan baru
        Laporan::create($validatedData); // Menggunakan model Laporan

        // Redirect ke halaman daftar laporan dengan pesan sukses
        return redirect()->route('laporan.index')->with('success', 'Laporan berhasil ditambahkan.');
    }

    /**
     * Menghapus laporan dari database.
     */
    public function destroy($id)
    {
        // Hapus laporan berdasarkan ID
        Laporan::destroy($id); // Menggunakan model Laporan

        // Redirect ke halaman daftar laporan dengan pesan sukses
        return redirect()->route('laporan.index')->with('success', 'Laporan berhasil dihapus.');
    }
}
