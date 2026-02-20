<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProveedorRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->check();
    }

    public function rules()
    {
        return [
            'nombre' => 'required|string|max:255',
            'email' => 'nullable|email|max:255|unique:proveedors,email',
            'telefono' => 'nullable|string|max:50',
            'direccion' => 'nullable|string|max:1000',
            'empresa' => 'nullable|string|max:255',
        ];
    }
}
