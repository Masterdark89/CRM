@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col-md-8"><h2>Incidencias</h2></div>
        <div class="col-md-4 text-md-end"><a href="{{ route('incidencias.create') }}" class="btn btn-pink">+ Nueva incidencia</a></div>
    </div>
    @if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif
    <div class="card shadow-sm mb-3">
        <div class="card-body py-2">
            <form method="GET" class="row g-2">
                <div class="col-md-6"><input type="text" name="search" class="form-control form-control-sm" placeholder="Buscar por título..." value="{{ request('search') }}"></div>
                <div class="col-md-3"><select name="estado" class="form-select form-select-sm">
                    <option value="">Todos los estados</option>
                    <option value="abierta" {{ request('estado') === 'abierta' ? 'selected' : '' }}>Abierta</option>
                    <option value="cerrada" {{ request('estado') === 'cerrada' ? 'selected' : '' }}>Cerrada</option>
                    <option value="pendiente" {{ request('estado') === 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                </select></div>
                <div class="col-md-3"><button class="btn btn-pink w-100 btn-sm">Filtrar</button></div>
            </form>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-hover mb-0">
            <thead><tr style="font-size: 0.75rem;"><th>ID</th><th>Título</th><th>Descripción</th><th>Estado</th><th>Prioridad</th><th>Usuario</th><th>Fecha</th><th>Acciones</th></tr></thead>
            <tbody>
                @forelse($incidencias as $inc)
                    <tr>
                        <td style="font-size: 0.75rem;">#{{ $inc->id }}</td>
                        <td><a href="{{ route('incidencias.show', $inc) }}" class="text-decoration-none">{{ $inc->titulo }}</a></td>
                        <td style="font-size: 0.85rem; max-width: 200px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">{{ substr($inc->descripcion, 0, 50) }}...</td>
                        <td><span class="badge {{ $inc->estado === 'cerrada' ? 'bg-success' : ($inc->estado === 'abierta' ? 'bg-info' : 'bg-warning') }}">{{ ucfirst($inc->estado) }}</span></td>
                        <td><span class="badge {{ $inc->prioridad === 'alta' ? 'bg-danger' : ($inc->prioridad === 'normal' ? 'bg-secondary' : 'bg-success') }}">{{ ucfirst($inc->prioridad) }}</span></td>
                        <td style="font-size: 0.85rem;">{{ $inc->usuario->name ?? 'N/A' }}</td>
                        <td style="font-size: 0.75rem;">{{ $inc->created_at->format('d/m/Y') }}</td>
                        <td>
                            <a href="{{ route('incidencias.show', $inc) }}" class="btn btn-sm btn-outline-secondary" style="padding: 0.3rem 0.6rem; font-size: 0.7rem;">Ver</a>
                            <a href="{{ route('incidencias.edit', $inc) }}" class="btn btn-sm" style="padding: 0.3rem 0.6rem; font-size: 0.7rem; background-color: #ffb3d9; color: #333; border: none;">Editar</a>
                            <form action="{{ route('incidencias.destroy', $inc) }}" method="POST" style="display: inline;">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-pink-dark" style="padding: 0.3rem 0.6rem; font-size: 0.7rem;" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="8" class="text-center py-4">No hay incidencias</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="d-flex justify-content-center mt-3">{{ $incidencias->links('vendor.pagination.custom-pagination') }}</div>
</div>
@endsection
