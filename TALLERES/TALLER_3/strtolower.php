<?php

$textoMixto = "HoLa MuNdO";
$textoMinusculas = strtolower($textoMixto);
echo "Texto original: $textoMixto</br>";
echo "Texto en minúsculas: $textoMinusculas</br>";


$frase = "PHP Es Un LenGuAjE De PrOgRaMaCiÓn";
$fraseMinusculas = strtolower($frase);
echo "</br>Frase original: $frase</br>";
echo "Frase en minúsculas: $fraseMinusculas</br>";


$tuNombre = "Jostin Aleman";
$tuNombreMinusculas = strtolower($tuNombre);
echo "</br>Tu nombre original: $tuNombre</br>";
echo "Tu nombre en minúsculas: $tuNombreMinusculas</br>";


function compararSinMayusculas($cadena1, $cadena2) {
    return strtolower($cadena1) === strtolower($cadena2);
}


$palabra1 = "PHP";
$palabra2 = "php";
$palabra3 = "JavaScript";
$palabra4 = "JAVASCRIPT";
echo "</br>¿'$palabra1' y '$palabra2' son iguales? " . 
    (compararSinMayusculas($palabra1, $palabra2) ? "Sí" : "No") . "</br>";
echo "¿'$palabra3' y '$palabra4' son iguales? " . 
    (compararSinMayusculas($palabra3, $palabra4) ? "Sí" : "No") . "</br>";


$lenguajes = ["PHP", "JAVA", "PYTHON", "JavaScript"];
$lenguajesMinusculas = array_map('strtolower', $lenguajes);
echo "</br>Lenguajes originales:</br>";
print_r($lenguajes);
echo "Lenguajes en minúsculas:</br>";
print_r($lenguajesMinusculas);


function primerLetraMayuscula($frase) {
    $palabras = explode(" ", $frase);
    $palabrasModificadas = array_map(function($palabra) {
        return ucfirst(strtolower($palabra));
    }, $palabras);
    return implode(" ", $palabrasModificadas);
}

$fraseOriginal = "esta es una frase de prueba";
$fraseModificada = primerLetraMayuscula($fraseOriginal);
echo "</br>Frase original: $fraseOriginal</br>";
echo "Frase modificada: $fraseModificada</br>";
?>
