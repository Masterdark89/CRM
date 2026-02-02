<?php

namespace App\Http\Controllers;

use App\Models\Personal;
use Illuminate\Http\Request;

class PersonalController extends Controller
{
    public function index()
    {
        $personal = Personal::all();
        return view('personal.index', compact('personal'));
    }

    public function create()
    {
        return view('personal.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'nullable|email',
            'cargo' => 'required|string|max:255',
            'telefono' => 'nullable|string|max:20',
            'activo' => 'nullable|boolean',
        ]);

        Personal::create($request->only(['nombre','email','cargo','telefono','activo']));

        return redirect()->route('personal.index')->with('success', 'Registro de personal creado exitosamente.');
    }

    public function show(Personal $personal)
    {
        return view('personal.show', compact('personal'));
    }

    public function edit(Personal $personal)
    {
        return view('personal.edit', compact('personal'));
    }

    public function update(Request $request, Personal $personal)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'nullable|email',
            'cargo' => 'required|string|max:255',
            'telefono' => 'nullable|string|max:20',
            'activo' => 'nullable|boolean',
        ]);

        $personal->update($request->only(['nombre','email','cargo','telefono','activo']));

        return redirect()->route('personal.index')->with('success', 'Registro de personal actualizado exitosamente.');
    }

    public function destroy(Personal $personal)
    {
        $personal->delete();
        return redirect()->route('personal.index')->with('success', 'Registro eliminado exitosamente.');
    }
}
