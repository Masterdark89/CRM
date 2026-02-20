<?php

// Script de diagnóstico para subida de archivos
echo "<h1>Diagnóstico de Subida de Archivos</h1>";

echo "<h2>Configuración PHP</h2>";
echo "<table border='1' style='border-collapse: collapse;'>";
echo "<tr><td>file_uploads</td><td>" . ini_get('file_uploads') . "</td></tr>";
echo "<tr><td>upload_max_filesize</td><td>" . ini_get('upload_max_filesize') . "</td></tr>";
echo "<tr><td>post_max_size</td><td>" . ini_get('post_max_size') . "</td></tr>";
echo "<tr><td>max_file_uploads</td><td>" . ini_get('max_file_uploads') . "</td></tr>";
echo "<tr><td>memory_limit</td><td>" . ini_get('memory_limit') . "</td></tr>";
echo "<tr><td>upload_tmp_dir</td><td>" . (ini_get('upload_tmp_dir') ?: 'default') . "</td></tr>";
echo "</table>";

echo "<h2>Prueba de Permisos de Directorios</h2>";
$directories = [
    __DIR__ . '/uploads/clientes',
    __DIR__ . '/uploads/productos',
    __DIR__ . '/uploads/productos/pdfs'
];

echo "<table border='1' style='border-collapse: collapse;'>";
echo "<tr><th>Directorio</th><th>Existe</th><th>Escribible</th></tr>";
foreach ($directories as $dir) {
    echo "<tr>";
    echo "<td>" . $dir . "</td>";
    echo "<td>" . (is_dir($dir) ? '✓ Sí' : '✗ No') . "</td>";
    echo "<td>" . (is_writable($dir) ? '✓ Sí' : '✗ No') . "</td>";
    echo "</tr>";
}
echo "</table>";

echo "<h2>Prueba de Subida</h2>";
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['test_image'])) {
    echo "<h3>Datos recibidos:</h3>";
    echo "<pre>";
    print_r($_FILES);
    echo "</pre>";
    
    if ($_FILES['test_image']['error'] === UPLOAD_ERR_OK) {
        $tmp_name = $_FILES['test_image']['tmp_name'];
        $name = basename($_FILES['test_image']['name']);
        $upload_dir = __DIR__ . '/uploads/clientes/';
        $target_file = $upload_dir . 'test_' . time() . '_' . $name;
        
        if (move_uploaded_file($tmp_name, $target_file)) {
            echo "<p style='color: green;'>✓ Archivo subido exitosamente a: " . $target_file . "</p>";
        } else {
            echo "<p style='color: red;'>✗ Error al mover el archivo</p>";
        }
    } else {
        echo "<p style='color: red;'>Error en la subida: " . $_FILES['test_image']['error'] . "</p>";
        $errors = [
            UPLOAD_ERR_INI_SIZE => 'El archivo excede upload_max_filesize',
            UPLOAD_ERR_FORM_SIZE => 'El archivo excede MAX_FILE_SIZE del formulario',
            UPLOAD_ERR_PARTIAL => 'El archivo se subió parcialmente',
            UPLOAD_ERR_NO_FILE => 'No se subió ningún archivo',
            UPLOAD_ERR_NO_TMP_DIR => 'Falta el directorio temporal',
            UPLOAD_ERR_CANT_WRITE => 'No se pudo escribir en el disco',
            UPLOAD_ERR_EXTENSION => 'Una extensión PHP detuvo la subida'
        ];
        if (isset($errors[$_FILES['test_image']['error']])) {
            echo "<p>" . $errors[$_FILES['test_image']['error']] . "</p>";
        }
    }
}
?>

<h3>Formulario de Prueba</h3>
<form method="POST" enctype="multipart/form-data">
    <input type="file" name="test_image" accept="image/*" required>
    <button type="submit">Subir Imagen de Prueba</button>
</form>

<hr>
<p><a href="/">Volver al inicio</a></p>
