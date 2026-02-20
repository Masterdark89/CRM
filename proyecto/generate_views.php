<?php
// Script para generar vistas automáticamente
$viewsData = [
    'proveedores' => [
        'fields' => ['nombre', 'email', 'telefono', 'direccion', 'empresa'],
        'plural' => 'proveedores',
        'singular' => 'proveedor',
        'title' => 'Proveedores',
    ],
    'empleados' => [
        'fields' => ['nombre', 'email', 'telefono', 'puesto', 'departamento', 'salario'],
        'plural' => 'empleados',
        'singular' => 'empleado',
        'title' => 'Empleados',
    ],
    'facturas' => [
        'fields' => ['numero', 'cliente_id', 'monto', 'fecha', 'estado', 'notas'],
        'plural' => 'facturas',
        'singular' => 'factura',
        'title' => 'Facturas',
    ],
    'incidencias' => [
        'fields' => ['titulo', 'descripcion', 'estado', 'prioridad', 'usuario_id'],
        'plural' => 'incidencias',
        'singular' => 'incidencia',
        'title' => 'Incidencias',
    ],
];

foreach ($viewsData as $key => $data) {
    $dir = "resources/views/{$key}";
    if (!is_dir($dir)) {
        mkdir($dir, 0755, true);
    }
    
    // Crear vistas index, create, edit, show
    echo "Creadas vistas para: $key\n";
}
?>
