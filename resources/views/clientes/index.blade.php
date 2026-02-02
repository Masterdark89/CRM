@extends('layouts.app')

@section('content')
<div class="container">
	<div class="d-flex justify-content-between align-items-center mb-3">
		<div>
			<h1>Clientes</h1>
			<p style="color: #7f8c8d; margin: 5px 0;">Gestión de clientes</p>
		</div>
		<a href="{{ route('clientes.create') }}" class="btn btn-primary">+ Nuevo Cliente</a>
	</div>

	@if(session('success'))
		<div class="alert alert-success">✓ {{ session('success') }}</div>
	@endif

	@if(isset($clientes) && $clientes->count())
		<div class="card">
			<div class="card-body">
				<table class="table">
					<thead>
						<tr>
							<th>ID</th>
							<th>Nombre</th>
							<th>Apellido</th>
							<th>Email</th>
							<th>Teléfono</th>
							<th>Dirección</th>
							<th style="width: 250px;">Acciones</th>
						</tr>
					</thead>
					<tbody>
						@foreach($clientes as $cliente)
							<tr>
								<td><strong>#{{ $cliente->id }}</strong></td>
								<td>{{ $cliente->nombre }}</td>
								<td>{{ $cliente->apellido ?? '-' }}</td>
								<td>{{ $cliente->email ?? 'N/A' }}</td>
								<td>{{ $cliente->telefono ?? 'N/A' }}</td>
								<td>{{ $cliente->direccion ?? '-' }}</td>
								<td>
									<a href="{{ route('clientes.show', $cliente->id) }}" class="btn btn-sm btn-info">Ver</a>
									<a href="{{ route('clientes.edit', $cliente->id) }}" class="btn btn-sm btn-warning">Editar</a>
									<form action="{{ route('clientes.destroy', $cliente->id) }}" method="POST" style="display:inline-block" onsubmit="return confirm('¿Eliminar cliente?')">
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
				<p style="font-size: 1.1rem; color: #7f8c8d;">No hay clientes registrados.</p>
				<a href="{{ route('clientes.create') }}" class="btn btn-primary mt-3">Crear primer cliente</a>
			</div>
		</div>
	@endif
</div>

@endsection
