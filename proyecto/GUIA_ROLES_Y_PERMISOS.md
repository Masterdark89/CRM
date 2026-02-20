# Guía de Roles y Permisos

## Sistema de Roles Implementado

El sistema ahora cuenta con un sistema completo de roles y permisos utilizando el paquete **Spatie Laravel Permission**.

## Roles Disponibles

### 1. Administrador (Admin)
- **Permisos**: Acceso completo a todas las funcionalidades
- **Puede**:
  - Ver todos los registros
  - Crear nuevos registros
  - Editar registros existentes
  - **Eliminar registros** (permiso exclusivo)
  - Restaurar registros eliminados
  - Eliminar permanentemente

### 2. Usuario
- **Permisos**: Acceso limitado
- **Puede**:
  - Ver todos los registros
  - Crear nuevos registros
  - Editar registros existentes
- **NO puede**:
  - Eliminar registros
  - Restaurar registros
  - Eliminar permanentemente

## Usuarios de Prueba Creados

Al ejecutar el seeder `RolesAndPermissionsSeeder`, se crean automáticamente dos usuarios:

### Usuario Admin
```
Email: admin@sistema.com
Contraseña: admin123
Rol: Admin
```

### Usuario Normal
```
Email: usuario@sistema.com
Contraseña: usuario123
Rol: Usuario
```

## Cómo Probar el Sistema de Permisos

1. **Iniciar sesión como Admin**:
   - Ve a http://localhost:8000/login
   - Email: `admin@sistema.com`
   - Contraseña: `admin123`
   - Verás todos los botones incluyendo "Eliminar"

2. **Cerrar sesión e iniciar como Usuario**:
   - Cierra sesión
   - Inicia sesión con: `usuario@sistema.com` / `usuario123`
   - Verás que el botón "Eliminar" NO aparece
   - Solo podrás Ver, Crear y Editar

## Permisos por Módulo

El sistema incluye permisos para los siguientes módulos:

### Artículos
- `ver-articulos`
- `crear-articulos`
- `editar-articulos`
- `eliminar-articulos` (solo Admin)

### Clientes
- `ver-clientes`
- `crear-clientes`
- `editar-clientes`
- `eliminar-clientes` (solo Admin)

### Contactos
- `ver-contactos`
- `crear-contactos`
- `editar-contactos`
- `eliminar-contactos` (solo Admin)

### Productos
- `ver-productos`
- `crear-productos`
- `editar-productos`
- `eliminar-productos` (solo Admin)

### Empleados
- `ver-empleados`
- `crear-empleados`
- `editar-empleados`
- `eliminar-empleados` (solo Admin)

### Facturas
- `ver-facturas`
- `crear-facturas`
- `editar-facturas`
- `eliminar-facturas` (solo Admin)

### Proveedores
- `ver-proveedores`
- `crear-proveedores`
- `editar-proveedores`
- `eliminar-proveedores` (solo Admin)

### Incidencias
- `ver-incidencias`
- `crear-incidencias`
- `editar-incidencias`
- `eliminar-incidencias` (solo Admin)

### Personal
- `ver-personal`
- `crear-personal`
- `editar-personal`
- `eliminar-personal` (solo Admin)

### Stock
- `ver-stock`
- `crear-stock`
- `editar-stock`
- `eliminar-stock` (solo Admin)

## Control de Permisos en las Vistas

El control de permisos se implementa usando la directiva `@can` de Laravel:

```blade
@can('crear-clientes')
    <a href="{{ route('clientes.create') }}" class="btn btn-pink">
        Nuevo cliente
    </a>
@endcan

@can('eliminar-clientes')
    <button class="btn btn-danger">
        Eliminar
    </button>
@endcan
```

## Asignar Roles a Nuevos Usuarios

Si necesitas asignar roles a usuarios existentes o nuevos:

```php
use App\Models\User;

// Obtener usuario
$usuario = User::find(1);

// Asignar rol
$usuario->assignRole('Admin');
// o
$usuario->assignRole('Usuario');

// Verificar si tiene un rol
if ($usuario->hasRole('Admin')) {
    // Hacer algo
}

// Verificar si tiene un permiso específico
if ($usuario->can('eliminar-clientes')) {
    // Hacer algo
}
```

## Ejecutar el Seeder

Si necesitas crear los roles y usuarios de prueba, ejecuta:

```bash
php artisan db:seed --class=RolesAndPermissionsSeeder
```

**NOTA**: Si los usuarios ya existen, primero elimínalos o modifica el seeder para evitar duplicados.

## Gestión de Archivos Implementada

### Subida de Imágenes
- **Clientes**: Pueden tener una foto de perfil
- **Productos**: Pueden tener una imagen del producto
- Formatos permitidos: JPG, PNG, GIF
- Tamaño máximo: 2MB

### Subida de Archivos PDF
- **Productos**: Pueden tener un PDF adjunto (ficha técnica, manual, etc.)
- Formato permitido: PDF
- Tamaño máximo: 5MB

Los archivos se almacenan en:
- Imágenes de clientes: `public/uploads/clientes/`
- Imágenes de productos: `public/uploads/productos/`
- PDFs de productos: `public/uploads/productos/pdfs/`

## DataTables Implementado

Las vistas de **Clientes** y **Productos** ahora utilizan DataTables con:
- Búsqueda en tiempo real
- Ordenamiento por columnas
- Paginación avanzada
- Diseño responsive
- Idioma en español

## Próximos Pasos

1. Puedes crear más roles según necesites
2. Puedes asignar permisos personalizados a cada rol
3. Puedes crear nuevos permisos específicos para funcionalidades futuras

---

**Fecha de implementación**: 20 de febrero de 2026
