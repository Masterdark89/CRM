<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProveedorFactory extends Factory
{
    public function definition(): array
    {
        $ciudades = ['Madrid', 'Barcelona', 'Valencia', 'Sevilla', 'Bilbao', 'Málaga', 'Murcia', 'Palma', 'Las Palmas', 'Alicante'];
        $calles = ['Calle Mayor', 'Avenida Central', 'Paseo del Prado', 'Calle Real', 'Avenida Principal', 'Pasaje Comercial'];
        
        $empresas = [
            'Adobe Creative Cloud' => 'Proveedor de software de diseño profesional',
            'Canva Pro' => 'Plataforma de diseño simplificada',
            'Figma' => 'Herramienta colaborativa de diseño UI/UX',
            'Font Bureau' => 'Proveedor de tipografías profesionales',
            'Shutterstock' => 'Banco de imágenes y recursos gráficos',
            'Getty Images' => 'Base de datos de fotografías de alta calidad',
            'Freepik' => 'Recursos gráficos y vectores descargables',
            'Creative Market' => 'Marketplace de recursos de diseño',
            'Istock Photos' => 'Banco de stock photography',
            '123Royalty Free' => 'Música y sonidos para proyectos',
        ];

        $empresa = array_rand($empresas);
        
        return [
            'nombre' => $empresa,
            'email' => $this->faker->companyEmail(),
            'telefono' => $this->faker->numerify('6##-###-###'),
            'direccion' => $this->faker->randomElement($calles) . ', ' . $this->faker->numberBetween(1, 500) . ', ' . $this->faker->randomElement($ciudades),
            'empresa' => $empresas[$empresa],
        ];
    }
}
