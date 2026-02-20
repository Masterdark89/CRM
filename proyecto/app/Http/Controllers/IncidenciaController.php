<?php

namespace App\Http\Controllers;

use App\Models\Incidencia;
use App\Http\Requests\StoreIncidenciaRequest;
use App\Http\Requests\UpdateIncidenciaRequest;
use Illuminate\Http\Request;

class IncidenciaController extends Controller
{
    public function index(Request $request)
    {
        $show = $request->query('show', 'active');
        $q = $request->query('q');
        $query = Incidencia::query();
        if ($q) {
            $query->where('titulo', 'like', "%{$q}%")
                  ->orWhere('descripcion', 'like', "%{$q}%");
        }
        if ($show === 'trashed') {
            $query = $query->onlyTrashed();
        }
        $incidencias = $query->orderBy('created_at', 'desc')->paginate(15);
        return view('incidencias.index', compact('incidencias', 'show', 'q'));
    }

    public function create()
    {
        return view('incidencias.create');
    }

    public function store(StoreIncidenciaRequest $request)
    {
        Incidencia::create($request->validated());
        return redirect()->route('incidencias.index')->with('success', 'Incidencia creada correctamente.');
    }

    public function show($id)
    {
        $incidencia = Incidencia::withTrashed()->findOrFail($id);
        return view('incidencias.show', compact('incidencia'));
    }

    public function edit($id)
    {
        $incidencia = Incidencia::withTrashed()->findOrFail($id);
        return view('incidencias.edit', compact('incidencia'));
    }

    public function update(UpdateIncidenciaRequest $request, $id)
    {
        $incidencia = Incidencia::withTrashed()->findOrFail($id);
        $incidencia->update($request->validated());
        return redirect()->route('incidencias.index')->with('success', 'Incidencia actualizada.');
    }

    public function destroy($id)
    {
        Incidencia::findOrFail($id)->delete();
        return redirect()->route('incidencias.index')->with('success', 'Incidencia eliminada.');
    }

    public function restore($id)
    {
        Incidencia::onlyTrashed()->findOrFail($id)->restore();
        return redirect()->route('incidencias.index')->with('success', 'Incidencia restaurada.');
    }

    public function forceDelete($id)
    {
        Incidencia::withTrashed()->findOrFail($id)->forceDelete();
        return redirect()->route('incidencias.index')->with('success', 'Incidencia eliminada permanentemente.');
    }
}
