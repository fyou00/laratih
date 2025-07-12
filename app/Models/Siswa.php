<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $fillable = [
        'nama', 'alamat', 'agama', 'jenis_kelamin', 'asal_sekolah'
    ];
}
