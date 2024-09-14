<?php

// Función para leer el inventario desde el archivo JSON
function leerInventario($archivo) {
    $contenido = file_get_contents($archivo);
    return json_decode($contenido, true);
}

// Función para ordenar el inventario alfabéticamente por nombre del producto
function ordenarInventarioPorNombre(&$inventario) {
    usort($inventario, function($a, $b) {
        return strcmp($a['nombre'], $b['nombre']);
    });
}

// Función para mostrar un resumen del inventario ordenado (nombre, precio, cantidad)
function mostrarResumenInventario($inventario) {
    echo "Resumen del Inventario:\n";
    echo str_pad("Nombre", 20) . str_pad("Precio", 10) . "Cantidad\n";
    echo str_repeat("-", 40) . "\n";
    foreach ($inventario as $producto) {
        echo str_pad($producto['nombre'], 20) . str_pad(number_format($producto['precio'], 2), 10) . $producto['cantidad'] . "\n";
    }
}

// Función para calcular el valor total del inventario
function calcularValorTotal($inventario) {
    return array_sum(array_map(function($producto) {
        return $producto['precio'] * $producto['cantidad'];
    }, $inventario));
}

// Función para generar un informe de productos con stock bajo (menos de 5 unidades)
function generarInformeStockBajo($inventario) {
    $productosBajoStock = array_filter($inventario, function($producto) {
        return $producto['cantidad'] < 5;
    });
    
    echo "\nInforme de Productos con Stock Bajo:\n";
    echo str_pad("Nombre", 20) . str_pad("Cantidad\n", 10) . str_repeat("-", 30) . "\n";
    foreach ($productosBajoStock as $producto) {
        echo str_pad($producto['nombre'], 20) . $producto['cantidad'] . "\n";
    }
}

// Script principal
$archivo = 'inventario.json';

// Leer el inventario
$inventario = leerInventario($archivo);

// Ordenar el inventario por nombre
ordenarInventarioPorNombre($inventario);

// Mostrar resumen del inventario
mostrarResumenInventario($inventario);

// Calcular y mostrar el valor total del inventario
$valorTotal = calcularValorTotal($inventario);
echo "\nValor Total del Inventario: $" . number_format($valorTotal, 2) . "\n";

// Generar y mostrar el informe de stock bajo
generarInformeStockBajo($inventario);

?>
