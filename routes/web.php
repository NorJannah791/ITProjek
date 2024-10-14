<?php

use App\Http\Controllers\TransaksiController;
use Illuminate\Support\Facades\Route;


Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi.index'); // Menampilkan daftar transaksi
Route::get('/transaksi/create', [TransaksiController::class, 'create'])->name('transaksi.create'); // Form untuk tambah transaksi
Route::post('/transaksi', [TransaksiController::class, 'store'])->name('transaksi.store'); // Menyimpan transaksi baru
Route::get('/transaksi/{id}/edit', [TransaksiController::class, 'edit'])->name('transaksi.edit'); // Form untuk edit transaksi
Route::put('/transaksi/{id}', [TransaksiController::class, 'update'])->name('transaksi.update'); // Update transaksi yang ada
Route::delete('/transaksi/{id}', [TransaksiController::class, 'destroy'])->name('transaksi.destroy');

