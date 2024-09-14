<?php

$numeros = [1, 2, 3, 4, 5, 6];
$cuadrados = array_map(function($n) {
    return $n * 3; 
}, $numeros);

echo "Números originales: " . implode(", ", $numeros) . "</br>";
echo "Resultados de multiplicar por 3: " . implode(", ", $cuadrados) . "</br>";


function duplicar($n) {
    return $n + 10; 
}

$duplicados = array_map('duplicar', $numeros);
echo "Números con incremento de 10: " . implode(", ", $duplicados) . "</br>";


$frutas = ["Manzana", "Banana", "Cereza", "Dátil", "Kiwi"];
$frutasMinusculas = array_map('strtolower', $frutas);

echo "</br>Frutas originales: " . implode(", ", $frutas) . "</br>";
echo "Frutas en minúsculas: " . implode(", ", $frutasMinusculas) . "</br>";


$nombres = ["Ana", "Carlos", "Beatriz", "David", "Elena"];
$apellidos = ["García", "Rodríguez", "López", "Martínez", "Pérez"];
$nombresCompletos = array_map(function($nombre, $apellido) {
    return $nombre . " " . $apellido;
}, $nombres, $apellidos);

echo "</br>Nombres completos:</br>";
foreach ($nombresCompletos as $nombreCompleto) {
    echo "- $nombreCompleto</br>";
}


$productos = [
    ["nombre" => "Laptop", "precio" => 800],
    ["nombre" => "Teléfono", "precio" => 500],
    ["nombre" => "Tablet", "precio" => 300],
    ["nombre" => "Monitor", "precio" => 150],
    ["nombre" => "Teclado", "precio" => 50]
];

$porcentajeDescuento = 0.15; // 15% de descuento
$productosConDescuento = array_map(function($producto) use ($porcentajeDescuento) {
    $producto['precio_descuento'] = $producto['precio'] * (1 - $porcentajeDescuento); 
    return $producto;
}, $productos);

echo "</br>Productos con descuento:</br>";
foreach ($productosConDescuento as $producto) {
    echo "- {$producto['nombre']}: Precio original: ${$producto['precio']}, ";
    echo "Precio con descuento: ${$producto['precio_descuento']}</br>";
}


function aplicarOperaciones($array, $operaciones) {
    return array_map(function($valor, $operacion) {
        return $operacion($valor);
    }, $array, $operaciones);
}

$valores = [1, 2, 3, 4, 5, 6];
$operaciones = [
    function($n) { return $n - 1; }, 
    function($n) { return $n / 2; }, 
    function($n) { return $n * $n; }, 
    function($n) { return $n - 5; }, 
    function($n) { return $n * 10; }, 
    function($n) { return $n % 4; }  
];

$resultados = aplicarOperaciones($valores, $operaciones);

echo "</br>Resultados de operaciones personalizadas:</br>";
foreach ($valores as $index => $valor) {
    echo "Valor original: $valor, Resultado: {$resultados[$index]}</br>";
}
?>
