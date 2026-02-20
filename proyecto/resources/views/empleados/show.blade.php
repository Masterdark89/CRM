@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start">
                        <div><h4 class="card-title mb-1">{{ $empleado->nombre }}</h4><div class="text-muted small">{{ $empleado->puesto }} • {{ $empleado->departamento }}</div></div>
                        <div>
                            <a href="{{ route('empleados.edit', $empleado->id) }}" class="btn btn-sm btn-outline-warning me-2"><i class="fa fa-pen"></i> Editar</a>
                            <a href="{{ route('empleados.index') }}" class="btn btn-sm btn-outline-secondary">Volver</a>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6 mb-3"><h6 class="mb-1"><i class="fa fa-envelope me-2 text-muted"></i> Email</h6><div>{{ $empleado->email ?? '-' }}</div></div>
                        <div class="col-md-6 mb-3"><h6 class="mb-1"><i class="fa fa-phone me-2 text-muted"></i> Teléfono</h6><div>{{ $empleado->telefono ?? '-' }}</div></div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3"><h6 class="mb-1"><i class="fa fa-briefcase me-2 text-muted"></i> Puesto</h6><div>{{ $empleado->puesto ?? '-' }}</div></div>
                        <div class="col-md-6 mb-3"><h6 class="mb-1"><i class="fa fa-building me-2 text-muted"></i> Departamento</h6><div>{{ $empleado->departamento ?? '-' }}</div></div>
                    </div>
                    <div class="mb-3"><h6 class="mb-1"><i class="fa fa-dollar-sign me-2 text-muted"></i> Salario</h6><div class="fw-semibold">{{ number_format($empleado->salario ?? 0, 2, '.', ',') }}€</div></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
