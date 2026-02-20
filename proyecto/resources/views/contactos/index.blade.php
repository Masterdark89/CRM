@extends('layouts.app')

@section('content')
<div class="container">
	<div class="d-flex justify-content-between align-items-center mb-3">
		<div>
			<h1>Contactos</h1>
			<p style="color: #7f8c8d; margin: 5px 0;">Gestión de contactos y compañías</p>
		</div>
		<a href="{{ route('contactos.create') }}" class="btn btn-primary">+ Nuevo Contacto</a>
	</div>

	@if(session('success'))
		<div class="alert alert-success">✓ {{ session('success') }}</div>
	@endif

	@if(isset($contactos) && $contactos->count())
		<div class="card">
			<div class="card-body">
				<table class="table">
					<thead>
						<tr>
							<th>ID</th>
							<th>Nombre</th>
							<th>Compañía</th>
							<th>Email</th>
							<th style="width: 250px;">Acciones</th>
						</tr>
					</thead>
					<tbody>
						@foreach($contactos as $contacto)
							<tr>
								<td><strong>#{{ $contacto->id }}</strong></td>
								<td>{{ $contacto->nombre }}</td>
								<td>{{ $contacto->compania ?? '-' }}</td>
								<td>{{ $contacto->email ?? 'N/A' }}</td>
								<td>
									<a href="{{ route('contactos.show', $contacto->id) }}" class="btn btn-sm btn-info">Ver</a>
									<a href="{{ route('contactos.edit', $contacto->id) }}" class="btn btn-sm btn-warning">Editar</a>
									<form action="{{ route('contactos.destroy', $contacto->id) }}" method="POST" style="display:inline-block" onsubmit="return confirm('¿Eliminar contacto?')">
										@csrf
										@method('DELETE')
										<button class="btn btn-sm btn-danger">Eliminar</button>
									</form>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>

	@else
		<div class="card">
			<div class="card-body" style="text-align: center; padding: 50px;">
				<p style="font-size: 1.1rem; color: #7f8c8d;">No hay contactos registrados.</p>
				<a href="{{ route('contactos.create') }}" class="btn btn-primary mt-3">Crear primer contacto</a>
			</div>
		</div>
	@endif
</div>

@endsection
