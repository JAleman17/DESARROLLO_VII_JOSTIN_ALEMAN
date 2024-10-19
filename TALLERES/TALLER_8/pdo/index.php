<?php
include 'config.php';

echo "<h1>Bienvenido al Sistema de Gestión de Biblioteca</h1>";

echo "<h2>Gestión de Libros</h2>";
echo "<form action='libros.php' method='post'>
    <input type='text' name='titulo' placeholder='Título del libro' required>
    <input type='text' name='autor' placeholder='Autor del libro' required>
    <input type='text' name='isbn' placeholder='ISBN' required>
    <input type='number' name='anio_publicacion' placeholder='Año de publicación' required>
    <input type='number' name='cantidad_disponible' placeholder='Cantidad disponible' required>
    <input type='hidden' name='accion' value='registrar'>
    <button type='submit'>Añadir libro</button>
</form>";

echo "<h2>Gestión de Usuarios</h2>";
echo "<form action='usuarios.php' method='post'>
    <input type='text' name='nombre' placeholder='Nombre del usuario' required>
    <input type='email' name='email' placeholder='Email del usuario' required>
    <input type='password' name='password' placeholder='Contraseña' required>
    <input type='hidden' name='accion' value='registrar'>
    <button type='submit'>Registrar usuario</button>
</form>";

echo "<h2>Gestión de Préstamos</h2>";
echo "<form action='prestamos.php' method='post'>
    <input type='number' name='libro_id' placeholder='ID del libro' required>
    <input type='number' name='usuario_id' placeholder='ID del usuario' required>
    <input type='hidden' name='accion' value='registrar'>
    <button type='submit'>Registrar préstamo</button>
</form>";
?>
