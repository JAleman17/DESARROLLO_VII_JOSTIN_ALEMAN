<?php
require_once 'Libro.php';

class LibroDigital extends Libro {
    private $formato;
    private $tamano;

    public function __construct($titulo, $autor, $anio, $formato, $tamano) {
        parent::__construct($titulo, $autor, $anio);
        $this->formato = $formato;
        $this->tamano = $tamano;
    }

    public function obtenerInformacion() {
        return parent::obtenerInformacion() . ", Formato: $this->formato, Tamaño: $this->tamano MB";
    }
}
?>
