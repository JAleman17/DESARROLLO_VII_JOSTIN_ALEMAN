<?php
$miArray = ["elemento1", 2, ["subArray1", "subArray2"]]; // Array mixto y multidimensional
$miString = "Este es un string"; // String simple
$miNumero = 123; // Número entero

class Persona {
    public $nombre;
    public $edad;

    public function __construct($nombre, $edad) {
        $this->nombre = $nombre;
        $this->edad = $edad;
    }
}

$miObjeto = new Persona("Juan", 25); 


$miRecurso = fopen("php://temp", "r"); 


echo "</br>Resultados del ejercicio modificado con diferentes tipos de datos:</br>";
echo '¿$miArray es un array? ' . (is_array($miArray) ? "Sí" : "No") . "</br>";
echo '¿$miString es un array? ' . (is_array($miString) ? "Sí" : "No") . "</br>";
echo '¿$miNumero es un array? ' . (is_array($miNumero) ? "Sí" : "No") . "</br>";
echo '¿$miObjeto es un array? ' . (is_array($miObjeto) ? "Sí" : "No") . "</br>";
echo '¿$miRecurso es un array? ' . (is_array($miRecurso) ? "Sí" : "No") . "</br>";

function procesarDatoModificado($dato) {
    if (is_array($dato)) {
        echo "El dato es un array. Contenido:</br>";
        print_r($dato);
    } elseif (is_object($dato)) {
        echo "El dato es un objeto de la clase " . get_class($dato) . ". Valores: Nombre - {$dato->nombre}, Edad - {$dato->edad}</br>";
    } elseif (is_resource($dato)) {
        echo "El dato es un recurso de tipo " . get_resource_type($dato) . "</br>";
    } else {
        echo "El dato no es un array, objeto, ni recurso. Valor: $dato</br>";
    }
}

echo "</br>Pruebas de la función procesarDatoModificado():</br>";
procesarDatoModificado($miArray);
procesarDatoModificado($miString);
procesarDatoModificado($miNumero);
procesarDatoModificado($miObjeto);
procesarDatoModificado($miRecurso);
?>
