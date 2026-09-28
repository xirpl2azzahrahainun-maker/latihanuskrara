@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h3>Edit Data Mahasiswa</h3>

    <form action="{{ route('mahasiswa.update', $mahasiswa->npm) }}" method="POST" class="mt-3">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">NPM</label>
            <input type="text" name="npm" class="form-control" value="{{ $mahasiswa->npm }}" disabled>
            <small class="text-muted">*NPM tidak dapat diubah</small>
        </div>
        <div class="mb-3">
            <label class="form-label">Nama Mahasiswa</label>
            <input type="text" name="nama" class="form-control" value="{{ $mahasiswa->nama }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Prodi</label>
            <input type="text" name="prodi" class="form-control" value="{{ $mahasiswa->prodi }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Tahun Masuk</label>
            <input type="number" name="tahunmasuk" class="form-control" value="{{ $mahasiswa->tahunmasuk }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
