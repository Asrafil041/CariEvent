<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

class EventFactory extends Factory
{
    public function definition()
    {
        return [
            // id_user akan di-override dari Seeder, tapi ini fallback yang aman
            'id_user' => User::factory(), 
            'judul_event' => $this->faker->sentence(4),
            'deskripsi' => $this->faker->paragraph(3),
            'lokasi' => $this->faker->city(),
            'tanggal' => $this->faker->dateTimeBetween('now', '+3 months'),
            // Simulasi ada event gratis (0) dan berbayar
            'harga' => $this->faker->randomElement([0, 50000, 100000, 150000]), 
            'link_pendaftaran' => $this->faker->url(),
            'poster' => null, // Biarkan null dulu agar tidak berat saat load gambar acak
        ];
    }
}