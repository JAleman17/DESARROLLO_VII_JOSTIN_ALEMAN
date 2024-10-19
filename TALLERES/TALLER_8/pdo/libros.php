<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    $isbn = $_POST['isbn'];
    $anio_publicacion = $_POST['anio_publicacion'];
    $cantidad_disponible = $_POST['cantidad_disponible'];

    $sql = "INSERT INTO libros (titulo, autor, isbn, anio_publicacion, cantidad_disponible) VALUES (?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    
    try {
        $stmt->execute([$titulo, $autor, $isbn, $anio_publicacion, $cantidad_disponible]);
        echo "Libro añadido exitosamente.";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
