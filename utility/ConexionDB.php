<?php

require_once 'DataBase.php';

class ConexionDB {

    private $conn;
    private $infoDB;

    public function __construct() {
        $this->infoDB = new \utility\DataBase();
        $this->conn = sqlsrv_connect($this->infoDB->getServerName(), $this->infoDB->getInfoDB());

        if (!$this->conn) {            
            echo "Conexión no se pudo establecer.<br />";
            die(print_r(sqlsrv_errors(), true));
        }
    }

    public function conectar() {
        return $this->conn;
    }

    public function desconcetar() {
        $this->conexion->close();
        $conn = sqlsrv_connect($this->infoDB->getInfoDB(), $this->infoDB->getServerName());

        if ($conn) {
            echo "Conexión establecida.<br />";
        } else {
            echo "Conexión no se pudo establecer.<br />";
            die(print_r(sqlsrv_errors(), true));
        }
        return $this->conn;
    }

}
