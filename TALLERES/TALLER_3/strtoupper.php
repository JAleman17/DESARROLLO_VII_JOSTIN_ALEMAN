<?php

$textoMixto = "HoLa MuNdO";
$textoMayusculas = strtoupper($textoMixto);
echo "Texto original: $textoMixto</br>";
echo "Texto en mayúsculas: $textoMayusculas</br>";


$frase = "php es un lenguaje de programación";
$fraseMayusculas = strtoupper($frase);
echo "</br>Frase original: $frase</br>";
echo "Frase en mayúsculas: $fraseMayusculas</br>";


$ciudad = "Panamá";
$pais = "Panamá";
$ciudadMayusculas = strtoupper($ciudad);
$paisMayusculas = strtoupper($pais);
echo "</br>Tu ciudad en mayúsculas: $ciudadMayusculas</br>";
echo "Tu país en mayúsculas: $paisMayusculas</br>";

function crearEncabezado($texto) {
    return str_pad(strtoupper($texto), strlen($texto) + 4, "*", STR_PAD_BOTH);
}

$tituloDocumento1 = "Informe importante";
$tituloDocumento2 = "Resumen ejecutivo";
echo "</br>" . crearEncabezado($tituloDocumento1) . "</br>";
echo "</br>" . crearEncabezado($tituloDocumento2) . "</br>";


$frutas = ["manzana", "banana", "cereza", "dátil"];
$frutasMayusculas = array_map('strtoupper', $frutas);
echo "</br>Frutas originales:</br>";
print_r($frutas);
echo "Frutas en mayúsculas:</br>";
print_r($frutasMayusculas);


function primerLetraMayuscula($frase) {
    // Expande la frase por palabras y maneja apóstrofes y guiones
    $palabras = preg_split('/(\s|\'|-)+/', $frase);
    $palabrasModificadas = array_map(function($palabra) {
        return ucfirst(strtolower($palabra));
    }, $palabras);
    return implode(" ", $palabrasModificadas);
}

$fraseOriginal = "esta es una frase de prueba";
$fraseModificada = primerLetraMayuscula($fraseOriginal);
echo "</br>Frase original: $fraseOriginal</br>";
echo "Frase modificada: $fraseModificada</br>";

$fraseConApostrofesYGuiones = "l'arbre à l'ombre-des-chênes";
$fraseModificadaConApostrofesYGuiones = primerLetraMayuscula($fraseConApostrofesYGuiones);
echo "</br>Frase con apóstrofes y guiones: $fraseConApostrofesYGuiones</br>";
echo "Frase modificada con apóstrofes y guiones: $fraseModificadaConApostrofesYGuiones</br>";
?>
