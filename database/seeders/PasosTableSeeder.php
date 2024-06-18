<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Paso;

class PasosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Paso::create([
            'nombre' => 'Santísimo Cristo de la Humillación',
        ]);
        Paso::create([
            'nombre' => 'Virgen de los Dolores Servita',
        ]);
    }
}
