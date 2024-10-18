@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mt-4">Daftar Laporan</h1>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <h2 class="mt-4">Laporan Pendapatan</h2>
        @if($laporanPendapatan->isEmpty())
            <p>Tidak ada laporan pendapatan.</p>
        @else
            <ul class="list-group">
                @foreach($laporanPendapatan as $laporan)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        {{ $laporan->deskripsi }} - Rp {{ number_format($laporan->jumlah, 0, ',', '.') }}
                        <span class="badge bg-primary rounded-pill">{{ $laporan->status_label }}</span>
                    </li>
                @endforeach
            </ul>
        @endif

        <h2 class="mt-4">Laporan Keluhan</h2>
        @if($laporanKeluhan->isEmpty())
            <p>Tidak ada laporan keluhan.</p>
        @else
            <ul class="list-group">
                @foreach($laporanKeluhan as $laporan)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        {{ $laporan->deskripsi }}
                        <span class="badge bg-warning rounded-pill">{{ $laporan->status_label }}</span>
                    </li>
                @endforeach
            </ul>
        @endif

        <a href="{{ route('home') }}" class="btn btn-secondary mt-4">Kembali ke Beranda</a>
    </div>
@endsection
