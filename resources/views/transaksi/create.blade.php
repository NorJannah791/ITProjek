
@extends('layouts.app') <!-- Menggunakan layout utama, sesuaikan nama layout jika berbeda -->

@section('content')
<div class="container">
    <form action="{{ route('transaksi.store') }}" method="POST" class="transaction-form">
        @csrf <!-- Token CSRF Laravel -->
        <div class="mb-3">
            <label for="tanggaltransaksi" class="form-label">Tanggal Transaksi</label>
            <input type="date" class="form-control" id="tanggaltransaksi" name="tanggaltransaksi" required>
        </div>
        <div class="mb-3">
            <label for="metodepembayaran" class="form-label">Metode Pembayaran</label>
            <select class="form-select" id="metodepembayaran" name="metodepembayaran" required>
                <option value="" disabled selected>Pilih Metode Pembayaran</option>
                <option value="Tunai">Tunai</option>
                <option value="Debit">Debit</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="totalpembayaran" class="form-label">Total Pembayaran</label>
            <input type="number" class="form-control" id="totalpembayaran" name="totalpembayaran" step="0.01" required placeholder="Masukkan total pembayaran">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection

@section('css')
<style>
    .transaction-form {
        background-color: #f7f9fc;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        max-width: 600px;
        margin: 20px auto;
    }

    .transaction-form .form-label {
        color: #003366;
        font-weight: 600;
    }

    .transaction-form .form-control, 
    .transaction-form .form-select {
        border: 1px solid #0056b3;
        padding: 10px;
        border-radius: 5px;
        background-color: #fff;
    }

    .transaction-form .form-control:focus, 
    .transaction-form .form-select:focus {
        border-color: #007bff;
        box-shadow: 0px 0px 4px rgba(0, 123, 255, 0.25);
    }

    .transaction-form button {
        background-color: #007bff;
        border-color: #007bff;
        padding: 10px 20px;
        border-radius: 5px;
        color: white;
        font-weight: 600;
        transition: background-color 0.3s;
    }

    .transaction-form button:hover {
        background-color: #0056b3;
        border-color: #0056b3;
    }
</style>
@endsection
