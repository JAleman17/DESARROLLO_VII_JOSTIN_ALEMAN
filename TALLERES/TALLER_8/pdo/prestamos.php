<?php
include 'config.php';

// Registrar un préstamo
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['accion']) && $_POST['accion'] == 'registrar') {
    $libro_id = $_POST['libro_id'];
    $usuario_id = $_POST['usuario_id'];
    $fecha_prestamo = date('Y-m-d');

    // Iniciar transacción
    $pdo->beginTransaction();

    try {
        // Reducir cantidad disponible del libro
        $stmt1 = $pdo->prepare("UPDATE libros SET cantidad_disponible = cantidad_disponible - 1 WHERE id = ? AND cantidad_disponible > 0");
        $stmt1->execute([$libro_id]);

        if ($stmt1->rowCount() == 0) {
            throw new Exception("No hay suficientes libros disponibles.");
        }

        // Registrar el préstamo
        $stmt2 = $pdo->prepare("INSERT INTO prestamos (libro_id, usuario_id, fecha_prestamo) VALUES (?, ?, ?)");
        $stmt2->execute([$libro_id, $usuario_id, $fecha_prestamo]);

        // Confirmar transacción
        $pdo->commit();
        echo "Préstamo registrado exitosamente.";
    } catch (Exception $e) {
        $pdo->rollBack();
        echo "Error: " . $e->getMessage();
    }
}

// Listar todos los préstamos activos
if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['accion']) && $_GET['accion'] == 'listar') {
    $sql = "SELECT prestamos.id, libros.titulo, usuarios.nombre, prestamos.fecha_prestamo 
            FROM prestamos 
            JOIN libros ON prestamos.libro_id = libros.id 
            JOIN usuarios ON prestamos.usuario_id = usuarios.id 
            WHERE prestamos.fecha_devolucion IS NULL";
    
    $stmt = $pdo->query($sql);

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "ID Préstamo: " . $row['id'] . " - Libro: " . $row['titulo'] . " - Usuario: " . $row['nombre'] . " - Fecha Préstamo: " . $row['fecha_prestamo'] . "<br>";
    }
}

// Registrar devolución de libro
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['accion']) && $_POST['accion'] == 'devolver') {
    $id = $_POST['id'];
    $fecha_devolucion = date('Y-m-d');

    // Iniciar transacción
    $pdo->beginTransaction();

    try {
        // Registrar la devolución
        $stmt1 = $pdo->prepare("UPDATE prestamos SET fecha_devolucion = ? WHERE id = ?");
        $stmt1->execute([$fecha_devolucion, $id]);

        // Aumentar cantidad disponible del libro
        $stmt2 = $pdo->prepare("UPDATE libros SET cantidad_disponible = cantidad_disponible + 1 WHERE id = (SELECT libro_id FROM prestamos WHERE id = ?)");
        $stmt2->execute([$id]);

        $pdo->commit();
        echo "Devolución registrada exitosamente.";
    } catch (Exception $e) {
        $pdo->rollBack();
        echo "Error: " . $e->getMessage();
    }
}
?>
