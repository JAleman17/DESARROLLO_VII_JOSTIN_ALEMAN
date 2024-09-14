<?php
// Ejemplo original de uso de implode()
$frutas = ["Manzana", "Naranja", "Plátano", "Uva"];
$frase = implode(", ", $frutas);

echo "Array de frutas:</br>";
print_r($frutas);
echo "</br>Frase creada: $frase</br>";

// Ejemplo 1: Array de países con separador de guiones (-)
$paises = ["Panamá", "Japón", "Canadá", "Australia", "Italia"];
$listaPaises = implode("-", $paises);

echo "</br>Mi lista de países para visitar (separados por guiones): $listaPaises</br>";

// Ejemplo 2: Array de países con separador de comas (,)
$paises = ["Brasil", "Francia", "Egipto", "Tailandia", "Sudáfrica"];
$listaPaises = implode(", ", $paises);

echo "</br>Mi lista de países para visitar (separados por comas): $listaPaises</br>";

// Ejemplo 3: Array de países con separador de barra inclinada (/)
$paises = ["India", "China", "México", "Grecia", "Nueva Zelanda"];
$listaPaises = implode("/", $paises);

echo "</br>Mi lista de países para visitar (separados por barra inclinada): $listaPaises</br>";

// Ejemplo 4: Uso de implode() con un array asociativo (utilizando doble punto y coma ';;' como separador)
$persona = [
    "nombre" => "Ana",
    "edad" => 28,
    "ciudad" => "Barcelona"
];
$infoPersona = implode(";; ", $persona);

echo "</br>Información de la persona (separados por doble punto y coma): $infoPersona</br>";
?>
