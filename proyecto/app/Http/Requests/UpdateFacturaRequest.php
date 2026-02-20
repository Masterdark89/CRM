<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFacturaRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->check();
    }

    public function rules()
    {
        $id = $this->route('factura') ?? $this->route('id');

        return [
            'numero' => "required|string|max:100|unique:facturas,numero,{$id}",
            'cliente_id' => 'nullable|exists:clientes,id',
            'monto' => 'required|numeric|min:0',
            'fecha' => 'required|date',
            'estado' => 'nullable|string|max:100',
            'notas' => 'nullable|string|max:1000',
        ];
    }
}
