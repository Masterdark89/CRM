<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductoFactory extends Factory
{
    public function definition(): array
    {
        $diseños = [
            'Diseño de Logo' => ['desc' => 'Diseño de logotipo profesional personalizado para tu marca', 'precio' => [200, 800]],
            'Branding Completo' => ['desc' => 'Paquete completo de identidad visual: logo, paleta, tipografía', 'precio' => [800, 2000]],
            'Tarjetas de Presentación' => ['desc' => 'Diseño de tarjetas de presentación personalizadas', 'precio' => [100, 300]],
            'Flyer Promocional' => ['desc' => 'Flyer de una o dos caras con diseño moderno', 'precio' => [75, 250]],
            'Banner Web' => ['desc' => 'Banners optimizados para sitios web y redes sociales', 'precio' => [150, 500]],
            'Plantilla Powerpoint' => ['desc' => 'Plantillas profesionales para presentaciones', 'precio' => [200, 600]],
            'Kit de Iconos' => ['desc' => 'Conjunto de iconos personalizados para tu proyecto', 'precio' => [300, 1200]],
            'Diseño de Packaging' => ['desc' => 'Diseño de empaque y etiquetado para productos', 'precio' => [500, 1500]],
            'Catálogo Digital' => ['desc' => 'Catálogo interactivo en PDF o digital', 'precio' => [400, 1000]],
            'Infografía' => ['desc' => 'Infografía custom basada en tus datos', 'precio' => [250, 800]],
            'Diseño de Menú' => ['desc' => 'Menú restaurante o cafetería con diseño gráfico profesional', 'precio' => [150, 400]],
            'Póster Artístico' => ['desc' => 'Póster decorativo personalizado para imprenta', 'precio' => [100, 350]],
            'Portada de Libro' => ['desc' => 'Diseño de portada para libros y ebooks', 'precio' => [300, 900]],
            'Diseño de Revista' => ['desc' => 'Diseño de páginas interiores y portada de revista', 'precio' => [600, 2000]],
            'Etiquetas y Pegatinas' => ['desc' => 'Diseño de etiquetas y pegatinas para productos', 'precio' => [50, 200]],
            'Certificados' => ['desc' => 'Diseño de certificados y diplomas personalizados', 'precio' => [75, 300]],
        ];

        $diseño = array_rand($diseños);
        $datos = $diseños[$diseño];
        
        return [
            'nombre' => $diseño,
            'descripcion' => $datos['desc'],
            'precio' => $this->faker->randomFloat(2, $datos['precio'][0], $datos['precio'][1]),
            'stock' => $this->faker->numberBetween(1, 50),
            'sku' => $this->faker->unique()->bothify('DG-####-??'),
        ];
    }
}
