<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Acceso | MVC Template</title>
    <link rel="stylesheet" href="<?= URL ?>/css/auth.css">
</head>

<body>
    <div class="tabs-container">
        <input type="radio" name="tab" id="tab-login" checked>
        <input type="radio" name="tab" id="tab-signup">

        <div class="tabs">
            <label for="tab-login">Iniciar Sesión</label>
            <label for="tab-signup">Registrarse</label>
        </div>

        <!-- Login Form -->
        <div class="form-container form-login">
            <h2 class="form-title">Bienvenido</h2>
            <p class="info">Controlador: AuthController</p>
            <?php $this->showMessages(); ?>
            <form action="<?= URL ?>/auth/login" method="POST">
                <input type="text" name="username" placeholder="Usuario" required>
                <input type="password" name="password" placeholder="Contraseña" required>
                <button type="submit">Entrar</button>
            </form>
        </div>

        <!-- Signup Form -->
        <div class="form-container form-signup">
            <h2 class="form-title">Crear cuenta</h2>
            <p class="info">Controlador: AuthController</p>
            <?php $this->showMessages(); ?>
            <form action="<?= URL ?>/auth/signup" method="POST">
                <input type="text" name="username" placeholder="Usuario" required>
                <input type="email" name="email" placeholder="Correo electrónico" required>
                <input type="password" name="password" placeholder="Contraseña" required>
                <input type="password" name="confirm_password" placeholder="Confirmar contraseña" required>
                <button type="submit">Registrarse</button>
            </form>
        </div>
    </div>
    <a href="<?= URL ?>/">Volver al inicio</a>
</body>

</html>