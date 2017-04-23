<?php
require_once 'DataBase.php';

class ConexionDB {

    private $conexion;
    private $infoDB;

    public function __construct() {
        $this->infoDB = new \utility\DataBase();
        $conn = sqlsrv_connect($this->infoDB->getInfoDB(), $this->infoDB->getServerName());
        echo "asdasd";
        print("asdasd");
        if ($conn) {
            echo "Conexión establecida.<br />";
        } else {
            echo "Conexión no se pudo establecer.<br />";
            die(print_r(sqlsrv_errors(), true));
        }
    }

    public function conectar() {
        return $this->conexion;
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
        return $this->conexion;
    }
}