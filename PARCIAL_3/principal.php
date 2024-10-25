<?php
session_start();

if (!isset($_SESSION['usuario_actual'])) {
    header('Location: inicio_sesion.php');
    exit();
}

$usuario_actual = $_SESSION['usuario_actual'];

if (!isset($_SESSION['lista_tareas'])) {
    $_SESSION['lista_tareas'] = [];
}

$mensaje = '';
$error_validacion = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo_tarea = $_POST['titulo_tarea'] ?? '';
    $fecha_limite = $_POST['fecha_limite'] ?? '';

    if (empty($titulo_tarea) || empty($fecha_limite)) {
        $error_validacion = 'Complete todos los campos.';
    } elseif (strtotime($fecha_limite) <= time()) {
        $error_validacion = 'La fecha debe ser futura.';
    } else {
        $_SESSION['lista_tareas'][] = ['titulo' => $titulo_tarea, 'fecha' => $fecha_limite];
        $mensaje = 'La tarea ha sido agregada.';
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Página Principal</title>
</head>
<body>
    <h2>Bienvenido, <?php echo htmlspecialchars($usuario_actual); ?></h2>

    
    <form method="POST">
        <label for="titulo_tarea">Titulo de la tarea:</label>
        <input type="text" id="titulo_tarea" name="titulo_tarea" required><br>
        
        <label for="fecha_limite">Fecha limite:</label>
        <input type="date" id="fecha_limite" name="fecha_limite" required><br>

        <button type="submit">Añadir Tarea</button>
    </form>

    <?php if ($mensaje): ?>
        <p style="color:green;"><?php echo $mensaje; ?></p>
    <?php elseif ($error_validacion): ?>
        <p style="color:red;"><?php echo $error_validacion; ?></p>
    <?php endif; ?>

    
    <h3>Mis Tareas</h3>
    <ul>
        <?php foreach ($_SESSION['lista_tareas'] as $tarea): ?>
            <li><?php echo htmlspecialchars($tarea['titulo']); ?> - Fecha limite: <?php echo htmlspecialchars($tarea['fecha']); ?></li>
        <?php endforeach; ?>
    </ul>

    <a href="cerrar_sesion.php">Cerrar Sesion</a>
</body>
</html>
