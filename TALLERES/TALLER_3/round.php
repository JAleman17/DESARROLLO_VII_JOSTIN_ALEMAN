<?php

$numeros = [3.14159, 2.71828, 1.61803, 6.28319];
$precisiones = [0, 1, 2, 4];

echo "<h2>Redondeo Básico con Diferentes Números y Precisiones</h2>";
foreach ($numeros as $numero) {
    echo "Número original: $numero</br>";
    foreach ($precisiones as $precision) {
        echo "Redondeado a $precision decimales: " . round($numero, $precision) . "</br>";
    }
    echo "</br>";
}


$calificaciones = [72.5, 88.4, 95.9, 64.3, 79.7];
$promedio = array_sum($calificaciones) / count($calificaciones);
echo "<h2>Promedio de Calificaciones</h2>";
echo "Calificaciones: " . implode(", ", $calificaciones) . "</br>";
echo "Promedio de calificaciones: $promedio</br>";
echo "Promedio redondeado a 1 decimal: " . round($promedio, 1) . "</br>";


function redondearPrecio($precio) {
    return round($precio * 20) / 20;
}

$precios = [8.99, 12.45, 15.30, 7.89];
echo "<h2>Redondeo de Precios</h2>";
foreach ($precios as $precio) {
    echo "Precio original: $precio, Redondeado: " . redondearPrecio($precio) . "</br>";
}


function redondeoPersonalizado($numero, $incremento = 0.5) {
    return round($numero / $incremento) * $incremento;
}

$valores = [2.7, 4.4, 5.1, 6.9];
$incrementos = [0.1, 0.25, 0.5, 1];

echo "<h2>Redondeo Personalizado con Diferentes Incrementos</h2>";
foreach ($incrementos as $incremento) {
    echo "<h3>Incremento: $incremento</h3>";
    foreach ($valores as $valor) {
        echo "Valor original: $valor, Redondeado: " . redondeoPersonalizado($valor, $incremento) . "</br>";
    }
}


$cantidad = 10/3; 
echo "<h2>División de 10/3</h2>";
echo "Resultado exacto: " . $cantidad . "</br>";
echo "Redondeado a 2 decimales (para moneda): " . round($cantidad, 2) . "</br>";
echo "Redondeado a 4 decimales (para cálculos más precisos): " . round($cantidad, 4) . "</br>";
?>
