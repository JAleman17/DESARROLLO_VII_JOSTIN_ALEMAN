<?php
echo "Fecha actual (d/m/Y): " . date("d/m/Y") . "</br>";
echo "Fecha actual (m-d-Y): " . date("m-d-Y") . "</br>";
echo "Fecha actual (D, d M Y): " . date("D, d M Y") . "</br>";
echo "Fecha actual (RFC 2822): " . date("r") . "</br>";


function diasEntre($fecha1, $fecha2) {
    $timestamp1 = strtotime($fecha1);
    $timestamp2 = strtotime($fecha2);
    $diferencia = abs($timestamp2 - $timestamp1);
    return floor($diferencia / (60 * 60 * 24));
}


$fechaInicio = "2020-05-15";
$fechaFin = "2024-08-29"; // Fecha actual
$diasTranscurridos = diasEntre($fechaInicio, $fechaFin);

echo "</br>Días transcurridos desde el $fechaInicio hasta $fechaFin: $diasTranscurridos días</br>";


$fechaInicio2 = "2024-01-01";
$fechaFin2 = "2024-12-31";
$diasTranscurridos2 = diasEntre($fechaInicio2, $fechaFin2);

echo "</br>Días transcurridos desde el $fechaInicio2 hasta $fechaFin2: $diasTranscurridos2 días</br>";


$zonas = ["America/New_York", "Europe/London", "Asia/Tokyo", "Australia/Sydney"];

foreach ($zonas as $zona) {
    date_default_timezone_set($zona);
    echo "Hora en $zona: " . date("H:i:s") . "</br>";
}
?>
