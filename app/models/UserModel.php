<?php
class UserModel extends Model
{
    private $id;
    private $firstName;
    private $lastName;
    private $email;
    private $userName;
    private $password;
    private $registrationDate;
    private $isActive;

    public function __construct()
    {
        parent::__construct();
        $this->firstName = '';
        $this->lastName = '';
        $this->email = '';
        $this->userName = '';
        $this->password = '';
        $this->registrationDate = '';  // Fecha actual
        $this->isActive = '';                            // Activar la cuenta por defecto
    }

    public function getAll()
    {
        // Implementa la lógica para obtener todos los registros aquí
        // Implementa la lógica para obtener todos los usuarios desde la base de datos
        // Retorna una lista de objetos UserModel
        return true;
    }

    public function getById($id)
    {
        try {
            $query = $this->prepare('SELECT * FROM user WHERE id = :id');
            $query->execute(['id' => $id]);
            if ($query->rowCount() > 0) {
                $this->from($query->fetch(PDO::FETCH_ASSOC));
                return $this;
            } else {
                return false;
            }
        } catch (PDOException $e) {

            return false;
        }
    }

    public function save()
    {
        try {
            $query = $this->prepare('INSERT INTO user (email, username, password) VALUES (:email, :username , :password)');
            $query->execute([
                'email' => $this->email,
                'username' => $this->userName,
                'password' => $this->password
            ]);
            if ($query->rowCount() > 0) {
                return true;
            } else {
                // La inserción no afectó a ninguna fila
                return false;
            }
        } catch (PDOException $e) {

            return false;
        }
    }

    public function update()
    {
        // Implementa la lógica para actualizar un usuario en la base de datos
        // $id es el ID del usuario a actualizar
        // $data es un arreglo con los datos actualizados del usuario
        // Retorna true si la actualización fue exitosa o false en caso de error
        return true;
    }

    public function delete($id)
    {
        // Implementa la lógica para eliminar un usuario de la base de datos por su ID
        // Retorna true si la eliminación fue exitosa o false en caso de error

        return true;
    }

    public function from($array)
    {
        $this->id = $array['id'];
        $this->firstName = $array['first_name'];
        $this->lastName = $array['last_name'];
        $this->email = $array['email'];
        $this->userName = $array['username'];
        $this->password = $array['password'];
        $this->registrationDate = $array['registration_date'];
        $this->isActive = $array['active'];
    }
    public function toArray()
    {
        $array = [];
        $array['id'] = $this->id;
        $array['first_name'] = $this->firstName;
        $array['last_name'] = $this->lastName;
        $array['email'] = $this->email;
        $array['username'] = $this->userName;
        $array['password'] = $this->password;
        $array['registration_date'] = $this->registrationDate;
        $array['active']=$this->isActive;
        return $array;
    }
    // Métodos para acceder y establecer propiedades

    public function getId()
    {
        return $this->id;
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }
    public function getUsername()
    {
        return $this->userName;
    }
    public function setUsername($username)
    {
        $this->userName = $username;
    }
    public function getPassword()
    {
        return $this->password;
    }
    private function getHashedPassword($password)
    {
        return password_hash($password, PASSWORD_DEFAULT, ['cost' => 10]);
    }
    //FIXME: validar si se requiere el parametro de hash
    public function setPassword($password, $hash = true)
    {
        if ($hash) {
            $this->password = $this->getHashedPassword($password);
        } else {
            $this->password = $password;
        }
    }

    public function getRegistrationDate()
    {
        return $this->registrationDate;
    }

    public function setRegistrationDate($registrationDate)
    {
        $this->registrationDate = $registrationDate;
    }

    public function isActive()
    {
        return $this->isActive;
    }

    public function setActive($isActive)
    {
        $this->isActive = $isActive;
    }
}
?>