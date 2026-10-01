<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Data Mahasiswa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-gray-100 p-8">
                
                <form action="{{ route('mahasiswa.store') }}" method="POST">
                    @csrf

                    <!-- NIM -->
                    <div class="mb-4">
                        <label for="nim" class="block text-sm font-medium text-gray-700 mb-1">NIM</label>
                        <input type="text" name="nim" id="nim" value="{{ old('nim') }}" required 
                            class="w-full border border-gray-300 rounded-md p-2 shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                        @error('nim') 
                            <span class="text-red-600 text-xs mt-1 block">{{ $message }}</span> 
                        @enderror
                    </div>

                    <!-- NAMA -->
                    <div class="mb-4">
                        <label for="nama" class="block text-sm font-medium text-gray-700 mb-1">Nama Mahasiswa</label>
                        <input type="text" name="nama" id="nama" value="{{ old('nama') }}" required 
                            class="w-full border border-gray-300 rounded-md p-2 shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                        @error('nama') 
                            <span class="text-red-600 text-xs mt-1 block">{{ $message }}</span> 
                        @enderror
                    </div>

                    <!-- PROGRAM STUDI -->
                    <div class="mb-4">
                        <label for="program_studi" class="block text-sm font-medium text-gray-700 mb-1">Program Studi</label>
                        <input type="text" name="program_studi" id="program_studi" value="{{ old('program_studi') }}" required 
                            class="w-full border border-gray-300 rounded-md p-2 shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                        @error('program_studi') 
                            <span class="text-red-600 text-xs mt-1 block">{{ $message }}</span> 
                        @enderror
                    </div>

                    <!-- EMAIL -->
                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                        <input type="email" name="email" id="email" value="{{ old('email') }}" required 
                            class="w-full border border-gray-300 rounded-md p-2 shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                        @error('email') 
                            <span class="text-red-600 text-xs mt-1 block">{{ $message }}</span> 
                        @enderror
                    </div>

                    <!-- ANGKATAN -->
                    <div class="mb-6">
                        <label for="angkatan" class="block text-sm font-medium text-gray-700 mb-1">Angkatan</label>
                        <input type="number" name="angkatan" id="angkatan" value="{{ old('angkatan') }}" required 
                            class="w-full border border-gray-300 rounded-md p-2 shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                        @error('angkatan') 
                            <span class="text-red-600 text-xs mt-1 block">{{ $message }}</span> 
                        @enderror
                    </div>

                    <!-- TOMBOL SIMPAN & BATAL DENGAN INLINE STYLES -->
                    <div style="display: flex; gap: 12px; margin-top: 24px; align-items: center;">
                        <button type="submit" style="background-color: #2563eb; color: #ffffff; padding: 10px 20px; border-radius: 6px; font-weight: 600; border: none; cursor: pointer;">
                            Simpan Data
                        </button>
                        <a href="{{ route('mahasiswa.index') }}" style="background-color: #e5e7eb; color: #374151; padding: 10px 20px; border-radius: 6px; font-weight: 600; text-decoration: none;">
                            Batal
                        </a>
                    </div>

                </form>

            </div>
        </div>
    </div>
</x-app-layout>