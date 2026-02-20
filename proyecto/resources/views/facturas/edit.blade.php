@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h4 class="card-title mb-3">Editar factura</h4>
                    @if ($errors->any())<div class="alert alert-danger"><ul class="mb-0">@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>@endif
                    <form action="{{ route('facturas.update', $factura) }}" method="POST">
                        @csrf @method('PUT')
                        <div class="mb-3"><label class="form-label">Número de factura</label><input type="text" name="numero" class="form-control form-control-lg" value="{{ old('numero', $factura->numero) }}" placeholder="FAC-001"></div>
                        <div class="row">
                            <div class="col-md-6 mb-3"><label class="form-label">Cliente</label><select name="cliente_id" class="form-select">
                                <option value="">Seleccionar cliente</option>
                                @foreach(\App\Models\Clientes::orderBy('nombre')->get() as $cliente)
                                    <option value="{{ $cliente->id }}" {{ $factura->cliente_id == $cliente->id ? 'selected' : '' }}>{{ $cliente->nombre }}</option>
                                @endforeach
                            </select></div>
                            <div class="col-md-6 mb-3"><label class="form-label">Fecha</label><input type="date" name="fecha" class="form-control" value="{{ old('fecha', $factura->fecha) }}"></div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3"><label class="form-label">Monto</label><input type="number" name="monto" class="form-control" value="{{ old('monto', $factura->monto) }}" step="0.01" placeholder="0.00"></div>
                            <div class="col-md-6 mb-3"><label class="form-label">Estado</label><select name="estado" class="form-select">
                                <option value="pendiente" {{ old('estado', $factura->estado) === 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                                <option value="pagada" {{ old('estado', $factura->estado) === 'pagada' ? 'selected' : '' }}>Pagada</option>
                            </select></div>
                        </div>
                        <div class="mb-3"><label class="form-label">Notas</label><textarea name="notas" class="form-control" rows="3" placeholder="Notas de la factura">{{ old('notas', $factura->notas) }}</textarea></div>
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('facturas.index') }}" class="btn btn-outline-pink-dark">Cancelar</a>
                            <button class="btn btn-pink">Guardar cambios</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
