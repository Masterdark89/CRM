<?php

namespace Database\Factories;

use App\Models\Clientes;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClientesFactory extends Factory
{
    protected $model = Clientes::class;

    public function definition()
    {
        $ciudades = ['Madrid', 'Barcelona', 'Valencia', 'Sevilla', 'Bilbao', 'Málaga', 'Murcia', 'Palma', 'Las Palmas', 'Alicante'];
        $calles = ['Calle Mayor', 'Avenida Central', 'Paseo del Prado', 'Calle Real', 'Avenida Principal', 'Pasaje Comercial'];
        
        return [
            'nombre' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'telefono' => $this->faker->numerify('6##-###-###'),
            'direccion' => $this->faker->randomElement($calles) . ', ' . $this->faker->numberBetween(1, 500) . ', ' . $this->faker->randomElement($ciudades),
        ];
    }
}
