@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Transaksi</h1>

    <form action="{{ route('transaksi.update', $transaksi->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="tanggaltransaksi" class="form-label">Tanggal Transaksi</label>
            <input type="date" class="form-control" id="tanggaltransaksi" name="tanggaltransaksi" value="{{ $transaksi->tanggaltransaksi }}" required>
        </div>

        <div class="mb-3">
            <label for="metodepembayaran" class="form-label">Metode Pembayaran</label>
            <select class="form-select" id="metodepembayaran" name="metodepembayaran" required>
                <option value="Tunai" {{ $transaksi->metodepembayaran == 'Tunai' ? 'selected' : '' }}>Tunai</option>
                <option value="Debit" {{ $transaksi->metodepembayaran == 'Debit' ? 'selected' : '' }}>Debit</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="totalpembayaran" class="form-label">Total Pembayaran</label>
            <input type="text" class="form-control" id="totalpembayaran" name="totalpembayaran" value="{{ $transaksi->totalpembayaran }}" required>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection
