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
          <table class="min-w-full border border-gray-300 text-sm">
            <thead class="bg-gray-100">
              <tr>
                <th class="border px-4 py-2 text-left">No</th>
                <th class="border px-4 py-2 text-left">Nama</th>
                <th class="border px-4 py-2 text-left">Alamat</th>
                <th class="border px-4 py-2 text-left">Agama</th>
                <th class="border px-4 py-2 text-left">Jenis Kelamin</th>
                <th class="border px-4 py-2 text-left">Asal Sekolah</th>
                <th class="border px-4 py-2 text-left">Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach($siswas as $index => $siswa)
              <tr class="hover:bg-gray-50">
                <td class="border px-4 py-2">{{ $index + 1 }}</td>
                <td class="border px-4 py-2">{{ $siswa->nama }}</td>
                <td class="border px-4 py-2">{{ $siswa->alamat }}</td>
                <td class="border px-4 py-2">{{ $siswa->agama }}</td>
                <td class="border px-4 py-2">
                  {{ $siswa->jenis_kelamin ? 'Laki-laki' : 'Perempuan' }}
                </td>
                <td class="border px-4 py-2">{{ $siswa->asal_sekolah }}</td>
                <td class="border px-4 py-2">
                  <div class="flex gap-2">
                    <a href="{{ route('siswa.edit', $siswa->id) }}"
                      class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-700 text-sm">
                      Edit
                    </a>
                    <form action="{{ route('siswa.destroy', $siswa->id) }}" method="POST"
                      onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                      @csrf
                      @method('DELETE')
                      <button type="submit"
                        class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-700 text-sm">
                        Delete
                      </button>
                    </form>
                  </div>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
