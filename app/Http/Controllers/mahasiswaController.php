<?php

namespace App\Http\Controllers;

use App\Models\mahasiswa;
use Illuminate\Http\Request;

class mahasiswaController extends Controller
{
    // READ: Menampilkan daftar data
    public function index()
    {
        $data_mahasiswa = mahasiswa::all();
        return view('viewmahasiswa', compact('data_mahasiswa'));
    }

    // CREATE: Menampilkan form tambah data
    public function create()
    {
        return view('createmahasiswa');
    }

    // STORE: Menyimpan data baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'npm' => 'required|unique:mahasiswas,npm',
            'nama' => 'required',
            'prodi' => 'required',
            'tahunmasuk' => 'required|numeric',
        ]);

        mahasiswa::create([
            'npm' => $request->npm,
            'nama' => $request->nama,
            'prodi' => $request->prodi,
            'tahunmasuk' => $request->tahunmasuk,
        ]);

        return redirect()->route('mahasiswa.index')->with('success', 'Data berhasil ditambahkan!');
    }

    public function show(string $id)
    {
        //
    }

    // EDIT: Menampilkan form edit data
    public function edit(string $id)
    {
        $mahasiswa = mahasiswa::where('npm', $id)->firstOrFail();
        return view('editmahasiswa', compact('mahasiswa'));
    }

    // UPDATE: Menyimpan perubahan data ke database
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required',
            'prodi' => 'required',
            'tahunmasuk' => 'required|numeric',
        ]);

        mahasiswa::where('npm', $id)->update([
            'nama' => $request->nama,
            'prodi' => $request->prodi,
            'tahunmasuk' => $request->tahunmasuk,
        ]);

        return redirect()->route('mahasiswa.index')->with('success', 'Data berhasil diperbarui!');
    }

    // DESTROY: Menghapus data dari database
    public function destroy(string $id)
    {
        mahasiswa::where('npm', $id)->delete();
        return redirect()->route('mahasiswa.index')->with('success', 'Data berhasil dihapus!');
    }
}
