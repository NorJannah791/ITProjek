<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    // Menampilkan daftar transaksi
    public function index()
    {
        $transaksis = Transaksi::all(); // Mengambil semua data transaksi
        return view('transaksi.index', compact('transaksis')); // Mengirim data ke view
    }

    // Menampilkan form untuk menambah transaksi
    public function create()
    {
        return view('transaksi.create');
    }

    // Menyimpan transaksi baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'tanggaltransaksi' => 'required|date',
            'metodepembayaran' => 'required|string',
            'totalpembayaran' => 'required|numeric',
        ]);

        Transaksi::create($request->all()); // Menyimpan data ke database
        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil ditambahkan.');
    }

    // Menampilkan form untuk mengedit transaksi
    public function edit($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        return view('transaksi.edit', compact('transaksi'));
    }

    // Memperbarui data transaksi
    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggaltransaksi' => 'required|date',
            'metodepembayaran' => 'required|string',
            'totalpembayaran' => 'required|numeric',
        ]);

        $transaksi = Transaksi::findOrFail($id);
        $transaksi->update($request->all()); // Memperbarui data di database
        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil diperbarui.');
    }

    // Menghapus transaksi
    public function destroy($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->delete(); // Menghapus data dari database

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil dihapus.');
    }
}
