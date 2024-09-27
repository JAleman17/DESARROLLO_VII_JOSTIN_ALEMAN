<?php
require 'clases.php';

// Aqui se inicializa el gestor 
$gestor = new GestorBiblioteca('biblioteca.json');

// En este caso se manejan las acciones utilizando GET
$accion = $_GET['accion'] ?? '';

switch ($accion) {
    case 'agregar':
        
        break;
    case 'eliminar':
        
        $id = $_GET['id'];
        $gestor->eliminarRecurso($id);
        break;
    case 'actualizarEstado':
       
        $id = $_GET['id'];
        $nuevoEstado = $_GET['nuevoEstado'];
        $gestor->actualizarEstadoRecurso($id, $nuevoEstado);
        break;
    case 'listar':
    default:
        // Listar recursos
        $estado = $_GET['estado'] ?? '';
        $campoOrden = $_GET['campoOrden'] ?? 'id';
        $direccionOrden = $_GET['direccionOrden'] ?? 'ASC';
        $recursos = $gestor->listarRecursos($estado, $campoOrden, $direccionOrden);
        break;
}


?>
