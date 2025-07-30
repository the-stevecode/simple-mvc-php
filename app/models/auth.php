<?php
class AuthModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function login($username, $password)
    {
        error_log("loginModel::login()");
        try {
            $query = $this->prepare('SELECT * FROM user WHERE username = :username');
            $query->execute(['username' => $username]);

            if ($query->rowCount() == 1) {
                $item = $query->fetch(PDO::FETCH_ASSOC);

                $user = new UserModel();
                $user->from($item);

                error_log('AuthModel::login(): user id =>' . $user->getId());

                if (password_verify($password, $user->getPassword())) {
                    error_log('AuthModel::login(): success');
                    //return $user;
                    //return true;
                    return $user->getId();
                } else {
                    error_log('AuthModel::login(): error');
                    return false;
                }
            }
        } catch (PDOException $e) {
            return false;
        }
    }
}
?>