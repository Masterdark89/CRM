# Cómo Hacer Administrador a Otro Usuario

## Pasos Rápidos

### 1. Inicia sesión como Admin
- **Email**: admin@sistema.com
- **Contraseña**: admin123

### 2. Accede al Panel de Administración
- En el menú superior, haz clic en **"Administración"** (🛡️)
- Verás el panel principal con dos opciones

### 3. Ve a Gestión de Usuarios
- Haz clic en **"Gestionar Usuarios"**
- O accede directamente a: `http://localhost/admin/roles/users`

### 4. Cambiar Rol a Admin
En la lista de usuarios verás una tabla con columnas:
- **Usuario** - Nombre y foto
- **Email** - Correo electrónico
- **Rol Actual** - Badge mostrando el rol (Admin en rosa, otros en gris)
- **Cambiar Rol** - Desplegable con todos los roles disponibles
- **Acciones** - Botón para eliminar (protegido para admin principal)

**Para hacer a alguien Admin:**

1. Busca al usuario en la lista
2. En la columna **"Cambiar Rol"**, abre el menú desplegable
3. Selecciona **"Admin 🛡️"**
4. Haz clic en el botón **guardar** (💾)
5. Aparecerá un mensaje de confirmación:
   ```
   ⚠️ ¿Estás seguro de que quieres dar acceso TOTAL de ADMINISTRADOR a "[Nombre]"?
   
   Esta persona tendrá:
   ✅ Acceso a todos los módulos
   ✅ Permisos para eliminar cualquier cosa
   ✅ Acceso al panel de administración
   ✅ Puede crear y eliminar usuarios
   ✅ Puede modificar roles y permisos
   ```
6. Confirma con **Aceptar**
7. ¡Listo! El usuario ahora es Admin

### 5. Crear Usuario Directamente como Admin

También puedes crear un nuevo usuario y asignarlo como Admin desde el inicio:

1. En la página de **Gestión de Usuarios**
2. Haz clic en **"Nuevo Usuario"**
3. Rellena el formulario:
   - Nombre
   - Email
   - Contraseña (mínimo 8 caracteres)
   - Confirmar contraseña
   - **Rol**: Selecciona **"Admin 🛡️ (Acceso Total)"**
4. Clic en **"Crear Usuario"**
5. El usuario se creará con privilegios de administrador inmediatamente

## Verificar que Funciona

Después de asignar el rol Admin a un usuario:

1. Cierra sesión
2. Inicia sesión con el nuevo usuario Admin
3. Verifica que en el menú superior aparece **"Administración"**
4. Entra a Administración y verifica que puede:
   - Ver y gestionar usuarios
   - Ver y gestionar roles
   - Modificar permisos
   - Crear nuevos roles

## Ejemplo Práctico

**Caso**: Quieres hacer Admin a Juan Pérez (juan@empresa.com)

```
1. Login como admin@sistema.com
2. Click en "Administración" en el menú
3. Click en "Gestionar Usuarios"
4. Buscar a "Juan Pérez" en la lista
5. En su fila, abrir el desplegable "Cambiar Rol"
6. Seleccionar "Admin 🛡️"
7. Click en el icono de guardar (💾)
8. Confirmar el mensaje de alerta
9. Juan ahora es Admin
```

## Diferencias entre Roles

### Admin (Administrador)
- ✅ Ver todos los registros
- ✅ Crear nuevos registros
- ✅ Editar registros existentes
- ✅ **Eliminar registros** (con soft delete)
- ✅ Restaurar registros eliminados
- ✅ **Acceso al panel de administración**
- ✅ **Gestionar usuarios y roles**
- ✅ **Crear otros administradores**

### Usuario (Usuario Estándar)
- ✅ Ver todos los registros
- ✅ Crear nuevos registros
- ✅ Editar registros existentes
- ❌ **NO puede eliminar**
- ❌ **NO tiene acceso al panel de administración**
- ❌ **NO puede gestionar usuarios**

## Seguridad

### Usuario Admin Principal Protegido
- El usuario **admin@sistema.com** está protegido
- NO se puede eliminar
- NO se le puede cambiar el rol
- Esto previene quedarse sin acceso de administrador

### Múltiples Admins
- Puedes tener **varios administradores**
- Todos tendrán acceso completo
- Cada admin puede crear más admins
- Recomendación: Solo asigna Admin a personas de confianza

## Tips

💡 **Buenas Prácticas:**
- Crea usuarios con rol "Usuario" por defecto
- Solo asigna Admin a personal de confianza
- Documenta quiénes son los admins activos
- Revisa periódicamente la lista de administradores
- Usa nombres descriptivos para usuarios (nombre completo)

⚠️ **Avisos:**
- Un admin puede eliminar a otros admins (excepto admin@sistema.com)
- Los cambios de rol son inmediatos
- No hay periodo de prueba o confirmación posterior
- Los admins pueden modificar sus propios permisos

## Soporte

Si tienes problemas para asignar el rol Admin:

1. **Verifica que estás logueado como Admin**
   - El menú debe mostrar "Administración"
   
2. **Limpia caché de permisos**
   ```bash
   php artisan permission:cache-reset
   ```

3. **Revisa los logs**
   - Ubicación: `storage/logs/laravel.log`

4. **Verifica en base de datos**
   ```bash
   php artisan tinker
   User::find(ID)->roles  # Ver roles de un usuario
   User::find(ID)->assignRole('Admin')  # Asignar manualmente
   ```

---

**Fecha**: 20 de febrero de 2026
