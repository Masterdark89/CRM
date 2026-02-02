@extends('layouts.app')

@section('content')
<div class="container">
	<div class="d-flex justify-content-between align-items-center mb-3">
		<div>
			<h1>Stock</h1>
			<p style="color: #7f8c8d; margin: 5px 0;">Gestión de inventario en formato SKU</p>
		</div>
		<a href="{{ route('stock.create') }}" class="btn btn-primary">+ Nuevo Ítem</a>
	</div>

	@if(session('success'))
		<div class="alert alert-success">✓ {{ session('success') }}</div>
	@endif

	@if(isset($items) && $items->count())
		<div class="card">
			<div class="card-body">
				<table class="table">
					<thead>
						<tr>
							<th>ID</th>
							<th>SKU</th>
							<th>Descripción</th>
							<th>Cantidad</th>
							<th style="width: 200px;">Acciones</th>
						</tr>
					</thead>
					<tbody>
						@foreach($items as $item)
							<tr>
								<td><strong>#{{ $item->id }}</strong></td>
								<td>{{ $item->sku }}</td>
								<td>{{ Str::limit($item->descripcion, 60) }}</td>
								<td>{{ $item->cantidad }}</td>
								<td>
									<a href="{{ route('stock.show', $item->id) }}" class="btn btn-sm btn-info">Ver</a>
									<a href="{{ route('stock.edit', $item->id) }}" class="btn btn-sm btn-warning">Editar</a>
									<form action="{{ route('stock.destroy', $item->id) }}" method="POST" style="display:inline-block" onsubmit="return confirm('¿Eliminar ítem?')">
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
				<p style="font-size: 1.1rem; color: #7f8c8d;">No hay ítems en el stock.</p>
				<a href="{{ route('stock.create') }}" class="btn btn-primary mt-3">Agregar primer ítem</a>
			</div>
		</div>
	@endif
</div>

@endsection