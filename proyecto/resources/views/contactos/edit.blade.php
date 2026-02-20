@extends('layouts.app')

@section('content')
<div class="container">
	<h1>Editar Contacto</h1>

	@if ($errors->any())
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif

	<form action="{{ route('contactos.update', $contacto->id) }}" method="POST">
		@csrf
		@method('PUT')
		<div class="mb-3">
			<label class="form-label">Nombre</label>
			<input type="text" name="nombre" class="form-control" value="{{ old('nombre', $contacto->nombre) }}" required>
		</div>
		<div class="mb-3">
			<label class="form-label">Compañía</label>
			<input type="text" name="compania" class="form-control" value="{{ old('compania', $contacto->compania) }}">
		</div>
		<div class="mb-3">
			<label class="form-label">Email</label>
			<input type="email" name="email" class="form-control" value="{{ old('email', $contacto->email) }}">
		</div>
		<div class="mb-3">
			<label class="form-label">Teléfono</label>
			<input type="text" name="telefono" class="form-control" value="{{ old('telefono', $contacto->telefono) }}">
		</div>
		<div class="mb-3">
			<label class="form-label">Notas</label>
			<textarea name="notas" class="form-control">{{ old('notas', $contacto->notas) }}</textarea>
		</div>
		<button class="btn btn-primary">Actualizar</button>
	</form>
</div>
@endsection
