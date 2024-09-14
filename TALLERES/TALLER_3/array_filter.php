<?php
// Array original
$numeros = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];

// Filtrado de números pares
$pares = array_filter($numeros, function($n) {
    return $n % 2 == 0;
});
echo "Números pares: " . implode(", ", $pares) . "</br>";

// Filtrado de números primos
function esPrimo($n) {
    if ($n < 2) return false;
    for ($i = 2; $i <= sqrt($n); $i++) {
        if ($n % $i == 0) return false;
    }
    return true;
}
$primos = array_filter($numeros, 'esPrimo');
echo "Números primos: " . implode(", ", $primos) . "</br>";

// Filtrado de palabras que comienzan con una vocal
$palabras = ["auto", "casa", "elefante", "iglú", "oso", "uva", "zapato", "arbol", "universidad", "elefante"];
$empiezaConVocal = array_filter($palabras, function($palabra) {
    return in_array(strtolower($palabra[0]), ['a', 'e', 'i', 'o', 'u']);
});
echo "Palabras que empiezan con vocal: " . implode(", ", $empiezaConVocal) . "</br>";

// Filtrado de array asociativo por edad
$personas = [
    ["nombre" => "Ana", "edad" => 25],
    ["nombre" => "Carlos", "edad" => 30],
    ["nombre" => "Beatriz", "edad" => 20],
    ["nombre" => "David", "edad" => 35],
    ["nombre" => "Elena", "edad" => 40]
];
$mayoresDe25 = array_filter($personas, function($persona) {
    return $persona['edad'] > 25;
});
echo "Personas mayores de 25 años:</br>";
foreach ($mayoresDe25 as $persona) {
    echo "- {$persona['nombre']} ({$persona['edad']} años)</br>";
}


$frutas = ["manzana" => 3, "banana" => 5, "naranja" => 2, "cereza" => 6, "mango" => 4];
$frutasConMasDe3 = array_filter($frutas, function($cantidad, $nombre) {
    return $cantidad > 3 && strlen($nombre) > 5;
}, ARRAY_FILTER_USE_BOTH);
echo "Frutas con más de 3 unidades y nombre largo:</br>";
print_r($frutasConMasDe3);


function filtrarPor($array, $campo, $valor, $comparacion = '=') {
    return array_filter($array, function($item) use ($campo, $valor, $comparacion) {
        if (!isset($item[$campo])) return false;
        switch ($comparacion) {
            case '>':
                return $item[$campo] > $valor;
            case '<':
                return $item[$campo] < $valor;
            case '>=':
                return $item[$campo] >= $valor;
            case '<=':
                return $item[$campo] <= $valor;
            case '!=':
                return $item[$campo] != $valor;
            case '=':
            default:
                return $item[$campo] == $valor;
        }
    });
}

$estudiantes = [
    ["nombre" => "Elena", "curso" => "PHP", "nota" => 85],
    ["nombre" => "Miguel", "curso" => "JavaScript", "nota" => 90],
    ["nombre" => "Sofía", "curso" => "PHP", "nota" => 78],
    ["nombre" => "Lucas", "curso" => "Python", "nota" => 92]
];


$estudiantesPHP = filtrarPor($estudiantes, "curso", "PHP");
$estudiantesPHPAltaNota = filtrarPor($estudiantesPHP, "nota", 80, '>=');
echo "Estudiantes de PHP con nota mayor o igual a 80:</br>";
foreach ($estudiantesPHPAltaNota as $estudiante) {
    echo "- {$estudiante['nombre']} (Nota: {$estudiante['nota']})</br>";
}


$estudiantesBajaNota = filtrarPor($estudiantes, "nota", 85, '<');
echo "Estudiantes con nota menor que 85:</br>";
foreach ($estudiantesBajaNota as $estudiante) {
    echo "- {$estudiante['nombre']} (Nota: {$estudiante['nota']})</br>";
}
?>
