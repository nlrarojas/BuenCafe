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
//        var_dump($rows);
//        die;
//        $arr[] = sqlsrv_fetch_array($rows, SQLSRV_FETCH_ASSOC);
    }
    
    public function buscarCliente ($cedulaCliente){
        $procedimiento = "EXEC sp_obtener_cliente @cedula_cliente_ = ?";
        $parametros = array(
            array(&$cedulaCliente, SQLSRV_PARAM_IN),
            );

        $query = sqlsrv_prepare($this->conn, $procedimiento, $parametros);
        
        if ($query === false) {
            echo "Error in executing statement 3.\n";
            die(print_r(sqlsrv_errors(), true));
        }
        $rows = sqlsrv_query($this->conn, $procedimiento, $parametros);

        $arr[] = sqlsrv_fetch_array($rows, SQLSRV_FETCH_ASSOC);
        
        foreach ($arr as $cliente){
            $clienteEncontrado = new Cliente($cliente["cedula"], $cliente["nombre"], $cliente["apellidos"], $cliente["fecha_nacimiento"]->format("Y-m-d"), $cliente["puntaje_acumulado"], $cliente["premios_canjeados"]);                        
        }
        return $clienteEncontrado;
    }
    
    public function buscarTodosLosClientes(){
        $procedimiento = "EXEC sp_obtener_clientes";

        $query = sqlsrv_prepare($this->conn, $procedimiento);
        
        if ($query === false) {
            echo "Error in executing statement 3.\n";
            die(print_r(sqlsrv_errors(), true));
        }
        $rows = sqlsrv_query($this->conn, $procedimiento);

        $clientes = array();
        while($arr = sqlsrv_fetch_array($rows, SQLSRV_FETCH_ASSOC)){
            $clienteEncontrado = new Cliente($arr["cedula"], $arr["nombre"], $arr["apellidos"], $arr["fecha_nacimiento"]->format("Y-m-d"), $arr["puntaje_acumulado"], $arr["premios_canjeados"]);                        
            array_push($clientes, $clienteEncontrado);
        }
        return $clientes;
    }
}
