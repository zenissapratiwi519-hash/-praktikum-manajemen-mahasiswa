<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Menampilkan daftar data mahasiswa.
     */
    public function index()
    {
        $mahasiswas = Mahasiswa::latest()->get();
        return view('mahasiswa.index', compact('mahasiswas'));
    }

    /**
     * Menampilkan form untuk menambah mahasiswa baru.
     */
    public function create()
    {
        return view('mahasiswa.create');
    }

    /**
     * Menyimpan data mahasiswa baru ke database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nim'           => 'required|unique:mahasiswas,nim',
            'nama'          => 'required|string|max:255',
            'program_studi' => 'required|string|max:255',
            'email'         => 'required|email|unique:mahasiswas,email',
            'angkatan'      => 'required|numeric',
        ], [
            'nim.required'           => 'NIM wajib diisi.',
            'nim.unique'             => 'NIM sudah terdaftar.',
            'nama.required'          => 'Nama mahasiswa wajib diisi.',
            'program_studi.required' => 'Program studi wajib diisi.',
            'email.required'         => 'Email wajib diisi.',
            'email.email'            => 'Format email tidak valid.',
            'email.unique'           => 'Email sudah terdaftar.',
            'angkatan.required'      => 'Angkatan wajib diisi.',
            'angkatan.numeric'       => 'Angkatan harus berupa angka.',
        ]);

        Mahasiswa::create([
            'nim'           => $request->nim,
            'nama'          => $request->nama,
            'program_studi' => $request->program_studi,
            'email'         => $request->email,
            'angkatan'      => $request->angkatan,
        ]);

        return redirect()->route('mahasiswa.index')
            ->with('success', 'Data Mahasiswa berhasil ditambahkan.');
    }

    /**
     * Menampilkan form untuk mengedit data mahasiswa.
     */
    public function edit($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        return view('mahasiswa.edit', compact('mahasiswa'));
    }

    /**
     * Memperbarui data mahasiswa di database.
     */
    public function update(Request $request, $id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);

        $request->validate([
            'nim'           => 'required|unique:mahasiswas,nim,' . $id,
            'nama'          => 'required|string|max:255',
            'program_studi' => 'required|string|max:255',
            'email'         => 'required|email|unique:mahasiswas,email,' . $id,
            'angkatan'      => 'required|numeric',
        ], [
            'nim.required'           => 'NIM wajib diisi.',
            'nim.unique'             => 'NIM sudah terdaftar.',
            'nama.required'          => 'Nama mahasiswa wajib diisi.',
            'program_studi.required' => 'Program studi wajib diisi.',
            'email.required'         => 'Email wajib diisi.',
            'email.email'            => 'Format email tidak valid.',
            'email.unique'           => 'Email sudah terdaftar.',
            'angkatan.required'      => 'Angkatan wajib diisi.',
            'angkatan.numeric'       => 'Angkatan harus berupa angka.',
        ]);

        $mahasiswa->update([
            'nim'           => $request->nim,
            'nama'          => $request->nama,
            'program_studi' => $request->program_studi,
            'email'         => $request->email,
            'angkatan'      => $request->angkatan,
        ]);

        return redirect()->route('mahasiswa.index')
            ->with('success', 'Data Mahasiswa berhasil diperbarui.');
    }

    /**
     * Menghapus data mahasiswa dari database.
     */
    public function destroy($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->delete();

        return redirect()->route('mahasiswa.index')
            ->with('success', 'Data Mahasiswa berhasil dihapus.');
    }
}