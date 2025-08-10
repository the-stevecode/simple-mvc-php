<?php
/**
 * Clase Database
 * Se encarga de establecer la conexión PDO a la base de datos MySQL usando constantes de configuración.
 */
class Database
{
    private $host;
    private $user;
    private $password;
    private $charset;
    private $dbname;

    public function __construct()
    {
        $this->host = constant('DB_HOST');
        $this->user = constant('DB_USER');
        $this->password = constant('DB_PASS');
        $this->dbname = constant('DB_NAME');
        $this->charset = constant('DB_CHARSET');
    }
    /**
     * Establece y devuelve una conexión PDO.
     *
     * @return PDO Objeto PDO ya conectado.
     * @throws Exception Si ocurre un error en la conexión.
     */
    public function connect()
    {
        try {
            $connection = "mysql:host=" . $this->host . ";dbname=" . $this->dbname . ";charset=" . $this->charset;
            $options = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ];

            $pdo = new PDO($connection, $this->user, $this->password, $options);
            return $pdo;
        } catch (PDOException $e) {
            throw new Exception('Error connection: ' . $e->getMessage());
        }
    }
}
?>