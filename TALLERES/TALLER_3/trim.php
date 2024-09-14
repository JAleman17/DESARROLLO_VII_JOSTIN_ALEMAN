<?php

$textoConEspacios = "   Hola, mundo!   ";
$textoLimpio = trim($textoConEspacios);
echo "Texto original: '$textoConEspacios'</br>";
echo "Texto limpio: '$textoLimpio'</br>";


$textoConCaracteres = "***Hola, mundo***";
$textoSinAsteriscos = trim($textoConCaracteres, "*");
echo "</br>Texto con asteriscos: '$textoConCaracteres'</br>";
echo "Texto sin asteriscos: '$textoSinAsteriscos'</br>";


$textoParaLimpiar = "___   Mi nombre es Juan   ___";
$textoLimpiado = trim($textoParaLimpiar, " _");
echo "</br>Texto original para limpiar: '$textoParaLimpiar'</br>";
echo "Texto limpiado: '$textoLimpiado'</br>";


$textoIzquierda = "   Izquierda  ";
$textoDerecha = "  Derecha   ";
echo "</br>Trim izquierdo: '" . ltrim($textoIzquierda) . "'</br>";
echo "Trim derecho: '" . rtrim($textoDerecha) . "'</br>";


$arrayConEspacios = [
    "   Primer elemento   ",
    "  Segundo elemento  ",
    " Tercer elemento "
];
$arrayLimpio = array_map('trim', $arrayConEspacios);
echo "</br>Array original:</br>";
print_r($arrayConEspacios);
echo "Array limpio:</br>";
print_r($arrayLimpio);


function limpiarCadena($cadena, $caracteresNoDeseados = " \t\n\r\0\x0B") {
    return trim($cadena, $caracteresNoDeseados);
}


$cadenaSucia1 = " ***Hola, esto es una prueba!@#@ *** ";
$cadenaLimpia1 = limpiarCadena($cadenaSucia1, " *@#");
echo "</br>Cadena sucia 1: '$cadenaSucia1'</br>";
echo "Cadena limpia 1: '$cadenaLimpia1'</br>";

$cadenaSucia2 = ">>--Bienvenido--<<";
$cadenaLimpia2 = limpiarCadena($cadenaSucia2, "><-");
echo "</br>Cadena sucia 2: '$cadenaSucia2'</br>";
echo "Cadena limpia 2: '$cadenaLimpia2'</br>";


$textoComplejo = "   \t\n   Ejemplo de cadena con espacios y tabulaciones   \t\n   ";
$textoProcesado = trim($textoComplejo);
$textoMayusculas = strtoupper($textoProcesado);
$textoFinal = str_replace(" ", "_", $textoMayusculas);
echo "</br>Texto complejo original: '$textoComplejo'</br>";
echo "Texto procesado: '$textoProcesado'</br>";
echo "Texto en mayúsculas: '$textoMayusculas'</br>";
echo "Texto final con espacios reemplazados por guiones bajos: '$textoFinal'</br>";
?>
