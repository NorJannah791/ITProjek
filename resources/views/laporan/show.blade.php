@extends('layouts.app')

@section('content')
    <h1>Detail Laporan</h1>

    <p><strong>Jenis Laporan:</strong> {{ $laporan->jenis_laporan }}</p>
    <p><strong>Deskripsi:</strong> {{ $laporan->deskripsi }}</p>

    @if($laporan->jenis_laporan == 'pendapatan')
        <p><strong>Jumlah:</strong> Rp {{ number_format($laporan->jumlah, 0, ',', '.') }}</p>
    @endif

    <p><strong>Status:</strong> {{ ucfirst($laporan->status) }}</p>

    <a href="{{ route('laporan.index') }}">Kembali ke Daftar Laporan</a>
@endsection
