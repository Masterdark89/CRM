@extends('layouts.app')

@section('content')
<div class="container">
	<h1>Detalle de Contacto</h1>

	<div class="card">
		<div class="card-body">
			<p><strong>Nombre: </strong> {{ $contacto->nombre }}</p>
			<p><strong>Compañía: </strong> {{ $contacto->compania ?? '-' }}</p>
			<p><strong>Email: </strong> {{ $contacto->email ?? 'N/A' }}</p>
			<p><strong>Teléfono: </strong> {{ $contacto->telefono ?? 'N/A' }}</p>
			<p><strong>Notas: </strong> {{ $contacto->notas ?? '-' }}</p>
			<a href="{{ route('contactos.index') }}" class="btn btn-secondary mt-3">Volver</a>
		</div>
	</div>
</div>
@endsection
