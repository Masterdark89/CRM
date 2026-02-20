<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use App\Http\Requests\StoreProveedorRequest;
use App\Http\Requests\UpdateProveedorRequest;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    public function index(Request $request)
    {
        $show = $request->query('show', 'active');
        $q = $request->query('q');
        $query = Proveedor::query();
        if ($q) {
            $query->where('nombre', 'like', "%{$q}%")
                  ->orWhere('email', 'like', "%{$q}%")
                  ->orWhere('telefono', 'like', "%{$q}%");
        }
        if ($show === 'trashed') {
            $query = $query->onlyTrashed();
        }
        $proveedores = $query->orderBy('nombre')->paginate(15);
        return view('proveedores.index', compact('proveedores', 'show', 'q'));
    }

    public function create()
    {
        return view('proveedores.create');
    }

    public function store(StoreProveedorRequest $request)
    {
        Proveedor::create($request->validated());
        return redirect()->route('proveedores.index')->with('success', 'Proveedor creado correctamente.');
    }

    public function show($id)
    {
        $proveedor = Proveedor::withTrashed()->findOrFail($id);
        return view('proveedores.show', compact('proveedor'));
    }

    public function edit($id)
    {
        $proveedor = Proveedor::withTrashed()->findOrFail($id);
        return view('proveedores.edit', compact('proveedor'));
    }

    public function update(UpdateProveedorRequest $request, $id)
    {
        $proveedor = Proveedor::withTrashed()->findOrFail($id);
        $proveedor->update($request->validated());
        return redirect()->route('proveedores.index')->with('success', 'Proveedor actualizado.');
    }

    public function destroy($id)
    {
        Proveedor::findOrFail($id)->delete();
        return redirect()->route('proveedores.index')->with('success', 'Proveedor eliminado.');
    }

    public function restore($id)
    {
        Proveedor::onlyTrashed()->findOrFail($id)->restore();
        return redirect()->route('proveedores.index')->with('success', 'Proveedor restaurado.');
    }

    public function forceDelete($id)
    {
        Proveedor::withTrashed()->findOrFail($id)->forceDelete();
        return redirect()->route('proveedores.index')->with('success', 'Proveedor eliminado permanentemente.');
    }
}
