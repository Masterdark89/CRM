@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h4 class="card-title mb-3">Editar producto</h4>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('productos.update', $producto->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label">Nombre</label>
                            <input type="text" name="nombre" class="form-control form-control-lg" value="{{ old('nombre', $producto->nombre) }}" placeholder="Nombre del producto">
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Precio</label>
                                <input type="number" name="precio" class="form-control" value="{{ old('precio', $producto->precio) }}" step="0.01" placeholder="0.00">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Stock</label>
                                <input type="number" name="stock" class="form-control" value="{{ old('stock', $producto->stock) }}" placeholder="0">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">SKU</label>
                            <input type="text" name="sku" class="form-control" value="{{ old('sku', $producto->sku) }}" placeholder="SKU único">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Descripción</label>
                            <textarea name="descripcion" class="form-control" rows="3" placeholder="Descripción del producto">{{ old('descripcion', $producto->descripcion) }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Imagen del Producto</label>
                            @if($producto->imagen)
                                <div class="mb-2">
                                    <img src="{{ asset($producto->imagen) }}" alt="Imagen actual" style="max-width: 150px; height: auto;" class="img-thumbnail">
                                    <p class="text-muted small">Imagen actual</p>
                                </div>
                            @endif
                            <input type="file" name="imagen" class="form-control" accept="image/*">
                            <small class="form-text text-muted">Seleccionar nueva imagen para reemplazar (JPG, PNG, GIF - Máx. 2MB)</small>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Archivo PDF (Ficha Técnica, Manual, etc.)</label>
                            @if($producto->archivo_pdf)
                                <div class="mb-2">
                                    <a href="{{ asset($producto->archivo_pdf) }}" target="_blank" class="btn btn-sm btn-outline-danger">
                                        <i class="fa fa-file-pdf"></i> Ver PDF actual
                                    </a>
                                </div>
                            @endif
                            <input type="file" name="archivo_pdf" class="form-control" accept=".pdf">
                            <small class="form-text text-muted">Seleccionar nuevo PDF para reemplazar (Máx. 5MB)</small>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('productos.index') }}" class="btn btn-outline-pink-dark">Cancelar</a>
                            <button class="btn btn-pink">Actualizar producto</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
