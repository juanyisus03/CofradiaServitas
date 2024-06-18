<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use App\Models\Enser;

class EnsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Enser::create([
            'nombre' => 'Velas',
            'paso_id' => 1,
            'cantidad' => 400,
            'estado' => 'La mitad de ellas requiren revisión'
        ]);
        Enser::create([
            'nombre' => 'Bambalinas',
            'paso_id' => 2,
            'cantidad' => 1,
            'estado' => 'Debe ser llevado a una costurera urgentemente'
        ]);

        Enser::create([
            'nombre' => 'Tunica del Cristo',
            'paso_id' => 1,
            'cantidad' => 1,
            'estado' => 'Debe ser llevado a una tintoreria para el lavado de esta'
        ]);
        Enser::create([
            'nombre' => 'Manto Servita',
            'paso_id' => 1,
            'cantidad' => 1,
            'estado' => 'Debe ser llevado a una tintoreria para el lavado de esta'
        ]);

    }
}
