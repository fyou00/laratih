<form action="{{ route('siswa.update', $siswa->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Nama:</label>
    <input type="text" name="nama" value="{{ $siswa->nama }}" required>

    <label>Alamat:</label>
    <textarea name="alamat" required>{{ $siswa->alamat }}</textarea>

    <label>Agama:</label>
    <input type="text" name="agama" value="{{ $siswa->agama }}" required>

    <label>Jenis Kelamin:</label>
    <select name="jenis_kelamin">
        <option value="1" {{ $siswa->jenis_kelamin ? 'selected' : '' }}>Laki-laki</option>
        <option value="0" {{ !$siswa->jenis_kelamin ? 'selected' : '' }}>Perempuan</option>
    </select>

    <label>Asal Sekolah:</label>
    <input type="text" name="asal_sekolah" value="{{ $siswa->asal_sekolah }}" required>

    <button type="submit">Update</button>
</form>
