<?php
include 'config_sesion.php';

// Array de productos (podría provenir de una base de datos)
$productos = [
    ['id' => 1, 'nombre' => 'Producto A', 'precio' => 100],
    ['id' => 2, 'nombre' => 'Producto B', 'precio' => 150],
    ['id' => 3, 'nombre' => 'Producto C', 'precio' => 200],
    ['id' => 4, 'nombre' => 'Producto D', 'precio' => 250],
    ['id' => 5, 'nombre' => 'Producto E', 'precio' => 300]
];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de productos</title>
</head>
<body>
    <h1>Productos disponibles</h1>
    <ul>
        <?php foreach ($productos as $producto): ?>
            <li>
                <?php echo htmlspecialchars($producto['nombre']); ?> - 
                $<?php echo htmlspecialchars($producto['precio']); ?>
                <a href="agregar_al_carrito.php?id=<?php echo $producto['id']; ?>">Añadir al carrito</a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>