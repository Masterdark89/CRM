<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProveedorRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->check();
    }

    public function rules()
    {
        $id = $this->route('proveedor') ?? $this->route('id');

        return [
            'nombre' => 'required|string|max:255',
            'email' => "nullable|email|max:255|unique:proveedors,email,{$id}",
            'telefono' => 'nullable|string|max:50',
            'direccion' => 'nullable|string|max:1000',
            'empresa' => 'nullable|string|max:255',
        ];
    }
}
