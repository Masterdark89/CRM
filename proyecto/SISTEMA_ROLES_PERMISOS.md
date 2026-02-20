# Sistema de Roles y Permisos

Este documento explica cómo funciona el sistema de roles y permisos implementado en la aplicación.

## Tabla de Contenidos

1. [Introducción](#introducción)
2. [Roles Predeterminados](#roles-predeterminados)
3. [Permisos Disponibles](#permisos-disponibles)
4. [Gestión desde la Interfaz](#gestión-desde-la-interfaz)
5. [Uso en Código](#uso-en-código)
6. [Usuarios de Prueba](#usuarios-de-prueba)

---

## Introducción

El sistema utiliza el paquete **spatie/laravel-permission** para gestionar roles y permisos. Esto permite:

- ✅ Crear roles personalizados (Admin, Usuario, Supervisor, etc.)
- ✅ Asignar permisos específicos a cada rol
- ✅ Controlar acceso a vistas y funcionalidades según el rol del usuario
- ✅ Administrar usuarios y sus roles desde una interfaz visual

---

## Roles Predeterminados

### 1. Admin (Administrador)
- **Permisos**: Todos los permisos del sistema
- **Acceso especial**: Panel de administración de roles y usuarios
- **Capacidades**:
  - Ver, crear, editar y eliminar todos los recursos
  - Gestionar usuarios, roles y permisos
  - Restaurar elementos eliminados

### 2. Usuario (Usuario Estándar)
- **Permisos**: Ver, crear y editar (sin eliminar)
- **Capacidades**:
  - Ver, crear y editar clientes, productos, empleados, facturas, proveedores e incidencias
  - **NO puede eliminar** ningún recurso
  - **NO tiene acceso** al panel de administración

---

## Permisos Disponibles

El sistema incluye permisos granulares para cada módulo:

### Artículos
- `ver-articulos` - Ver listado y detalles de artículos
- `crear-articulos` - Crear nuevos artículos
- `editar-articulos` - Editar artículos existentes
- `eliminar-articulos` - Eliminar artículos

### Clientes
- `ver-clientes` - Ver listado y detalles de clientes
- `crear-clientes` - Crear nuevos clientes
- `editar-clientes` - Editar clientes existentes
- `eliminar-clientes` - Eliminar/restaurar clientes

### Contactos
- `ver-contactos` - Ver listado y detalles de contactos
- `crear-contactos` - Crear nuevos contactos
- `editar-contactos` - Editar contactos existentes
- `eliminar-contactos` - Eliminar contactos

### Productos
- `ver-productos`
- `crear-productos`
- `editar-productos`
- `eliminar-productos`

### Empleados
- `ver-empleados`
- `crear-empleados`
- `editar-empleados`
- `eliminar-empleados`

### Facturas
- `ver-facturas`
- `crear-facturas`
- `editar-facturas`
- `eliminar-facturas`

### Proveedores
- `ver-proveedores`
- `crear-proveedores`
- `editar-proveedores`
- `eliminar-proveedores`

### Incidencias
- `ver-incidencias`
- `crear-incidencias`
- `editar-incidencias`
- `eliminar-incidencias`

### Personal
- `ver-personal` - Ver listado y detalles de personal
- `crear-personal` - Crear nuevos registros de personal
- `editar-personal` - Editar personal existente
- `eliminar-personal` - Eliminar personal

### Stock
- `ver-stock` - Ver listado e detalles de inventario
- `crear-stock` - Crear nuevos ítems de stock
- `editar-stock` - Editar ítems de stock existentes
- `eliminar-stock` - Eliminar ítems de stock

---

## Gestión desde la Interfaz

### Acceder al Panel de Administración

1. Inicia sesión como **Admin** (admin@sistema.com / admin123)
2. En el menú superior, haz clic en **"Administración"**
3. Verás el panel con dos opciones principales:

#### Gestión de Usuarios

**Ruta**: `/admin/roles/users`

Permite:
- ✅ Ver lista de todos los usuarios
- ✅ Crear nuevos usuarios con contraseña
- ✅ Asignar/cambiar rol de cada usuario
- ✅ Eliminar usuarios (excepto el admin principal)

**Crear nuevo usuario**:
1. Clic en "Nuevo Usuario"
2. Rellenar:
   - Nombre
   - Email
   - Contraseña (mínimo 8 caracteres)
   - Confirmar contraseña
   - Seleccionar rol
3. Guardar

**Cambiar rol de un usuario**:
1. En la lista de usuarios, seleccionar el rol en el desplegable
2. Clic en el icono de guardar
3. El usuario tendrá los permisos del nuevo rol inmediatamente

#### Gestión de Roles

**Ruta**: `/admin/roles/roles`

Permite:
- ✅ Ver todos los roles existentes
- ✅ Crear nuevos roles personalizados
- ✅ Asignar/quitar permisos a cada rol
- ✅ Eliminar roles personalizados (no se pueden eliminar Admin y Usuario)

**Crear nuevo rol**:
1. Clic en "Nuevo Rol"
2. Ingresar nombre del rol (ej: "Supervisor", "Gerente", "Auditor")
3. Seleccionar los permisos que tendrá este rol
4. Guardar

**Modificar permisos de un rol**:
1. En la tarjeta del rol, marcar/desmarcar los permisos deseados
2. Clic en "Guardar Permisos"
3. Los usuarios con ese rol tendrán los nuevos permisos inmediatamente

---

## Uso en Código

### En Vistas (Blade)

#### Verificar un permiso específico:
```blade
@can('crear-clientes')
    <a href="{{ route('clientes.create') }}" class="btn btn-primary">Nuevo Cliente</a>
@endcan
```

#### Verificar un rol:
```blade
@role('Admin')
    <a href="{{ route('admin.roles.index') }}">Panel de Administración</a>
@endrole
```

#### Verificar cualquiera de varios roles:
```blade
@hasanyrole('Admin|Supervisor')
    <button class="btn btn-danger">Eliminar</button>
@endhasanyrole
```

### En Controladores

#### Verificar permiso en método:
```php
public function destroy($id)
{
    if (!auth()->user()->can('eliminar-clientes')) {
        abort(403, 'No tienes permiso para eliminar clientes');
    }
    
    // Código para eliminar...
}
```

#### Middleware en rutas:
```php
Route::middleware(['permission:crear-clientes'])->group(function () {
    Route::post('/clientes', [ClientesController::class, 'store']);
});
```

#### Middleware de rol:
```php
Route::middleware(['role:Admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard']);
});
```

### En Código PHP

#### Verificar si un usuario tiene un permiso:
```php
if (auth()->user()->can('editar-productos')) {
    // Código...
}
```

#### Verificar si un usuario tiene un rol:
```php
if (auth()->user()->hasRole('Admin')) {
    // Código...
}
```

#### Asignar un rol a un usuario:
```php
$user = User::find(1);
$user->assignRole('Admin');
```

#### Dar un permiso directamente a un usuario:
```php
$user->givePermissionTo('eliminar-clientes');
```

#### Crear un nuevo rol con permisos:
```php
$role = Role::create(['name' => 'Supervisor']);
$role->givePermissionTo(['ver-clientes', 'editar-clientes']);
```

---

## Usuarios de Prueba

El sistema incluye dos usuarios de prueba creados automáticamente:

### Usuario Administrador
- **Email**: admin@sistema.com
- **Contraseña**: admin123
- **Rol**: Admin
- **Permisos**: Todos

### Usuario Estándar
- **Email**: usuario@sistema.com
- **Contraseña**: usuario123
- **Rol**: Usuario
- **Permisos**: Ver, crear y editar (sin eliminar)

---

## Comandos Útiles

### Ejecutar el seeder de roles y permisos:
```bash
php artisan db:seed --class=RolesAndPermissionsSeeder
```

### Limpiar caché de permisos:
```bash
php artisan permission:cache-reset
```

### Ver todos los roles y permisos (desde Tinker):
```bash
php artisan tinker

# Ver todos los roles
Role::with('permissions')->get();

# Ver todos los permisos
Permission::all();

# Ver roles de un usuario
User::find(1)->roles;

# Ver permisos de un usuario (directos + heredados de roles)
User::find(1)->getAllPermissions();
```

---

## Notas Importantes

⚠️ **Seguridad**:
- El usuario admin@sistema.com está protegido y no se puede eliminar
- Los roles "Admin" y "Usuario" son predeterminados y no se pueden eliminar
- Solo los usuarios con rol "Admin" pueden acceder al panel de administración

💡 **Mejores Prácticas**:
- Asigna permisos a roles, no directamente a usuarios
- Usa nombres descriptivos para roles personalizados
- Revisa periódicamente los permisos de cada rol
- Documenta los roles personalizados que crees

🔄 **Caché**:
- Los permisos se cachean automáticamente
- Si haces cambios desde código/base de datos, ejecuta `php artisan permission:cache-reset`
- Los cambios desde la interfaz web se aplican inmediatamente

---

## Soporte

Si encuentras algún problema o necesitas ayuda adicional:
1. Revisa los logs en `storage/logs/laravel.log`
2. Consulta la documentación oficial: https://spatie.be/docs/laravel-permission
3. Contacta al equipo de desarrollo

---

**Fecha de última actualización**: {{ date('Y-m-d') }}
