<?php

class ErrorController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    /**
     * Muestra la vista de error 404
     */
    public function notFound()
    {
        http_response_code(404);
        $this->view->render('errors/404');
    }

    /**
     * Muestra una vista de error genérico (500)
     */
    public function serverError($message = "Error interno del servidor")
    {
        http_response_code(500);
        $this->view->render('errors/500', ['message' => $message]);
    }
}
