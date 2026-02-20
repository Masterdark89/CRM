@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col-md-12">
            <h2 class="mb-0"><i class="fa fa-user-shield me-2"></i>Administración de Roles y Permisos</h2>
            <p class="text-muted">Gestiona usuarios, roles y permisos del sistema</p>
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

    <div class="row">
        <!-- Card de Usuarios -->
        <div class="col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0"><i class="fa fa-users me-2"></i>Gestión de Usuarios</h5>
                </div>
                <div class="card-body">
                    <p>Administra los usuarios del sistema y asigna roles.</p>
                    <ul class="list-unstyled">
                        <li><i class="fa fa-check text-success me-2"></i>Ver lista de usuarios</li>
                        <li><i class="fa fa-check text-success me-2"></i>Crear nuevos usuarios</li>
                        <li><i class="fa fa-check text-success me-2"></i>Asignar roles a usuarios</li>
                        <li><i class="fa fa-check text-success me-2"></i>Eliminar usuarios</li>
                    </ul>
                    <a href="{{ route('admin.roles.users') }}" class="btn btn-primary">
                        <i class="fa fa-arrow-right me-1"></i>Gestionar Usuarios
                    </a>
                </div>
                <div class="card-footer bg-light">
                    <small class="text-muted">Total usuarios: <strong>{{ $users->total() }}</strong></small>
                </div>
            </div>
        </div>

        <!-- Card de Roles -->
        <div class="col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-header" style="background-color: var(--pink-dark); color: white;">
                    <h5 class="mb-0"><i class="fa fa-user-tag me-2"></i>Gestión de Roles</h5>
                </div>
                <div class="card-body">
                    <p>Administra los roles y sus permisos asociados.</p>
                    <ul class="list-unstyled">
                        <li><i class="fa fa-check text-success me-2"></i>Ver roles existentes</li>
                        <li><i class="fa fa-check text-success me-2"></i>Crear nuevos roles</li>
                        <li><i class="fa fa-check text-success me-2"></i>Asignar permisos a roles</li>
                        <li><i class="fa fa-check text-success me-2"></i>Eliminar roles personalizados</li>
                    </ul>
                    <a href="{{ route('admin.roles.roles') }}" class="btn btn-pink">
                        <i class="fa fa-arrow-right me-1"></i>Gestionar Roles
                    </a>
                </div>
                <div class="card-footer bg-light">
                    <small class="text-muted">Total roles: <strong>{{ $roles->count() }}</strong></small>
                </div>
            </div>
        </div>
    </div>

    <!-- Resumen de Roles y Permisos -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-secondary text-white">
                    <h5 class="mb-0"><i class="fa fa-list me-2"></i>Resumen de Roles y Permisos</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm table-hover">
                            <thead>
                                <tr>
                                    <th>Rol</th>
                                    <th>Permisos Asignados</th>
                                    <th>Usuarios</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($roles as $role)
                                <tr>
                                    <td>
                                        <strong>{{ $role->name }}</strong>
                                        @if(in_array($role->name, ['Admin', 'Usuario']))
                                            <span class="badge bg-info ms-1">Predeterminado</span>
                                        @endif
                                    </td>
                                    <td>
                                        <small class="text-muted">{{ $role->permissions->count() }} permisos</small>
                                    </td>
                                    <td>
                                        <span class="badge bg-primary">{{ $role->users->count() }} usuarios</span>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Información de Permisos Disponibles -->
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-light">
                    <h6 class="mb-0"><i class="fa fa-shield-alt me-2"></i>Permisos Disponibles en el Sistema</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        @php
                            $permissionGroups = $permissions->groupBy(function($permission) {
                                return explode('-', $permission->name)[1] ?? 'otros';
                            });
                        @endphp
                        @foreach($permissionGroups as $module => $perms)
                        <div class="col-md-3 mb-3">
                            <h6 class="text-uppercase text-muted" style="font-size: 0.85rem;">
                                <i class="fa fa-caret-right me-1"></i>{{ ucfirst($module) }}
                            </h6>
                            <ul class="list-unstyled" style="font-size: 0.9rem;">
                                @foreach($perms as $perm)
                                <li><i class="fa fa-key text-warning me-1" style="font-size: 0.7rem;"></i>{{ $perm->name }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
