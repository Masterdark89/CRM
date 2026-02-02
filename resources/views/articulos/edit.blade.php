@extends('layouts.app')

@section('content')
<div class="container">
	<h1>Editar Artículo</h1>

	@if ($errors->any())
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif

	<form action="{{ route('articulos.update', $articulo->id) }}" method="POST">
		@csrf
		@method('PUT')
		<div class="mb-3">
			<label class="form-label">Título</label>
			<input type="text" name="titulo" class="form-control" value="{{ old('titulo', $articulo->titulo) }}" required>
		</div>
		<div class="mb-3">
			<label class="form-label">Descripción</label>
			<textarea name="descripcion" class="form-control">{{ old('descripcion', $articulo->descripcion) }}</textarea>
		</div>
		<div class="mb-3">
			<label class="form-label">Precio</label>
			<input type="number" step="0.01" name="precio" class="form-control" value="{{ old('precio', $articulo->precio) }}" required>
		</div>
		<div class="mb-3 form-check">
			<input type="checkbox" name="disponible" value="1" class="form-check-input" id="disponible" {{ old('disponible', $articulo->disponible) ? 'checked' : '' }}>
			<label class="form-check-label" for="disponible">Disponible</label>
		</div>
		<button class="btn btn-primary">Actualizar</button>
	</form>
</div>
@endsection