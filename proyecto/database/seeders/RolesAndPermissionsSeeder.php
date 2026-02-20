<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeder.
     */
    public function run(): void
    {
        // Resetear cachés de roles y permisos
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Crear permisos
        $permissions = [
            'ver-clientes',
            'crear-clientes',
            'editar-clientes',
            'eliminar-clientes',
            'ver-productos',
            'crear-productos',
            'editar-productos',
            'eliminar-productos',
            'ver-empleados',
            'crear-empleados',
            'editar-empleados',
            'eliminar-empleados',
            'ver-facturas',
            'crear-facturas',
            'editar-facturas',
            'eliminar-facturas',
            'ver-proveedores',
            'crear-proveedores',
            'editar-proveedores',
            'eliminar-proveedores',
            'ver-incidencias',
            'crear-incidencias',
            'editar-incidencias',
            'eliminar-incidencias',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // Crear rol Admin con todos los permisos
        $adminRole = Role::create(['name' => 'Admin']);
        $adminRole->givePermissionTo(Permission::all());

        // Crear rol Usuario con permisos limitados (solo crear y editar)
        $usuarioRole = Role::create(['name' => 'Usuario']);
        $usuarioRole->givePermissionTo([
            'ver-clientes', 'crear-clientes', 'editar-clientes',
            'ver-productos', 'crear-productos', 'editar-productos',
            'ver-empleados', 'crear-empleados', 'editar-empleados',
            'ver-facturas', 'crear-facturas', 'editar-facturas',
            'ver-proveedores', 'crear-proveedores', 'editar-proveedores',
            'ver-incidencias', 'crear-incidencias', 'editar-incidencias',
        ]);

        // Crear usuario Admin
        $admin = User::create([
            'name' => 'Administrador',
            'email' => 'admin@sistema.com',
            'password' => Hash::make('admin123'),
        ]);
        $admin->assignRole('Admin');

        // Crear usuario normal
        $usuario = User::create([
            'name' => 'Usuario Test',
            'email' => 'usuario@sistema.com',
            'password' => Hash::make('usuario123'),
        ]);
        $usuario->assignRole('Usuario');
    }
}
