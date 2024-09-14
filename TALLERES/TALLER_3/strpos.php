<?php
// Ejemplo básico de strpos()
$texto = "Bienvenidos al mundo de PHP!";
$posicion = strpos($texto, "mundo");
echo "La palabra 'mundo' comienza en la posición: $posicion</br>";

// Búsqueda que no encuentra resultados
$busqueda = strpos($texto, "Python");
if ($busqueda === false) {
    echo "La palabra 'Python' no se encontró en el texto.</br>";
}

// Ejercicio: Verificar si un email es válido (contiene @)
function esEmailValido($email) {
    return strpos($email, "@") !== false;
}

$email1 = "usuario@dominio.com";
$email2 = "usuariodominio.com";
echo "</br>¿'$email1' es un email válido? " . (esEmailValido($email1) ? "Sí" : "No") . "</br>";
echo "¿'$email2' es un email válido? " . (esEmailValido($email2) ? "Sí" : "No") . "</br>";

// Bonus: Encontrar todas las ocurrencias de una letra
function encontrarTodasLasOcurrencias($texto, $letra) {
    $posiciones = [];
    $posicion = 0;
    while (($posicion = strpos($texto, $letra, $posicion)) !== false) {
        $posiciones[] = $posicion;
        $posicion++;
    }
    return $posiciones;
}

$frase = "El desafío de la programación es resolver problemas";
$letra = "r";
$ocurrencias = encontrarTodasLasOcurrencias($frase, $letra);
echo "</br>Posiciones de la letra '$letra' en '$frase': " . implode(", ", $ocurrencias) . "</br>";

// Extra: Extraer el nombre de usuario de una dirección de correo electrónico
function extraerNombreUsuario($email) {
    $posicionArroba = strpos($email, "@");
    if ($posicionArroba === false) {
        return false;
    }
    return substr($email, 0, $posicionArroba);
}

$email = "usuario@dominio.com";
$nombreUsuario = extraerNombreUsuario($email);
echo "</br>Nombre de usuario extraído de '$email': " . ($nombreUsuario !== false ? $nombreUsuario : "Email no válido") . "</br>";

// Modificación de censura de palabras para que sea case-insensitive y solo censure palabras completas
function censurarPalabras($texto, $palabrasCensuradas) {
    foreach ($palabrasCensuradas as $palabra) {
        // Usar preg_replace para censura case-insensitive y solo palabras completas
        $texto = preg_replace('/\b' . preg_quote($palabra, '/') . '\b/i', str_repeat('*', strlen($palabra)), $texto);
    }
    return $texto;
}

$textoOriginal = "Este es un texto con algunas palabras que deben ser censuradas, incluyendo Texto y Palabras.";
$palabrasCensuradas = ["texto", "palabras", "censuradas"];
$textoCensurado = censurarPalabras($textoOriginal, $palabrasCensuradas);
echo "</br>Texto original: $textoOriginal</br>";
echo "Texto censurado: $textoCensurado</br>";

// Nuevo ejemplo: Reemplazar una subcadena dentro de una URL con una nueva subcadena
function reemplazarSubcadena($url, $subcadenaOriginal, $subcadenaNueva) {
    $posicion = strpos($url, $subcadenaOriginal);
    if ($posicion !== false) {
        return substr_replace($url, $subcadenaNueva, $posicion, strlen($subcadenaOriginal));
    }
    return $url;
}

$urlOriginal = "https://www.example.com/path/to/resource";
$subcadenaOriginal = "resource";
$subcadenaNueva = "item";
$urlModificado = reemplazarSubcadena($urlOriginal, $subcadenaOriginal, $subcadenaNueva);
echo "</br>URL original: $urlOriginal</br>";
echo "URL modificada: $urlModificado</br>";
?>
