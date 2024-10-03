<?php

namespace Database\Seeders;

use App\Models\EstadoProceso;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EstadoProcesoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        EstadoProceso::create([

            'nombres' => 'PENDIENTE',
        ]);

        EstadoProceso::create([
            'nombres' => 'APROBADO',
        ]);
        EstadoProceso::create([
            'nombres' => 'SOLICITAR OFRECER SERVICIOS.',
        ]);
        EstadoProceso::create([
            'nombres' => 'SOLICITAR CONTRATAR SERVICIOS.',
        ]);
    }
}
