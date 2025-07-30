<?php
//config/config.php
$serverName = $_SERVER['SERVER_NAME'];
define('URL', 'http://'.$serverName);
// Configuración de la base de datos (ejemplo)
define('DB_HOST', 'localhost');
define('DB_NAME', 'dbapi');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_CHARSET', 'utf8mb4');

// Habilitar mostrar errores en desarrollo
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
ini_set("error_log", "../logs/php-error.log");


date_default_timezone_set("America/La_Paz");

