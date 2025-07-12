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
          <h1 class="text-center">Form Tambah Data Siswa</h1>

          <!-- Session Success Message -->
          @if (session('success'))
          <div class="border border-green-600 text-green-600 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Success!</strong>
            {{ session('success') }}
          </div>
          @endif
          
          
          <form action="{{ route('siswa.store') }}" method="POST">
            @csrf
            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
              <!-- Nama -->
              <div class="sm:col-span-6">
                <label for="nama" class="block text-sm/6 font-medium text-gray-900">Nama:</label>
                <div class="mt-2">
                  <input type="text" name="nama" id="nama"
                    class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                    placeholder="Masukkan Nama" value="{{ old('nama') }}" />
                </div>
              </div>
              @error('nama')
              <div style="color: red;">{{ $message }}</div>
              @enderror

              <!-- Alamat -->
              <div class="sm:col-span-6">
                <label for="alamat">Alamat:</label>
                <textarea name="alamat" id="alamat" rows="3"
                  class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">{{ old('alamat') }}</textarea>
                @error('alamat')
                <div style="color: red;">{{ $message }}</div>
                @enderror
              </div>

              <!-- Agama -->
              <div class="sm:col-span-2">
                <label for="agama">Agama:</label>
                <input type="text" id="agama" name="agama"
                  class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                  value="{{ old('agama') }}" required>
                @error('agama')
                <div style="color: red;">{{ $message }}</div>
                @enderror
              </div>

              <!-- Jenis Kelamin -->
              <div class="sm:col-span-2">
                <label for="jenis_kelamin">Jenis Kelamin:</label>
                <select id="jenis_kelamin" name="jenis_kelamin"
                  class="col-start-1 row-start-1 w-full appearance-none rounded-md bg-white py-1.5 pr-8 pl-3 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                  required>
                  <option value="1" {{ old('jenis_kelamin') == '1' ? 'selected' : '' }}>Laki-laki</option>
                  <option value="0" {{ old('jenis_kelamin') == '0' ? 'selected' : '' }}>Perempuan</option>
                </select>
                @error('jenis_kelamin')
                <div style="color: red;">{{ $message }}</div>
                @enderror
              </div>

              <!-- Asal Sekolah -->
              <div class="sm:col-span-4">
                <label for="asal_sekolah">Asal Sekolah:</label>
                <input type="text" id="asal_sekolah" name="asal_sekolah"
                  class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                  value="{{ old('asal_sekolah') }}" required>
                @error('asal_sekolah')
                <div style="color: red;">{{ $message }}</div>
                @enderror
                <br><br>
              </div>
            </div>
            <button type="submit"
              class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Simpan Data</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>