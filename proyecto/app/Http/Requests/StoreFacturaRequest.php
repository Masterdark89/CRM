<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFacturaRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->check();
    }

    public function rules()
    {
        return [
            'numero' => 'required|string|max:100|unique:facturas,numero',
            'cliente_id' => 'nullable|exists:clientes,id',
            'monto' => 'required|numeric|min:0',
            'fecha' => 'required|date',
            'estado' => 'nullable|string|max:100',
            'notas' => 'nullable|string|max:1000',
        ];
    }
}
