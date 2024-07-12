<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pegawai>
 */
class PegawaiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'address' => fake()->address(),
            'no_telepon' => fake()->phoneNumber(),
            'hire_date' => fake()->dateTimeBetween('-1 year', 'now'),
            'jenis_kelamin' => fake()->randomElement(['Laki-Laki', 'Perempuan']),
            'image' => fake()->imageUrl($width = 640, $height = 480), // Menghasilkan URL gambar
        ];
    }
}
