@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col-md-8">
            <h2 class="mb-0">Clientes</h2>
        </div>
        <div class="col-md-4 text-md-end">
            @can('crear-clientes')
                <a href="{{ route('clientes.create') }}" class="btn btn-pink">
                    <i class="fa fa-plus me-1"></i> Nuevo cliente
                </a>
            @endcan
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="clientesTable" class="table table-hover align-middle" style="font-size: 0.9rem; width: 100%;">
                    <thead class="table-light">
                        <tr>
                            <th>Cliente</th>
                            <th>Contacto</th>
                            <th>Dirección</th>
                            <th class="text-end">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($clientes as $cliente)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="me-3">
                                        @if($cliente->imagen)
                                            <img src="{{ asset($cliente->imagen) }}" alt="{{ $cliente->nombre }}" class="rounded-circle" style="width:40px;height:40px;object-fit:cover;">
                                        @else
                                            <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center" style="width:40px;height:40px;font-weight:600;font-size:0.9rem;">{{ strtoupper(substr($cliente->nombre,0,1)) }}</div>
                                        @endif
                                    </div>
                                    <div>
                                        <div class="fw-semibold" style="font-size: 0.95rem;">
                                            {{ $cliente->nombre }}
                                            @if($cliente->deleted_at)
                                                <span class="badge rounded-pill bg-danger ms-2" style="font-size: 0.7rem;">Borrado</span>
                                            @endif
                                        </div>
                                        <div class="text-muted" style="font-size: 0.75rem;">ID: {{ $cliente->id }}</div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                @if($cliente->email)
                                    <div style="font-size: 0.85rem;"><i class="fa fa-envelope me-1 text-muted"></i> <a href="mailto:{{ $cliente->email }}">{{ $cliente->email }}</a></div>
                                @endif
                                @if($cliente->telefono)
                                    <div style="margin-top: 0.3rem; font-size: 0.85rem;"><i class="fa fa-phone me-1 text-muted"></i> {{ $cliente->telefono }}</div>
                                @endif
                            </td>
                            <td style="font-size: 0.85rem; color: #666;">{{ \Illuminate\Support\Str::limit($cliente->direccion, 50) }}</td>
                            <td class="text-end" style="white-space: nowrap;">
                                @can('ver-clientes')
                                    <a href="{{ route('clientes.show', $cliente->id) }}" class="btn btn-sm" style="font-size: 0.8rem; background-color: #fff; border: 1.5px solid var(--pink-dark); color: var(--pink-dark); font-weight: 500;" title="Ver detalles">
                                        <i class="fa fa-eye me-1"></i>Ver
                                    </a>
                                @endcan
                                
                                @can('editar-clientes')
                                    <a href="{{ route('clientes.edit', $cliente->id) }}" class="btn btn-sm" style="font-size: 0.8rem; background-color: #ffb3d9; border: 1.5px solid #ffb3d9; color: #fff; font-weight: 500;" title="Editar cliente">
                                        <i class="fa fa-pen me-1"></i>Editar
                                    </a>
                                @endcan

                                @can('eliminar-clientes')
                                    @if($cliente->deleted_at)
                                        {{-- Si está eliminado, mostrar botón de restaurar --}}
                                        <form action="{{ route('clientes.restore', $cliente->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            <button class="btn btn-sm btn-success" style="font-size: 0.8rem;" title="Restaurar cliente">
                                                <i class="fa fa-rotate-left me-1"></i>Restaurar
                                            </button>
                                        </form>
                                    @else
                                        {{-- Si está activo, mostrar botón de eliminar (soft delete) --}}
                                        <form action="{{ route('clientes.destroy', $cliente->id) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Eliminar este cliente? (Se puede restaurar después)');">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-pink-dark" style="font-size: 0.8rem; border: none; background-color: #c23c5f;" title="Eliminar cliente">
                                                <i class="fa fa-trash-alt me-1"></i>Eliminar
                                            </button>
                                        </form>
                                    @endif
                                @endcan
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    $('#clientesTable').DataTable({
        responsive: true,
        language: {
            url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/es-ES.json'
        },
        order: [[0, 'asc']],
        pageLength: 15,
        columnDefs: [
            { orderable: false, targets: -1 } // Desactivar ordenamiento en columna de acciones
        ]
    });
});
</script>
@endpush
