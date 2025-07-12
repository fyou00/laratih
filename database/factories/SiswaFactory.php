<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Siswa>
 */
class SiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama' => $this->faker->name,
            'alamat' => $this->faker->address,
            'agama' => $this->faker->randomElement(['Islam', 'Kristen', 'Hindu', 'Buddha']),
            'jenis_kelamin' => $this->faker->boolean, // true=laki-laki, false=perempuan
            'asal_sekolah' => $this->faker->company . ' School',
        ];
    }
}
