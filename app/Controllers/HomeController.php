<?php
class HomeController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $this->view->render('home/index');
    }

    public function saludo($nombre = 'Anónimo')
    {
        $this->view->render('home/saludo', ['nombre' => $nombre]);
    }
}
