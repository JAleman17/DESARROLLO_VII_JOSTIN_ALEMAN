<?php
$misAmigos = ["Carlos", "Ana", "Miguel"];
echo "Array original de mis amigos:</br>";
print_r($misAmigos);

array_push($misAmigos, "Laura", "Pedro", "Luis");
echo "</br>Array de mis amigos después de añadir más elementos con array_push():</br>";
print_r($misAmigos);

// Experimento 1: Añadir arrays a un array simple
array_push($misAmigos, ["Amigo Extra 1", "Amigo Extra 2"]);
echo "</br>Array de mis amigos después de añadir un array completo:</br>";
print_r($misAmigos);

$amigosAsociativos = [
    "mejorAmigo" => "Carlos",
    "amigoDeInfancia" => "Ana"
];
// Aunque puedes añadir elementos a un array asociativo con array_push(), no es la mejor práctica
array_push($amigosAsociativos, "Miguel");
echo "</br>Array asociativo de amigos después de array_push():</br>";
print_r($amigosAsociativos);

$amigosDetalles = [
    ["Carlos", 25, "Panamá"],
    ["Ana", 22, "Madrid"]
];
array_push($amigosDetalles, ["Miguel", 30, "Barcelona"], ["Laura", 27, "Valencia"]);
echo "</br>Array multidimensional de detalles de amigos después de array_push():</br>";
foreach ($amigosDetalles as $detalle) {
    echo "- Nombre: {$detalle[0]}, Edad: {$detalle[1]}, Ciudad: {$detalle[2]}</br>";
}

$masDetalles = [
    ["nombre" => "Carlos", "edad" => 25, "ciudad" => "Panamá"],
    ["nombre" => "Ana", "edad" => 22, "ciudad" => "Madrid"]
];
array_push($masDetalles, ["nombre" => "Miguel", "edad" => 30, "ciudad" => "Barcelona"]);
echo "</br>Array multidimensional con arrays asociativos después de array_push():</br>";
foreach ($masDetalles as $detalle) {
    echo "- Nombre: {$detalle['nombre']}, Edad: {$detalle['edad']}, Ciudad: {$detalle['ciudad']}</br>";
}
?>
