<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateClienteRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->check();
    }

    public function rules()
    {
        $id = $this->route('cliente') ?? $this->route('id');

        return [
            'nombre' => 'required|string|max:255',
            'email' => "nullable|email|max:255|unique:clientes,email,{$id}",
            'telefono' => 'nullable|string|max:50',
            'direccion' => 'nullable|string|max:1000',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }
}
