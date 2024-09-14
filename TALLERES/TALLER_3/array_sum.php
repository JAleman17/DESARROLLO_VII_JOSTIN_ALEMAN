<?php
// Ejemplo básico de array_sum()
$numeros = [1, 2, 3, 4, 5];
$suma = array_sum($numeros);
echo "La suma de " . implode(", ", $numeros) . " es: $suma</br>";

// Modificación: Nuevos valores en el array de números
$numeros = [10, 20, 30, 40, 50];
$suma = array_sum($numeros);
echo "</br>La suma de " . implode(", ", $numeros) . " es: $suma</br>";

// Suma de números decimales
$decimales = [1.5, 2.3, 3.7, 4.1, 5.8];
$sumaDecimales = array_sum($decimales);
echo "</br>La suma de los decimales es: " . round($sumaDecimales, 2) . "</br>";

// Modificación: Nuevos valores en el array de decimales
$decimales = [2.5, 3.3, 4.7, 5.1, 6.8];
$sumaDecimales = array_sum($decimales);
echo "</br>La suma de los nuevos decimales es: " . round($sumaDecimales, 2) . "</br>";

// Ejercicio: Calcular el total de ventas
$ventas = [
    "Lunes" => 100.50,
    "Martes" => 200.75,
    "Miércoles" => 50.25,
    "Jueves" => 300.00,
    "Viernes" => 250.50
];
$totalVentas = array_sum($ventas);
echo "</br>Total de ventas de la semana: $" . number_format($totalVentas, 2) . "</br>";

// Modificación: Nuevos valores en el array de ventas
$ventas = [
    "Lunes" => 120.00,
    "Martes" => 180.00,
    "Miércoles" => 60.00,
    "Jueves" => 310.00,
    "Viernes" => 240.00
];
$totalVentas = array_sum($ventas);
echo "</br>Total de ventas con nuevos valores: $" . number_format($totalVentas, 2) . "</br>";

// Bonus: Calcular el promedio de calificaciones
$calificaciones = [85, 92, 78, 95, 88];
$promedio = array_sum($calificaciones) / count($calificaciones);
echo "</br>Calificaciones: " . implode(", ", $calificaciones);
echo "</br>Promedio de calificaciones: " . round($promedio, 2) . "</br>";

// Modificación: Nuevas calificaciones
$calificaciones = [90, 85, 80, 88, 92];
$promedio = array_sum($calificaciones) / count($calificaciones);
echo "</br>Nuevas calificaciones: " . implode(", ", $calificaciones);
echo "</br>Nuevo promedio de calificaciones: " . round($promedio, 2) . "</br>";

// Extra: Suma de valores en un array multidimensional
$gastosMensuales = [
    "Enero" => ["Comida" => 300, "Transporte" => 100, "Entretenimiento" => 150],
    "Febrero" => ["Comida" => 280, "Transporte" => 90, "Entretenimiento" => 120],
    "Marzo" => ["Comida" => 310, "Transporte" => 110, "Entretenimiento" => 140]
];

$totalGastos = array_sum(array_map('array_sum', $gastosMensuales));
echo "</br>Total de gastos en el trimestre: $" . number_format($totalGastos, 2) . "</br>";

// Desafío: Función para sumar solo números impares
function sumaImpares($array) {
    return array_sum(array_filter($array, function($num) {
        return $num % 2 != 0;
    }));
}

// Desafío: Función para sumar solo números mayores a cierto valor
function sumaMayoresQue($array, $valor) {
    return array_sum(array_filter($array, function($num) use ($valor) {
        return $num > $valor;
    }));
}

// Nuevos valores en el array de números
$numeros = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
echo "</br>Números: " . implode(", ", $numeros);
echo "</br>Suma de números impares: " . sumaImpares($numeros) . "</br>";
echo "</br>Suma de números mayores a 5: " . sumaMayoresQue($numeros, 5) . "</br>";

// Ejemplo adicional: Cálculo de impuestos
$productos = [
    ["nombre" => "Laptop", "precio" => 1000, "impuesto" => 0.16],
    ["nombre" => "Teléfono", "precio" => 500, "impuesto" => 0.10],
    ["nombre" => "Tablet", "precio" => 300, "impuesto" => 0.08]
];

$totalImpuestos = array_sum(array_map(function($producto) {
    return $producto['precio'] * $producto['impuesto'];
}, $productos));

echo "</br>Total de impuestos a pagar: $" . number_format($totalImpuestos, 2) . "</br>";

// Nuevo ejemplo: Usar array_sum() con array_map() y array_reduce()
$numerosParaReducir = [2, 4, 6, 8, 10];

// Usar array_map() para elevar al cuadrado cada número
$cuadrados = array_map(function($num) {
    return $num ** 2;
}, $numerosParaReducir);

// Usar array_reduce() para sumar los cuadrados
$sumaCuadrados = array_reduce($cuadrados, function($carry, $item) {
    return $carry + $item;
}, 0);

echo "</br>Cuadrados: " . implode(", ", $cuadrados);
echo "</br>Suma de los cuadrados: " . $sumaCuadrados . "</br>";
?>
