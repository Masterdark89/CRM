@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <h4 class="card-title mb-1">{{ $cliente->nombre }}</h4>
                            <div class="text-muted small">ID: {{ $cliente->id }} • Creado: {{ $cliente->created_at?->format('d/m/Y') }}</div>
                        </div>
                        <div>
                            <a href="{{ route('clientes.edit', $cliente->id) }}" class="btn btn-sm btn-pink me-2"><i class="fa fa-pen"></i> Editar</a>
                            <a href="{{ route('clientes.index') }}" class="btn btn-sm btn-outline-pink">Volver</a>
                        </div>
                    </div>

                    <hr>

                    <div class="mb-3">
                        <h6 class="mb-1"><i class="fa fa-envelope me-2 text-muted"></i> Email</h6>
                        <div>{{ $cliente->email ?? '-' }}</div>
                    </div>

                    <div class="mb-3">
                        <h6 class="mb-1"><i class="fa fa-phone me-2 text-muted"></i> Teléfono</h6>
                        <div>{{ $cliente->telefono ?? '-' }}</div>
                    </div>

                    <div class="mb-3">
                        <h6 class="mb-1"><i class="fa fa-map-marker-alt me-2 text-muted"></i> Dirección</h6>
                        <div>{{ $cliente->direccion ?? '-' }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
