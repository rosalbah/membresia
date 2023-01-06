<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Gestor']);

        Permission::create(['name' => 'admin.home',
                            'description' => 'Ver el dashboard'])->syncRoles([$role1, $role2]);

        Permission::create(['name' => 'admin.users.index',
                            'description' => 'Ver listado de usuario'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.users.edit',
                            'description' => 'Asignar un rol'])->syncRoles([$role1]);
        
        Permission::create(['name' => 'admin.categories.index',
                            'description' => 'Ver listado de categorías'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.categories.create',
                            'description' => 'Crear categorías'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.categories.edit',
                            'description' => 'Editar categorías'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.categories.destroy',
                            'description' => 'Eliminar categorías'])->syncRoles([$role1]);
        
        Permission::create(['name' => 'admin.modos.index',
                            'description' => 'Ver listado de modalidades'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.modos.create',
                            'description' => 'Crear modalidad'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.modos.edit',
                            'description' => 'Editar modalidad'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.modos.destroy',
                            'description' => 'Eliminar modalidad'])->syncRoles([$role1]);
        
        Permission::create(['name' => 'admin.empleos.index',
                            'description' => 'Ver listado de empleos'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.empleos.create',
                            'description' => 'Crear empleos'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.empleos.edit',
                            'description' => 'Editar empleos'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.empleos.destroy',
                            'description' => 'Eliminar empleos'])->syncRoles([$role1, $role2]);

    }
}
