<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio | MVC Template</title>
<link rel="stylesheet" href="<?= URL ?>/css/style.css">
</head>

<body>
    <header>
        <h1>MVC</h1>
        <nav>
            <a href="<?= URL ?>/dashboard">Dashboard</a>
            <a href="<?= URL ?>/auth">Iniciar</a>
        </nav>
    </header>

    <main>
        Plantilla PHP MVC — Controlador: HomeController
        <h2>Bienvenido al inicio</h2>
        <p>Estás viendo la página de inicio generada por el controlador <strong>HomeController</strong> y la vista <strong>home/index.php</strong>.</p>

    </main>
    <footer>
        &copy; 2025 - Proyecto MVC en PHP
    </footer>
    <script src="<?= URL ?>/js/app.js"></script>
</body>

</html>