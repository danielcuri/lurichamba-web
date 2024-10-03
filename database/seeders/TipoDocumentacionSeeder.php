<?php

namespace Database\Seeders;

use App\Models\TipoDocumentacion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipoDocumentacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        TipoDocumentacion::create([
            'nombres' => 'CERTIJOVEN O CERTIADULTO',
        ]);

        TipoDocumentacion::create([
            'nombres' => 'ANTECEDENTES PENALES',
        ]);

        TipoDocumentacion::create([
            'nombres' => 'OTROS DOCUMENTOS',
        ]);

        TipoDocumentacion::create([
            'nombres' => 'CURRÍCULUM',
        ]);
    }
}
