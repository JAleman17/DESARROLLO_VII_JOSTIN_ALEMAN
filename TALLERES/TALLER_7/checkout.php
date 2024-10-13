<?php
include 'config_sesion.php';

// Si el carrito está vacío, redirigir
if (!isset($_SESSION['carrito']) || empty($_SESSION['carrito'])) {
    header('Location: productos.php');
    exit();
}

// Procesar la compra
$carrito = $_SESSION['carrito'];
$total = 0;
foreach ($carrito as $item) {
    $total += $item['producto']['precio'] * $item['cantidad'];
}

// Vaciar el carrito
unset($_SESSION['carrito']);

// Recordar el nombre del usuario (fijo por ejemplo, puedes hacer un formulario previo para pedir nombre)
setcookie('usuario', 'Cliente', time() + 86400, '/', '', false, true); // Cookie para recordar por 24 horas

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Compra finalizada</title>
</head>
<body>
    <h1>¡Gracias por tu compra!</h1>
    <p>Tu compra ha sido procesada. El total es: $<?php echo htmlspecialchars($total); ?></p>

    <?php if (isset($_COOKIE['usuario'])): ?>
        <p>Gracias por comprar de nuevo, <?php echo htmlspecialchars($_COOKIE['usuario']); ?>.</p>
    <?php endif; ?>

    <a href="productos.php">Volver a la tienda</a>
</body>
</html>
