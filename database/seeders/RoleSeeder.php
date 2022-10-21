<?php

namespace Database\Seeders;

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
        //Roles
        $rol1 = Role::create(['name' => 'Admin']); //todas las rutas más la gestion de usuarios y creación de roles y permisos
        $rol2 = Role::create(['name' => 'Inventarios']); //Categorias, productos, Bodegas, Entradas, Proveedores
        $rol3 = Role::create(['name' => 'Ventas']); //Pedidos, Fecturas
        $rol4 = Role::create(['name' => 'Cliente']);// Rol para los usuarios asociados a clientes.

        //Permisos sobre las rutas...
        Permission::create(['name' => 'Ver Usuarios'])->assignRole($rol1);
        Permission::create(['name' => 'Crear Usuarios'])->assignRole($rol1);
        Permission::create(['name' => 'Editar Usuarios'])->assignRole($rol1);
        Permission::create(['name' => 'Eliminar Usuarios'])->assignRole($rol1);

        Permission::create(['name' => 'Ver Productos'])->syncRoles([$rol1,$rol2]);
        Permission::create(['name' => 'Crear Productos'])->syncRoles([$rol1,$rol2]);
        Permission::create(['name' => 'Editar Productos'])->syncRoles([$rol1,$rol2]);
        Permission::create(['name' => 'Eliminar Productos'])->syncRoles([$rol1,$rol2]);

        Permission::create(['name' => 'Ver Categorias'])->syncRoles([$rol1,$rol2]);
        Permission::create(['name' => 'Crear Categorias'])->syncRoles([$rol1,$rol2]);
        Permission::create(['name' => 'Editar Categorias'])->syncRoles([$rol1,$rol2]);
        Permission::create(['name' => 'Eliminar Categorias'])->syncRoles([$rol1,$rol2]);

        Permission::create(['name' => 'Ver Bodegas'])->syncRoles([$rol1,$rol2]);
        Permission::create(['name' => 'Crear Bodegas'])->syncRoles([$rol1,$rol2]);
        Permission::create(['name' => 'Editar Bodegas'])->syncRoles([$rol1,$rol2]);
        Permission::create(['name' => 'Eliminar Bodegas'])->syncRoles([$rol1,$rol2]);

        Permission::create(['name' => 'Ver Entradas'])->syncRoles([$rol1,$rol2]);
        Permission::create(['name' => 'Crear Entradas'])->syncRoles([$rol1,$rol2]);
        Permission::create(['name' => 'Editar Entradas'])->syncRoles([$rol1,$rol2]);
        Permission::create(['name' => 'Eliminar Entradas'])->syncRoles([$rol1,$rol2]);

        Permission::create(['name' => 'Ver Proveedores'])->syncRoles([$rol1,$rol2]);
        Permission::create(['name' => 'Crear Proveedores'])->syncRoles([$rol1,$rol2]);
        Permission::create(['name' => 'Editar Proveedores'])->syncRoles([$rol1,$rol2]);
        Permission::create(['name' => 'Eliminar Proveedores'])->syncRoles([$rol1,$rol2]);

        Permission::create(['name' => 'Ver Facturas'])->syncRoles([$rol1,$rol3]);
        Permission::create(['name' => 'Crear Facturas'])->syncRoles([$rol1,$rol3]);
        Permission::create(['name' => 'Editar Facturas'])->syncRoles([$rol1,$rol3]);
        Permission::create(['name' => 'Eliminar Facturas'])->syncRoles([$rol1,$rol3]);

        Permission::create(['name' => 'Ver Pedidos'])->syncRoles([$rol1,$rol3]);
        Permission::create(['name' => 'Crear Pedidos'])->syncRoles([$rol1,$rol3]);
        Permission::create(['name' => 'Editar Pedidos'])->syncRoles([$rol1,$rol3]);
        Permission::create(['name' => 'Eliminar Pedidos'])->syncRoles([$rol1,$rol3]);

        Permission::create(['name' => 'Ver Tienda'])->syncRoles([$rol1,$rol4]);
        Permission::create(['name' => 'Crear Tienda'])->syncRoles([$rol1,$rol3]);
        Permission::create(['name' => 'Editar Tienda'])->syncRoles([$rol1,$rol3]);
        Permission::create(['name' => 'Eliminar Tienda'])->syncRoles([$rol1,$rol3]);

        Permission::create(['name' => 'Ver Clientes'])->syncRoles([$rol1,$rol4]);
        Permission::create(['name' => 'Crear Clientes'])->syncRoles([$rol1,$rol3]);
        Permission::create(['name' => 'Editar Clientes'])->syncRoles([$rol1,$rol3]);
        Permission::create(['name' => 'Eliminar Clientes'])->syncRoles([$rol1,$rol3]);
    }
}
