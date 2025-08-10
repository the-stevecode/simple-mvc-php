<?php
/**
 * Clase App
 * Controla la carga dinámica del controlador, método y parámetros desde la URL.
 */
class App
{
    protected $controller;
    protected $controllerDefault = 'HomeController';
    protected $method = 'index';
    protected $params = [];
    /**
     * Constructor de la aplicación.
     * Procesa la URL, carga el controlador y método correspondientes,
     * y ejecuta el método con los parámetros indicados.
     *
     * @return void
     */
    public function __construct()
    {
        $url = $this->parseUrl();

        // 1. Determinar el nombre del controlador
        $controllerName = isset($url[0]) ? ucfirst($url[0]) . 'Controller' : $this->controllerDefault;
        unset($url[0]);

        $controllerFile = '../app/controllers/' . strtolower($controllerName) . '.php';

        // 2. Si el controlador no existe, usamos ErrorController
        if (!file_exists($controllerFile)) {
            $controllerName = 'ErrorController';
            $controllerFile = '../app/controllers/errorcontroller.php';
        }

        require_once $controllerFile;
        $this->controller = new $controllerName;

        // 3. Determinar el método a llamar
        if (isset($url[1]) && method_exists($this->controller, $url[1])) {
            $this->method = $url[1];
            unset($url[1]);
        } elseif (!method_exists($this->controller, $this->method)) {
            // Si ni siquiera el método default existe, pasamos a ErrorController
            $this->controller = new ErrorController();
            $this->method = 'notFound';
        }

        // 4. El resto son parámetros
        $this->params = $url ? array_values($url) : [];

        // 5. Llamamos al controlador con sus parámetros
        call_user_func_array([$this->controller, $this->method], $this->params);
    }
    /**
     * Obtiene y limpia la URL para extraer controlador, método y parámetros.
     *
     * @return array Lista con segmentos de la URL.
     */
    private function parseUrl()
    {
        if (isset($_GET['url'])) {
            return explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
        }

        return []; // importante: devolver arreglo vacío si no hay URL
    }
}
?>