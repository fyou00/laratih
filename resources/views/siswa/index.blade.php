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
          <table>
            <tr>
              <td>No</td>
              <td>Nama</td>
              <td>Alamat</td>
              <td>Agama</td>
              <td>Jenis Kelamin</td>
              <td>Asal Sekolah</td>
              <td>Aksi</td>
            </tr>
            @foreach($siswas as $siswa)
            <tr>
              <td>{{ $siswa->id }}</td>
              <td>{{ $siswa->nama }}</td>
              <td>{{ $siswa->alamat }}</td>
              <td>{{ $siswa->agama }}</td>
              <td>{{ $siswa->jenis_kelamin }}</td>
              <td>{{ $siswa->asal_sekolah }}</td>
              <td><button type="button"
                  class="bg-blue-500 text-white p-2 rounded hover:bg-blue-700 transition duration-300 ease-in-out">
                  Edit
                </button>
                | <button type="button"
                  class="bg-red-500 text-white p-2 rounded hover:bg-red-700 transition duration-300 ease-in-out">
                  Delete
                </button>
              </td>
            </tr>
            @endforeach
          </table>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>