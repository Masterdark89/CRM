<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateIncidenciaRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->check();
    }

    public function rules()
    {
        $id = $this->route('incidencia') ?? $this->route('id');

        return [
            'titulo' => 'required|string|max:255',
            'descripcion' => 'nullable|string|max:2000',
            'estado' => 'nullable|string|max:100',
            'prioridad' => 'nullable|string|max:100',
            'usuario_id' => 'nullable|exists:users,id',
        ];
    }
}
