@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col-md-8">
            <h2 class="mb-0"><i class="fa fa-users me-2"></i>Gestión de Usuarios</h2>
        </div>
        <div class="col-md-4 text-md-end">
            <button class="btn btn-pink" data-bs-toggle="modal" data-bs-target="#createUserModal">
                <i class="fa fa-plus me-1"></i>Nuevo Usuario
            </button>
            <a href="{{ route('admin.roles.index') }}" class="btn btn-outline-secondary">
                <i class="fa fa-arrow-left me-1"></i>Volver
            </a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            <i class="fa fa-check-circle me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show">
            <i class="fa fa-exclamation-circle me-2"></i>{{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>Usuario</th>
                            <th>Email</th>
                            <th>Rol Actual</th>
                            <th>Cambiar Rol</th>
                            <th class="text-end">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center me-3" style="width:40px;height:40px;font-weight:600;">
                                        {{ strtoupper(substr($user->name, 0, 1)) }}
                                    </div>
                                    <div>
                                        <div class="fw-semibold">{{ $user->name }}</div>
                                        <small class="text-muted">ID: {{ $user->id }}</small>
                                    </div>
                                </div>
                            </td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @if($user->roles->count() > 0)
                                    @foreach($user->roles as $role)
                                        <span class="badge" style="background-color: {{ $role->name === 'Admin' ? 'var(--pink-dark)' : '#6c757d' }};">
                                            {{ $role->name }}
                                        </span>
                                    @endforeach
                                @else
                                    <span class="badge bg-secondary">Sin rol</span>
                                @endif
                            </td>
                            <td>
                                <form action="{{ route('admin.roles.assignRole', $user) }}" method="POST" class="d-inline" onsubmit="return confirmRoleChange(event, '{{ $user->name }}', this)">
                                    @csrf
                                    <div class="input-group input-group-sm" style="max-width: 250px;">
                                        <select name="role" class="form-select form-select-sm" data-original-role="{{ $user->roles->first()->name ?? '' }}">
                                            @foreach($roles as $role)
                                                <option value="{{ $role->name }}" {{ $user->hasRole($role->name) ? 'selected' : '' }}>
                                                    {{ $role->name }}
                                                    @if($role->name === 'Admin')
                                                        🛡️
                                                    @endif
                                                </option>
                                            @endforeach
                                        </select>
                                        <button type="submit" class="btn btn-sm btn-outline-primary" title="Guardar cambio de rol">
                                            <i class="fa fa-save"></i>
                                        </button>
                                    </div>
                                </form>
                            </td>
                            <td class="text-end">
                                @if($user->email !== 'admin@sistema.com')
                                    <form action="{{ route('admin.roles.destroyUser', $user) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Eliminar usuario {{ $user->name }}?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            <i class="fa fa-trash-alt"></i> Eliminar
                                        </button>
                                    </form>
                                @else
                                    <span class="badge bg-warning text-dark">Protegido</span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">
            {{ $users->links('vendor.pagination.custom-pagination') }}
        </div>
    </div>
</div>

<!-- Modal Crear Usuario -->
<div class="modal fade" id="createUserModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('admin.roles.storeUser') }}" method="POST">
                @csrf
                <div class="modal-header" style="background-color: var(--pink-dark); color: white;">
                    <h5 class="modal-title"><i class="fa fa-user-plus me-2"></i>Crear Nuevo Usuario</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" id="password" name="password" required minlength="8">
                        <small class="form-text text-muted">Mínimo 8 caracteres</small>
                    </div>
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Confirmar Contraseña</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                    </div>
                    <div class="mb-3">
                        <label for="role" class="form-label">Rol</label>
                        <select class="form-select" id="role" name="role" required>
                            @foreach($roles as $role)
                                <option value="{{ $role->name }}">
                                    {{ $role->name }}
                                    @if($role->name === 'Admin')
                                        🛡️ (Acceso Total)
                                    @endif
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-pink">
                        <i class="fa fa-save me-1"></i>Crear Usuario
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function confirmRoleChange(event, userName, form) {
    const select = form.querySelector('select[name="role"]');
    const newRole = select.value;
    const originalRole = select.getAttribute('data-original-role');
    
    // Si se está asignando el rol Admin, pedir confirmación
    if (newRole === 'Admin' && originalRole !== 'Admin') {
        event.preventDefault();
        
        if (confirm(`⚠️ ¿Estás seguro de que quieres dar acceso TOTAL de ADMINISTRADOR a "${userName}"?\n\nEsta persona tendrá:\n✅ Acceso a todos los módulos\n✅ Permisos para eliminar cualquier cosa\n✅ Acceso al panel de administración\n✅ Puede crear y eliminar usuarios\n✅ Puede modificar roles y permisos`)) {
            form.submit();
        }
        return false;
    }
    
    // Para otros cambios de rol, solo confirmar el cambio
    if (originalRole !== newRole) {
        return confirm(`¿Cambiar el rol de "${userName}" de "${originalRole}" a "${newRole}"?`);
    }
    
    return true;
}
</script>
@endsection
