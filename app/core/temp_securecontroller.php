<?php
// /app/core/SecureController.php
class SecureController extends Controller
{
    protected Session $session;
    protected $user;

    public function __construct()
    {
        parent::__construct();

        $this->session = new Session();

        // Middleware sencillo manual para proteger controlador
        if (!$this->session->get('user')) {
            $this->redirect('auth');
            exit;
        }else{            
            $this->user= $this->session->get('user');
        }

        // Cargar usuario de DB para usarlo en todas las vistas/acciones
        //$userModel = new UserModel();
        //$this->user = $userModel->getById($this->session->get('user_id'));
    }
}
?>