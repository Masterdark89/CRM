<?php

namespace App\Http\Controllers;

use App\Models\Factura;
use App\Http\Requests\StoreFacturaRequest;
use App\Http\Requests\UpdateFacturaRequest;
use Illuminate\Http\Request;

class FacturaController extends Controller
{
    public function index(Request $request)
    {
        $show = $request->query('show', 'active');
        $q = $request->query('q');
        $query = Factura::query();
        if ($q) {
            $query->where('numero', 'like', "%{$q}%");
        }
        if ($show === 'trashed') {
            $query = $query->onlyTrashed();
        }
        $facturas = $query->orderBy('fecha', 'desc')->paginate(15);
        return view('facturas.index', compact('facturas', 'show', 'q'));
    }

    public function create()
    {
        return view('facturas.create');
    }

    public function store(StoreFacturaRequest $request)
    {
        Factura::create($request->validated());
        return redirect()->route('facturas.index')->with('success', 'Factura creada correctamente.');
    }

    public function show($id)
    {
        $factura = Factura::withTrashed()->findOrFail($id);
        return view('facturas.show', compact('factura'));
    }

    public function edit($id)
    {
        $factura = Factura::withTrashed()->findOrFail($id);
        return view('facturas.edit', compact('factura'));
    }

    public function update(UpdateFacturaRequest $request, $id)
    {
        $factura = Factura::withTrashed()->findOrFail($id);
        $factura->update($request->validated());
        return redirect()->route('facturas.index')->with('success', 'Factura actualizada.');
    }

    public function destroy($id)
    {
        Factura::findOrFail($id)->delete();
        return redirect()->route('facturas.index')->with('success', 'Factura eliminada.');
    }

    public function restore($id)
    {
        Factura::onlyTrashed()->findOrFail($id)->restore();
        return redirect()->route('facturas.index')->with('success', 'Factura restaurada.');
    }

    public function forceDelete($id)
    {
        Factura::withTrashed()->findOrFail($id)->forceDelete();
        return redirect()->route('facturas.index')->with('success', 'Factura eliminada permanentemente.');
    }
}
