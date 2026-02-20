@extends('layouts.app')

@section('content')
<div class="container">
	<h1>Detalle de Ítem</h1>

	<div class="card">
		<div class="card-body">
			<p><strong>SKU: </strong> {{ $item->sku }}</p>
			<p><strong>Descripción: </strong> {{ $item->descripcion ?? '-' }}</p>
			<p><strong>Cantidad: </strong> {{ $item->cantidad }}</p>
			<p><strong>Ubicación: </strong> {{ $item->ubicacion ?? '-' }}</p>
			<a href="{{ route('stock.index') }}" class="btn btn-secondary mt-3">Volver</a>
		</div>
	</div>
</div>
@endsection
