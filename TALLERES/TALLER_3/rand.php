<?php
// Ejemplo básico de rand()
echo "<h2>Ejemplo básico de rand()</h2>";
echo "Número aleatorio: " . rand() . "</br>";

// Generar número aleatorio en un rango específico
$min = 1;
$max = 20;
echo "Número aleatorio entre $min y $max: " . rand($min, $max) . "</br>";

// Simulación de múltiples ejecuciones
echo "<h2>Simulación de Múltiples Ejecuciones</h2>";
for ($i = 0; $i < 5; $i++) {
    echo "Número aleatorio (iteración $i): " . rand($min, $max) . "</br>";
}

// Función para lanzar un dado
function lanzarDado() {
    return rand(1, 6);
}

echo "<h2>Simular el Lanzamiento de un Dado</h2>";
echo "Lanzamiento de dado: " . lanzarDado() . "</br>";

// Simular múltiples lanzamientos
$lanzamientos = 10;
echo "Resultados de $lanzamientos lanzamientos:</br>";
for ($i = 0; $i < $lanzamientos; $i++) {
    echo lanzarDado() . " ";
}
echo "</br>";

// Función para generar contraseñas aleatorias
function generarContraseña($longitud = 8) {
    $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*()_+[]{}|;:,.<>?';
    $contraseña = '';
    for ($i = 0; $i < $longitud; $i++) {
        $contraseña .= random_int(0, strlen($caracteres) - 1);
    }
    return substr(str_shuffle($caracteres), 0, $longitud);
}

echo "<h2>Generar Contraseña Aleatoria</h2>";
echo "Contraseña aleatoria (8 caracteres): " . generarContraseña() . "</br>";
echo "Contraseña aleatoria (12 caracteres): " . generarContraseña(12) . "</br>";

// Seleccionar elemento aleatorio de un array
$frutas = ['manzana', 'banana', 'naranja', 'uva', 'pera'];
$frutaAleatoria = $frutas[rand(0, count($frutas) - 1)];
echo "<h2>Fruta Seleccionada Aleatoriamente</h2>";
echo "Fruta seleccionada aleatoriamente: $frutaAleatoria</br>";

// Generador de números de lotería
function generarNumerosLoteria($cantidadNumeros, $minimo, $maximo) {
    $numeros = range($minimo, $maximo);
    shuffle($numeros);
    return array_slice($numeros, 0, $cantidadNumeros);
}

$numerosLoteria = generarNumerosLoteria(6, 1, 49);
echo "<h2>Números de Lotería Generados</h2>";
echo "Números de lotería generados: " . implode(", ", $numerosLoteria) . "</br>";

// Simulación de probabilidad
function simularProbabilidad($probabilidad) {
    return rand(1, 100) <= $probabilidad;
}

$intentos = 1000;
$exitos = 0;
$probabilidad = 30; // 30% de probabilidad

for ($i = 0; $i < $intentos; $i++) {
    if (simularProbabilidad($probabilidad)) {
        $exitos++;
    }
}

echo "<h2>Simulación de Probabilidad</h2>";
echo "Éxitos: $exitos de $intentos intentos (" . ($exitos / $intentos * 100) . "%)</br>";

// Juego de adivinanza de números
echo "<h2>Juego de Adivinanza de Números</h2>";
$numeroSecreto = rand(1, 100);
$intentosRestantes = 5;
$adivinanza = null;

while ($intentosRestantes > 0 && $adivinanza != $numeroSecreto) {
    $adivinanza = rand(1, 100);
    echo "Intento: $adivinanza - ";

    if ($adivinanza < $numeroSecreto) {
        echo "El número es mayor. </br>";
    } elseif ($adivinanza > $numeroSecreto) {
        echo "El número es menor. </br>";
    } else {
        echo "¡Felicidades! Adivinaste el número: $numeroSecreto </br>";
    }

    $intentosRestantes--;
}

if ($adivinanza != $numeroSecreto) {
    echo "No adivinaste el número. El número secreto era: $numeroSecreto </br>";
}

?>
