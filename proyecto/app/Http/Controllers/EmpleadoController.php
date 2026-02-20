<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Http\Requests\StoreEmpleadoRequest;
use App\Http\Requests\UpdateEmpleadoRequest;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    public function index(Request $request)
    {
        $show = $request->query('show', 'active');
        $q = $request->query('q');
        $query = Empleado::query();
        if ($q) {
            $query->where('nombre', 'like', "%{$q}%")
                  ->orWhere('email', 'like', "%{$q}%");
        }
        if ($show === 'trashed') {
            $query = $query->onlyTrashed();
        }
        $empleados = $query->orderBy('nombre')->paginate(15);
        return view('empleados.index', compact('empleados', 'show', 'q'));
    }

    public function create()
    {
        return view('empleados.create');
    }

    public function store(StoreEmpleadoRequest $request)
    {
        Empleado::create($request->validated());
        return redirect()->route('empleados.index')->with('success', 'Empleado creado correctamente.');
    }

    public function show($id)
    {
        $empleado = Empleado::withTrashed()->findOrFail($id);
        return view('empleados.show', compact('empleado'));
    }

    public function edit($id)
    {
        $empleado = Empleado::withTrashed()->findOrFail($id);
        return view('empleados.edit', compact('empleado'));
    }

    public function update(UpdateEmpleadoRequest $request, $id)
    {
        $empleado = Empleado::withTrashed()->findOrFail($id);
        $empleado->update($request->validated());
        return redirect()->route('empleados.index')->with('success', 'Empleado actualizado.');
    }

    public function destroy($id)
    {
        Empleado::findOrFail($id)->delete();
        return redirect()->route('empleados.index')->with('success', 'Empleado eliminado.');
    }

    public function restore($id)
    {
        Empleado::onlyTrashed()->findOrFail($id)->restore();
        return redirect()->route('empleados.index')->with('success', 'Empleado restaurado.');
    }

    public function forceDelete($id)
    {
        Empleado::withTrashed()->findOrFail($id)->forceDelete();
        return redirect()->route('empleados.index')->with('success', 'Empleado eliminado permanentemente.');
    }
}
