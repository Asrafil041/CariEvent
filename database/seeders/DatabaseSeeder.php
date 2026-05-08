<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Event;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // 1. Bikin 1 User utama untuk testing Login
        $user = User::factory()->create([
            'name' => 'Rido',
            'email' => 'rido@goevent.test',
            'password' => bcrypt('password123'),
        ]);

        // 2. Generate 20 Event yang otomatis menjadi milik user Rido
        Event::factory(20)->create([
            'id_user' => $user->id
        ]);
    }
}