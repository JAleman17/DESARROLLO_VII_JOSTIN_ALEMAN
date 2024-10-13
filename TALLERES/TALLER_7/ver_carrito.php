<?php
include 'config_sesion.php';

$carrito = isset($_SESSION['carrito']) ? $_SESSION['carrito'] : [];
$total = 0;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Carrito de compras</title>
</head>
<body>
    <h1>Tu carrito</h1>
    <?php if (empty($carrito)): ?>
        <p>El carrito está vacío.</p>
    <?php else: ?>
        <ul>
            <?php foreach ($carrito as $id => $item): ?>
                <li>
                    <?php echo htmlspecialchars($item['producto']['nombre']); ?> 
                    - $<?php echo htmlspecialchars($item['producto']['precio']); ?> 
                    - Cantidad: <?php echo htmlspecialchars($item['cantidad']); ?>
                    <a href="eliminar_del_carrito.php?id=<?php echo $id; ?>">Eliminar</a>
                </li>
                <?php $total += $item['producto']['precio'] * $item['cantidad']; ?>
            <?php endforeach; ?>
        </ul>
        <p>Total: $<?php echo htmlspecialchars($total); ?></p>
        <a href="checkout.php">Finalizar compra</a>
    <?php endif; ?>
</body>
</html>
