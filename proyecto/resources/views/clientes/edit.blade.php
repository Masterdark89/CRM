@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h4 class="card-title mb-3">Editar cliente</h4>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('clientes.update', $cliente->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label">Nombre</label>
                            <input type="text" name="nombre" class="form-control form-control-lg" value="{{ old('nombre', $cliente->nombre) }}" placeholder="Nombre completo">
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" value="{{ old('email', $cliente->email) }}" placeholder="correo@ejemplo.com">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Teléfono</label>
                                <input type="text" name="telefono" class="form-control" value="{{ old('telefono', $cliente->telefono) }}" placeholder="+34 600 000 000">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Dirección</label>
                            <textarea name="direccion" class="form-control" rows="3" placeholder="Dirección completa">{{ old('direccion', $cliente->direccion) }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Foto del Cliente</label>
                            @if($cliente->imagen)
                                <div class="mb-2">
                                    <img src="{{ asset($cliente->imagen) }}" alt="Foto actual" style="max-width: 150px; height: auto;" class="img-thumbnail">
                                    <p class="text-muted small">Imagen actual</p>
                                </div>
                            @endif
                            <input type="file" name="imagen" class="form-control" accept="image/*">
                            <small class="form-text text-muted">Seleccionar nueva imagen para reemplazar (JPG, PNG, GIF - Máx. 2MB)</small>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('clientes.index') }}" class="btn btn-outline-pink">Cancelar</a>
                            <button class="btn btn-pink">Actualizar cliente</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
