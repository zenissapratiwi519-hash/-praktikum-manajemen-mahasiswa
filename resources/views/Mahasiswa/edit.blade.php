<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Mahasiswa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded-lg shadow-sm">
                <form action="{{ route('mahasiswa.update', $mahasiswa->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label class="block font-medium">NIM</label>
                        <input type="text" name="nim" value="{{ $mahasiswa->nim }}" class="w-full border rounded p-2" required>
                    </div>
                    <div class="mb-4">
                        <label class="block font-medium">Nama</label>
                        <input type="text" name="nama" value="{{ $mahasiswa->nama }}" class="w-full border rounded p-2" required>
                    </div>
                    <div class="mb-4">
                        <label class="block font-medium">Program Studi</label>
                        <input type="text" name="program_studi" value="{{ $mahasiswa->program_studi }}" class="w-full border rounded p-2" required>
                    </div>
                    <div class="mb-4">
                        <label class="block font-medium">Email</label>
                        <input type="email" name="email" value="{{ $mahasiswa->email }}" class="w-full border rounded p-2" required>
                    </div>
                    <div class="mb-4">
                        <label class="block font-medium">Angkatan</label>
                        <input type="number" name="angkatan" value="{{ $mahasiswa->angkatan }}" class="w-full border rounded p-2" required>
                    </div>
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Update</button>
                    <a href="{{ route('mahasiswa.index') }}" class="ml-2 text-gray-600">Batal</a>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>