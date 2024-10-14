@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center">Daftar Transaksi</h1>

    @if(session('success'))
        <div class="alert alert-success"> PERBAIKI SINKAK YG SALAH 
            {{ session('success') }}
        </div>
    @endif

    <!-- Tombol untuk menambah transaksi -->
    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addTransactionModal">
        Tambah Transaksi
    </button>

    <!-- Tabel Daftar Transaksi -->
    <table class="table table-bordered table-striped">
        <thead class="table-primary">
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
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ \Carbon\Carbon::parse($transaksi->tanggaltransaksi)->format('d/m/Y') }}</td>
                    <td>{{ $transaksi->metodepembayaran }}</td>
                    <td>Rp {{ number_format((float)$transaksi->totalpembayaran, 2, ',', '.') }}</td>
                    <td>
                        <a href="{{ route('transaksi.edit', $transaksi->id) }}" class="btn btn-warning">Edit</a>
                        <!-- Delete Button -->
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

<!-- Modal untuk Menambah Transaksi -->
<div class="modal fade" id="addTransactionModal" tabindex="-1" aria-labelledby="addTransactionModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg"> <!-- Modal besar -->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addTransactionModalLabel">Tambah Transaksi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('transaksi.store') }}" method="POST">
                @csrf
                <div class="modal-body">
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
<style>
    body {
        background-color: #f0f8ff; /* Warna lembut untuk latar belakang */
    }
    h1 {
        color: #003366; /* Warna biru tua untuk judul */
        margin-bottom: 20px; /* Spasi di bawah judul */
    }
    .table {
        background-color: #ffffff; /* Putih untuk latar belakang tabel */
        border-radius: 0.5rem; /* Sudut tabel melengkung */
        overflow: hidden; /* Mencegah overflow */
        border: 1px solid #0056b3; /* Border biru di sekitar tabel */
    }
    .table th {
        background-color: #0056b3; /* Biru untuk header tabel */
        color: white; /* Teks putih untuk header */
        text-align: center; /* Teks rata tengah */
    }
    .table td {
        background-color: #e6f2ff; /* Biru muda untuk baris tabel */
        color: #003366; /* Teks berwarna biru tua */
        text-align: center; /* Teks rata tengah */
    }
    .table td:hover {
        background-color: #d1e7ff; /* Efek hover dengan biru lebih terang */
    }
    .alert {
        margin-top: 20px;
    }
    /* Tombol styling */
    .btn-primary {
        background-color: #007bff; /* Biru untuk tombol tambah transaksi */
        border-color: #007bff; /* Border biru */
    }
    .btn-primary:hover {
        background-color: #0056b3; /* Biru lebih gelap saat hover */
        border-color: #0056b3;
    }
    .btn-warning {
        background-color: #ffc107; /* Kuning untuk tombol edit */
        border-color: #ffc107; /* Border kuning */
    }
    .btn-warning:hover {
        background-color: #e0a800; /* Kuning lebih gelap saat hover */
        border-color: #d39e00;
    }
    .btn-danger {
        background-color: #dc3545; /* Merah untuk tombol hapus */
        border-color: #dc3545;
    }
    .btn-danger:hover {
        background-color: #c82333; /* Merah lebih gelap saat hover */
        border-color: #bd2130;
    }
    /* Modal styling */
    .modal-header {
        background-color: #0056b3; /* Header modal biru */
        color: white; /* Teks putih di header modal */
    }
    .modal-footer .btn-secondary {
        background-color: #6c757d; /* Abu-abu untuk tombol tutup */
        border-color: #6c757d;
    }
    .modal-footer .btn-primary {
        background-color: #007bff; /* Biru untuk tombol simpan */
        border-color: #007bff;
    }
</style>
@endsection

@section('js')
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
