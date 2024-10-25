<?php
session_start();

$usuarios_validos = [
    'jostin' => 'clave123',
    'vhadell' => 'secreto123'
];

$mensaje_error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre_usuario = $_POST['nombre_usuario'] ?? '';
    $clave = $_POST['clave'] ?? '';

    if (isset($usuarios_validos[$nombre_usuario]) && $usuarios_validos[$nombre_usuario] === $clave) {
        $_SESSION['usuario_actual'] = $nombre_usuario;
        header('Location: principal.php'); 
        exit();
    } else {
        $mensaje_error = 'Usuario incorrecto.';
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inicio de Sesion</title>
</head>
<body>
    <h2>Iniciar Sesión</h2>
    <form method="POST">
        <label for="nombre_usuario">Nombre de usuario:</label>
        <input type="text" id="nombre_usuario" name="nombre_usuario" required><br>
        
        <label for="clave">Contraseña:</label>
        <input type="password" id="clave" name="clave" required><br>

        <button type="submit">Iniciar Sesión</button>
    </form>

    <?php if ($mensaje_error): ?>
        <p style="color:red;"><?php echo $mensaje_error; ?></p>
    <?php endif; ?>
</body>
</html>
