<?php

$texto = "Hola Mundo";
$extracto1 = substr($texto, 0, 4);  
$extracto2 = substr($texto, 5);     

echo "Texto original: $texto</br>";
echo "Extracto 1: $extracto1</br>";
echo "Extracto 2: $extracto2</br>";


$palabra = "Programación";
$ultimasPalabras = substr($palabra, -4);  
echo "</br>Palabra original: $palabra</br>";
echo "Últimas letras: $ultimasPalabras</br>";


$nombreCompleto = "Juan Pérez Rodríguez";
$nombre = substr($nombreCompleto, 0, strpos($nombreCompleto, " "));
$apellido = substr($nombreCompleto, strrpos($nombreCompleto, " ") + 1);
echo "</br>Nombre completo: $nombreCompleto</br>";
echo "Nombre: $nombre</br>";
echo "Apellido: $apellido</br>";


function ocultarTarjeta($numeroTarjeta, $visible = 4) {
    $longitud = strlen($numeroTarjeta);
    $oculto = str_repeat("*", $longitud - $visible);
    return $oculto . substr($numeroTarjeta, -$visible);
}

$tarjeta = "1234567890123456";
echo "</br>Número de tarjeta original: $tarjeta</br>";
echo "Número de tarjeta oculto (últimos 4 dígitos visibles): " . ocultarTarjeta($tarjeta) . "</br>";
echo "Número de tarjeta oculto (últimos 8 dígitos visibles): " . ocultarTarjeta($tarjeta, 8) . "</br>";


function extraerDominio($email) {
    return substr($email, strpos($email, "@") + 1);
}

$correo1 = "usuario@example.com";
$correo2 = "persona@subdominio.ejemplo.org";
echo "</br>Correo electrónico 1: $correo1</br>";
echo "Dominio: " . extraerDominio($correo1) . "</br>";
echo "</br>Correo electrónico 2: $correo2</br>";
echo "Dominio: " . extraerDominio($correo2) . "</br>";

function extraerEntre($texto, $inicio, $fin) {
    $inicioPos = strpos($texto, $inicio);
    if ($inicioPos === false) return "";
    
    $inicioPos += strlen($inicio);
    $finPos = strpos($texto, $fin, $inicioPos);
    if ($finPos === false) return "";
    
    return substr($texto, $inicioPos, $finPos - $inicioPos);
}

$textoHTML = "<h1>Título Principal</h1>";
$textoMarkdown = "# Encabezado Principal #";
$textoDelimitado = "Inicio [contenido] Fin";
echo "</br>Texto HTML: $textoHTML</br>";
echo "Contenido extraído: " . extraerEntre($textoHTML, "<h1>", "</h1>") . "</br>";
echo "</br>Texto Markdown: $textoMarkdown</br>";
echo "Contenido extraído: " . extraerEntre($textoMarkdown, "# ", " #") . "</br>";
echo "</br>Texto Delimitado: $textoDelimitado</br>";
echo "Contenido extraído: " . extraerEntre($textoDelimitado, "[", "]") . "</br>";


$subcadena = substr($texto, 2, 5);
echo "</br>Subcadena desde la posición 2 hasta 7: $subcadena</br>";


$textoLargo = "Ejemplo de extracción de texto";
$extraccionDesdeFinal = substr($textoLargo, -12);
echo "</br>Extracción desde el final (últimos 12 caracteres): $extraccionDesdeFinal</br>";
?>
