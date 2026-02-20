@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col-md-8">
            <h2 class="mb-0">Proveedores</h2>
        </div>
        <div class="col-md-4 text-md-end">
            <a href="{{ route('proveedores.create') }}" class="btn btn-pink">
                <i class="fa fa-plus me-1"></i> Nuevo proveedor
            </a>
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-body">
            <form method="GET" action="{{ route('proveedores.index') }}" class="row g-2 align-items-center">
                <div class="col-md-5">
                    <div class="input-group">
                        <span class="input-group-text"><i class="fa fa-search"></i></span>
                        <input name="q" value="{{ $q ?? '' }}" class="form-control" placeholder="Buscar por nombre, email o teléfono">
                    </div>
                </div>
                <div class="col-auto">
                    <select name="show" class="form-select">
                        <option value="active" {{ (isset($show) && $show !== 'trashed') ? 'selected' : '' }}>Activos</option>
                        <option value="trashed" {{ (isset($show) && $show === 'trashed') ? 'selected' : '' }}>Borrados</option>
                    </select>
                </div>
                <div class="col-auto">
                    <button class="btn btn-outline-pink-dark"><i class="fa fa-filter"></i> Filtrar</button>
                </div>
            </form>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0" style="font-size: 0.9rem;">
                <thead class="table-light">
                    <tr>
                        <th>Proveedor</th>
                        <th>Contacto</th>
                        <th class="text-end">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($proveedores as $proveedor)
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="me-3">
                                    <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center" style="width:40px;height:40px;font-weight:600;font-size:0.9rem;">{{ strtoupper(substr($proveedor->nombre,0,1)) }}</div>
                                </div>
                                <div>
                                    <div class="fw-semibold" style="font-size: 0.95rem;">
                                        {{ $proveedor->nombre }}
                                        @if($proveedor->deleted_at)
                                            <span class="badge rounded-pill bg-danger ms-2" style="font-size: 0.7rem;">Borrado</span>
                                        @endif
                                    </div>
                                    <div class="text-muted" style="font-size: 0.75rem;">{{ $proveedor->empresa ?? 'Sin empresa' }}</div>
                                </div>
                            </div>
                        </td>
                        <td>
                            @if($proveedor->email)
                                <div style="font-size: 0.85rem;"><i class="fa fa-envelope me-1 text-muted"></i> <a href="mailto:{{ $proveedor->email }}">{{ $proveedor->email }}</a></div>
                            @endif
                            @if($proveedor->telefono)
                                <div style="margin-top: 0.3rem; font-size: 0.85rem;"><i class="fa fa-phone me-1 text-muted"></i> {{ $proveedor->telefono }}</div>
                            @endif
                        </td>
                        <td class="text-end" style="display: flex; gap: 0.5rem; justify-content: flex-end; flex-wrap: wrap;">
                            <a href="{{ route('proveedores.show', $proveedor->id) }}" class="btn btn-sm" style="font-size: 0.8rem; white-space: nowrap; background-color: #fff; border: 1.5px solid var(--pink-dark); color: var(--pink-dark); font-weight: 500;"><i class="fa fa-eye me-1"></i>Ver</a>
                            <a href="{{ route('proveedores.edit', $proveedor->id) }}" class="btn btn-sm" style="font-size: 0.8rem; white-space: nowrap; background-color: #ffb3d9; border: 1.5px solid #ffb3d9; color: #fff; font-weight: 500;"><i class="fa fa-pen me-1"></i>Editar</a>

                            @if(request()->get('show') === 'trashed' || (isset($show) && $show === 'trashed'))
                                <form action="{{ route('proveedores.restore', $proveedor->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    <button class="btn btn-sm btn-pink-dark" style="font-size: 0.8rem; white-space: nowrap; border: none;"><i class="fa fa-rotate-left me-1"></i>Restaurar</button>
                                </form>

                                <form action="{{ route('proveedores.forceDelete', $proveedor->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Eliminar permanentemente?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-pink-dark" style="font-size: 0.8rem; white-space: nowrap; border: none; background-color: #c23c5f;" title="Eliminar definitivo"><i class="fa fa-trash me-1"></i>Eliminar</button>
                                </form>
                            @else
                                <form action="{{ route('proveedores.destroy', $proveedor->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Eliminar (borrado lógico)?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-pink-dark" style="font-size: 0.8rem; white-space: nowrap; border: none; background-color: #c23c5f;"><i class="fa fa-trash-alt me-1"></i>Eliminar</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            <div class="d-flex justify-content-between align-items-center" style="flex-wrap: wrap; gap: 1rem;">
                <div class="text-muted" style="font-size: 0.8rem;">Mostrando {{ $proveedores->firstItem() ?? 0 }} - {{ $proveedores->lastItem() ?? 0 }} de {{ $proveedores->total() }}</div>
                <div>
                    {{ $proveedores->withQueryString()->links('vendor.pagination.custom-pagination') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
