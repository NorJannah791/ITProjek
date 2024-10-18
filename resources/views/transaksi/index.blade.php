@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center">Daftar Transaksi</h1>

    <!-- Flash Message for Success -->
    @if(session('success'))
        <div class="alert alert-success"> 
            {{ session('success') }}
        </div>
    @endif

    <!-- Tombol untuk menambah transaksi -->
    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addTransactionModal">
        Tambah Transaksi
    </button>

    <!-- Tabel Daftar Transaksi -->
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="table-primary text-center">
                <tr>
                    <th>No</th>
                    <th>Tanggal Transaksi</th>
                    <th>Metode Pembayaran</th>
                    <th>Total Pembayaran</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($transaksis as $transaksi)
                    <tr class="text-center">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ \Carbon\Carbon::parse($transaksi->tanggaltransaksi)->format('d/m/Y') }}</td>
                        <td>{{ $transaksi->metodepembayaran }}</td>
                        <td>Rp {{ number_format((float)$transaksi->totalpembayaran, 2, ',', '.') }}</td>
                        <td>
                            <!-- Edit Button -->
                            <a href="{{ route('transaksi.edit', $transaksi->id) }}" class="btn btn-warning">Edit</a>
                            
                            <!-- Delete Form -->
                            <form action="{{ route('transaksi.destroy', $transaksi->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus transaksi ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Modal untuk Menambah Transaksi -->
<div class="modal fade" id="addTransactionModal" tabindex="-1" aria-labelledby="addTransactionModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg"> 
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addTransactionModalLabel">Tambah Transaksi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('transaksi.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <!-- Form Group Tanggal Transaksi -->
                    <div class="mb-3">
                        <label for="tanggaltransaksi" class="form-label">Tanggal Transaksi</label>
                        <input type="date" class="form-control" id="tanggaltransaksi" name="tanggaltransaksi" required>
                    </div>

                    <!-- Form Group Metode Pembayaran -->
                    <div class="mb-3">
                        <label for="metodepembayaran" class="form-label">Metode Pembayaran</label>
                        <select class="form-select" id="metodepembayaran" name="metodepembayaran" required>
                            <option value="" disabled selected>Pilih Metode Pembayaran</option>
                            <option value="Tunai">Tunai</option>
                            <option value="Debit">Debit</option>
                        </select>
                    </div>

                    <!-- Form Group Total Pembayaran -->
                    <div class="mb-3">
                        <label for="totalpembayaran" class="form-label">Total Pembayaran</label>
                        <input type="text" class="form-control" id="totalpembayaran" name="totalpembayaran" required onkeyup="formatCurrency(this)">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('css')
<!-- Styles for Table and Modal -->
<style>
    body {
        background-color: #f0f8ff;
    }

    h1 {
        color: #003366;
        margin-bottom: 20px;
    }

    .table {
        background-color: #ffffff;
        border-radius: 0.5rem;
        overflow: hidden;
        border: 1px solid #0056b3;
    }

    .table th {
        background-color: #0056b3;
        color: white;
        text-align: center;
    }

    .table td {
        background-color: #e6f2ff;
        color: #003366;
        text-align: center;
    }

    .table td:hover {
        background-color: #d1e7ff;
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
    }

    .btn-warning {
        background-color: #ffc107;
        border-color: #ffc107;
    }

    .btn-danger {
        background-color: #dc3545;
        border-color: #dc3545;
    }

    .modal-header {
        background-color: #0056b3;
        color: white;
    }

    .modal-footer .btn-secondary {
        background-color: #6c757d;
        border-color: #6c757d;
    }

    .modal-footer .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
    }
</style>
@endsection

@section('js')
<!-- Script for Formatting Currency -->
<script>
    function formatCurrency(input) {
        let value = input.value.replace(/[^,\d]/g, '').toString();
        let split = value.split(',');
        let sisa = split[0].length % 3;
        let rupiah = split[0].substr(0, sisa);
        let ribuan = split[0].substr(sisa).match(/\d{3}/g);

        if (ribuan) {
            let separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] !== undefined ? rupiah + ',' + split[1] : rupiah;
        input.value = 'Rp ' + rupiah;
    }
</script>
@endsection
