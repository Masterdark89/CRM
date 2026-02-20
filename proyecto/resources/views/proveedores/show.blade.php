@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <h4 class="card-title mb-1">{{ $proveedor->nombre }}</h4>
                            <div class="text-muted small">ID: {{ $proveedor->id }} • {{ $proveedor->empresa }}</div>
                        </div>
                        <div>
                            <a href="{{ route('proveedores.edit', $proveedor->id) }}" class="btn btn-sm btn-outline-warning me-2"><i class="fa fa-pen"></i> Editar</a>
                            <a href="{{ route('proveedores.index') }}" class="btn btn-sm btn-outline-secondary">Volver</a>
                        </div>
                    </div>
                    <hr>
                    <div class="mb-3">
                        <h6 class="mb-1"><i class="fa fa-envelope me-2 text-muted"></i> Email</h6>
                        <div>{{ $proveedor->email ?? '-' }}</div>
                    </div>
                    <div class="mb-3">
                        <h6 class="mb-1"><i class="fa fa-phone me-2 text-muted"></i> Teléfono</h6>
                        <div>{{ $proveedor->telefono ?? '-' }}</div>
                    </div>
                    <div class="mb-3">
                        <h6 class="mb-1"><i class="fa fa-building me-2 text-muted"></i> Dirección</h6>
                        <div>{{ $proveedor->direccion ?? '-' }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
