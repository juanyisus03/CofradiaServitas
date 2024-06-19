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
        $this->call([
            PasosTableSeeder::class,
            TronosTableSeeder::class,
            UsersTableSeeder::class,
            EnsersTableSeeder::class,
            NoticiasSeeder::class,
        ]);
    }
}
