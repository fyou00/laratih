<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
     use HasFactory;
    protected $fillable = [
        'nama', 'alamat', 'agama', 'jenis_kelamin', 'asal_sekolah'
    ];
}
