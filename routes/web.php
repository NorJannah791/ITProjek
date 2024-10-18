<?php

use App\Http\Controllers\TransaksiController;
use Illuminate\Support\Facades\Route;


Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi.index'); // Menampilkan daftar transaksi
Route::get('/transaksi/create', [TransaksiController::class, 'create'])->name('transaksi.create'); // Form untuk tambah transaksi
Route::post('/transaksi', [TransaksiController::class, 'store'])->name('transaksi.store'); // Menyimpan transaksi baru
Route::get('/transaksi/{id}/edit', [TransaksiController::class, 'edit'])->name('transaksi.edit'); // Form untuk edit transaksi
Route::put('/transaksi/{id}', [TransaksiController::class, 'update'])->name('transaksi.update'); // Update transaksi yang ada
Route::delete('/transaksi/{id}', [TransaksiController::class, 'destroy'])->name('transaksi.destroy');
// routes/web.php

use App\Http\Controllers\LaporanController;

Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
Route::get('/laporan/create', [LaporanController::class, 'create'])->name('laporan.create');
Route::post('/laporan', [LaporanController::class, 'store'])->name('laporan.store');
Route::get('/laporan/{id}', [LaporanController::class, 'show'])->name('laporan.show'); // Route untuk melihat laporan
Route::delete('/laporan/{id}', [LaporanController::class, 'destroy'])->name('laporan.destroy');


Route::resource('laporan', LaporanController::class);

Route::get('/', function () {
    return view('welcome'); // Ganti dengan view yang sesuai jika perlu
})->name('home');


Route::get('/', function () {
    return view('home'); // Mengarah ke view beranda yang baru dibuat
})->name('home');

// Rute lainnya untuk laporan dan transaksi
Route::resource('laporan', LaporanController::class);
Route::resource('transaksi', TransaksiController::class); // Pastikan TransaksiController ada

Route::get('/transaksi/create', [TransaksiController::class, 'create'])->name('transaksi.create');
Route::post('/transaksi', [TransaksiController::class, 'store'])->name('transaksi.store');
