<?php
require_once __DIR__ . '/../app/core/Env.php';
Env::load(__DIR__ . '/../.env');

// Detectar protocolo (http o https)
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https" : "http";
$serverName = $_SERVER['SERVER_NAME'] ?? 'localhost';
$port = $_SERVER['SERVER_PORT'] ?? 80;
$portPart = ($port != 80 && $port != 443) ? ":$port" : "";

define('URL', "$protocol://$serverName$portPart");

// Definir constantes desde variables de entorno con valores por defecto
define('APP_ENV', $_ENV['APP_ENV'] ?? 'production');
define('APP_DEBUG', filter_var($_ENV['APP_DEBUG'] ?? false, FILTER_VALIDATE_BOOLEAN));
define('APP_TIMEZONE', $_ENV['APP_TIMEZONE'] ?? 'America/La_Paz');

define('DB_HOST', $_ENV['DB_HOST'] ?? 'localhost');
define('DB_PORT', $_ENV['DB_PORT'] ?? '3306');
define('DB_NAME', $_ENV['DB_NAME'] ?? 'dbapi');
define('DB_USER', $_ENV['DB_USER'] ?? 'root');
define('DB_PASS', $_ENV['DB_PASS'] ?? '');
define('DB_CHARSET', $_ENV['DB_CHARSET'] ?? 'utf8mb4');

// Configuración de errores según entorno
if (APP_ENV === 'development' && APP_DEBUG) {
    // Mostrar todos los errores y warnings, incluyendo errores de arranque
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
} else {
    // En producción o si debug está desactivado, ocultar errores
    error_reporting(0);
    ini_set('display_errors', 0);
    ini_set('display_startup_errors', 0);
}

// Configurar log de errores
ini_set("error_log", __DIR__ . "/../logs/php-error.log");
// Zona horaria
date_default_timezone_set(APP_TIMEZONE);