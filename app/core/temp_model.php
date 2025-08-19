<?php
/**
 * Clase Model
 * Clase base para los modelos dentro del patrón MVC.
 * Se encarga de gestionar la conexión con la base de datos.
 */
class Model
{

    protected $db;
    protected $pdo;

    public function __construct()
    {
        $this->db = new Database();
        $this->pdo = $this->db->connect();  // Se conecta una sola vez
    }
    /**
     * Ejecuta directamente una consulta SQL.
     *
     * @param string $query Consulta SQL a ejecutar.
     * @return PDOStatement|false Resultado de la consulta.
     */
    protected function query($query)
    {
        return $this->pdo->query($query);
    }

    /**
     * Prepara una consulta SQL para ser ejecutada con parámetros.
     *
     * @param string $query Consulta SQL a preparar.
     * @return PDOStatement Consulta preparada.
     */
    protected function prepare($query)
    {
        return $this->pdo->prepare($query);
    }
}
?>