<?php

namespace Database\Seeders;

use App\Models\Siswa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Siswa::factory()->create([
            'nama' => 'Muhammad Fathurrahman',
            'alamat' => 'Hagu Selatan',
            'agama' => 'Islam',
            'jenis_kelamin' => '1', // 1 untuk laki-laki
            'asal_sekolah' => 'SMK Negeri 1 Lhokseumawe',
        ]);
    }
}
