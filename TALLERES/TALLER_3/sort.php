<?php
// Modificación y ordenamiento de arrays

// 1. Array de números
$numeros = [10, 5, 8, 2, 7];
echo "Array de números original: " . implode(", ", $numeros) . "</br>";
sort($numeros);
echo "Array de números ordenado (ascendente): " . implode(", ", $numeros) . "</br>";

// Ordenar en orden descendente
rsort($numeros);
echo "Array de números ordenado (descendente): " . implode(", ", $numeros) . "</br>";

// 2. Array de strings
$frutas = ["mango", "kiwi", "manzana", "fresa"];
echo "</br>Array de frutas original: " . implode(", ", $frutas) . "</br>";
sort($frutas);
echo "Array de frutas ordenado (alfabético): " . implode(", ", $frutas) . "</br>";

// 3. Array asociativo de calificaciones
$calificaciones = [
    "Luis" => 90,
    "Ana" => 85,
    "Pedro" => 78,
    "Marta" => 92
];
echo "</br>Calificaciones originales:</br>";
print_r($calificaciones);

// Ordenar por valor (nota)
asort($calificaciones);
echo "Calificaciones ordenadas por nota (ascendente):</br>";
print_r($calificaciones);

// Ordenar por clave (nombre)
ksort($calificaciones);
echo "Calificaciones ordenadas por nombre (alfabético):</br>";
print_r($calificaciones);

// Ordenar por valor en orden descendente
arsort($calificaciones);
echo "Calificaciones ordenadas por nota (descendente):</br>";
print_r($calificaciones);

// 4. Array asociativo personalizado
$datos = [
    "z" => "Último",
    "a" => "Primero",
    "m" => "Medio"
];
echo "</br>Datos originales:</br>";
print_r($datos);

// Ordenar por clave
ksort($datos);
echo "Datos ordenados por clave:</br>";
print_r($datos);

// Ordenar por valor en orden descendente
arsort($datos);
echo "Datos ordenados por valor (descendente):</br>";
print_r($datos);

// 5. Ordenar palabras por longitud (ascendente)
function ordenarPorLongitudAsc($a, $b) {
    return strlen($a) - strlen($b);
}

$palabras = ["PHP", "JavaScript", "Python", "Java", "C++", "Ruby"];
usort($palabras, 'ordenarPorLongitudAsc');
echo "</br>Palabras ordenadas por longitud (ascendente):</br>";
print_r($palabras);

// 6. Ordenar array multidimensional por múltiples campos
$personas = [
    ["nombre" => "Juan", "edad" => 30, "promedio" => 8.5],
    ["nombre" => "María", "edad" => 22, "promedio" => 9.2],
    ["nombre" => "Carlos", "edad" => 25, "promedio" => 7.8],
    ["nombre" => "Ana", "edad" => 30, "promedio" => 9.5]
];

// Ordenar primero por edad y luego por promedio
usort($personas, function($a, $b) {
    if ($a['edad'] === $b['edad']) {
        return $b['promedio'] <=> $a['promedio'];
    }
    return $a['edad'] <=> $b['edad'];
});

echo "</br>Personas ordenadas por edad (ascendente) y promedio (descendente):</br>";
foreach ($personas as $persona) {
    echo "{$persona['nombre']}: Edad = {$persona['edad']}, Promedio = {$persona['promedio']}</br>";
}
?>
