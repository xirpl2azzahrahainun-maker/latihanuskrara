@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h3>Tambah Data Mahasiswa</h3>

    <form action="{{ route('mahasiswa.store') }}" method="POST" class="mt-3">
        @csrf
        <div class="mb-3">
            <label class="form-label">NPM</label>
            <input type="text" name="npm" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Nama Mahasiswa</label>
            <input type="text" name="nama" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Prodi</label>
            <input type="text" name="prodi" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Tahun Masuk</label>
            <input type="number" name="tahunmasuk" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
