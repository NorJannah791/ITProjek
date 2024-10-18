<!-- resources/views/reports/edit.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Laporan</h1>

    <form action="{{ route('reports.update', $report->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="type">Jenis Laporan</label>
            <select name="type" id="type" class="form-control">
                <option value="transaction" {{ $report->type == 'transaction' ? 'selected' : '' }}>Laporan Transaksi</option>
                <option value="complaint" {{ $report->type == 'complaint' ? 'selected' : '' }}>Laporan Keluhan</option>
            </select>
        </div>

        <div class="form-group">
            <label for="description">Deskripsi</label>
            <textarea name="description" id="description" class="form-control" rows="3">{{ $report->description }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection
