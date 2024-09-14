<?php

$frutas1 = ["manzana", "pera"];
$frutas2 = ["naranja", "uva"];
$todasLasFrutas = array_merge($frutas1, $frutas2);
echo "Todas las frutas:</br>";
print_r($todasLasFrutas);


$infoPersona1 = ["nombre" => "Juan", "edad" => 30];
$infoPersona2 = ["ciudad" => "Madrid", "profesion" => "Ingeniero"];
$infoCompleta = array_merge($infoPersona1, $infoPersona2);
echo "</br>Información completa de la persona:</br>";
print_r($infoCompleta);


$misComidas = ["pizza", "sushi", "hamburguesa"]; 
$comidasAmigo = ["tacos", "pasta", "ensalada"]; 
$todasLasComidas = array_merge($misComidas, $comidasAmigo);
echo "</br>Todas las comidas favoritas:</br>";
print_r($todasLasComidas);


$array1 = ["a" => "rojo", "b" => "verde"];
$array2 = ["b" => "azul", "c" => "amarillo"];
$resultadoMerge = array_merge($array1, $array2);
echo "</br>Resultado de merge con claves duplicadas:</br>";
print_r($resultadoMerge);


$numeros1 = [1, 2, 3];
$numeros2 = [4, 5, 6];
$numeros3 = [7, 8, 9];
$todosLosNumeros = array_merge($numeros1, $numeros2, $numeros3);
echo "</br>Todos los números combinados:</br>";
print_r($todosLosNumeros);


$colores1 = ["rojo", "verde", "azul"];
$colores2 = ["verde", "amarillo", "rojo"];
$coloresUnicos = array_unique(array_merge($colores1, $colores2));
echo "</br>Colores únicos después de combinar:</br>";
print_r($coloresUnicos);


$numeros = [1, 2, 3, 3, 4];
$frutas = ["manzana", "banana", "manzana"];
$combinado = array_merge($numeros, $frutas);
$combinadoUnico = array_unique($combinado);
echo "</br>Array combinado y único:</br>";
print_r($combinadoUnico);
?>
