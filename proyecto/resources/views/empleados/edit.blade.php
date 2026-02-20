@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h4 class="card-title mb-3">Editar empleado</h4>
                    @if ($errors->any())<div class="alert alert-danger"><ul class="mb-0">@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>@endif
                    <form action="{{ route('empleados.update', $empleado->id) }}" method="POST">
                        @csrf @method('PUT')
                        <div class="mb-3"><label class="form-label">Nombre</label><input type="text" name="nombre" class="form-control form-control-lg" value="{{ old('nombre', $empleado->nombre) }}" placeholder="Nombre completo"></div>
                        <div class="row">
                            <div class="col-md-6 mb-3"><label class="form-label">Email</label><input type="email" name="email" class="form-control" value="{{ old('email', $empleado->email) }}" placeholder="correo@ejemplo.com"></div>
                            <div class="col-md-6 mb-3"><label class="form-label">Teléfono</label><input type="text" name="telefono" class="form-control" value="{{ old('telefono', $empleado->telefono) }}" placeholder="+34 600 000 000"></div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3"><label class="form-label">Puesto</label><input type="text" name="puesto" class="form-control" value="{{ old('puesto', $empleado->puesto) }}" placeholder="Puesto de trabajo"></div>
                            <div class="col-md-6 mb-3"><label class="form-label">Departamento</label><input type="text" name="departamento" class="form-control" value="{{ old('departamento', $empleado->departamento) }}" placeholder="Departamento"></div>
                        </div>
                        <div class="mb-3"><label class="form-label">Salario</label><input type="number" name="salario" class="form-control" value="{{ old('salario', $empleado->salario) }}" step="0.01" placeholder="0.00"></div>
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('empleados.index') }}" class="btn btn-outline-pink-dark">Cancelar</a>
                            <button class="btn btn-pink">Actualizar empleado</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
