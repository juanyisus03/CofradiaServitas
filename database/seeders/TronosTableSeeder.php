<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Trono;

class TronosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Trono::create([
            'cofradia' => 'Cofradía del Silencio',
            'paso_id' => 1,  // Asegúrate de que el paso con ID 1 existe en tu base de datos
            'estado' => 'Roto'
        ]);

        Trono::create([
            'cofradia' => 'Cofradía de Nuestro Padre Jesús Nazareno',
            'paso_id' => 2,
            'estado' => 'En buen estado'
        ]);

        Trono::create([
            'cofradia' => 'Cofradía de la Virgen de la Soledad',
            'paso_id' => 1,
            'estado' => 'Recién restaurado'
        ]);



    }
}
