<?php

namespace App\Http\Controllers;

use App\Models\Contacto;
use Illuminate\Http\Request;

class ContactosController extends Controller
{
    public function index()
    {
        $contactos = Contacto::all();
        return view('contactos.index', compact('contactos'));
    }

    public function create()
    {
        return view('contactos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'compania' => 'nullable|string|max:255',
            'email' => 'nullable|email',
            'telefono' => 'nullable|string|max:20',
            'notas' => 'nullable|string',
        ]);

        Contacto::create($request->only(['nombre','compania','email','telefono','notas']));

        return redirect()->route('contactos.index')->with('success', 'Contacto creado exitosamente.');
    }

    public function show(Contacto $contacto)
    {
        return view('contactos.show', compact('contacto'));
    }

    public function edit(Contacto $contacto)
    {
        return view('contactos.edit', compact('contacto'));
    }

    public function update(Request $request, Contacto $contacto)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'compania' => 'nullable|string|max:255',
            'email' => 'nullable|email',
            'telefono' => 'nullable|string|max:20',
            'notas' => 'nullable|string',
        ]);

        $contacto->update($request->only(['nombre','compania','email','telefono','notas']));

        return redirect()->route('contactos.index')->with('success', 'Contacto actualizado exitosamente.');
    }

    public function destroy(Contacto $contacto)
    {
        $contacto->delete();
        return redirect()->route('contactos.index')->with('success', 'Contacto eliminado exitosamente.');
    }
}
