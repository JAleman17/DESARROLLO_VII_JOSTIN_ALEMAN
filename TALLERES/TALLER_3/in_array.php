<?php

$frutas = ["manzana", "banana", "naranja", "uva"];
$buscar = "mango"; 

if (in_array($buscar, $frutas)) {
    echo "$buscar está en la lista de frutas.</br>";
} else {
    echo "$buscar no está en la lista de frutas.</br>";
}


$numeros = [1, "2", 3, "4", 5];
$buscarNumero = 2; 

echo "</br>Buscando '$buscarNumero' en el array de números:</br>";
echo "Comparación normal: " . (in_array($buscarNumero, $numeros) ? "Encontrado" : "No encontrado") . "</br>";
echo "Comparación estricta: " . (in_array($buscarNumero, $numeros, true) ? "Encontrado" : "No encontrado") . "</br>";


$coloresPrimarios = ["rojo", "azul", "verde"]; 
$colorUsuario = "verde"; 

echo "</br>¿$colorUsuario es un color primario? " . 
     (in_array(strtolower($colorUsuario), $coloresPrimarios) ? "Sí" : "No") . "</br>";


function elementosEnArray($elementos, $array) {
    $resultados = [];
    foreach ($elementos as $elemento) {
        $resultados[$elemento] = in_array($elemento, $array);
    }
    return $resultados;
}

$diasSemana = ["lunes", "martes", "miércoles", "jueves", "viernes", "sábado", "domingo"];
$diasBuscar = ["lunes", "sábado", "festivo", "martes"]; // Añadido más elementos

$resultadosDias = elementosEnArray($diasBuscar, $diasSemana);
echo "</br>Resultados de búsqueda de días:</br>";
foreach ($resultadosDias as $dia => $encontrado) {
    echo "$dia: " . ($encontrado ? "Encontrado" : "No encontrado") . "</br>";
}


$personas = [
    ["nombre" => "Juan", "edad" => 25],
    ["nombre" => "María", "edad" => 30],
    ["nombre" => "Carlos", "edad" => 22]
];

$buscarPersona = ["nombre" => "Carlos", "edad" => 22]; 

echo "</br>Buscando persona en el array:</br>";
echo in_array($buscarPersona, $personas) ? "Persona encontrada" : "Persona no encontrada";


function in_array_case_insensitive($needle, $haystack) {
    return in_array(strtolower($needle), array_map('strtolower', $haystack));
}

$lenguajes = ["PHP", "Java", "Python", "JavaScript"];
$buscarLenguaje = "python"; 
echo "</br></br>Buscando '$buscarLenguaje' en lenguajes de programación:</br>";
echo in_array_case_insensitive($buscarLenguaje, $lenguajes) ? "Encontrado" : "No encontrado";
?>
