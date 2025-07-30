<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Dashboard</title>
  <style>
    body {
      margin: 0;
      font-family: 'Segoe UI', sans-serif;
      background: linear-gradient(to right, #7f00ff, #e100ff);
      color: white;
    }

    header {
      padding: 1rem 2rem;
      display: flex;
      justify-content: space-between;
      background: rgba(0, 0, 0, 0.2);
    }

    header h1 {
      font-size: 1.8rem;
    }

    header a {
      color: white;
      text-decoration: none;
      font-weight: bold;
    }

    header a:hover {
      text-decoration: underline;
    }

    .dashboard {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
      gap: 2rem;
      padding: 2rem;
    }

    .card {
      background: rgba(255, 255, 255, 0.1);
      border-radius: 1rem;
      padding: 1.5rem;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    }

    .card h3 {
      margin-bottom: 0.5rem;
    }

    .card p {
      font-size: 1.1rem;
    }
  </style>
</head>
<body>
  <header>
    <h1>Dashboard</h1>
    <a href="<?= constant('URL')?>/auth/logout">Cerrar sesión</a>
  </header>

  <section class="dashboard">
    <div class="card">
      <h3>👤 Usuarios</h3>
      <p>124 registrados</p>
    </div>
    <div class="card">
      <h3>📝 Tareas</h3>
      <p>34 pendientes</p>
    </div>
    <div class="card">
      <h3>📩 Mensajes</h3>
      <p>12 nuevos</p>
    </div>
  </section>
</body>
</html>
