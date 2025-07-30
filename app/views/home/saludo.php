<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Saludo</title>
</head>
<body>
    <h1>Hola, <?= htmlspecialchars($data['nombre'] ?? 'Mundo') ?>!</h1>
    <a href="/">Volver al inicio</a>
</body>
</html>
