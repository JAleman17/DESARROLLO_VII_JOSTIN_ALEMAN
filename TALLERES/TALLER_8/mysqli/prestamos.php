<?php
include 'config.php';

// Registrar un préstamo
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['accion']) && $_POST['accion'] == 'registrar') {
    $libro_id = $_POST['libro_id'];
    $usuario_id = $_POST['usuario_id'];
    $fecha_prestamo = date('Y-m-d');

    // Iniciar transacción
    $mysqli->begin_transaction();

    try {
        // Reducir cantidad disponible del libro
        $stmt1 = $mysqli->prepare("UPDATE libros SET cantidad_disponible = cantidad_disponible - 1 WHERE id = ? AND cantidad_disponible > 0");
        $stmt1->bind_param("i", $libro_id);
        $stmt1->execute();

        if ($stmt1->affected_rows == 0) {
            throw new Exception("No hay suficientes libros disponibles.");
        }

        // Registrar el préstamo
        $stmt2 = $mysqli->prepare("INSERT INTO prestamos (libro_id, usuario_id, fecha_prestamo) VALUES (?, ?, ?)");
        $stmt2->bind_param("iis", $libro_id, $usuario_id, $fecha_prestamo);
        $stmt2->execute();

        // Confirmar transacción
        $mysqli->commit();
        echo "Préstamo registrado exitosamente.";
    } catch (Exception $e) {
        $mysqli->rollback();
        echo "Error: " . $e->getMessage();
    }
}

// Listar todos los préstamos activos
if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['accion']) && $_GET['accion'] == 'listar') {
    $result = $mysqli->query("SELECT prestamos.id, libros.titulo, usuarios.nombre, prestamos.fecha_prestamo 
                              FROM prestamos 
                              JOIN libros ON prestamos.libro_id = libros.id 
                              JOIN usuarios ON prestamos.usuario_id = usuarios.id 
                              WHERE prestamos.fecha_devolucion IS NULL");

    while ($row = $result->fetch_assoc()) {
        echo "ID Préstamo: " . $row['id'] . " - Libro: " . $row['titulo'] . " - Usuario: " . $row['nombre'] . " - Fecha Préstamo: " . $row['fecha_prestamo'] . "<br>";
    }
}

// Registrar devolución de libro
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['accion']) && $_POST['accion'] == 'devolver') {
    $id = $_POST['id'];
    $fecha_devolucion = date('Y-m-d');

    $mysqli->begin_transaction();

    try {
        // Registrar la devolución
        $stmt1 = $mysqli->prepare("UPDATE prestamos SET fecha_devolucion = ? WHERE id = ?");
        $stmt1->bind_param("si", $fecha_devolucion, $id);
        $stmt1->execute();

        // Aumentar cantidad disponible del libro
        $stmt2 = $mysqli->prepare("UPDATE libros SET cantidad_disponible = cantidad_disponible + 1 WHERE id = (SELECT libro_id FROM prestamos WHERE id = ?)");
        $stmt2->bind_param("i", $id);
        $stmt2->execute();

        $mysqli->commit();
        echo "Devolución registrada exitosamente.";
    } catch (Exception $e) {
        $mysqli->rollback();
        echo "Error: " . $e->getMessage();
    }
}
?>
