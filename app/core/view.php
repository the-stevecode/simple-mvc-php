<?php
/**
 * Clase View
 * Controlador de vistas dentro del patrón MVC. 
 * Se encarga de renderizar archivos .php ubicados en /app/views.
 */
class View
{
    private array $data = [];

    /**
     * Renderiza una vista.
     * @param string $viewName  Ruta relativa en /app/views (sin .php).
     * @param array  $data      Datos que la vista podrá usar.
     */
    public function render(string $viewName, array $data = []): void
    {
        $path = __DIR__ . '/../views/' . $viewName . '.php';
        if (file_exists($path)) {
            $this->data = $data;
            // Extrae variables para que estén disponibles como $titulo, $usuarios, etc.
            $this->handleMessages();
            require $path;
        } else {
            echo "La vista <strong>$viewName</strong> no se encontró en <code>$path</code>.";
            error_log("Vista no encontrada: $path");
        }
    }

    /** MANEJO DE ERRORES Y EXITOS */
    private function handleMessages()
    {
        if (isset($_GET['error'])) {
            $this->handleError($_GET['error']);
        } elseif (isset($_GET['success'])) {
            $this->handleSuccess($_GET['success']);
        }
    }

    private function handleError(string $hash)
    {
        $errors = new Errors();
        $this->data['error'] = $errors->existsKey($hash) ? $errors->get($hash) : null;
    }

    private function handleSuccess(string $hash)
    {
        $success = new Success();
        $this->data['success'] = $success->existsKey($hash) ? $success->get($hash) : null;
    }

    public function showMessages()
    {
        $this->showError();
        $this->showSuccess();
    }

    public function showError()
    {
        if (!empty($this->data['error'])) {
            echo '<div class="message message-error" id="error-text">' . htmlspecialchars($this->data['error']) . '</div>';
        }
    }

    public function showSuccess()
    {
        if (!empty($this->data['success'])) {
            echo '<div class="message message-success" id="success-text">' . htmlspecialchars($this->data['success']) . '</div>';
        }
    }
}
?>