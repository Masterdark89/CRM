@extends('layouts.app')

@section('content')
<div class="container">
	<h1>Agregar Ítem de Stock</h1>

	@if ($errors->any())
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif

	<form action="{{ route('stock.store') }}" method="POST">
		@csrf
		<div class="mb-3">
			<label class="form-label">SKU</label>
			<input type="text" name="sku" class="form-control" value="{{ old('sku') }}" required>
		</div>
		<div class="mb-3">
			<label class="form-label">Descripción</label>
			<textarea name="descripcion" class="form-control">{{ old('descripcion') }}</textarea>
		</div>
		<div class="mb-3">
			<label class="form-label">Cantidad</label>
			<input type="number" name="cantidad" class="form-control" value="{{ old('cantidad', 0) }}" required>
		</div>
		<div class="mb-3">
			<label class="form-label">Ubicación</label>
			<input type="text" name="ubicacion" class="form-control" value="{{ old('ubicacion') }}">
		</div>
		<button class="btn btn-primary">Guardar</button>
	</form>
</div>
@endsection