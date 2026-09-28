@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h3 class="text-center mb-4">Daftar Data Mahasiswa</h3>

    {{-- Pesan Sukses jika ada aksi CRUD --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- Tombol Tambah Data --}}
    <div class="mb-3">
        <a href="{{ route('mahasiswa.create') }}" class="btn btn-primary">+ Tambah Mahasiswa</a>
    </div>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>NPM</th>
                <th>Nama</th>
                <th>Prodi</th>
                <th>Tahun Masuk</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($data_mahasiswa as $i => $k)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td>{{ $k->npm }}</td>
                    <td>{{ $k->nama }}</td>
                    <td>{{ $k->prodi }}</td>
                    <td>{{ $k->tahunmasuk }}</td>
                    <td>
                        {{-- Tombol Edit --}}
                        <a href="{{ route('mahasiswa.edit', $k->npm) }}" class="btn btn-warning btn-sm">Edit</a>

                        {{-- Tombol Hapus --}}
                        <form action="{{ route('mahasiswa.destroy', $k->npm) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">Belum ada data mahasiswa.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
