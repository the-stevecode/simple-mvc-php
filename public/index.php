<?php
// 1. Configuración global
require_once __DIR__ . '/../config/config.php';
// 2. Autocarga
spl_autoload_register(function ($class) {
    $paths = [
        '../app/core/',
        '../app/controllers/',
        '../app/models/',
        '../app/helpers/',
    ];
    foreach ($paths as $path) {
        $file = $path . $class . '.php';
        if (file_exists($file)) {
            require_once $file;
            return;
        }
    }
});
// 3. Inicialización de la aplicación
$app = new App();