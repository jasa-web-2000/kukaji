<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory()->create([
            'fullname' => 'Dion Zebua',
            'username' => '@dion',
            'email' => 'test@gmail.com',
            'password' => 'Password.@@',
            'role' => 'admin',
            'status' => 'accept',
        ]);
        \App\Models\User::factory(100)->create();

        \App\Models\Theme::factory()->create([
            'name' => "Tidak Diketahui",
        ]);
        \App\Models\Theme::factory(100)->create();

        \App\Models\Speaker::factory()->create([
            'name' => "Tidak Diketahui",
        ]);
        \App\Models\Speaker::factory(100)->create();
    }
}
