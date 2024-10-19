<?php
include 'config.php';

// Registrar un nuevo usuario
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['accion']) && $_POST['accion'] == 'registrar') {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash de la contraseña

    $sql = "INSERT INTO usuarios (nombre, email, password) VALUES (?, ?, ?)";
    $stmt = $pdo->prepare($sql);

    try {
        $stmt->execute([$nombre, $email, $password]);
        echo "Usuario registrado exitosamente.";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

// Listar todos los usuarios
if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['accion']) && $_GET['accion'] == 'listar') {
    $sql = "SELECT id, nombre, email FROM usuarios";
    $stmt = $pdo->query($sql);

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "ID: " . $row['id'] . " - Nombre: " . $row['nombre'] . " - Email: " . $row['email'] . "<br>";
    }
}

// Buscar usuario por nombre o email
if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['buscar'])) {
    $buscar = $_GET['buscar'];
    $sql = "SELECT id, nombre, email FROM usuarios WHERE nombre LIKE ? OR email LIKE ?";
    $stmt = $pdo->prepare($sql);
    $likeBuscar = "%$buscar%";

    try {
        $stmt->execute([$likeBuscar, $likeBuscar]);
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "ID: " . $row['id'] . " - Nombre: " . $row['nombre'] . " - Email: " . $row['email'] . "<br>";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

// Actualizar usuario
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['accion']) && $_POST['accion'] == 'actualizar') {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];

    $sql = "UPDATE usuarios SET nombre = ?, email = ? WHERE id = ?";
    $stmt = $pdo->prepare($sql);

    try {
        $stmt->execute([$nombre, $email, $id]);
        echo "Usuario actualizado exitosamente.";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

// Eliminar usuario
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['accion']) && $_POST['accion'] == 'eliminar') {
    $id = $_POST['id'];

    $sql = "DELETE FROM usuarios WHERE id = ?";
    $stmt = $pdo->prepare($sql);

    try {
        $stmt->execute([$id]);
        echo "Usuario eliminado exitosamente.";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
