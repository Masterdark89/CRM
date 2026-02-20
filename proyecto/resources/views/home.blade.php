@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row mb-4">
        <div class="col">
            <h1 style="color: #e85692; font-weight: 800;">Bienvenido, {{ auth()->user()->name }}!</h1>
            <p style="color: #666; font-size: 1.1rem;">Aquí está tu resumen del CRM</p>
        </div>
    </div>

    @if (session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('status') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <!-- Stats Row -->
    <div class="row mb-4">
        <div class="col-md-4 mb-3">
            <a href="{{ route('clientes.index') }}" class="card shadow-sm border-0 text-decoration-none" style="border-top: 4px solid #ff6fa6; transition: all 0.3s ease; cursor: pointer;">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p class="text-muted mb-1">Clientes</p>
                            <h3 style="color: #e85692; font-weight: 700;">{{ \App\Models\Clientes::count() }}</h3>
                        </div>
                        <div style="font-size: 3rem; color: #ffe6f2;">
                            <i class="fas fa-users"></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-4 mb-3">
            <a href="{{ route('productos.index') }}" class="card shadow-sm border-0 text-decoration-none" style="border-top: 4px solid #ff6fa6; transition: all 0.3s ease; cursor: pointer;">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p class="text-muted mb-1">Productos</p>
                            <h3 style="color: #e85692; font-weight: 700;">{{ \App\Models\Producto::count() }}</h3>
                        </div>
                        <div style="font-size: 3rem; color: #ffe6f2;">
                            <i class="fas fa-image"></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-4 mb-3">
            <a href="{{ route('facturas.index') }}" class="card shadow-sm border-0 text-decoration-none" style="border-top: 4px solid #ff6fa6; transition: all 0.3s ease; cursor: pointer;">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p class="text-muted mb-1">Facturas</p>
                            <h3 style="color: #e85692; font-weight: 700;">{{ \App\Models\Factura::count() }}</h3>
                        </div>
                        <div style="font-size: 3rem; color: #ffe6f2;">
                            <i class="fas fa-receipt"></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-md-4 mb-3">
            <a href="{{ route('empleados.index') }}" class="card shadow-sm border-0 text-decoration-none" style="border-top: 4px solid #ff6fa6; transition: all 0.3s ease; cursor: pointer;">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p class="text-muted mb-1">Empleados</p>
                            <h3 style="color: #e85692; font-weight: 700;">{{ \App\Models\Empleado::count() }}</h3>
                        </div>
                        <div style="font-size: 3rem; color: #ffe6f2;">
                            <i class="fas fa-briefcase"></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-4 mb-3">
            <a href="{{ route('proveedores.index') }}" class="card shadow-sm border-0 text-decoration-none" style="border-top: 4px solid #ff6fa6; transition: all 0.3s ease; cursor: pointer;">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p class="text-muted mb-1">Proveedores</p>
                            <h3 style="color: #e85692; font-weight: 700;">{{ \App\Models\Proveedor::count() }}</h3>
                        </div>
                        <div style="font-size: 3rem; color: #ffe6f2;">
                            <i class="fas fa-handshake"></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-4 mb-3">
            <a href="{{ route('incidencias.index') }}" class="card shadow-sm border-0 text-decoration-none" style="border-top: 4px solid #ff6fa6; transition: all 0.3s ease; cursor: pointer;">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p class="text-muted mb-1">Incidencias</p>
                            <h3 style="color: #e85692; font-weight: 700;">{{ \App\Models\Incidencia::count() }}</h3>
                        </div>
                        <div style="font-size: 3rem; color: #ffe6f2;">
                            <i class="fas fa-exclamation-circle"></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="row">
        <div class="col-12">
            <h4 style="color: #333; font-weight: 700; margin-bottom: 20px;">Acciones rápidas</h4>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-md-4 mb-3">
            <a href="{{ route('clientes.create') }}" class="card shadow-sm border-0 text-decoration-none" style="transition: all 0.3s ease;">
                <div class="card-body text-center py-4">
                    <i class="fas fa-plus" style="font-size: 2rem; color: #ff6fa6;"></i>
                    <p class="mt-3 mb-0" style="color: #333; font-weight: 600;">Nuevo cliente</p>
                </div>
            </a>
        </div>

        <div class="col-md-4 mb-3">
            <a href="{{ route('productos.create') }}" class="card shadow-sm border-0 text-decoration-none" style="transition: all 0.3s ease;">
                <div class="card-body text-center py-4">
                    <i class="fas fa-plus" style="font-size: 2rem; color: #ff6fa6;"></i>
                    <p class="mt-3 mb-0" style="color: #333; font-weight: 600;">Nuevo producto</p>
                </div>
            </a>
        </div>

        <div class="col-md-4 mb-3">
            <a href="{{ route('facturas.create') }}" class="card shadow-sm border-0 text-decoration-none" style="transition: all 0.3s ease;">
                <div class="card-body text-center py-4">
                    <i class="fas fa-plus" style="font-size: 2rem; color: #ff6fa6;"></i>
                    <p class="mt-3 mb-0" style="color: #333; font-weight: 600;">Nueva factura</p>
                </div>
            </a>
        </div>
    </div>

    <!-- Recent Activity -->
    <div class="row">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header" style="background: linear-gradient(135deg, #ff6fa6 0%, #e85692 100%); color: white;">
                    <h5 class="mb-0"><i class="fas fa-clock"></i> Últimos clientes</h5>
                </div>
                <div class="card-body">
                    @forelse(\App\Models\Clientes::latest()->take(5)->get() as $cliente)
                        <div class="d-flex justify-content-between align-items-center mb-3 pb-2" style="border-bottom: 1px solid #eee;">
                            <div>
                                <p class="mb-0 fw-bold">{{ $cliente->nombre }}</p>
                                <p class="mb-0 text-muted" style="font-size: 0.85rem;">{{ $cliente->email }}</p>
                            </div>
                            <a href="{{ route('clientes.show', $cliente) }}" class="btn btn-sm btn-outline-secondary">Ver</a>
                        </div>
                    @empty
                        <p class="text-muted text-center">Sin clientes aún</p>
                    @endforelse
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header" style="background: linear-gradient(135deg, #ff6fa6 0%, #e85692 100%); color: white;">
                    <h5 class="mb-0"><i class="fas fa-file-invoice"></i> Últimas facturas</h5>
                </div>
                <div class="card-body">
                    @forelse(\App\Models\Factura::latest()->take(5)->get() as $factura)
                        <div class="d-flex justify-content-between align-items-center mb-3 pb-2" style="border-bottom: 1px solid #eee;">
                            <div>
                                <p class="mb-0 fw-bold">{{ $factura->numero }}</p>
                                <p class="mb-0 text-muted" style="font-size: 0.85rem;">€{{ number_format($factura->monto, 2, ',', '.') }}</p>
                            </div>
                            <span class="badge {{ $factura->estado === 'pagada' ? 'bg-success' : 'bg-warning' }}">{{ ucfirst($factura->estado) }}</span>
                        </div>
                    @empty
                        <p class="text-muted text-center">Sin facturas aún</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .card:hover {
        box-shadow: 0 8px 20px rgba(255, 111, 166, 0.15) !important;
        transform: translateY(-2px);
        transition: all 0.3s ease;
    }
</style>

@endsection
