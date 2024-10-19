<?php
include 'config.php';

// Registrar un nuevo usuario
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['accion']) && $_POST['accion'] == 'registrar') {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash de la contraseña

    $stmt = $mysqli->prepare("INSERT INTO usuarios (nombre, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $nombre, $email, $password);

    if ($stmt->execute()) {
        echo "Usuario registrado exitosamente.";
    } else {
        echo "Error: " . $mysqli->error;
    }

    $stmt->close();
}

// Listar todos los usuarios
if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['accion']) && $_GET['accion'] == 'listar') {
    $result = $mysqli->query("SELECT id, nombre, email FROM usuarios");

    while ($row = $result->fetch_assoc()) {
        echo "ID: " . $row['id'] . " - Nombre: " . $row['nombre'] . " - Email: " . $row['email'] . "<br>";
    }
}

// Buscar usuario por nombre o email
if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['buscar'])) {
    $buscar = $_GET['buscar'];
    $stmt = $mysqli->prepare("SELECT id, nombre, email FROM usuarios WHERE nombre LIKE ? OR email LIKE ?");
    $likeBuscar = "%$buscar%";
    $stmt->bind_param("ss", $likeBuscar, $likeBuscar);
    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
        echo "ID: " . $row['id'] . " - Nombre: " . $row['nombre'] . " - Email: " . $row['email'] . "<br>";
    }

    $stmt->close();
}

// Actualizar usuario
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['accion']) && $_POST['accion'] == 'actualizar') {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];

    $stmt = $mysqli->prepare("UPDATE usuarios SET nombre = ?, email = ? WHERE id = ?");
    $stmt->bind_param("ssi", $nombre, $email, $id);

    if ($stmt->execute()) {
        echo "Usuario actualizado exitosamente.";
    } else {
        echo "Error: " . $mysqli->error;
    }

    $stmt->close();
}

// Eliminar usuario
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['accion']) && $_POST['accion'] == 'eliminar') {
    $id = $_POST['id'];

    $stmt = $mysqli->prepare("DELETE FROM usuarios WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "Usuario eliminado exitosamente.";
    } else {
        echo "Error: " . $mysqli->error;
    }

    $stmt->close();
}
?>
