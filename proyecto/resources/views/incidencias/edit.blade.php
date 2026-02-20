@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h4 class="card-title mb-3">Editar incidencia</h4>
                    @if ($errors->any())<div class="alert alert-danger"><ul class="mb-0">@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>@endif
                    <form action="{{ route('incidencias.update', $incidencia) }}" method="POST">
                        @csrf @method('PUT')
                        <div class="mb-3"><label class="form-label">Título</label><input type="text" name="titulo" class="form-control form-control-lg" value="{{ old('titulo', $incidencia->titulo) }}" placeholder="Título de la incidencia"></div>
                        <div class="mb-3"><label class="form-label">Descripción</label><textarea name="descripcion" class="form-control" rows="4" placeholder="Describa los detalles de la incidencia">{{ old('descripcion', $incidencia->descripcion) }}</textarea></div>
                        <div class="row">
                            <div class="col-md-6 mb-3"><label class="form-label">Estado</label><select name="estado" class="form-select">
                                <option value="abierta" {{ old('estado', $incidencia->estado) === 'abierta' ? 'selected' : '' }}>Abierta</option>
                                <option value="pendiente" {{ old('estado', $incidencia->estado) === 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                                <option value="cerrada" {{ old('estado', $incidencia->estado) === 'cerrada' ? 'selected' : '' }}>Cerrada</option>
                            </select></div>
                            <div class="col-md-6 mb-3"><label class="form-label">Prioridad</label><select name="prioridad" class="form-select">
                                <option value="baja" {{ old('prioridad', $incidencia->prioridad) === 'baja' ? 'selected' : '' }}>Baja</option>
                                <option value="normal" {{ old('prioridad', $incidencia->prioridad) === 'normal' ? 'selected' : '' }}>Normal</option>
                                <option value="alta" {{ old('prioridad', $incidencia->prioridad) === 'alta' ? 'selected' : '' }}>Alta</option>
                            </select></div>
                        </div>
                        <div class="mb-3"><label class="form-label">Usuario responsable</label><select name="usuario_id" class="form-select">
                            <option value="">Seleccionar usuario</option>
                            @foreach(\App\Models\User::orderBy('name')->get() as $user)
                                <option value="{{ $user->id }}" {{ $incidencia->usuario_id == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                            @endforeach
                        </select></div>
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('incidencias.index') }}" class="btn btn-outline-pink-dark">Cancelar</a>
                            <button class="btn btn-pink">Guardar cambios</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
