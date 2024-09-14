<?php
// Define los nombres de archivo
$archivos = [
    'ejemplo.txt' => [
        'contenido_inicial' => "Este es un ejemplo de contenido para el archivo.<br>",
        'contenido_nuevo' => "Esta es una nueva línea añadida al archivo.<br>"
    ],
    'registro.log' => [
        'entradas' => [
            "Inicio de la aplicación",
            "Usuario 'admin' ha iniciado sesión",
            "Se ha realizado una acción importante"
        ]
    ],
    'datos.csv' => [
        'datos' => [
            ['Nombre', 'Edad', 'Ciudad'],
            ['Juan', 25, 'Madrid'],
            ['María', 30, 'Barcelona'],
            ['Carlos', 22, 'Valencia']
        ]
    ],
    'archivo_seguro.txt' => [
        'contenido' => "Estos son datos importantes que requieren escritura segura.<br>"
    ],
    'datos_usuario.dat' => [
        'datos' => [
            'nombre' => 'Ana',
            'edad' => 28,
            'intereses' => ['lectura', 'viajes', 'fotografía']
        ]
    ],
    'archivo_personalizado.txt' => [
        'contenido' => "Este es un archivo con formato personalizado.\n" .
                       "Puedes añadir cualquier formato que desees aquí.\n" .
                       "Por ejemplo, este archivo tiene saltos de línea.\n"
    ]
];

// Función para crear o modificar archivo con contenido
function crearArchivo($archivo, $contenido) {
    return file_put_contents($archivo, $contenido);
}

// Crear o modificar archivos
// ejemplo.txt
crearArchivo($archivos['ejemplo.txt'], $archivos['ejemplo.txt']['contenido_inicial']);
echo "Archivo 'ejemplo.txt' creado exitosamente.<br>";
echo "Contenido del archivo 'ejemplo.txt':<br>" . file_get_contents('ejemplo.txt');

crearArchivo($archivos['ejemplo.txt']['contenido_nuevo'], FILE_APPEND);
echo "<br>Contenido añadido a 'ejemplo.txt':<br>" . file_get_contents('ejemplo.txt');

// registro.log
foreach ($archivos['registro.log']['entradas'] as $entrada) {
    agregarLog($entrada);
}
echo "<br>Contenido del archivo 'registro.log':<br>" . file_get_contents('registro.log');

// datos.csv
$contenidoCSV = "";
foreach ($archivos['datos.csv']['datos'] as $fila) {
    $contenidoCSV .= implode(",", $fila) . "\n"; // Usa \n para CSV
}
crearArchivo($archivos['datos.csv'], $contenidoCSV);
echo "<br>Archivo 'datos.csv' creado exitosamente.<br>";
echo "Contenido del archivo 'datos.csv':<br>" . file_get_contents('datos.csv');

// archivo_seguro.txt
crearArchivo($archivos['archivo_seguro.txt']['contenido'], LOCK_EX);
echo "<br>Datos escritos en 'archivo_seguro.txt':<br>" . file_get_contents('archivo_seguro.txt');

// datos_usuario.dat
guardarDatos("datos_usuario.dat", $archivos['datos_usuario.dat']['datos']);
$datosRecuperados = cargarDatos("datos_usuario.dat");
echo "<br>Datos recuperados de 'datos_usuario.dat':<br>";
print_r($datosRecuperados);

// archivo_personalizado.txt
crearArchivo($archivos['archivo_personalizado.txt']['contenido']);
echo "<br>Archivo 'archivo_personalizado.txt' creado exitosamente.<br>";
echo "Contenido del archivo 'archivo_personalizado.txt':<br>" . file_get_contents('archivo_personalizado.txt');

// Función para agregar logs
function agregarLog($mensaje) {
    $archivoLog = "registro.log";
    $timestamp = date("Y-m-d H:i:s");
    $entradaLog = "[$timestamp] $mensaje<br>";
    return file_put_contents($archivoLog, $entradaLog, FILE_APPEND);
}

// Función para guardar datos serializados
function guardarDatos($archivo, $datos) {
    return file_put_contents($archivo, serialize($datos));
}

function cargarDatos($archivo) {
    $contenido = file_get_contents($archivo);
    return $contenido !== false ? unserialize($contenido) : false;
}
?>
