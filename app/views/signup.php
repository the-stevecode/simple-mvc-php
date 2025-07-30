<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Signup | MVC Template</title>
    <link rel="stylesheet" href="<?= URL ?>/css/signup.css">
    <style>
        /**signup */
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

        .signup-container {
            background: white;
            padding: 2rem;
            border-radius: 1rem;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 350px;
        }

        .signup-container h2 {
            text-align: center;
            margin-bottom: 1rem;
            color: #333;
        }

        .signup-container p {
            text-align: center;
            font-size: 0.9rem;
            color: #666;
            margin-bottom: 1.5rem;
        }

        .signup-container input {
            width: 100%;
            padding: 0.75rem;
            margin-bottom: 1rem;
            border: 1px solid #ccc;
            border-radius: 0.5rem;
        }

        .signup-container button {
            width: 100%;
            padding: 0.75rem;
            background: linear-gradient(to right, #4facfe, #8e44ad);
            border: none;
            border-radius: 0.5rem;
            color: white;
            font-weight: bold;
            cursor: pointer;
        }

        .signup-container button:hover {
            opacity: 0.9;
        }

        .message {
            text-align: center;
            font-size: 0.9rem;
            margin-bottom: 1rem;
            color: red;
        }

        .message.success {
            color: green;
        }

        .signup-container .link {
            display: block;
            text-align: center;
            margin-top: 1rem;
            font-size: 0.85rem;
        }

        .signup-container .link a {
            color: #4facfe;
            text-decoration: none;
        }

        .signup-container .link a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="signup-container">
        <h2>Registro</h2>
        <p>Plantilla PHP MVC — Controlador: AuthController</p>

        <form action="<?= URL ?>/auth/register" method="POST">
            <?php $this->showMessages(); ?>
            <input type="text" name="username" placeholder="Nombre de usuario" required>
            <input type="email" name="email" placeholder="Correo electrónico" required>
            <input type="password" name="password" placeholder="Contraseña" required>

            <button type="submit">Registrarse</button>
        </form>

        <div class="link">
            ¿Ya tienes una cuenta? <a href="<?= URL ?>/auth">Inicia sesión</a>
        </div>
    </div>
</body>

</html>