<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\EstadoProceso;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            // UserSeeder::class,
            // AreaSeeder::class,
            // SubAreaSeeder::class,
            // CargoLaboralSeeder::class,
            // CategoriaSeeder::class,
            TipoDocumentoSeeder::class,
            TipoUtilidadSeeder::class,
            EstadoProcesoSeeder::class,
            TipoDocumentacionSeeder::class,
            RolSeeder::class

            // ColaboradorSeeder::class,
            // RolSeeder::class,

        ]);


        \App\Models\User::create([
            'name' => 'Test User',
            'email' => 'admin@gmail.com',
            'password' => 123456789
        ]);

        // \App\Models\Persona::create([
        //     'name' => 'Test User',
        //     'tipo_documento_id' => 1,
        //     'email' => 'joanroycar@gmail.com',
        //     'tipo_utilidad_id' => 1,
        //     'password' => 123456789
        // ]);

        // \App\Models\Persona::create([
        //     'name' => 'JOAN',
        //     'tipo_documento_id' => 1,

        //     'email' => 'joan@gmail.com',
        //     'tipo_utilidad_id' => 2,
        //     'password' => 123456789
        // ]);


        // \App\Models\Persona::create([
        //     'name' => 'DAVIR CARLOS',
        //     'tipo_documento_id' => 1,
        //     'email' => 'david@gmail.com',
        //     'tipo_utilidad_id' => 2,

        //     'password' => 987654321
        // ]);
    }
}
