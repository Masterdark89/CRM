@extends('layouts.app')

@section('content')
<div class="container">
	<h1>Detalle de Personal</h1>

	<div class="card">
		<div class="card-body">
			<p><strong>Nombre: </strong> {{ $personal->nombre }}</p>
			<p><strong>Cargo: </strong> {{ $personal->cargo }}</p>
			<p><strong>Email: </strong> {{ $personal->email ?? 'N/A' }}</p>
			<p><strong>Teléfono: </strong> {{ $personal->telefono ?? 'N/A' }}</p>
			<p><strong>Activo: </strong> {{ $personal->activo ? 'Sí' : 'No' }}</p>
			<a href="{{ route('personal.index') }}" class="btn btn-secondary mt-3">Volver</a>
		</div>
	</div>
</div>
@endsection
