<?php
// /app/controllers/AuthController.php
class AuthController extends Controller
{
    protected Session $session;
    protected UserModel $userModel;

    public function __construct()
    {
        parent::__construct();
        //importa los modelos requeridos
        $this->requireModel(['user']);
        //carga el modelo principal
        $this->loadModel('auth');

        $this->session = new Session();
    }

    public function index()
    {
        $this->view->render('auth');
    }

    public function login()
    {
        if (!$this->existPOST(['username', 'password'])) {
            $this->redirect('auth', ['error' => Errors::ERROR_LOGIN_AUTHENTICATE]);
            exit;
        }
        $username = $this->getPost('username');
        $password = $this->getPost('password');

        // logica de inicio de session
        $id = $this->model->login($username, $password);
        if ($id) {
            $user = new UserModel();
            $user->getById($id);
            $userData = $user->toArray();

            // colocando datos importantes en sesion
            $this->session->set('user', [
                'id' => $userData['id'],
                'username' => $userData['username'],
                'email' => $userData['email']
            ]);
            $this->redirect('dashboard');
            return;
        } else {
            $this->redirect('auth', ['error' => Errors::ERROR_LOGIN_AUTHENTICATE_DATA]);
            return;
        }
    }

    public function signup()
    {
        if (!$this->existPOST(['username', 'email', 'password'])) {
            $this->redirect('auth/signup', ['error' => Errors::ERROR_SIGNUP_INCOMPLETE]);
            return;
        }

        $username = trim($this->getPost('username'));
        $email = trim($this->getPost('email'));
        $password = trim($this->getPost('password'));

        // Validaciones básicas (puedes mejorar con regex, filtros, etc.)
        if (empty($username) || empty($email) || empty($password)) {
            $this->redirect('auth/signup', ['error' => Errors::ERROR_SIGNUP_EMPTY_FIELDS]);
            return;
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->redirect('auth/signup', ['error' => Errors::ERROR_SIGNUP_INVALID_EMAIL]);
            return;
        }

        $user = new UserModel();
        $user->setUsername($username);
        $user->setEmail($email);
        $user->setPassword($password);

        if ($user->save()) {
            $this->redirect('auth', ['success' => Success::SUCCESS_USER_REGISTERED]);
        } else {
            $this->redirect('auth', ['error' => Errors::ERROR_SIGNUP_USER_EXISTS]);
        }
    }
    public function logout()
    {
        $this->session->destroy();
        $this->redirect('auth');
    }
}
?>