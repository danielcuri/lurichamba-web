<?php

namespace Database\Seeders;

use App\Models\TipoUtilidad;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipoUtilidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TipoUtilidad::create([
            'nombres' => 'OFRECE SERVICIOS',
        ]);
        TipoUtilidad::create([
            'nombres' => 'CONTRATAR SERVICIOS',
        ]);
        TipoUtilidad::create([
            'nombres' => 'OFRECE SERVICIOS Y CONTRATAR SERVICIOS',
        ]);

        

        
       
    }
}
