# 🧩 Mini Framework Simple MVC en PHP

Este proyecto es una plantilla base para construir aplicaciones PHP utilizando el patrón MVC (Modelo-Vista-Controlador), sin dependencias externas. Ideal para aprender, practicar o iniciar proyectos sencillos.

---

## 📁 Estructura del Proyecto

```
/app
  ├── controllers/     → Controladores (lógica)
  ├── models/          → Modelos (datos)
  ├── views/           → Vistas (HTML + PHP)
  ├── core/            → Núcleo del framework (App, Controller, View, etc.)
  ├── helpers/         → Funciones auxiliares
/config                → Configuración (DB, constantes, etc.)
/public                → Raíz del sitio (index.php, CSS, JS, imágenes)
/logs                  → Carpeta sugerida para logs (vacía)
/README.md             → Este archivo
/.env                  → Archivo de configuración de variables de entorno
```

---

## 🚀 Instalación Local

1. Clona o descarga este repositorio.
2. Apunta tu servidor local (Apache/Nginx) al directorio `/public` como raíz (DocumentRoot).
3. Configura tus credenciales en `/config/config.php`.
4. Asegúrate de tener habilitado `mod_rewrite` (si usas Apache).
5. Accede a `http://localhost/` o el dominio que hayas configurado.

---

## ⚙️ Configuración del archivo `.env`

Este proyecto utiliza un archivo `.env` para configurar parámetros esenciales según tu entorno. Modifica estos valores para que coincidan con tu entorno local o producción:

| Variable       | Descripción                                      | Ejemplo                        |
|----------------|-------------------------------------------------|-------------------------------|
| `APP_ENV`      | Define el entorno de la aplicación.             | `development` o `production`  |
| `APP_DEBUG`    | Activa o desactiva la visualización de errores. | `true` para mostrar errores, `false` para ocultarlos |
| `APP_TIMEZONE` | Configura la zona horaria para fechas y horas.  | `America/La_Paz`               |
| `DB_HOST`      | Dirección del servidor de base de datos.         | `localhost` o IP/URL           |
| `DB_NAME`      | Nombre de la base de datos a utilizar.           | `dbapp`                       |
| `DB_USER`      | Usuario con acceso a la base de datos.           | `root`                        |
| `DB_PASS`      | Contraseña del usuario de la base de datos.      | (tu contraseña)                |
| `DB_CHARSET`   | Juego de caracteres para la conexión a la base. | `utf8mb4`                     |

---

### Ejemplo mínimo de `.env` para desarrollo:

```
APP_ENV=development
APP_DEBUG=true
APP_TIMEZONE=America/La_Paz

DB_HOST=localhost
DB_NAME=dbapp
DB_USER=root
DB_PASS=
DB_CHARSET=utf8mb4
```

---

## 🌐 Uso Básico

### Controladores

Los controladores se colocan en `/app/controllers/` y deben terminar con `Controller`.

Ejemplo: `HomeController.php`

```php
class HomeController extends Controller
{
    public function index()
    {
        $this->view->render('home/index');
    }

    public function saludo($nombre = 'Mundo')
    {
        $this->view->render('home/saludo', ['nombre' => $nombre]);
    }
}
```

---

## 📦 Enrutamiento con Parámetros

Este sistema interpreta URLs limpias automáticamente.

### Ejemplo de URL:

```
http://tu-dominio.local/home/saludo/Steve
```

Resultado:

```php
public function saludo($nombre)
{
    echo "Hola, $nombre!";
}
```

### También puedes capturar múltiples parámetros:

```php
public function datos($id, $categoria)
```

o todos juntos:

```php
public function cualquier(...$parametros)
```

---

## 🛠 Redirección Interna

Puedes redirigir dentro del controlador con:

```php
$this->redirect('home/index');
```

Esto enviará al usuario a `http://tu-dominio.local/home/index`.

---

## 💡 ¿Para qué sirve?

- Aprender y practicar PHP orientado a objetos
- Entender cómo funciona MVC sin frameworks grandes
- Crear aplicaciones pequeñas o paneles personalizados

---

## 📌 Recomendaciones

- Usa `.htaccess` para redirigir todas las peticiones a `public/index.php`.
- Añade validaciones y protección CSRF en formularios si lo usas en producción.
- Si planeas escalar el proyecto, considera integrar Composer o usar un framework robusto como Laravel.

---

## 📝 Licencia

Este proyecto es de código abierto y puedes usarlo libremente para proyectos personales o educativos.

---

## ✨ Autor

Desarrollado por thestevecode
