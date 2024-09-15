<?php
require_once 'Empleado.php';
require_once 'Evaluable.php';

class Gerente extends Empleado implements Evaluable {
    private $departamento;
    private $bono;

    public function __construct($nombre, $idEmpleado, $salarioBase, $departamento) {
        parent::__construct($nombre, $idEmpleado, $salarioBase);
        $this->departamento = $departamento;
        $this->bono = 0; // Bono inicial
    }

    public function asignarBono($bono) {
        $this->bono = $bono;
    }

    public function getBono() {
        return $this->bono;
    }

    public function getDepartamento() {
        return $this->departamento;
    }

    public function evaluarDesempenio() {
        // Aqui se hace la evaluacion
        return "El gerente " . $this->getNombre() . " ha sido evaluado en el departamento " . $this->departamento;
    }

    public function calcularSalarioTotal() {
        return $this->getSalarioBase() + $this->bono;
    }
}
?>
