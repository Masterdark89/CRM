@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col-md-8"><h2 class="mb-0">Facturas</h2></div>
        <div class="col-md-4 text-md-end"><a href="{{ route('facturas.create') }}" class="btn btn-pink"><i class="fa fa-plus me-1"></i> Nueva factura</a></div>
    </div>
    <div class="card mb-3">
        <div class="card-body">
            <form method="GET" action="{{ route('facturas.index') }}" class="row g-2 align-items-center">
                <div class="col-md-5"><div class="input-group"><span class="input-group-text"><i class="fa fa-search"></i></span><input name="q" value="{{ $q ?? '' }}" class="form-control" placeholder="Buscar por número de factura"></div></div>
                <div class="col-auto"><select name="show" class="form-select"><option value="active" {{ (isset($show) && $show !== 'trashed') ? 'selected' : '' }}>Activas</option><option value="trashed" {{ (isset($show) && $show === 'trashed') ? 'selected' : '' }}>Borradas</option></select></div>
                <div class="col-auto"><button class="btn btn-outline-pink-dark"><i class="fa fa-filter"></i> Filtrar</button></div>
            </form>
        </div>
    </div>
    @if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif
    <div class="card">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0" style="font-size: 0.9rem;">
                <thead class="table-light">
                    <tr><th>Factura</th><th>Monto</th><th>Fecha</th><th>Estado</th><th class="text-end">Acciones</th></tr>
                </thead>
                <tbody>
                    @foreach($facturas as $factura)
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="me-3"><div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center" style="width:40px;height:40px;font-weight:600;font-size:0.9rem;">F</div></div>
                                <div><div class="fw-semibold" style="font-size: 0.95rem;">{{ $factura->numero }}@if($factura->deleted_at)<span class="badge rounded-pill bg-danger ms-2" style="font-size: 0.7rem;">Borrada</span>@endif</div><div class="text-muted" style="font-size: 0.75rem;">ID: {{ $factura->id }}</div></div>
                            </div>
                        </td>
                        <td style="font-size: 0.85rem; font-weight: 600;">{{ number_format($factura->monto, 2, '.', ',') }}€</td>
                        <td style="font-size: 0.85rem;">{{ $factura->fecha?->format('d/m/Y') }}</td>
                        <td><span class="badge rounded-pill" style="background-color: {{ $factura->estado === 'pagada' ? '#28a745' : '#ffc107' }}">{{ ucfirst($factura->estado) }}</span></td>
                        <td class="text-end" style="display: flex; gap: 0.5rem; justify-content: flex-end; flex-wrap: wrap;">
                            <a href="{{ route('facturas.show', $factura->id) }}" class="btn btn-sm" style="font-size: 0.8rem; white-space: nowrap; background-color: #fff; border: 1.5px solid var(--pink-dark); color: var(--pink-dark); font-weight: 500;"><i class="fa fa-eye me-1"></i>Ver</a>
                            <a href="{{ route('facturas.edit', $factura->id) }}" class="btn btn-sm" style="font-size: 0.8rem; white-space: nowrap; background-color: #ffb3d9; border: 1.5px solid #ffb3d9; color: #fff; font-weight: 500;"><i class="fa fa-pen me-1"></i>Editar</a>
                            @if(request()->get('show') === 'trashed')
                                <form action="{{ route('facturas.restore', $factura->id) }}" method="POST" class="d-inline">@csrf<button class="btn btn-sm btn-pink-dark" style="font-size: 0.8rem; white-space: nowrap; border: none;"><i class="fa fa-rotate-left me-1"></i>Restaurar</button></form>
                                <form action="{{ route('facturas.forceDelete', $factura->id) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Eliminar?');"><@csrf @method('DELETE')<button class="btn btn-sm btn-pink-dark" style="font-size: 0.8rem; white-space: nowrap; border: none; background-color: #c23c5f;"><i class="fa fa-trash me-1"></i>Eliminar</button></form>
                            @else
                                <form action="{{ route('facturas.destroy', $factura->id) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Eliminar?');"><@csrf @method('DELETE')<button class="btn btn-sm btn-pink-dark" style="font-size: 0.8rem; white-space: nowrap; border: none; background-color: #c23c5f;"><i class="fa fa-trash-alt me-1"></i>Eliminar</button></form>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            <div class="d-flex justify-content-between align-items-center" style="flex-wrap: wrap; gap: 1rem;">
                <div class="text-muted" style="font-size: 0.8rem;">Mostrando {{ $facturas->firstItem() ?? 0 }} - {{ $facturas->lastItem() ?? 0 }} de {{ $facturas->total() }}</div>
                <div>{{ $facturas->withQueryString()->links('vendor.pagination.custom-pagination') }}</div>
            </div>
        </div>
    </div>
</div>
@endsection
