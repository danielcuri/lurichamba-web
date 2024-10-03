<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use HasRoles;



class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::firstOrCreate(['name' => 'admin']);
        $role2 = Role::firstOrCreate(['name' => 'ofrecedor-inicio', 'guard_name' => 'personas']);
        $role3 = Role::firstOrCreate(['name' => 'ofrecedor-validado', 'guard_name' => 'personas']);
        $role4 = Role::firstOrCreate(['name' => 'contrata-validado', 'guard_name' => 'personas']);

        Permission::create(['name' => 'usuarios.index', 'description' => 'Lista de Usuarios'])->syncRoles([$role]);
        Permission::create(['name' => 'usuarios.create', 'description' => 'Registrar Usuarios'])->syncRoles([$role]);
        Permission::create(['name' => 'usuarios.edit', 'description' => 'Editar Usuarios'])->syncRoles([$role]);
        Permission::create(['name' => 'usuarios.destroy', 'description' => 'Eliminar Usuarios'])->syncRoles([$role]);
        Permission::create(['name' => 'usuarios.show', 'description' => 'Ver Datos de Usuarios'])->syncRoles([$role]);

        Permission::create(['name' => 'roles.index', 'description' => 'Lista de Roles'])->syncRoles([$role]);
        Permission::create(['name' => 'roles.create', 'description' => 'Registrar Roles'])->syncRoles([$role]);
        Permission::create(['name' => 'roles.edit', 'description' => 'Editar Roles'])->syncRoles([$role]);
        Permission::create(['name' => 'roles.destroy', 'description' => 'Eliminar Roles'])->syncRoles([$role]);
        Permission::create(['name' => 'roles.show', 'description' => 'Ver Datos de Roles'])->syncRoles([$role]);        
    

        Permission::create(['name' => 'especialidades.index', 'description' => 'Lista de especialidades'])->syncRoles([$role]);
        Permission::create(['name' => 'especialidades.create', 'description' => 'Registrar especialidades'])->syncRoles([$role]);
        Permission::create(['name' => 'especialidades.edit', 'description' => 'Editar especialidades'])->syncRoles([$role]);
        Permission::create(['name' => 'especialidades.destroy', 'description' => 'Eliminar especialidades'])->syncRoles([$role]);
        Permission::create(['name' => 'especialidades.show', 'description' => 'Ver Datos de especialidades'])->syncRoles([$role]);


        Permission::create(['name' => 'tipo-servicios.index', 'description' => 'Lista de tipo servicios'])->syncRoles([$role]);
        Permission::create(['name' => 'tipo-servicios.create', 'description' => 'Registrar tipo servicios'])->syncRoles([$role]);
        Permission::create(['name' => 'tipo-servicios.edit', 'description' => 'Editar tipo servicios'])->syncRoles([$role]);
        Permission::create(['name' => 'tipo-servicios.destroy', 'description' => 'Eliminar tipo servicios'])->syncRoles([$role]);
        Permission::create(['name' => 'tipo-servicios.show', 'description' => 'Ver Datos de tipo servicios'])->syncRoles([$role]);

        Permission::create(['name' => 'servicios.index', 'description' => 'Lista de servicios'])->syncRoles([$role]);
        Permission::create(['name' => 'servicios.create', 'description' => 'Registrar servicios'])->syncRoles([$role]);
        Permission::create(['name' => 'servicios.edit', 'description' => 'Editar servicios'])->syncRoles([$role]);
        Permission::create(['name' => 'servicios.destroy', 'description' => 'Eliminar servicios'])->syncRoles([$role]);
        Permission::create(['name' => 'servicios.show', 'description' => 'Ver Datos de servicios'])->syncRoles([$role]);


        Permission::create(['name' => 'solicitudes-publicacion.index', 'description' => 'Lista de solicitudes publicacion'])->syncRoles([$role]);
        Permission::create(['name' => 'solicitudes-publicacion.create', 'description' => 'Registrar solicitudes publicacion'])->syncRoles([$role]);
        Permission::create(['name' => 'solicitudes-publicacion.edit', 'description' => 'Editar solicitudes publicacion'])->syncRoles([$role]);
        Permission::create(['name' => 'solicitudes-publicacion.destroy', 'description' => 'Eliminar solicitudes publicacion'])->syncRoles([$role]);
        Permission::create(['name' => 'solicitudes-publicacion.show', 'description' => 'Ver Datos de solicitudes publicacion'])->syncRoles([$role]);


        Permission::create(['name' => 'personas-registradas.index', 'description' => 'Lista de solicitudes personas registradas'])->syncRoles([$role]);
        Permission::create(['name' => 'personas-registradas.create', 'description' => 'Registrar solicitudes personas registradas'])->syncRoles([$role]);
        Permission::create(['name' => 'personas-registradas.edit', 'description' => 'Editar solicitudes personas registradas'])->syncRoles([$role]);
        Permission::create(['name' => 'personas-registradas.destroy', 'description' => 'Eliminar solicitudes personas registradas'])->syncRoles([$role]);
        Permission::create(['name' => 'personas-registradas.show', 'description' => 'Ver Datos de solicitudes personas registradas'])->syncRoles([$role]);


        // OFRECEDDR - INICIO 
        Permission::create(['name' => 'dashboard.index', 'description' => 'Menu Dashboard Principal Personas Portal', 'guard_name' => 'personas'])->syncRoles([$role2]);        
        Permission::create(['name' => 'perfil.index', 'description' => 'Ver Perfil Personas Portal', 'guard_name' => 'personas'])->syncRoles([$role2,$role4]);        
        Permission::create(['name' => 'servicios.index', 'description' => 'Ver Mis Servicios Ofrecedor Portal', 'guard_name' => 'personas'])->syncRoles([$role2]);        
        Permission::create(['name' => 'credenciales.index', 'description' => 'Vista Credenciales Portal', 'guard_name' => 'personas'])->syncRoles([$role2,$role4]);        
        Permission::create(['name' => 'documentos.index', 'description' => 'Vista Mis Documentos', 'guard_name' => 'personas'])->syncRoles([$role2]);        
        Permission::create(['name' => 'foto.update', 'description' => 'Actualizar Credenciales Portal', 'guard_name' => 'personas'])->syncRoles([$role2,$role4]);        

       //OFRECEDOR  - VALIDADO
        Permission::create(['name' => 'servicios.registrar', 'description' => 'Registrar Servicios Portal - Ofrecedor.', 'guard_name' => 'personas'])->syncRoles([$role3]);        
        Permission::create(['name' => 'comentarios-ofrecedor.registrar', 'description' => 'Habilitar Comentarios Portal - Ofrecedor.', 'guard_name' => 'personas'])->syncRoles([$role3]);        
        Permission::create(['name' => 'clientes.index', 'description' => 'Vista Mis Clientes', 'guard_name' => 'personas'])->syncRoles([$role3]);        

       //CONTRATA VALIDADO
       Permission::create(['name' => 'dashboard-contrata.index', 'description' => 'Menu Dashboard Contrata Portal.', 'guard_name' => 'personas'])->syncRoles([$role4]);        
       Permission::create(['name' => 'comentarios-contrata.index', 'description' => 'Listado de Comentarios - Contratator.', 'guard_name' => 'personas'])->syncRoles([$role4]);        
       Permission::create(['name' => 'comentarios-contrata.registrar', 'description' => 'Registrar Comentarios - Contratator', 'guard_name' => 'personas'])->syncRoles([$role4]);        




    }
}
