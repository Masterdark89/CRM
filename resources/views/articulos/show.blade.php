@extends('layouts.app')

@section('content')
<div class="container">
	<h1>Detalle de Artículo</h1>

	<div class="card">
		<div class="card-body">
			<p><strong>Título: </strong> {{ $articulo->titulo }}</p>
			<p><strong>Precio: </strong> {{ number_format($articulo->precio,2) }}</p>
			<p><strong>Disponible: </strong> {{ $articulo->disponible ? 'Sí' : 'No' }}</p>
			<p><strong>Descripción: </strong> {{ $articulo->descripcion ?? '-' }}</p>
			<a href="{{ route('articulos.index') }}" class="btn btn-secondary mt-3">Volver</a>
		</div>
	</div>
</div>
@endsection