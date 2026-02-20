@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col-md-8">
            <h2 class="mb-0"><i class="fa fa-user-tag me-2"></i>Gestión de Roles</h2>
        </div>
        <div class="col-md-4 text-md-end">
            <button class="btn btn-pink" data-bs-toggle="modal" data-bs-target="#createRoleModal">
                <i class="fa fa-plus me-1"></i>Nuevo Rol
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

    @foreach($roles as $role)
    <div class="card mb-3">
        <div class="card-header" style="background-color: {{ $role->name === 'Admin' ? 'var(--pink-dark)' : '#6c757d' }}; color: white;">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h5 class="mb-0">
                        <i class="fa fa-shield-alt me-2"></i>{{ $role->name }}
                        @if(in_array($role->name, ['Admin', 'Usuario']))
                            <span class="badge bg-light text-dark ms-2">Predeterminado</span>
                        @endif
                    </h5>
                </div>
                <div>
                    @if(!in_array($role->name, ['Admin', 'Usuario']))
                        <form action="{{ route('admin.roles.destroyRole', $role) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Eliminar el rol {{ $role->name }}?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-light">
                                <i class="fa fa-trash-alt me-1"></i>Eliminar Rol
                            </button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.roles.updatePermissions', $role) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="row mb-3">
                    <div class="col-md-12">
                        <h6 class="text-muted mb-3">Permisos Asignados ({{ $role->permissions->count() }}/{{ $permissions->count() }})</h6>
                    </div>
                </div>

                @php
                    $permissionGroups = $permissions->groupBy(function($permission) {
                        return explode('-', $permission->name)[1] ?? 'otros';
                    });
                @endphp

                <div class="row">
                    @foreach($permissionGroups as $module => $perms)
                    <div class="col-md-3 mb-3">
                        <div class="card">
                            <div class="card-header bg-light py-2">
                                <strong class="text-uppercase" style="font-size: 0.85rem;">
                                    <i class="fa fa-cube me-1"></i>{{ ucfirst($module) }}
                                </strong>
                            </div>
                            <div class="card-body py-2">
                                @foreach($perms as $perm)
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" name="permissions[]" value="{{ $perm->name }}" id="perm_{{ $role->id }}_{{ $perm->id }}" {{ $role->hasPermissionTo($perm->name) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="perm_{{ $role->id }}_{{ $perm->id }}" style="font-size: 0.9rem;">
                                        {{ $perm->name }}
                                    </label>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="text-end mt-3">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-save me-1"></i>Guardar Permisos
                    </button>
                </div>
            </form>
        </div>
        <div class="card-footer bg-light">
            <small class="text-muted">
                <i class="fa fa-users me-1"></i>Usuarios con este rol: <strong>{{ $role->users->count() }}</strong>
            </small>
        </div>
    </div>
    @endforeach
</div>

<!-- Modal Crear Rol -->
<div class="modal fade" id="createRoleModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="{{ route('admin.roles.storeRole') }}" method="POST">
                @csrf
                <div class="modal-header" style="background-color: var(--pink-dark); color: white;">
                    <h5 class="modal-title"><i class="fa fa-plus-circle me-2"></i>Crear Nuevo Rol</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nombre del Rol</label>
                        <input type="text" class="form-control" id="name" name="name" required placeholder="Ej: Supervisor, Gerente, etc.">
                        <small class="form-text text-muted">El nombre debe ser único</small>
                    </div>
                    
                    <hr>
                    
                    <h6 class="mb-3">Seleccionar Permisos</h6>
                    
                    @php
                        $permissionGroups = $permissions->groupBy(function($permission) {
                            return explode('-', $permission->name)[1] ?? 'otros';
                        });
                    @endphp

                    <div class="row">
                        @foreach($permissionGroups as $module => $perms)
                        <div class="col-md-6 mb-3">
                            <div class="card">
                                <div class="card-header bg-light py-2">
                                    <strong class="text-uppercase" style="font-size: 0.85rem;">
                                        {{ ucfirst($module) }}
                                    </strong>
                                </div>
                                <div class="card-body py-2">
                                    @foreach($perms as $perm)
                                    <div class="form-check mb-1">
                                        <input class="form-check-input" type="checkbox" name="permissions[]" value="{{ $perm->name }}" id="new_perm_{{ $perm->id }}">
                                        <label class="form-check-label" for="new_perm_{{ $perm->id }}" style="font-size: 0.9rem;">
                                            {{ $perm->name }}
                                        </label>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-pink">
                        <i class="fa fa-save me-1"></i>Crear Rol
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
