<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login | MVC Template</title>
    <link rel="stylesheet" href="<?= URL ?>/css/login.css">
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
        }

        body {
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(135deg, #4facfe, #8e44ad);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-container {
            background: white;
            padding: 2rem;
            border-radius: 1rem;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 350px;
        }

        .login-container h2 {
            text-align: center;
            margin-bottom: 1rem;
            color: #333;
        }

        .login-container p {
            text-align: center;
            font-size: 0.9rem;
            color: #666;
            margin-bottom: 1.5rem;
        }

        .login-container input {
            width: 100%;
            padding: 0.75rem;
            margin-bottom: 1rem;
            border: 1px solid #ccc;
            border-radius: 0.5rem;
        }

        .login-container button {
            width: 100%;
            padding: 0.75rem;
            background: linear-gradient(to right, #4facfe, #8e44ad);
            border: none;
            border-radius: 0.5rem;
            color: white;
            font-weight: bold;
            cursor: pointer;
        }

        .login-container button:hover {
            opacity: 0.9;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <h2>Iniciar Sesión</h2>
        <p>Plantilla PHP MVC — Controlador: AuthController</p>
        <form class="login-form" action="<?= URL ?>/auth/login" method="POST">
            <?php $this->showMessages(); ?>
            <input type="text" name="username" placeholder="Usuario" required />
            <input type="password" name="password" placeholder="Contraseña" required />
            <button type="submit">Entrar</button>
        </form>
        <div class="signup-link">
            <a href="<?= URL ?>/auth/signup">¿No tienes cuenta? Regístrate</a>
        </div>
    </div>
</body>

</html>