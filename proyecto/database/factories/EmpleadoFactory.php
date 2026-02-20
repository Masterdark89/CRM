<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EmpleadoFactory extends Factory
{
    public function definition(): array
    {
        $puestos = [
            'Gerente General',
            'Director de Diseño',
            'Diseñador Gráfico Senior',
            'Diseñador Gráfico Junior',
            'Especialista en UI/UX',
            'Community Manager',
            'Desarrollador Frontend',
            'Desarrollador Backend',
            'Gerente de Proyecto',
            'Asistente Administrativo',
            'Especialista en Marketing Digital',
            'Coordinador de Ventas',
            'Ejecutivo de Cuentas',
            'Especialista en Recursos Humanos',
            'Contador',
            'Analista de Sistemas',
        ];

        return [
            'nombre' => $this->faker->name(),
            'email' => $this->faker->unique()->email(),
            'telefono' => $this->faker->phoneNumber(),
            'puesto' => $this->faker->randomElement($puestos),
            'departamento' => $this->faker->randomElement(['Diseño', 'Ventas', 'IT', 'RRHH', 'Administración', 'Marketing']),
            'salario' => $this->faker->randomFloat(2, 20000, 80000),
        ];
    }
}
