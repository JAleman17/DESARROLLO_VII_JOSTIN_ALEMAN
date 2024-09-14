<?php

$texto = "El código postal es 12345";
$patron = "/\d{5}/"; 
if (preg_match($patron, $texto, $coincidencias)) {
    echo "Código postal encontrado: {$coincidencias[0]}</br>";
} else {
    echo "No se encontró un código postal válido.</br>";
}


function validarCodigoPostalPanama($codigoPostal) {
    $patron = "/^\d{7}$/";
    return preg_match($patron, $codigoPostal);
}

$codigoPostal1 = "1234567";
$codigoPostal2 = "123456";
echo "¿'{$codigoPostal1}' es un código postal válido en Panamá? " . (validarCodigoPostalPanama($codigoPostal1) ? "Sí" : "No") . "</br>";
echo "¿'{$codigoPostal2}' es un código postal válido en Panamá? " . (validarCodigoPostalPanama($codigoPostal2) ? "Sí" : "No") . "</br>";


function validarDNI($dni) {
    $patron = "/^\d{8}[A-Z]$/";
    return preg_match($patron, $dni);
}

$dni1 = "12345678A";
$dni2 = "123456789";
echo "¿'{$dni1}' es un DNI válido? " . (validarDNI($dni1) ? "Sí" : "No") . "</br>";
echo "¿'{$dni2}' es un DNI válido? " . (validarDNI($dni2) ? "Sí" : "No") . "</br>";


function extraerUsuarioTwitter($tweet) {
    $patron = "/@([a-zA-Z0-9._]+)/";
    if (preg_match($patron, $tweet, $coincidencias)) {
        return $coincidencias[1];
    }
    return null;
}

$tweet = "Sígueme en @usuario.ejemplo para más contenido!";
$usuario = extraerUsuarioTwitter($tweet);
echo "</br>Usuario de Twitter extraído: " . ($usuario ? "@$usuario" : "No se encontró usuario") . "</br>";


$info = "Nombre: Juan, Edad: 30, Ciudad: Madrid";
$patron = "/Nombre: ([^,]+), Edad: (\d+), Ciudad: ([^,]+)/";
if (preg_match($patron, $info, $coincidencias)) {
    echo "</br>Información extraída:</br>";
    echo "Nombre: {$coincidencias[1]}</br>";
    echo "Edad: {$coincidencias[2]}</br>";
    echo "Ciudad: {$coincidencias[3]}</br>";
}


function validarTelefono($telefono) {
    $patron = "/^(\+\d{1,3}[- ]?)?\(?\d{2,4}\)?[- ]?\d{6,10}$/";
    return preg_match($patron, $telefono);
}

$telefono1 = "+34 123456789";
$telefono2 = "123-456-7890";
echo "</br>¿'{$telefono1}' es un teléfono válido? " . (validarTelefono($telefono1) ? "Sí" : "No") . "</br>";
echo "¿'{$telefono2}' es un teléfono válido? " . (validarTelefono($telefono2) ? "Sí" : "No") . "</br>";


function extraerEtiquetasHTML($html) {
    $patron = "/<(\w+)(\s+[^>]*)?>/";
    preg_match_all($patron, $html, $coincidencias, PREG_SET_ORDER);
    $resultados = [];
    foreach ($coincidencias as $coincidencia) {
        $etiqueta = $coincidencia[1];
        $atributos = isset($coincidencia[2]) ? trim($coincidencia[2]) : "";
        $resultados[] = $etiqueta . ($atributos ? " ($atributos)" : "");
    }
    return $resultados;
}

$html = '<div class="container"><a href="http://example.com">Enlace</a><br><img src="image.jpg" alt="Imagen"></div>';
$etiquetas = extraerEtiquetasHTML($html);
echo "</br>Etiquetas HTML encontradas: " . implode(", ", $etiquetas) . "</br>";
?>
