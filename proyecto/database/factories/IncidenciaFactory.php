<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class IncidenciaFactory extends Factory
{
    public function definition(): array
    {
        $titulos = [
            'Error en el diseño de logo',
            'Revisión de banners web',
            'Problema con paleta de colores',
            'Ajuste de tipografía',
            'Retraso en entrega',
            'Cambio de especificaciones',
            'Error de comunicación',
            'Falta de recursos',
            'Incidencia técnica',
            'Solicitud de información',
            'Problema con cliente',
            'Error de facturación',
        ];
        
        $descripciones = [
            'El cliente solicita cambios en el diseño presentado',
            'Es necesario revisar la calidad del trabajo',
            'Problema técnico en la entrega del archivo',
            'Cliente insatisfecho con resultados',
            'Falta información para continuar',
            'Se requiere aprobación del gerente',
            'Necesita revisión de cumplimiento',
            'Problema de comunicación con el cliente',
            'Retraso en la entrega por falta de recursos',
            'Cambio de requisitos del proyecto',
        ];
        
        return [
            'titulo' => $this->faker->randomElement($titulos),
            'descripcion' => $this->faker->randomElement($descripciones),
            'estado' => $this->faker->randomElement(['abierta', 'pendiente', 'cerrada']),
            'prioridad' => $this->faker->randomElement(['baja', 'normal', 'alta']),
            'usuario_id' => User::inRandomOrder()->first()?->id ?? User::factory(),
        ];
    }
}
