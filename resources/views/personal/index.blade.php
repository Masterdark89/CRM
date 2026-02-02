@extends('layouts.app')

@section('content')
<div class="container">
	<div class="d-flex justify-content-between align-items-center mb-3">
		<div>
			<h1>Personal</h1>
			<p style="color: #7f8c8d; margin: 5px 0;">Lista de empleados y colaboradores</p>
		</div>
		<a href="{{ route('personal.create') }}" class="btn btn-primary">+ Nuevo</a>
	</div>

	@if(session('success'))
		<div class="alert alert-success">✓ {{ session('success') }}</div>
	@endif

	@if(isset($personal) && $personal->count())
		<div class="card">
			<div class="card-body">
				<table class="table">
					<thead>
						<tr>
							<th>ID</th>
							<th>Nombre</th>
							<th>Cargo</th>
							<th>Email</th>
							<th style="width: 200px;">Acciones</th>
						</tr>
					</thead>
					<tbody>
						@foreach($personal as $p)
							<tr>
								<td><strong>#{{ $p->id }}</strong></td>
								<td>{{ $p->nombre }}</td>
								<td>{{ $p->cargo }}</td>
								<td>{{ $p->email ?? 'N/A' }}</td>
								<td>
									<a href="{{ route('personal.show', $p->id) }}" class="btn btn-sm btn-info">Ver</a>
									<a href="{{ route('personal.edit', $p->id) }}" class="btn btn-sm btn-warning">Editar</a>
									<form action="{{ route('personal.destroy', $p->id) }}" method="POST" style="display:inline-block" onsubmit="return confirm('¿Eliminar registro?')">
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
				<p style="font-size: 1.1rem; color: #7f8c8d;">No hay registros de personal.</p>
				<a href="{{ route('personal.create') }}" class="btn btn-primary mt-3">Agregar registro</a>
			</div>
		</div>
	@endif
</div>

@endsection