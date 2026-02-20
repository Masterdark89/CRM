<?php

namespace Database\Factories;

use App\Models\Clientes;
use Illuminate\Database\Eloquent\Factories\Factory;

class FacturaFactory extends Factory
{
    public function definition(): array
    {
        $notas = [
            'Servicio completado satisfactoriamente',
            'Pago a 30 días',
            'Servicio incluye revisiones',
            'Entrega en tiempo',
            'Proyecto especial con descuento',
            'Incluye soporte técnico',
            'Pago por adelantado',
            'Factura rectificativa',
            'Servicio premium',
            'Proyecto completado',
        ];
        
        return [
            'numero' => $this->faker->unique()->bothify('FAC-######'),
            'cliente_id' => Clientes::inRandomOrder()->first()?->id ?? Clientes::factory(),
            'monto' => $this->faker->randomFloat(2, 100, 10000),
            'fecha' => $this->faker->dateTimeBetween('-3 months', 'now'),
            'estado' => $this->faker->randomElement(['pendiente', 'pagada']),
            'notas' => $this->faker->optional()->randomElement($notas),
        ];
    }
}
