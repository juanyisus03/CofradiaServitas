<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        User::create([
            'name' => 'Administrador',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123'),
            'rol' => 'Administrador'
        ]);

        User::create([
            'name' => 'Pepe',
            'email' => 'pepe@gmail.com',
            'password' => Hash::make('pepe123'),
            'rol' => 'Basico'
        ]);
    }
}
