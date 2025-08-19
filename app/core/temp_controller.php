<?php
/**
 * Clase Controller
 * Controlador base que maneja la carga de modelos, vistas y la gestión de parámetros HTTP.
 */
class Controller
{
    protected $model;
    protected $view;

    public function __construct()
    {
        $this->view = new View();
    }


    /**
     * Carga un modelo principal y lo instancia.
     *
     * @param string $model Nombre del modelo (sin 'Model' al final).
     * @return void
     */
    protected function loadModel(string $model): void
    {
        // Ruta al modelo (ajusta según tu estructura real)
        $path = __DIR__ . '/../models/' . strtolower($model) . '.php';

        if (file_exists($path)) {
            require_once $path;

            $modelClass = ucfirst($model) . 'Model';
            if (class_exists($modelClass)) {
                $this->model = new $modelClass();
            } else {
                error_log("Clase $modelClass no encontrada dentro de $path");
            }
        } else {
            error_log("Archivo de modelo no encontrado: $path");
        }
    }

    /**
     * Carga modelos adicionales opcionales.
     *
     * @param array $models Lista de nombres de modelos a cargar.
     * @return void
     */
    protected function requireModel(array $models): void
    {
        foreach ($models as $model) {
            $path = __DIR__ . '/../models/' . strtolower($model) . '.php';
            if (file_exists($path)) {
                require_once $path;
            } else {
                error_log("Modelo opcional no encontrado: $path");
            }
        }
    }
    /**
     * Verifica que existan todos los parámetros POST indicados.
     *
     * @param array $params Lista de nombres de parámetros POST.
     * @return bool True si todos existen, false si falta alguno.
     */
    protected function existPOST(array $params): bool
    {
        foreach ($params as $param) {
            if (!isset($_POST[$param])) {
                error_log("Falta parámetro POST: $param");
                return false;
            }
        }
        error_log("Controller::ExistPOST: Existen parámetros");
        return true;
    }

    /**
     * Verifica que existan todos los parámetros GET indicados.
     *
     * @param array $params Lista de nombres de parámetros GET.
     * @return bool True si todos existen, false si falta alguno.
     */
    protected function existGET(array $params): bool
    {
        foreach ($params as $param) {
            if (!isset($_GET[$param])) {
                error_log("Falta parámetro GET: $param");
                return false;
            }
        }
        return true;
    }

    /**
     * Obtiene un parámetro GET seguro, devolviendo un valor por defecto si no existe.
     *
     * @param string $name Nombre del parámetro GET.
     * @param mixed|null $default Valor por defecto si el parámetro no existe.
     * @return mixed Valor del parámetro GET o el valor por defecto.
     */
    protected function getGet(string $name, $default = null)
    {
        return $_GET[$name] ?? $default;
    }

    /**
     * Obtiene un parámetro POST seguro, devolviendo un valor por defecto si no existe.
     *
     * @param string $name Nombre del parámetro POST.
     * @param mixed|null $default Valor por defecto si el parámetro no existe.
     * @return mixed Valor del parámetro POST o el valor por defecto.
     */
    protected function getPost(string $name, $default = null)
    {
        return $_POST[$name] ?? $default;
    }
    /**
     * Redirige a una URL relativa con parámetros opcionales.
     *
     * @param string $url Ruta relativa a la que redirigir.
     * @param array $params Parámetros opcionales para añadir a la URL como query string.
     * @return void
     */
    protected function redirect(string $url, array $params = []): void
    {
        $query = http_build_query($params);
        $baseUrl = rtrim(constant('URL'), '/');
        $path = '/' . ltrim($url, '/');
        $location = $baseUrl . $path;

        if (!empty($query)) {
            $location .= '?' . $query;
        }

        header('Location: ' . $location);
        exit;
    }
}
?>