<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Dashboard') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900">
          <h1>Tambah Siswa</h1>

          <form action="{{ route('siswa.store') }}" method="POST">
            @csrf

            <!-- Nama -->
            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama" value="{{ old('nama') }}" required>
            @error('nama')
            <div style="color: red;">{{ $message }}</div>
            @enderror
            <br><br>

            <!-- Alamat -->
            <label for="alamat">Alamat:</label>
            <textarea id="alamat" name="alamat" required>{{ old('alamat') }}</textarea>
            @error('alamat')
            <div style="color: red;">{{ $message }}</div>
            @enderror
            <br><br>

            <!-- Agama -->
            <label for="agama">Agama:</label>
            <input type="text" id="agama" name="agama" value="{{ old('agama') }}" required>
            @error('agama')
            <div style="color: red;">{{ $message }}</div>
            @enderror
            <br><br>

            <!-- Jenis Kelamin -->
            <label for="jenis_kelamin">Jenis Kelamin:</label>
            <select id="jenis_kelamin" name="jenis_kelamin" required>
              <option value="1" {{ old('jenis_kelamin') == '1' ? 'selected' : '' }}>Laki-laki</option>
              <option value="0" {{ old('jenis_kelamin') == '0' ? 'selected' : '' }}>Perempuan</option>
            </select>
            @error('jenis_kelamin')
            <div style="color: red;">{{ $message }}</div>
            @enderror
            <br><br>

            <!-- Asal Sekolah -->
            <label for="asal_sekolah">Asal Sekolah:</label>
            <input type="text" id="asal_sekolah" name="asal_sekolah" value="{{ old('asal_sekolah') }}" required>
            @error('asal_sekolah')
            <div style="color: red;">{{ $message }}</div>
            @enderror
            <br><br>

            <button type="submit">Simpan</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>