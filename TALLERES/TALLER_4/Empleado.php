<?php
// Clase base Empleado
class Empleado {
    private $nombre;
    private $idEmpleado;
    private $salarioBase;

    public function __construct($nombre, $idEmpleado, $salarioBase) {
        $this->nombre = $nombre;
        $this->idEmpleado = $idEmpleado;
        $this->salarioBase = $salarioBase;
    }

    // Aqui estoy usando los getters
    public function getNombre() {
        return $this->nombre;
    }

    public function getIdEmpleado() {
        return $this->idEmpleado;
    }

    public function getSalarioBase() {
        return $this->salarioBase;
    }

    // Y aca utilizo los setters
    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setIdEmpleado($idEmpleado) {
        $this->idEmpleado = $idEmpleado;
    }

    public function setSalarioBase($salarioBase) {
        $this->salarioBase = $salarioBase;
    }
}
?>
