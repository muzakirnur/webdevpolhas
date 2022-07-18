<?php

namespace Database\Seeders;

use App\Models\Mahasiswa;
use App\Models\Matakuliah;
use App\Models\Prodi;
use App\Models\User;
use Database\Factories\MahasiswaFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        Prodi::factory(9)->create();
        Mahasiswa::factory(1000)->create();
        User::create([
            'username' => 'administrator',
            'password' => bcrypt('password'),
        ]);
        Matakuliah::factory(140)->create();
    }
}
