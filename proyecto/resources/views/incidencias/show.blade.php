@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start mb-4">
                        <h4 class="card-title">{{ $incidencia->titulo }}</h4>
                        <div>
                            <a href="{{ route('incidencias.edit', $incidencia) }}" class="btn btn-sm" style="background-color: #ffb3d9; color: #333;">Editar</a>
                            <form action="{{ route('incidencias.destroy', $incidencia) }}" method="POST" style="display: inline;">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-pink-dark" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                            </form>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <p class="text-muted mb-1">Estado</p>
                            <span class="badge {{ $incidencia->estado === 'cerrada' ? 'bg-success' : ($incidencia->estado === 'abierta' ? 'bg-info' : 'bg-warning') }}">{{ ucfirst($incidencia->estado) }}</span>
                        </div>
                        <div class="col-md-6">
                            <p class="text-muted mb-1">Prioridad</p>
                            <span class="badge {{ $incidencia->prioridad === 'alta' ? 'bg-danger' : ($incidencia->prioridad === 'normal' ? 'bg-secondary' : 'bg-success') }}">{{ ucfirst($incidencia->prioridad) }}</span>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <p class="text-muted mb-1">Usuario responsable</p>
                            <p class="h6">{{ $incidencia->usuario->name ?? 'N/A' }}</p>
                        </div>
                        <div class="col-md-6">
                            <p class="text-muted mb-1">Creado</p>
                            <p class="h6">{{ $incidencia->created_at->format('d/m/Y H:i') }}</p>
                        </div>
                    </div>
                    <div class="mb-4">
                        <p class="text-muted mb-1">Descripción</p>
                        <p>{{ $incidencia->descripcion }}</p>
                    </div>
                    <a href="{{ route('incidencias.index') }}" class="btn btn-outline-pink-dark">Volver</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
