@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <h4 class="card-title mb-1">{{ $producto->nombre }}</h4>
                            <div class="text-muted small">ID: {{ $producto->id }} • Creado: {{ $producto->created_at?->format('d/m/Y') }}</div>
                        </div>
                        <div>
                            <a href="{{ route('productos.edit', $producto->id) }}" class="btn btn-sm btn-outline-warning me-2"><i class="fa fa-pen"></i> Editar</a>
                            <a href="{{ route('productos.index') }}" class="btn btn-sm btn-outline-secondary">Volver</a>
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <h6 class="mb-1"><i class="fa fa-tag me-2 text-muted"></i> SKU</h6>
                            <div>{{ $producto->sku ?? '-' }}</div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <h6 class="mb-1"><i class="fa fa-dollar-sign me-2 text-muted"></i> Precio</h6>
                            <div class="fw-semibold">{{ number_format($producto->precio, 2, '.', ',') }}€</div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <h6 class="mb-1"><i class="fa fa-boxes me-2 text-muted"></i> Stock</h6>
                        <div><span class="badge rounded-pill bg-info">{{ $producto->stock }} unidades</span></div>
                    </div>

                    <div class="mb-3">
                        <h6 class="mb-1"><i class="fa fa-align-left me-2 text-muted"></i> Descripción</h6>
                        <div>{{ $producto->descripcion ?? '-' }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
