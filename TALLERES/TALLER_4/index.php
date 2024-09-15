<?php
require_once 'Gerente.php';
require_once 'Desarrollador.php';
require_once 'Empresa.php';

// Creando la empresa 
$empresa = new Empresa();

// Crearndo empleados
$gerente = new Gerente("Carlos Pérez", 1, 5000, "Ventas");
$gerente->asignarBono(1000);

$desarrollador = new Desarrollador("Ana Gómez", 2, 4000, "PHP", "Senior");

$empleadoRegular = new Empleado("Luis Torres", 3, 3000);

// Aqui se agregan los empleados a la empresa 
$empresa->agregarEmpleado($gerente);
$empresa->agregarEmpleado($desarrollador);
$empresa->agregarEmpleado($empleadoRegular);

// Lista de empleados
echo "Lista de empleados:\n";
$empresa->listarEmpleados();

echo "\n";

// Calculo de nomina
echo "Nómina total: " . $empresa->calcularNominaTotal() . "\n";

echo "\n";

// Desempeño de empleados
echo "Evaluación de desempeño:\n";
$empresa->evaluarDesempenio();
?>
