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

    public function insertarProductoFactura($array){
        
    }


    
    public function insertarCliente($nuevoCliente) {
        $cedulaCliente = $nuevoCliente->getCedula(); $nombreCliente = $nuevoCliente->getNombre();
        $apellidosCliente = $nuevoCliente->getApellidos(); $fechaCliente = $nuevoCliente->getFechaNacimiento();
        $puntajeCliente = 0; $premiosCliente = 0;

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
        sqlsrv_execute($query);
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
        $clienteEncontrado = null;
        if (!empty($arr[0])){
            foreach ($arr as $cliente) {
                $clienteEncontrado = new Cliente($cliente["cedula"], $cliente["nombre"], $cliente["apellidos"], $cliente["fecha_nacimiento"]->format("Y-m-d"), $cliente["puntaje_acumulado"], $cliente["premios_canjeados"]);
            }
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
    
    public function modificarCliente($cliente){
        $cedula = $cliente->getCedula(); $nombre = $cliente->getNombre();
        $apellidos = $cliente->getApellidos(); $fecha = $cliente->getFechaNacimiento();
        $puntaje = $cliente->getPuntajeAcumulado(); $premios = $cliente->getPremiosCanjeados();

        $procedimiento = "EXEC sp_modificar_cliente @cedula_cliente_ = ?, @nombre_cliente_ = ?, @apellidos_cliente_ = ?, @fecha_nacimiento_cliente_ = ?, @puntaje_acumulado_ = ?, @premios_canjeados_ = ?";
        $parametros = array(
            array(&$cedula, SQLSRV_PARAM_IN),
            array(&$nombre, SQLSRV_PARAM_IN),
            array(&$apellidos, SQLSRV_PARAM_IN),
            array(&$fecha, SQLSRV_PARAM_IN),
            array(&$puntaje, SQLSRV_PARAM_IN),
            array(&$premios, SQLSRV_PARAM_IN)
        );
        $query = sqlsrv_prepare($this->conn, $procedimiento, $parametros);        
        if ($query === false) {
            echo "Error in executing statement 3.\n";
            die(print_r(sqlsrv_errors(), true));
        }        
        sqlsrv_query($this->conn, $procedimiento, $parametros);
    }
    
    public function eliminarCliente($idCliente){
        $procedimiento = "EXEC sp_eliminar_cliente @cedula_cliente_ = ?";
        $parametros = array(
            array(&$idCliente, SQLSRV_PARAM_IN)
        );
        
        $query = sqlsrv_prepare($this->conn, $procedimiento, $parametros);        
        if ($query === false) {
            echo "Error in executing statement 3.\n";
            die(print_r(sqlsrv_errors(), true));
        }        
        sqlsrv_query($this->conn, $procedimiento, $parametros);
    }

    public function obtenerInventario(){
        $procedimiento = "sp_obtener_todo_inventario";

        $query = sqlsrv_prepare($this->conn, $procedimiento);
        
        if ($query === false) {
            echo "Error in executing statement 3.\n";
            die(print_r(sqlsrv_errors(), true));
        }
        $rows = sqlsrv_query($this->conn, $procedimiento);

        $inventario = array();
        while($arr = sqlsrv_fetch_array($rows, SQLSRV_FETCH_ASSOC)){
                $inventarioEncontrado = new Inventory($arr["producto_nombre"], $arr["cant_existencia"], $arr["cant_vendida"], $arr["cant_adquirida"]);                        
            array_push($inventario, $inventarioEncontrado);
        }
        return $inventario;
    }
}
