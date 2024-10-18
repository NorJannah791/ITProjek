@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Beranda</h1>

        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h2>Laporan</h2>
                    </div>
                    <div class="card-body">
                        <p>Kelola semua laporan yang terkait dengan pendapatan dan keluhan.</p>
                        <a href="{{ route('laporan.index') }}" class="btn btn-primary">Lihat Laporan</a>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h2>Transaksi</h2>
                    </div>
                    <div class="card-body">
                        <p>Kelola semua transaksi yang telah dilakukan.</p>
                        <a href="{{ route('transaksi.index') }}" class="btn btn-primary">Lihat Transaksi</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
