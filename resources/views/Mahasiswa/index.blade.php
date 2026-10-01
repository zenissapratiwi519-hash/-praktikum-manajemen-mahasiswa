<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Mahasiswa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    {{-- Alert Notifikasi Sukses --}}
                    @if (session('success'))
                        <div class="mb-4 p-4 bg-emerald-100 border border-emerald-300 text-emerald-700 rounded-lg text-sm">
                            {{ session('success') }}
                        </div>
                    @endif

                    {{-- Tombol + Tambah Mahasiswa (Menggunakan Inline CSS Dipaksa Biru) --}}
                    <div style="margin-bottom: 24px;">
                        <a href="{{ route('mahasiswa.create') }}" 
                           style="display: inline-block; background-color: #2563eb; color: #ffffff; font-weight: 600; padding: 10px 18px; border-radius: 6px; text-decoration: none; font-size: 14px; box-shadow: 0 1px 2px rgba(0,0,0,0.1);">
                            + Tambah Mahasiswa
                        </a>
                    </div>

                    {{-- Tabel Data Mahasiswa --}}
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="border-b border-gray-200 text-xs font-bold text-gray-400 uppercase tracking-wider">
                                    <th class="py-3 px-4 text-center w-12">NO</th>
                                    <th class="py-3 px-4">NIM</th>
                                    <th class="py-3 px-4">NAMA</th>
                                    <th class="py-3 px-4">PROGRAM STUDI</th>
                                    <th class="py-3 px-4">EMAIL</th>
                                    <th class="py-3 px-4 text-center">ANGKATAN</th>
                                    <th class="py-3 px-4 text-center">AKSI</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100 text-sm text-gray-600">
                                @forelse ($mahasiswas as $index => $item)
                                    <tr>
                                        <td class="py-4 px-4 text-center text-gray-400">
                                            {{ $loop->iteration }}
                                        </td>
                                        <td class="py-4 px-4 font-bold text-gray-800">{{ $item->nim }}</td>
                                        <td class="py-4 px-4 font-medium text-gray-700">{{ $item->nama }}</td>
                                        <td class="py-4 px-4 text-gray-500 uppercase">{{ $item->program_studi }}</td>
                                        <td class="py-4 px-4 text-gray-500">{{ $item->email }}</td>
                                        <td class="py-4 px-4 text-center text-gray-500">{{ $item->angkatan }}</td>
                                        <td class="py-4 px-4 text-center">
                                            <div class="flex items-center justify-center gap-3">
                                                <a href="{{ route('mahasiswa.edit', $item->id) }}" class="text-indigo-600 hover:text-indigo-800 font-medium text-xs">
                                                    Edit
                                                </a>
                                                <form action="{{ route('mahasiswa.destroy', $item->id) }}" method="POST" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-rose-500 hover:text-rose-700 font-medium text-xs">
                                                        Hapus
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="py-6 text-center text-gray-400">
                                            Belum ada data mahasiswa.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>