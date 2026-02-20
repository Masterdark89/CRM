<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmpleadoRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->check();
    }

    public function rules()
    {
        return [
            'nombre' => 'required|string|max:255',
            'email' => 'nullable|email|max:255|unique:empleados,email',
            'telefono' => 'nullable|string|max:50',
            'puesto' => 'nullable|string|max:255',
            'departamento' => 'nullable|string|max:255',
            'salario' => 'nullable|numeric|min:0',
        ];
    }
}
