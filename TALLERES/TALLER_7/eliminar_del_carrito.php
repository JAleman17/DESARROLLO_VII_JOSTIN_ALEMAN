<?php
include 'config_sesion.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    if (isset($_SESSION['carrito'][$id])) {
        unset($_SESSION['carrito'][$id]);
    }
}

header('Location: ver_carrito.php');
exit();
