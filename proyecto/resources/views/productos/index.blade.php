@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col-md-8">
            <h2 class="mb-0">Productos</h2>
        </div>
        <div class="col-md-4 text-md-end">
            @can('crear-productos')
                <a href="{{ route('productos.create') }}" class="btn btn-pink">
                    <i class="fa fa-plus me-1"></i> Nuevo producto
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
                <table id="productosTable" class="table table-hover align-middle" style="font-size: 0.9rem; width: 100%;">
                    <thead class="table-light">
                        <tr>
                            <th>Producto</th>
                            <th>Precio</th>
                            <th>Stock</th>
                            <th>Archivos</th>
                            <th class="text-end">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($productos as $producto)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="me-3">
                                        @if($producto->imagen)
                                            <img src="{{ asset($producto->imagen) }}" alt="{{ $producto->nombre }}" class="rounded" style="width:40px;height:40px;object-fit:cover;">
                                        @else
                                            <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center" style="width:40px;height:40px;font-weight:600;font-size:0.9rem;">{{ strtoupper(substr($producto->nombre,0,1)) }}</div>
                                        @endif
                                    </div>
                                    <div>
                                        <div class="fw-semibold" style="font-size: 0.95rem;">
                                            {{ $producto->nombre }}
                                            @if($producto->deleted_at)
                                                <span class="badge rounded-pill bg-danger ms-2" style="font-size: 0.7rem;">Borrado</span>
                                            @endif
                                        </div>
                                        <div class="text-muted" style="font-size: 0.75rem;">SKU: {{ $producto->sku ?? 'N/A' }}</div>
                                    </div>
                                </div>
                            </td>
                            <td style="font-size: 0.85rem; font-weight: 600;">{{ number_format($producto->precio, 2, '.', ',') }}€</td>
                            <td style="font-size: 0.85rem;"><span class="badge rounded-pill bg-info">{{ $producto->stock }}</span></td>
                            <td>
                                @if($producto->archivo_pdf)
                                    <a href="{{ asset($producto->archivo_pdf) }}" target="_blank" class="btn btn-sm btn-outline-danger" title="Ver PDF">
                                        <i class="fa fa-file-pdf"></i>
                                    </a>
                                @else
                                    <span class="text-muted" style="font-size: 0.75rem;">Sin PDF</span>
                                @endif
                            </td>
                            <td class="text-end" style="white-space: nowrap;">
                                @can('ver-productos')
                                    <a href="{{ route('productos.show', $producto->id) }}" class="btn btn-sm" style="font-size: 0.8rem; background-color: #fff; border: 1.5px solid var(--pink-dark); color: var(--pink-dark); font-weight: 500;" title="Ver detalles">
                                        <i class="fa fa-eye me-1"></i>Ver
                                    </a>
                                @endcan
                                
                                @can('editar-productos')
                                    <a href="{{ route('productos.edit', $producto->id) }}" class="btn btn-sm" style="font-size: 0.8rem; background-color: #ffb3d9; border: 1.5px solid #ffb3d9; color: #fff; font-weight: 500;" title="Editar producto">
                                        <i class="fa fa-pen me-1"></i>Editar
                                    </a>
                                @endcan

                                @can('eliminar-productos')
                                    @if($producto->deleted_at)
                                        {{-- Si está eliminado, mostrar botón de restaurar --}}
                                        <form action="{{ route('productos.restore', $producto->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            <button class="btn btn-sm btn-success" style="font-size: 0.8rem;" title="Restaurar producto">
                                                <i class="fa fa-rotate-left me-1"></i>Restaurar
                                            </button>
                                        </form>
                                    @else
                                        {{-- Si está activo, mostrar botón de eliminar (soft delete) --}}
                                        <form action="{{ route('productos.destroy', $producto->id) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Eliminar este producto? (Se puede restaurar después)');">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-pink-dark" style="font-size: 0.8rem; border: none; background-color: #c23c5f;" title="Eliminar producto">
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
    $('#productosTable').DataTable({
        responsive: true,
        language: {
            url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/es-ES.json'
        },
        order: [[0, 'asc']],
        pageLength: 15,
        columnDefs: [
            { orderable: false, targets: [-1, -2] } // Desactivar ordenamiento en columnas de archivos y acciones
        ]
    });
});
</script>
@endpush
