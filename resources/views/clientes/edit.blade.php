@extends('layouts.app')

@section('content')
<div class="container">
	<h1>Editar Cliente</h1>

	@if ($errors->any())
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif

	<form action="{{ route('clientes.update', $cliente->id) }}" method="POST">
		@csrf
		@method('PUT')
		<div class="mb-3">
			<label class="form-label">Nombre</label>
			<input type="text" name="nombre" class="form-control" value="{{ old('nombre', $cliente->nombre) }}" required>
		</div>
		<div class="mb-3">
			<label class="form-label">Apellido</label>
			<input type="text" name="apellido" class="form-control" value="{{ old('apellido', $cliente->apellido) }}">
		</div>
		<div class="mb-3">
			<label class="form-label">Email</label>
			<input type="email" name="email" class="form-control" value="{{ old('email', $cliente->email) }}">
		</div>
		<div class="mb-3">
			<label class="form-label">Teléfono</label>
			<input type="text" name="telefono" class="form-control" value="{{ old('telefono', $cliente->telefono) }}">
		</div>
		<div class="mb-3">
			<label class="form-label">Dirección</label>
			<input type="text" name="direccion" class="form-control" value="{{ old('direccion', $cliente->direccion) }}">
		</div>
		<button class="btn btn-primary">Actualizar</button>
	</form>
</div>
@endsection
