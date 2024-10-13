<?php
include 'config_sesion.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    
    // Array de productos (en producción, sería de una base de datos)
    $productos = [
        1 => ['nombre' => 'Producto A', 'precio' => 100],
        2 => ['nombre' => 'Producto B', 'precio' => 150],
        3 => ['nombre' => 'Producto C', 'precio' => 200],
        4 => ['nombre' => 'Producto D', 'precio' => 250],
        5 => ['nombre' => 'Producto E', 'precio' => 300]
    ];

    if (isset($productos[$id])) {
        // Si el producto existe, lo añadimos al carrito
        if (!isset($_SESSION['carrito'])) {
            $_SESSION['carrito'] = [];
        }

        if (isset($_SESSION['carrito'][$id])) {
            $_SESSION['carrito'][$id]['cantidad']++;
        } else {
            $_SESSION['carrito'][$id] = ['producto' => $productos[$id], 'cantidad' => 1];
        }
    }
}

header('Location: ver_carrito.php');
exit();
