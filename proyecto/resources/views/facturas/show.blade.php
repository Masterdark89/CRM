@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start mb-4">
                        <h4 class="card-title">{{ $factura->numero }}</h4>
                        <div>
                            <a href="{{ route('facturas.edit', $factura) }}" class="btn btn-sm" style="background-color: #ffb3d9; color: #333;">Editar</a>
                            <form action="{{ route('facturas.destroy', $factura) }}" method="POST" style="display: inline;">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-pink-dark" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                            </form>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <p class="text-muted mb-1">Cliente</p>
                            <p class="h6">{{ $factura->cliente->nombre ?? 'N/A' }}</p>
                        </div>
                        <div class="col-md-6">
                            <p class="text-muted mb-1">Fecha</p>
                            <p class="h6">{{ \Carbon\Carbon::parse($factura->fecha)->format('d/m/Y') }}</p>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <p class="text-muted mb-1">Monto</p>
                            <p class="h6">€{{ number_format($factura->monto, 2, ',', '.') }}</p>
                        </div>
                        <div class="col-md-6">
                            <p class="text-muted mb-1">Estado</p>
                            <span class="badge {{ $factura->estado === 'pagada' ? 'bg-success' : 'bg-warning' }}">{{ ucfirst($factura->estado) }}</span>
                        </div>
                    </div>
                    @if ($factura->notas)
                        <div class="mb-4">
                            <p class="text-muted mb-1">Notas</p>
                            <p>{{ $factura->notas }}</p>
                        </div>
                    @endif
                    <a href="{{ route('facturas.index') }}" class="btn btn-outline-pink-dark">Volver</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
