<?php
// Definir las variables
$nombre_completo = 'Jostin Alexis Aleman Holt';  // Coloca tu nombre completo
$edad = '23';                      // Coloca tu edad
$correo = 'AlemanJostinH@gmail.com';      // Coloca tu correo electrónico
$telefono = '64520735';    // Coloca tu número de teléfono


define('OCUPACION', 'Estudiante');   // Coloca tu ocupación actual, por ejemplo, "Estudiante"


echo "<p>";
echo "Nombre Completo: " . $nombre_completo . "<br>";
echo "Edad: " . $edad . "<br>";
echo "Correo: " . $correo . "<br>";
echo "Teléfono: " . $telefono . "<br>";
echo "Ocupación: " . OCUPACION . "<br>";
echo "</p>";


printf("<p>Nombre Completo: %s<br>Edad: %s<br>Correo: %s<br>Teléfono: %s<br>Ocupación: %s<br></p>",
    $nombre_completo, $edad, $correo, $telefono, OCUPACION);


echo "<p>";
var_dump($nombre_completo);
var_dump($edad);
var_dump($correo);
var_dump($telefono);
var_dump(OCUPACION);
echo "</p>";

