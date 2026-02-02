@extends('layouts.app')

@section('content')
<div class="container">
	<div class="d-flex justify-content-between align-items-center mb-3">
		<div>
			<h1>Artículos</h1>
			<p style="color: #7f8c8d; margin: 5px 0;">Gestión de artículos y publicaciones</p>
		</div>
		<a href="{{ route('articulos.create') }}" class="btn btn-primary">+ Nuevo Artículo</a>
	</div>

	@if(session('success'))
		<div class="alert alert-success">✓ {{ session('success') }}</div>
	@endif

	@if(isset($articulos) && $articulos->count())
		<div class="card">
			<div class="card-body">
				<table class="table">
					<thead>
						<tr>
							<th>ID</th>
							<th>Título</th>
							<th>Precio</th>
							<th>Disponible</th>
							<th style="width: 200px;">Acciones</th>
						</tr>
					</thead>
					<tbody>
						@foreach($articulos as $art)
							<tr>
								<td><strong>#{{ $art->id }}</strong></td>
								<td>{{ $art->titulo }}</td>
								<td>{{ number_format($art->precio,2) }}</td>
								<td>{{ $art->disponible ? 'Sí' : 'No' }}</td>
								<td>
									<a href="{{ route('articulos.show', $art->id) }}" class="btn btn-sm btn-info">Ver</a>
									<a href="{{ route('articulos.edit', $art->id) }}" class="btn btn-sm btn-warning">Editar</a>
									<form action="{{ route('articulos.destroy', $art->id) }}" method="POST" style="display:inline-block" onsubmit="return confirm('¿Eliminar artículo?')">
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
				<p style="font-size: 1.1rem; color: #7f8c8d;">No hay artículos registrados.</p>
				<a href="{{ route('articulos.create') }}" class="btn btn-primary mt-3">Crear primer artículo</a>
			</div>
		</div>
	@endif
</div>

@endsection