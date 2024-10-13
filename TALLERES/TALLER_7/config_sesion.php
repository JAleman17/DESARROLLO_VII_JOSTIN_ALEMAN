<?php
// Iniciar la sesión
session_start();

// Configuración de seguridad para las sesiones
ini_set('session.cookie_httponly', 1); // Previene acceso a las cookies mediante JavaScript
ini_set('session.use_only_cookies', 1); // Solo permite usar cookies para almacenar sesiones
ini_set('session.cookie_secure', 1); // Solo permite enviar cookies por HTTPS (usar solo en sitios HTTPS)

// Configurar el tiempo de expiración de la cookie de sesión
session_set_cookie_params([
    'lifetime' => 3600, // 1 hora
    'path' => '/',
    'domain' => '', 
    'secure' => false, // Cambiar a true en producción si se usa HTTPS
    'httponly' => true, 
    'samesite' => 'Strict' // Protege contra CSRF
]);
?>