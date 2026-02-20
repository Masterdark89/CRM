<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreIncidenciaRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->check();
    }

    public function rules()
    {
        return [
            'titulo' => 'required|string|max:255',
            'descripcion' => 'nullable|string|max:2000',
            'estado' => 'nullable|string|max:100',
            'prioridad' => 'nullable|string|max:100',
            'usuario_id' => 'nullable|exists:users,id',
        ];
    }
}
