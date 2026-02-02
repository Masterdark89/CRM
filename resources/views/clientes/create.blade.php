@extends('layouts.app')

@section('content')
<div class="container">
	<h1>Crear Cliente</h1>

	@if ($errors->any())
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif

	<form action="{{ route('clientes.store') }}" method="POST">
		@csrf
		<div class="mb-3">
			<label class="form-label">Nombre</label>
			<input type="text" name="nombre" class="form-control" value="{{ old('nombre') }}" required>
		</div>
		<div class="mb-3">
			<label class="form-label">Apellido</label>
			<input type="text" name="apellido" class="form-control" value="{{ old('apellido') }}">
		</div>
		<div class="mb-3">
			<label class="form-label">Email</label>
			<input type="email" name="email" class="form-control" value="{{ old('email') }}">
		</div>
		<div class="mb-3">
			<label class="form-label">Teléfono</label>
			<input type="text" name="telefono" class="form-control" value="{{ old('telefono') }}">
		</div>
		<div class="mb-3">
			<label class="form-label">Dirección</label>
			<input type="text" name="direccion" class="form-control" value="{{ old('direccion') }}">
		</div>
		<button class="btn btn-primary">Crear</button>
	</form>
</div>
@endsection
