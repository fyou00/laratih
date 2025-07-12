<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $siswas = Siswa::all();
        return view('siswa.index', ['siswas' => $siswas]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      return view('siswa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {  
    // Validasi data input
    $request->validate([
        'nama' => 'required|string|max:100',
        'alamat' => 'required|string',
        'agama' => 'required|string',
        'jenis_kelamin' => 'required|boolean',
        'asal_sekolah' => 'required|string',
    ]);

    // Simpan data ke database
    Siswa::create([
        'nama' => $request->nama,
        'alamat' => $request->alamat,
        'agama' => $request->agama,
        'jenis_kelamin' => $request->jenis_kelamin,
        'asal_sekolah' => $request->asal_sekolah,
    ]);

    // Redirect atau response
    return redirect()->back()->with('success', 'Data siswa berhasil ditambahkan!');
}

    /**
     * Display the specified resource.
     */
    public function show(Siswa $siswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $siswa = Siswa::findOrFail($id); // Ambil data siswa berdasarkan ID
        return view('siswa.edit', compact('siswa'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    // Validasi input
    $request->validate([
        'nama' => 'required|string|max:100',
        'alamat' => 'required|string',
        'agama' => 'required|string',
        'jenis_kelamin' => 'required|boolean',
        'asal_sekolah' => 'required|string',
    ]);

    // Ambil data siswa berdasarkan ID
    $siswa = Siswa::findOrFail($id);

    // Update data siswa
    $siswa->update([
        'nama' => $request->nama,
        'alamat' => $request->alamat,
        'agama' => $request->agama,
        'jenis_kelamin' => $request->jenis_kelamin,
        'asal_sekolah' => $request->asal_sekolah,
    ]);

    // Redirect kembali ke halaman daftar siswa atau detail
    return redirect()->route('siswa.index');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
{
    $siswa = Siswa::findOrFail($id); // Cari siswa berdasarkan ID

    $siswa->delete(); // Hapus data

    return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil dihapus.');
}

}