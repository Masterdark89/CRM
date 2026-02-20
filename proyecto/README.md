# Sistema de Gestión Empresarial

Un sistema integral desarrollado con **Laravel** y **AdminLTE** para la gestión completa de clientes, facturas, empleados, productos, proveedores e incidencias.

## Descripción del Proyecto

Este proyecto es una aplicación web moderna diseñada para empresas que necesitan gestionar:

- **Clientes**: Registro y seguimiento de información de clientes
- **Empleados**: Gestión del personal y datos de empleados
- **Productos**: Catálogo y administración de productos
- **Proveedores**: Base de datos de proveedores y sus datos
- **Facturas**: Generación y seguimiento de facturas
- **Incidencias**: Registro y resolución de incidencias
- **Artículos**: Gestión de artículos y publicaciones
- **Contactos**: Gestión de contactos y compañías
- **Personal**: Lista de empleados y colaboradores
- **Stock**: Gestión de inventario en formato SKU
- **Usuarios**: Autenticación y gestión de usuarios del sistema

## Requisitos Previos

- **PHP** >= 8.1
- **Composer**
- **Node.js** y **npm**
- **MySQL** o **MariaDB**
- **XAMPP** (recomendado para desarrollo local)

## Características Principales

✨ Interfaz intuitiva con **AdminLTE**  
📊 Gestión completa de datos empresariales  
🔐 Sistema de autenticación seguro  
🛡️ **Sistema de Roles y Permisos Avanzado** (Admin / Usuario + roles personalizados)  
👥 **Panel de Administración** para gestionar usuarios y roles  
🔑 **Crear múltiples administradores** desde la interfaz  
📸 **Subida de imágenes** para clientes y productos  
📄 **Gestión de archivos PDF** para productos  
📋 **DataTables** con búsqueda, ordenamiento y paginación avanzada  
🗄️ Base de datos relacional optimizada  
📱 Diseño responsive  
⚙️ Seeders y factories para datos de prueba  
🧪 Configuración lista para PHPUnit

## Instalación

### 1. Clonar o descargar el proyecto

```bash
cd c:\xampp\htdocs\proyecto
```

### 2. Instalar dependencias de PHP

```bash
composer install
```

### 3. Instalar dependencias de Node.js

```bash
npm install
```

### 4. Configurar el archivo de entorno

```bash
cp .env.example .env
```

Actualiza los datos de conexión a la base de datos en el archivo `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nombre_base_datos
DB_USERNAME=root
DB_PASSWORD=
```

### 5. Generar clave de aplicación

```bash
php artisan key:generate
```

### 6. Ejecutar migraciones

```bash
php artisan migrate
```

### 7. Ejecutar seeders (datos de prueba)

```bash
php artisan db:seed
```

**IMPORTANTE**: Esto creará usuarios de prueba con roles:
- **Admin**: admin@sistema.com / admin123 (Acceso completo)
- **Usuario**: usuario@sistema.com / usuario123 (Solo ver, crear y editar)

### 8. Construir assets (CSS/JS)

```bash
npm run dev
```

Para producción:

```bash
npm run build
```

## Estructura del Proyecto

```
proyecto/
├── app/
│   ├── Http/
│   │   ├── Controllers/      # Controladores de la aplicación
│   │   └── Requests/         # Form Requests personalizados
│   ├── Models/               # Modelos Eloquent
│   │   ├── Articulo.php
│   │   ├── Clientes.php
│   │   ├── Contacto.php
│   │   ├── Empleado.php
│   │   ├── Factura.php
│   │   ├── Incidencia.php
│   │   ├── Personal.php
│   │   ├── Producto.php
│   │   ├── Proveedor.php
│   │   ├── StockItem.php
│   │   └── User.php
│   └── Providers/            # Service Providers
├── database/
│   ├── migrations/           # Migraciones de base de datos
│   ├── factories/            # Factories para testing
│   └── seeders/              # Seeders para datos iniciales
├── resources/
│   ├── views/                # Vistas Blade
│   ├── css/                  # Estilos CSS
│   └── js/                   # Scripts JavaScript
├── routes/
│   ├── web.php              # Rutas web
│   └── console.php          # Comandos de consola
├── tests/                    # Tests automatizados
│   ├── Feature/
│   └── Unit/
├── config/                   # Archivos de configuración
├── storage/                  # Almacenamiento de logs y archivos
└── vendor/                   # Dependencias de Composer
```

## Modelos y Relaciones

### Artículos
Gestión de artículos y publicaciones con precio y disponibilidad.

### Clientes
Gestiona la información de los clientes principales de la empresa.

### Contactos
Registra información de contactos y compañías asociadas.

### Empleados
Registra datos de los empleados y su información personal.

### Productos
Catalogo de productos disponibles con detalles.

### Proveedores
Base de datos de proveedores y sus datos de contacto.

### Facturas
Genera y almacena facturas asociadas a clientes y productos.

### Incidencias
Registro de problemas, tickets y seguimiento de incidencias.

### Personal
Lista de empleados y colaboradores con cargos y información de contacto.

### Stock
Gestión de inventario en formato SKU con ubicaciones y cantidades.

### Usuarios
Sistema de autenticación con roles y permisos.

## Comandos Útiles

### Desarrollo

Iniciar servidor de desarrollo:
```bash
php artisan serve
```

Compilar assets en modo observación:
```bash
npm run dev
```

### Base de Datos

Ejecutar todas las migraciones:
```bash
php artisan migrate
```

Revertir la última migración:
```bash
php artisan migrate:rollback
```

Ejecutar seeders:
```bash
php artisan db:seed
```

Resetear base de datos (CUIDADO - borra todos los datos):
```bash
php artisan migrate:fresh --seed
```

### Tests

Ejecutar pruebas:
```bash
php artisan test
```

Ejecutar con reporte de cobertura:
```bash
php artisan test --coverage
```

## Acceso a la Aplicación

Una vez instalada y ejecutada, accede a:

### Credenciales de Acceso

**Usuario Administrador** (acceso total + panel de administración):
- Email: `admin@sistema.com`
- Contraseña: `admin123`

**Usuario Normal** (solo puede ver, crear y editar):
- Email: `usuario@sistema.com`
- Contraseña: `usuario123`

## Sistema de Roles y Permisos

El sistema implementa un **sistema de roles y permisos avanzado** con interfaz de administración:

### 👑 Admin
- Puede **ver, crear, editar y ELIMINAR** todos los registros
- Acceso completo al sistema
- Puede restaurar y eliminar permanentemente
- **Acceso al Panel de Administración** (`/admin/roles`)
- **Puede crear nuevos usuarios** con cualquier rol
- **Puede convertir otros usuarios en administradores**
- **Puede crear roles personalizados** con permisos específicos

### 👤 Usuario
- Puede **ver, crear y editar** registros
- **NO puede eliminar** nada
- **NO tiene acceso** al panel de administración

### 🛡️ Panel de Administración (Solo Admin)

Los administradores tienen acceso a un panel especial en `/admin/roles` con:

#### Gestión de Usuarios
- Ver lista completa de usuarios del sistema
- Crear nuevos usuarios con contraseña
- **Asignar cualquier rol a cualquier usuario** (incluido Admin)
- Cambiar roles de usuarios existentes
- Eliminar usuarios (excepto admin principal protegido)

#### Gestión de Roles
- Ver todos los roles y sus permisos
- Crear nuevos roles personalizados (ej: Supervisor, Gerente, Auditor)
- Asignar/quitar permisos específicos a cada rol
- Eliminar roles personalizados (Admin y Usuario están protegidos)

#### Permisos Granulares
Cada módulo tiene 4 permisos:
- `ver-[modulo]` - Ver listado y detalles
- `crear-[modulo]` - Crear nuevos registros
- `editar-[modulo]` - Modificar registros existentes
- `eliminar-[modulo]` - Eliminar/restaurar registros

**Módulos disponibles**: clientes, productos, empleados, facturas, proveedores, incidencias

📖 **Guía completa**: Ver [COMO_HACER_ADMIN.md](COMO_HACER_ADMIN.md) para instrucciones paso a paso

---

## 📚 Guía Práctica para Estudiantes: ¿Cómo funciona todo esto?

> *Explicación paso a paso de lo que hemos construido, con un lenguaje sencillo y ejemplos prácticos*

### ¿Qué problema resolvemos?

Imagina que tienes una aplicación donde varios usuarios pueden entrar, pero no quieres que todos puedan hacer lo mismo. Por ejemplo:
- El **jefe** puede crear, editar y **eliminar** clientes
- Un **empleado** puede ver y editar clientes, pero **NO eliminarlos** (para evitar borrados accidentales)
- Un **becario** solo puede **ver** información, sin poder cambiar nada

Para esto necesitamos un **sistema de roles y permisos**. Es como tener diferentes "niveles de acceso" en un videojuego.

### Los 3 conceptos clave

#### 1. **Usuario** 👤
Es una persona que puede entrar a la aplicación (con email y contraseña).
```php
Ejemplo: juan@empresa.com con contraseña "12345678"
```

#### 2. **Rol** 🎭
Es un "puesto" o "nivel" que le asignas a un usuario. 
```
Rol = "Admin"          (El jefe)
Rol = "Usuario"        (Empleado normal)
Rol = "Supervisor"     (Mando intermedio)
```

#### 3. **Permiso** 🔑
Es una acción específica que alguien puede hacer.
```
Permiso = "ver-clientes"       → Puede ver la lista
Permiso = "crear-clientes"     → Puede añadir nuevos
Permiso = "eliminar-clientes"  → Puede borrar
```

### ¿Cómo lo conectamos todo?

```
Usuario "Juan" → tiene el → Rol "Admin" → que tiene los → Permisos para TODO
Usuario "Ana"  → tiene el → Rol "Usuario" → que tiene → Permisos solo para ver/crear/editar
```

### Paso a paso: ¿Cómo lo hemos construido?

#### PASO 1: Instalamos el paquete Spatie
```bash
composer require spatie/laravel-permission
```
Este paquete nos da todo lo necesario para manejar roles y permisos. Es como instalar un "mod" que añade esta funcionalidad.

#### PASO 2: Creamos las tablas en la base de datos
```bash
php artisan migrate
```
Esto crea varias tablas:
- `users` → Nuestros usuarios (Juan, Ana, Pedro...)
- `roles` → Los roles disponibles (Admin, Usuario, Supervisor...)
- `permissions` → Los permisos disponibles (ver-clientes, crear-productos...)
- `model_has_roles` → Conecta usuarios con sus roles
- `role_has_permissions` → Conecta roles con sus permisos

**Piénsalo como Excel**: Cada tabla es una hoja con sus columnas y filas.

#### PASO 3: Creamos roles y permisos iniciales
```bash
php artisan db:seed --class=RolesAndPermissionsSeeder
```

Este comando ejecuta un "seeder" que:

**A) Crea los permisos** (24 en total: 4 por cada módulo)
```php
'ver-clientes', 'crear-clientes', 'editar-clientes', 'eliminar-clientes'
'ver-productos', 'crear-productos', 'editar-productos', 'eliminar-productos'
// ... y así para empleados, facturas, proveedores, incidencias
```

**B) Crea 2 roles**
- **Admin**: Con TODOS los permisos (24/24)
- **Usuario**: Con permisos limitados (18/24 - NO puede eliminar nada)

**C) Crea 2 usuarios de prueba**
- `admin@sistema.com` → Rol: Admin
- `usuario@sistema.com` → Rol: Usuario

#### PASO 4: Protegemos las vistas con permisos

En las vistas Blade, usamos directivas para mostrar/ocultar botones:

**Antes** (sin permisos):
```blade
<!-- El botón eliminar aparecía para TODOS -->
<button>Eliminar</button>
```

**Después** (con permisos):
```blade
@can('eliminar-clientes')
    <!-- Este botón SOLO aparece si el usuario tiene el permiso -->
    <button>Eliminar</button>
@endcan
```

**¿Qué pasa en cada caso?**

Si entras como **Admin** (tiene permiso "eliminar-clientes"):
- ✅ Ve el botón "Eliminar"

Si entras como **Usuario** (NO tiene ese permiso):
- ❌ NO ve el botón "Eliminar"

Es como si el botón fuera invisible para él.

#### PASO 5: Creamos el Panel de Administración

Hemos construido una interfaz visual en `/admin/roles` donde el Admin puede:

**A) Gestionar Usuarios** (`/admin/roles/users`)
```
┌─────────────────────────────────────────────┐
│ Usuarios                                     │
├─────────────────────────────────────────────┤
│ Juan Pérez    juan@empresa.com    [Admin ▼] │  ← Desplegable para cambiar rol
│ Ana López     ana@empresa.com     [Usuario ▼]│
│ [+ Nuevo Usuario]                            │
└─────────────────────────────────────────────┘
```

**B) Gestionar Roles** (`/admin/roles/roles`)
```
┌─────────────────────────────────────────────┐
│ Rol: Admin                                   │
├─────────────────────────────────────────────┤
│ Permisos:                                    │
│ [✓] ver-clientes      [✓] crear-clientes    │
│ [✓] editar-clientes   [✓] eliminar-clientes │
│ [✓] ver-productos     [✓] crear-productos   │
│ ... (marcar/desmarcar permisos)              │
│ [Guardar Permisos]                           │
└─────────────────────────────────────────────┘
```

### Ejemplos prácticos de uso

#### Ejemplo 1: Crear un usuario normal
1. Login como `admin@sistema.com`
2. Ir a **Administración → Gestionar Usuarios**
3. Clic en **"Nuevo Usuario"**
4. Rellenar:
   - Nombre: `María García`
   - Email: `maria@empresa.com`
   - Contraseña: `12345678`
   - Rol: `Usuario`
5. Guardar
6. María ya puede entrar, pero NO verá botones de eliminar

#### Ejemplo 2: Convertir a María en Admin
1. En la lista de usuarios, buscar a María
2. En su fila, abrir el desplegable de "Cambiar Rol"
3. Seleccionar `Admin`
4. Clic en guardar 💾
5. ¡Listo! María ahora tiene acceso total

#### Ejemplo 3: Crear un rol personalizado "Supervisor"
1. Ir a **Administración → Gestionar Roles**
2. Clic en **"Nuevo Rol"**
3. Nombre: `Supervisor`
4. Seleccionar permisos:
   - ✅ Todos los de "ver" (ver-clientes, ver-productos...)
   - ✅ Todos los de "crear" 
   - ✅ Todos los de "editar"
   - ✅ Algunos de "eliminar" (solo productos e incidencias)
   - ❌ NO puede eliminar clientes, empleados ni facturas
5. Guardar
6. Ahora puedes asignar el rol "Supervisor" a cualquier usuario

### ¿Cómo funciona por debajo? (Para los curiosos)

#### En el código PHP del controlador:
```php
// Verificar si el usuario actual tiene un permiso
if (auth()->user()->can('eliminar-clientes')) {
    // Código para eliminar...
}
```

#### En las vistas Blade:
```blade
@can('crear-productos')
    <a href="/productos/create">Nuevo Producto</a>
@endcan

@role('Admin')
    <a href="/admin">Panel de Administración</a>
@endrole
```

#### En las rutas (middleware):
```php
// Solo usuarios con rol Admin pueden acceder
Route::middleware(['role:Admin'])->group(function () {
    Route::get('/admin/roles', [RoleController::class, 'index']);
});
```

### Ventajas de este sistema

✅ **Seguridad**: Los usuarios solo ven lo que pueden hacer
✅ **Flexibilidad**: Puedes crear roles personalizados (Supervisor, Gerente, Auditor...)
✅ **Escalabilidad**: Fácil añadir nuevos permisos
✅ **Mantenible**: Todo centralizado en el panel de administración
✅ **Sin código duro**: No hace falta programar para cambiar permisos

### Archivos importantes que hemos creado/modificado

```
📁 proyecto/
├── 📄 app/Http/Controllers/RoleController.php    ← Controlador del panel admin
├── 📄 app/Models/User.php                         ← Añadimos HasRoles trait
├── 📁 resources/views/admin/roles/
│   ├── 📄 index.blade.php                         ← Panel principal
│   ├── 📄 users.blade.php                         ← Gestión de usuarios
│   └── 📄 roles.blade.php                         ← Gestión de roles
├── 📁 database/seeders/
│   └── 📄 RolesAndPermissionsSeeder.php          ← Crea roles y permisos
├── 📄 routes/web.php                              ← Rutas del panel (protegidas)
├── 📄 COMO_HACER_ADMIN.md                         ← Guía para crear admins
└── 📄 SISTEMA_ROLES_PERMISOS.md                   ← Documentación técnica
```

### Comandos útiles para probar

```bash
# Ver permisos de un usuario
php artisan tinker
>>> User::find(1)->getAllPermissions()->pluck('name')

# Ver roles de un usuario
>>> User::find(1)->roles

# Asignar rol manualmente
>>> User::find(2)->assignRole('Admin')

# Ver usuarios con rol Admin
>>> User::role('Admin')->get()

# Limpiar caché de permisos (si haces cambios manuales)
>>> php artisan permission:cache-reset
```

### Tareas típicas que puedes hacer ahora

1. **Crear un nuevo rol "Contable"** que solo pueda gestionar facturas
2. **Crear usuarios temporales** con rol "Usuario" para pruebas
3. **Promover usuarios a Admin** cuando sea necesario
4. **Quitar permisos de eliminación** a roles específicos
5. **Crear roles por departamento** (Ventas, Almacén, RRHH...)

### ¿Y si algo no funciona?

**Problema**: El botón no aparece/desaparece
```bash
# Solución 1: Limpiar caché
php artisan cache:clear
php artisan view:clear

# Solución 2: Verificar permisos en BD
php artisan tinker
>>> User::find(1)->can('nombre-permiso')  // debe devolver true o false
```

**Problema**: Error "Permission does not exist"
```bash
# Ejecutar el seeder de nuevo
php artisan db:seed --class=RolesAndPermissionsSeeder
```

**Problema**: No puedo acceder al panel de admin
```bash
# Verificar que tu usuario tiene rol Admin
php artisan tinker
>>> User::where('email', 'tu@email.com')->first()->assignRole('Admin')
```

### Para seguir aprendiendo

📖 Documentación completa de Spatie: https://spatie.be/docs/laravel-permission
📖 Guías específicas:
- [COMO_HACER_ADMIN.md](COMO_HACER_ADMIN.md) - Tutorial paso a paso
- [SISTEMA_ROLES_PERMISOS.md](SISTEMA_ROLES_PERMISOS.md) - Referencia técnica

---

## DataTables

Las vistas de **Clientes** y **Productos** incluyen **DataTables** para una mejor experiencia de usuario:

- 🔍 **Búsqueda en tiempo real**: Filtra resultados instantáneamente
- 📊 **Ordenamiento por columnas**: Click en cualquier columna para ordenar
- 📄 **Paginación avanzada**: Navegación mejorada entre páginas
- 📱 **Diseño responsive**: Se adapta a cualquier tamaño de pantalla
- 🌐 **Idioma español**: Interfaz completamente traducida

Las tablas se inicializan automáticamente con configuración optimizada.

## Gestión de Archivos

### Subida de Imágenes

**Clientes y Productos** pueden tener imágenes asociadas:
- Formatos permitidos: JPG, PNG, GIF
- Tamaño máximo: 2MB
- Las imágenes se muestran en listados y vistas de detalle
- Al actualizar, la imagen anterior se reemplaza automáticamente

**Ubicación de almacenamiento**:
- Clientes: `public/uploads/clientes/`
- Productos: `public/uploads/productos/`

### Subida de Archivos PDF

**Productos** pueden tener archivos PDF adjuntos (fichas técnicas, manuales):
- Formato permitido: PDF
- Tamaño máximo: 5MB
- Los PDFs se pueden descargar/visualizar desde la lista de productos
- Al actualizar, el PDF anterior se reemplaza automáticamente

**Ubicación de almacenamiento**:
- PDFs de productos: `public/uploads/productos/pdfs/`

### Ejemplo de Uso en Formularios

Los formularios de creación/edición incluyen campos para subir archivos:

```html
<input type="file" name="imagen" accept="image/*">
<input type="file" name="archivo_pdf" accept=".pdf">
```

Las validaciones están configuradas en los Form Requests.itar** registros
- **NO puede eliminar** registros
- Acceso limitado al sistema

Los permisos se controlan automáticamente en las vistas. Los botones de eliminación solo aparecen para usuarios con rol Admin.

Para más información sobre roles y permisos, consulta: **[GUIA_ROLES_Y_PERMISOS.md](GUIA_ROLES_Y_PERMISOS.md)**
http://localhost:8000
```

Usa las credenciales del usuario creado en los seeders para iniciar sesión.

## Configuración AdminLTE

La configuración de AdminLTE se encuentra en:
```
config/adminlte.php
```

Personaliza aquí la apariencia del dashboard y menús.

Características incluidas:
- Dashboard personalizado
- Menús laterales dinámicos
- Widgets y gráficos
- Tema responsive para todos los dispositivos
- Autenticación integrada

## Variables de Entorno Detalladas

Asegúrate de configurar todas estas variables en tu archivo `.env`:

```env
# Aplicación
APP_NAME="Sistema Gestión Empresarial"
APP_ENV=local
APP_DEBUG=true
APP_URL=http://localhost:8000

# Base de Datos
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=proyecto
DB_USERNAME=root
DB_PASSWORD=

# Cache y Sesión
CACHE_DRIVER=file
SESSION_DRIVER=file

# Mail (opcional)
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=465
MAIL_USERNAME=
MAIL_PASSWORD=

# AdminLTE
ADMIN_LTE_LOGO_MINI=<b>SG</b>
ADMIN_LTE_LOGO_LARGE=<b>Sistema</b> Gestión
```

## Migraciones y Base de Datos

El proyecto incluye las siguientes migraciones:

| Migración | Descripción |
|-----------|-------------|
| `create_users_table` | Tabla de usuarios del sistema |
| `create_clientes_table_if_not_exists` | Información de clientes |
| `create_empleados_table` | Datos de empleados |
| `create_productos_table` | Catálogo de productos |
| `create_proveedors_table` | Base de proveedores |
| `create_facturas_table` | Registro de facturas |
| `create_incidencias_table` | Tickets de incidencias |
| `add_deleted_at_to_clientes_table` | Soft deletes en clientes |
| `create_views` | Vistas para reportes |

### Ejecutar una migración específica

```bash
php artisan migrate --path=database/migrations/[nombre_migración]
```

## Factories y Seeders

El proyecto incluye factories para generar datos de prueba:

### Usar factories para crear datos:

```bash
# Crear 10 clientes
php artisan tinker
>>> Clientes::factory()->count(10)->create()

# Crear un cliente específico
>>> Clientes::factory()->create(['nombre' => 'Acme Corp'])
```

### Seeders disponibles

- **ClientesSeeder**: Crea clientes de prueba
- **EmpleadoSeeder**: Crea empleados
- **ProductoSeeder**: Crea productos
- **FacturaSeeder**: Crea facturas
- **IncidenciaSeeder**: Crea incidencias
- **DatabaseSeeder**: Ejecuta todos los seeders

Ejecutar seeder específico:
```bash
php artisan db:seed --class=ClientesSeeder
```

## Rutas Disponibles

Las rutas están definidas en `routes/web.php`. Ejemplos:

| Método | Ruta | Descripción |
|--------|------|-------------|
| GET | `/` | Dashboard principal |
| GET\|POST | `/login` | Autenticación |
| GET | `/clientes` | Lista de clientes |
| POST | `/clientes` | Crear cliente |
| GET | `/empleados` | Lista de empleados |
| GET | `/facturas` | Lista de facturas |
| GET | `/productos` | Catálogo de productos |
| GET | `/proveedores` | Lista de proveedores |
| GET | `/incidencias` | Tickets de incidencias |

Ver todas las rutas:
```bash
php artisan route:list
```

## Vistas y Plantillas

Las vistas están organizadas en `resources/views/`:

```
views/
├── layouts/           # Layouts principales
├── cliente/           # Vistas de clientes
├── empleado/          # Vistas de empleados
├── producto/          # Vistas de productos
├── proveedor/         # Vistas de proveedores
├── factura/           # Vistas de facturas
├── incidencia/        # Vistas de incidencias
└── auth/              # Vistas de autenticación
```

Las vistas usan la plantilla Blade de Laravel con AdminLTE.

## Modelos Eloquent - Usos Comunes

### Crear un cliente
```php
$cliente = Clientes::create([
    'nombre' => 'Mi Empresa',
    'email' => 'info@miempresa.com',
    'telefono' => '123456789'
]);
```

### Obtener clientes con facturas
```php
$clientes = Clientes::with('facturas')->get();
```

### Buscar clientes
```php
$cliente = Clientes::where('nombre', 'like', '%Empresa%')->first();
```

### Actualizar cliente
```php
$cliente->update(['email' => 'newemail@example.com']);
```

### Eliminar cliente
```php
$cliente->delete();  // Soft delete
$cliente->forceDelete();  // Eliminación permanente
```

## Controladores

Los controladores principales se encuentran en `app/Http/Controllers/`:

- **ClientesController**: Gestión de clientes (CRUD)
- **EmpleadoController**: Gestión de empleados
- **ProductoController**: Gestión de productos
- **ProveedorController**: Gestión de proveedores
- **FacturaController**: Generación de facturas
- **IncidenciaController**: Gestión de incidencias
- **AuthController**: Autenticación

Cada controlador tiene métodos estándar: `index`, `create`, `store`, `show`, `edit`, `update`, `destroy`

## Validación

El proyecto utiliza Form Requests en `app/Http/Requests/` para validar datos:

```php
// Ejemplo de validación
public function rules()
{
    return [
        'nombre' => 'required|string|max:255',
        'email' => 'required|email|unique:clientes',
        'telefono' => 'nullable|string',
    ];
}
```

## Troubleshooting - Solución de Problemas

### Error: "Class 'App\\Models\\[Model]' not found"
```bash
# Ejecutar autoload de composer
composer dump-autoload
```

### Error de conexión a base de datos
- Verifica que MySQL esté ejecutándose
- Comprueba las credenciales en `.env`
- Asegúrate que la base de datos existe

```bash
# Crear base de datos en MySQL
mysql -u root -e "CREATE DATABASE proyecto;"
```

### Assets no se actualizan
```bash
# Limpiar caché de compilación
npm run dev
```

### Permisos de almacenamiento
En Windows, asegúrate que la carpeta `storage/` tenga permisos de escritura:

```bash
# En PowerShell
icacls "C:\xampp\htdocs\proyecto\storage" /grant:r "$env:USERNAME:(OI)(CI)F"
```

### Error 419 Token Mismatch
Limpia la caché de sesión:
```bash
php artisan cache:clear
php artisan session:clear
```

### Migraciones no encontradas
```bash
# Limpiar configuración cacheada
php artisan config:clear
php artisan cache:clear
```

## Características Avanzadas

### Soft Deletes
Los clientes usan soft deletes (eliminación lógica):

```php
// Obtener solo registros no eliminados
$clientes = Clientes::all();

// Obtener también eliminados
$clientes = Clientes::withTrashed()->get();

// Solo eliminados
$clientes = Clientes::onlyTrashed()->get();

// Restaurar
$cliente->restore();
```

### Timestamps
Todos los modelos incluyen `created_at` y `updated_at`:

```php
$cliente->created_at;  // Fecha de creación
$cliente->updated_at;  // Última actualización
```

### Relaciones entre modelos

```php
// Una factura tiene un cliente
$factura->cliente;

// Un cliente tiene muchas facturas
$cliente->facturas;

// Un producto puede estar en muchas facturas
$producto->facturas;
```

## Desarrollo Local

### Configurar IDE para mejor experiencia

**VS Code**:
1. Instala extensión "PHP Intelephense"
2. Instala extensión "Laravel Extension Pack"
3. Instala extensión "Blade"

**PhpStorm**:
- Detecta automáticamente Laravel
- Habilita soporte para Blade

## Pruebas Unitarias

Crear un test:
```bash
php artisan make:test ClientesTest
```

Estructura de tests:
```
tests/
├── Feature/     # Tests de características completas
└── Unit/        # Tests unitarios
```

Ejecutar tests:
```bash
# Todos los tests
php artisan test

# Test específico
php artisan test tests/Feature/ClientesTest.php

# Con output detallado
php artisan test --verbose
```

## Deployment (Despliegue a Producción)

### Preparación

1. **Actualizar `.env` con configuración de producción**
```env
APP_ENV=production
APP_DEBUG=false
```

2. **Limpiar caché**
```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

3. **Compilar assets**
```bash
npm run build
```

4. **Ejecutar migraciones**
```bash
php artisan migrate --force
```

5. **Generar enlace de almacenamiento**
```bash
php artisan storage:link
```

## Recursos y Documentación

- **Laravel**: [laravel.com/docs](https://laravel.com/docs)
- **AdminLTE**: [adminlte.io](https://adminlte.io)
- **Blade Templates**: [laravel.com/docs/blade](https://laravel.com/docs/blade)
- **Eloquent ORM**: [laravel.com/docs/eloquent](https://laravel.com/docs/eloquent)

## Preguntas Frecuentes (FAQ)

**P: ¿Cómo cambiar el puerto del servidor?**
```bash
php artisan serve --port=3000
```

**P: ¿Cómo ver todas las rutas?**
```bash
php artisan route:list
```

**P: ¿Cómo resetear la base de datos completamente?**
```bash
php artisan migrate:refresh --seed
```

**P: ¿Dónde están los logs de errores?**
```
storage/logs/laravel.log
```

**P: ¿Cómo agregar un nuevo modelo?**
```bash
php artisan make:model NombreModelo -m
```
Esto crea el modelo y la migración.

## Contribución

1. Fork el proyecto
2. Crea una rama para tu feature (`git checkout -b feature/AmazingFeature`)
3. Commit tus cambios (`git commit -m 'Add some AmazingFeature'`)
4. Push a la rama (`git push origin feature/AmazingFeature`)
5. Abre un Pull Request

### Estándares de código
- Sigue PSR-12 para estilos de código
- Usa nombres descriptivos para variables y funciones
- Comenta código complejo
- Escribe tests para nuevas funcionalidades

## 🎓 Conceptos que aprendiste construyendo este proyecto

Si eres estudiante de DAM (o cualquier estudiante de desarrollo), trabajar con este proyecto te ha enseñado:

### Backend (Laravel/PHP)
- ✅ **MVC (Modelo-Vista-Controlador)**: Separación de lógica, presentación y datos
- ✅ **ORM Eloquent**: Trabajar con bases de datos sin escribir SQL
- ✅ **Migraciones**: Control de versiones para tu base de datos
- ✅ **Seeders y Factories**: Generación automática de datos de prueba
- ✅ **Middleware**: Interceptar peticiones para autenticación y autorización
- ✅ **Form Requests**: Validación centralizada y reutilizable
- ✅ **Relaciones entre modelos**: hasMany, belongsTo, etc.
- ✅ **Soft Deletes**: Eliminación lógica vs física
- ✅ **Sistema de autenticación**: Login, registro, sesiones

### Sistema de Permisos (Avanzado)
- ✅ **RBAC (Role-Based Access Control)**: Control de acceso basado en roles
- ✅ **Autorización**: @can, @role, middleware('role:Admin')
- ✅ **Permisos granulares**: Control fino de lo que cada usuario puede hacer
- ✅ **Traits en PHP**: Reutilización de código (HasRoles, SoftDeletes)
- ✅ **Paquetes de terceros**: Integrar Spatie Permission

### Frontend
- ✅ **Blade Templates**: Sistema de plantillas de Laravel
- ✅ **Bootstrap 5**: Framework CSS responsive
- ✅ **AdminLTE**: Plantilla de administración profesional
- ✅ **DataTables**: Tablas interactivas con búsqueda y paginación
- ✅ **JavaScript/jQuery**: Interactividad en el cliente
- ✅ **Directivas Blade**: @if, @foreach, @can, @auth
- ✅ **Componentes reutilizables**: Layouts, includes, components

### Gestión de Archivos
- ✅ **Upload de imágenes**: Validación, almacenamiento, visualización
- ✅ **Upload de PDFs**: Gestión de documentos
- ✅ **Storage de Laravel**: Sistema de archivos unificado
- ✅ **Validación de archivos**: Tipos, tamaños, seguridad

### Base de Datos
- ✅ **Diseño de base de datos relacional**: Tablas, relaciones, claves foráneas
- ✅ **Normalización**: Estructura eficiente de datos
- ✅ **Índices y optimización**: Rendimiento en consultas
- ✅ **Timestamps automáticos**: created_at, updated_at, deleted_at
- ✅ **Queries complejas**: Where, joins, with (eager loading)

### Arquitectura y Patrones
- ✅ **Separación de responsabilidades**: Cada clase tiene un propósito
- ✅ **DRY (Don't Repeat Yourself)**: Código reutilizable
- ✅ **SOLID principles**: Especialmente Single Responsibility
- ✅ **Repository pattern** (implícito en Eloquent)
- ✅ **Dependency Injection**: Laravel lo hace automáticamente

### DevOps y Herramientas
- ✅ **Composer**: Gestor de dependencias PHP
- ✅ **NPM**: Gestor de paquetes JavaScript
- ✅ **Artisan CLI**: Comandos de consola personalizados
- ✅ **Git/Control de versiones**: (si usas Git)
- ✅ **Variables de entorno**: Configuración con .env
- ✅ **Debugging**: dd(), logs, Laravel Debugbar

### Seguridad
- ✅ **CSRF Protection**: Tokens en formularios
- ✅ **SQL Injection Prevention**: Eloquent usa prepared statements
- ✅ **XSS Prevention**: Blade escapa HTML automáticamente
- ✅ **Hash de contraseñas**: bcrypt/argon2
- ✅ **Validación de entrada**: Nunca confiar en datos del usuario
- ✅ **Autorización**: Verificar permisos antes de acciones sensibles

### Buenas Prácticas Aprendidas
- ✅ **Nombres descriptivos**: Variables y funciones claros
- ✅ **Comentarios útiles**: Documentar decisiones complejas
- ✅ **Convenciones de nombrado**: PSR-12, camelCase, snake_case
- ✅ **Estructura organizada**: Archivos en lugares lógicos
- ✅ **Testing mindset**: Pensar en cómo probar el código
- ✅ **README completo**: Documentación para otros desarrolladores

### Habilidades Profesionales
- ✅ **Leer documentación oficial**: Laravel, Spatie, Bootstrap
- ✅ **Integrar paquetes externos**: Composer packages
- ✅ **Debugging**: Encontrar y resolver errores
- ✅ **Trabajo incremental**: Construir feature por feature
- ✅ **Pensar en el usuario final**: UX/UI consideraciones
- ✅ **Gestión de proyecto**: Priorizar funcionalidades

### Tecnologías Específicas Usadas
```
PHP 8.1+              └─ Lenguaje backend
Laravel 11            └─ Framework web
MySQL/MariaDB         └─ Base de datos
Composer              └─ Gestor dependencias PHP
NPM                   └─ Gestor dependencias JS
Blade                 └─ Motor de plantillas
Bootstrap 5           └─ Framework CSS
jQuery                └─ Biblioteca JavaScript
DataTables            └─ Plugin tablas interactivas
AdminLTE              └─ Plantilla admin
Font Awesome          └─ Iconos
Spatie Permission     └─ Sistema de permisos
Vite                  └─ Build tool assets
```

### ¿Qué puedes añadir tu CV ahora?

Después de trabajar con este proyecto, puedes mencionar:

**Competencias técnicas:**
- Desarrollo con Laravel (Framework PHP)
- Sistema MVC y arquitectura de aplicaciones web
- Gestión de bases de datos relacionales (MySQL)
- Frontend responsive con Bootstrap
- Sistema de autenticación y autorización (RBAC)
- Integración de librerías externas (Composer)
- Control de versiones de BBDD (migraciones)

**Proyectos realizados:**
- Sistema de gestión empresarial con panel de administración
- Implementación de sistema de roles y permisos multinivel
- CRUD completo con validaciones y relaciones
- Gestión de archivos (imágenes y PDFs)
- Interfaz administrativa con DataTables interactivos

### Siguientes pasos sugeridos para mejorar

1. **Testing**: Añadir tests unitarios y de integración
2. **API REST**: Crear endpoints para consumir desde móvil
3. **Notificaciones**: Sistema de emails y alertas
4. **Exportación**: Generar Excel/PDF de reportes
5. **Dashboard**: Gráficas y estadísticas con Chart.js
6. **Auditoría**: Log de todas las acciones de usuarios
7. **Multi-idioma**: Internacionalización (i18n)
8. **Cache**: Redis para mejorar rendimiento
9. **Queue**: Procesos en segundo plano (emails, exports)
10. **Docker**: Containerización para deployment

### Recursos para seguir aprendiendo

📚 **Documentación oficial:**
- Laravel: https://laravel.com/docs
- Spatie Permission: https://spatie.be/docs/laravel-permission
- Bootstrap: https://getbootstrap.com

🎥 **Video tutoriales recomendados:**
- Laracasts.com (cursos de Laravel)
- Canal de YouTube: "Coders Tape"
- Canal de YouTube: "Traversy Media"

📖 **Libros recomendados:**
- "Laravel: Up & Running" - Matt Stauffer
- "PHP Objects, Patterns, and Practice" - Matt Zandstra

💻 **Repositorios para inspirarte:**
- https://github.com/laravel/laravel (Laravel oficial)
- https://github.com/spatie/laravel-permission (Permisos)
- https://github.com/topics/laravel-admin (Otros paneles admin)

---

## Licencia

Este proyecto está bajo la licencia MIT. Ver archivo LICENSE para más detalles.

## Soporte y Contacto

Para reportar bugs o sugerencias, por favor crea un issue en el repositorio.

---

**Última actualización**: 2 de febrero de 2026

Para cualquier pregunta o soporte adicional, contacta al equipo de desarrollo.
