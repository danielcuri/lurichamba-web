<?php

namespace Database\Seeders;

use App\Models\TipoDocumento;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipoDocumentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TipoDocumento::create([

            'nombres' => 'DOCUMENTO NACIONAL DE IDENTIDAD',
            'siglas' => 'DNI',
        ]);
        TipoDocumento::create([

            'nombres' => 'CARNET DE EXTRANJERIA',
            'siglas' => 'CARNET EXT.',
        ]);
        TipoDocumento::create([

            'nombres' => 'PASAPORTE',
            'siglas' => 'PASAPORTE',

        ]);
    }
}
