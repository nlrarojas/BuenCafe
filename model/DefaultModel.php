<?php

require_once 'utility/ConexionDB.php';

/**
 *
 */
class DefaultModel {

    private $conn;
    private $conexion;

    public function __construct() {
        $this->conexion = new ConexionDB();
        $this->conn = $this->conexion->conectar();
    }

    public function insertarCliente($nuevoCliente) {
        $cedulaCliente = $nuevoCliente->getCedula();
        $nombreCliente = $nuevoCliente->getNombre();
        $apellidosCliente = $nuevoCliente->getApellidos();
        $fechaCliente = $nuevoCliente->getFechaNacimiento();
        $puntajeCliente = 0;
        $premiosCliente = 0;

        $procedimiento = "EXEC sp_insertar_cliente @cedula_ = ?, @nombre_ = ?, @apellidos_ = ?, @fecha_nacimiento_ = ?, @puntaje_acumulado_ = ?, @premios_canjeados_ = ?";
        $parametros = array(
            array(&$cedulaCliente, SQLSRV_PARAM_IN),
            array(&$nombreCliente, SQLSRV_PARAM_IN),
            array(&$apellidosCliente, SQLSRV_PARAM_IN),
            array(&$fechaCliente, SQLSRV_PARAM_IN),
            array(&$puntajeCliente, SQLSRV_PARAM_IN),
            array(&$premiosCliente, SQLSRV_PARAM_IN),
        );

        $query = sqlsrv_prepare($this->conn, $procedimiento, $parametros);

        if ($query === false) {
            echo "Error in executing statement 3.\n";
            die(print_r(sqlsrv_errors(), true));
        }
        $rows = sqlsrv_execute($query);
    }
}
