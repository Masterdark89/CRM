<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;

class RoleController extends Controller
{
    /**
     * Muestra el panel de administración de roles y usuarios
     */
    public function index()
    {
        $users = User::with('roles')->paginate(15);
        $roles = Role::with('permissions')->get();
        $permissions = Permission::all();
        
        return view('admin.roles.index', compact('users', 'roles', 'permissions'));
    }

    /**
     * Vista para gestionar usuarios
     */
    public function users()
    {
        $users = User::with('roles')->paginate(15);
        $roles = Role::all();
        
        return view('admin.roles.users', compact('users', 'roles'));
    }

    /**
     * Asignar rol a un usuario
     */
    public function assignRole(Request $request, User $user)
    {
        $request->validate([
            'role' => 'required|exists:roles,name'
        ]);

        $user->syncRoles([$request->role]);

        return redirect()->back()->with('success', "Rol '{$request->role}' asignado a {$user->name}");
    }

    /**
     * Vista para gestionar roles
     */
    public function roles()
    {
        $roles = Role::with('permissions')->get();
        $permissions = Permission::all();
        
        return view('admin.roles.roles', compact('roles', 'permissions'));
    }

    /**
     * Crear un nuevo rol
     */
    public function storeRole(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:roles,name|max:255',
            'permissions' => 'array',
            'permissions.*' => 'exists:permissions,name'
        ]);

        $role = Role::create(['name' => $request->name]);

        if ($request->has('permissions')) {
            $role->givePermissionTo($request->permissions);
        }

        return redirect()->route('admin.roles.roles')->with('success', "Rol '{$request->name}' creado exitosamente");
    }

    /**
     * Actualizar permisos de un rol
     */
    public function updateRolePermissions(Request $request, Role $role)
    {
        $request->validate([
            'permissions' => 'array',
            'permissions.*' => 'exists:permissions,name'
        ]);

        $role->syncPermissions($request->permissions ?? []);

        return redirect()->back()->with('success', "Permisos del rol '{$role->name}' actualizados");
    }

    /**
     * Eliminar un rol
     */
    public function destroyRole(Role $role)
    {
        if (in_array($role->name, ['Admin', 'Usuario'])) {
            return redirect()->back()->with('error', 'No se pueden eliminar los roles predeterminados');
        }

        $role->delete();

        return redirect()->route('admin.roles.roles')->with('success', "Rol '{$role->name}' eliminado");
    }

    /**
     * Crear nuevo usuario con rol
     */
    public function storeUser(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|exists:roles,name'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user->assignRole($request->role);

        return redirect()->route('admin.roles.users')->with('success', "Usuario '{$user->name}' creado con rol '{$request->role}'");
    }

    /**
     * Eliminar usuario
     */
    public function destroyUser(User $user)
    {
        // Prevenir eliminar el usuario admin principal
        if ($user->email === 'admin@sistema.com') {
            return redirect()->back()->with('error', 'No se puede eliminar el usuario administrador principal');
        }

        $userName = $user->name;
        $user->delete();

        return redirect()->route('admin.roles.users')->with('success', "Usuario '{$userName}' eliminado");
    }
}
