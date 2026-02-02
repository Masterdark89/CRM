@extends('layouts.app')

@section('content')
<div class="container">
	<h1>Detalle de Cliente</h1>

	<div class="card">
		<div class="card-body">
			<p><strong>Nombre: </strong> {{ $cliente->nombre }}</p>
			<p><strong>Apellido: </strong> {{ $cliente->apellido ?? '-' }}</p>
			<p><strong>Email: </strong> {{ $cliente->email ?? 'N/A' }}</p>
			<p><strong>Teléfono: </strong> {{ $cliente->telefono ?? 'N/A' }}</p>
			<p><strong>Dirección: </strong> {{ $cliente->direccion ?? '-' }}</p>
			<a href="{{ route('clientes.index') }}" class="btn btn-secondary mt-3">Volver</a>
		</div>
	</div>
</div>
@endsection
