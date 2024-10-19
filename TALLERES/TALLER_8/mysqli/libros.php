<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    $isbn = $_POST['isbn'];
    $anio_publicacion = $_POST['anio_publicacion'];
    $cantidad_disponible = $_POST['cantidad_disponible'];

    $stmt = $mysqli->prepare("INSERT INTO libros (titulo, autor, isbn, anio_publicacion, cantidad_disponible) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssii", $titulo, $autor, $isbn, $anio_publicacion, $cantidad_disponible);

    if ($stmt->execute()) {
        echo "Libro añadido exitosamente.";
    } else {
        echo "Error: " . $mysqli->error;
    }

    $stmt->close();
}
?>
