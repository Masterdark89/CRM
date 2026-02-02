@extends('layouts.app')

@section('content')
<div class="container">
	<h1>Editar Registro de Personal</h1>

	@if ($errors->any())
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif

	<form action="{{ route('personal.update', $personal->id) }}" method="POST">
		@csrf
		@method('PUT')
		<div class="mb-3">
			<label class="form-label">Nombre</label>
			<input type="text" name="nombre" class="form-control" value="{{ old('nombre', $personal->nombre) }}" required>
		</div>
		<div class="mb-3">
			<label class="form-label">Cargo</label>
			<input type="text" name="cargo" class="form-control" value="{{ old('cargo', $personal->cargo) }}" required>
		</div>
		<div class="mb-3">
			<label class="form-label">Email</label>
			<input type="email" name="email" class="form-control" value="{{ old('email', $personal->email) }}">
		</div>
		<div class="mb-3">
			<label class="form-label">Teléfono</label>
			<input type="text" name="telefono" class="form-control" value="{{ old('telefono', $personal->telefono) }}">
		</div>
		<div class="mb-3 form-check">
			<input type="checkbox" name="activo" value="1" class="form-check-input" id="activo" {{ old('activo', $personal->activo) ? 'checked' : '' }}>
			<label class="form-check-label" for="activo">Activo</label>
		</div>
		<button class="btn btn-primary">Actualizar</button>
	</form>
</div>
@endsection