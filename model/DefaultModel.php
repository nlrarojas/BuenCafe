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

    public function insertarProductoFactura($id_factura, $nombre) {
        $procedimiento = "EXEC Actualizar_Inventario @facturaId = ?, @productoNombre = ?";

        $parametros = array(
            array(&$id_factura, SQLSRV_PARAM_IN),
            array(&$nombre, SQLSRV_PARAM_IN),
        );

        $query = sqlsrv_prepare($this->conn, $procedimiento, $parametros);

        if ($query == false) {
            echo "Error in executing statement 3.\n";
            die(print_r(sqlsrv_errors(), true));
        }
        sqlsrv_query($this->conn, $procedimiento, $parametros);
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

        if ($query == false) {
            echo "Error in executing statement 3.\n";
            die(print_r(sqlsrv_errors(), true));
        }
        sqlsrv_execute($query);
    }

    public function buscarCliente($cedulaCliente) {
        $procedimiento = "EXEC sp_obtener_cliente @cedula_cliente_ = ?";
        $parametros = array(
            array(&$cedulaCliente, SQLSRV_PARAM_IN),
        );

        $query = sqlsrv_prepare($this->conn, $procedimiento, $parametros);

        if ($query == false) {
            echo "Error in executing statement 3.\n";
            die(print_r(sqlsrv_errors(), true));
        }
        $rows = sqlsrv_query($this->conn, $procedimiento, $parametros);

        $arr[] = sqlsrv_fetch_array($rows, SQLSRV_FETCH_ASSOC);
        $clienteEncontrado = null;
        if (!empty($arr[0])) {
            foreach ($arr as $cliente) {
                $clienteEncontrado = new Cliente($cliente["cedula"], $cliente["nombre"], $cliente["apellidos"], $cliente["fecha_nacimiento"]->format("Y-m-d"), $cliente["puntaje_acumulado"], $cliente["premios_canjeados"]);
            }
        }
        return $clienteEncontrado;
    }

    public function buscarTodosLosClientes() {
        $procedimiento = "EXEC sp_obtener_clientes";

        $query = sqlsrv_prepare($this->conn, $procedimiento);

        if ($query == false) {
            echo "Error in executing statement 3.\n";
            die(print_r(sqlsrv_errors(), true));
        }
        $rows = sqlsrv_query($this->conn, $procedimiento);

        $clientes = array();
        while ($arr = sqlsrv_fetch_array($rows, SQLSRV_FETCH_ASSOC)) {
            $clienteEncontrado = new Cliente($arr["cedula"], $arr["nombre"], $arr["apellidos"], $arr["fecha_nacimiento"]->format("Y-m-d"), $arr["puntaje_acumulado"], $arr["premios_canjeados"]);
            array_push($clientes, $clienteEncontrado);
        }
        return $clientes;
    }

    public function modificarCliente($cliente) {
        $cedula = $cliente->getCedula();
        $nombre = $cliente->getNombre();
        $apellidos = $cliente->getApellidos();
        $fecha = $cliente->getFechaNacimiento();
        $puntaje = $cliente->getPuntajeAcumulado();
        $premios = $cliente->getPremiosCanjeados();

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
        if ($query == false) {
            echo "Error in executing statement 3.\n";
            die(print_r(sqlsrv_errors(), true));
        }
        sqlsrv_query($this->conn, $procedimiento, $parametros);
    }

    public function eliminarCliente($idCliente) {
        $procedimiento = "EXEC sp_eliminar_cliente @cedula_cliente_ = ?";
        $parametros = array(
            array(&$idCliente, SQLSRV_PARAM_IN)
        );

        $query = sqlsrv_prepare($this->conn, $procedimiento, $parametros);
        if ($query == false) {
            echo "Error in executing statement 3.\n";
            die(print_r(sqlsrv_errors(), true));
        }
        sqlsrv_query($this->conn, $procedimiento, $parametros);
    }

    public function obtenerInventario() {
        $procedimiento = "sp_obtener_todo_inventario";

        $query = sqlsrv_prepare($this->conn, $procedimiento);

        if ($query == false) {
            echo "Error in executing statement 3.\n";
            die(print_r(sqlsrv_errors(), true));
        }
        $rows = sqlsrv_query($this->conn, $procedimiento);

        $inventario = array();
        while ($arr = sqlsrv_fetch_array($rows, SQLSRV_FETCH_ASSOC)) {
            $inventarioEncontrado = new Inventory($arr["producto_nombre"], $arr["cant_existencia"], $arr["cant_vendida"], $arr["cant_adquirida"]);
            array_push($inventario, $inventarioEncontrado);
        }
        return $inventario;
    }

    public function insertarEmpleado($tipoEmpleado, $nuevoEmpleado) {
        $idEmpleado = $nuevoEmpleado->getId();
        $nombreEmpleado = $nuevoEmpleado->getNombre();
        $apellidosEmpleado = $nuevoEmpleado->getApellidos();
        $fechaEmpleado = $nuevoEmpleado->getFecha();
        $funcion = "Caja";

        if ($tipoEmpleado == 1) {
            $procedimiento = "EXEC sp_insertar_vendedor  @id_trabajador_ = ?, @nombre_ = ?, @apellidos_ = ?, @fecha_nacimiento_ = ?, @funcion = ?";
            $parametros = array(
                array(&$idEmpleado, SQLSRV_PARAM_IN),
                array(&$nombreEmpleado, SQLSRV_PARAM_IN),
                array(&$apellidosEmpleado, SQLSRV_PARAM_IN),
                array(&$fechaEmpleado, SQLSRV_PARAM_IN),
                array(&$funcion, SQLSRV_PARAM_IN)
            );
        } else {
            $procedimiento = "EXEC sp_insertar_administrador @id_trabajador_ = ?, @nombre_ = ?, @apellidos_ = ?, @fecha_nacimiento_ = ?";
            $parametros = array(
                array(&$idEmpleado, SQLSRV_PARAM_IN),
                array(&$nombreEmpleado, SQLSRV_PARAM_IN),
                array(&$apellidosEmpleado, SQLSRV_PARAM_IN),
                array(&$fechaEmpleado, SQLSRV_PARAM_IN)
            );
        }


        $query = sqlsrv_prepare($this->conn, $procedimiento, $parametros);

        if ($query == false) {
            echo "Error in executing statement 3.\n";
            die(print_r(sqlsrv_errors(), true));
        }
        sqlsrv_execute($query);
    }

    public function buscarEmpleado($idEmpleado) {
        $procedimiento = "EXEC sp_obtener_administrador @id_trabajador_ = ?";
        $parametros = array(
            array(&$idEmpleado, SQLSRV_PARAM_IN),
        );
        
        $query = sqlsrv_prepare($this->conn, $procedimiento, $parametros);

        if ($query == false) {
            echo "Error in executing statement 3.\n";
            die(print_r(sqlsrv_errors(), true));
        }
        $rows = sqlsrv_query($this->conn, $procedimiento, $parametros);

        $arr[] = sqlsrv_fetch_array($rows, SQLSRV_FETCH_ASSOC);
        $clienteEncontrado = null;
        if (!empty($arr[0])) {                       
            foreach ($arr as $empleado) {
                $clienteEncontrado = new Empleado($empleado["id_trabajador"], $empleado["nombre"], $empleado["apellidos"], $empleado["fecha_nacimiento"]->format("Y-m-d"));
            }            
        }else{
            $procedimiento = "EXEC sp_obtener_vendedor @id_trabajador_ = ?";
            $parametros = array(
                array(&$idEmpleado, SQLSRV_PARAM_IN),
            );
            
            $query = sqlsrv_prepare($this->conn, $procedimiento, $parametros);
            
            if ($query == false) {
                echo "Error in executing statement 3.\n";
                die(print_r(sqlsrv_errors(), true));
            }
            
            $rows = sqlsrv_query($this->conn, $procedimiento, $parametros);
            
            $arr[] = sqlsrv_fetch_array($rows, SQLSRV_FETCH_ASSOC);
            $clienteEncontrado = null;
            if (!empty($arr[1])) {                                       
                $clienteEncontrado = new Empleado($arr[1]["id_trabajador"], $arr[1]["nombre"], $arr[1]["apellidos"], $arr[1]["fecha_nacimiento"]->format("Y-m-d"));                            
            }            
        }                 
        return $clienteEncontrado;
    }

    public function buscarTodosLosEmpleados() {
        $procedimiento = "EXEC sp_obtener_empleados";

        $query = sqlsrv_prepare($this->conn, $procedimiento);

        if ($query == false) {
            echo "Error in executing statement 3.\n";
            die(print_r(sqlsrv_errors(), true));
        }
        $rows = sqlsrv_query($this->conn, $procedimiento);

        $empleados = array();
        while ($arr = sqlsrv_fetch_array($rows, SQLSRV_FETCH_ASSOC)) {
            $empleadoEncontrado = new Empleado($arr["id_trabajador"], $arr["nombre"], $arr["apellidos"], $arr["fecha_nacimiento"]->format("Y-m-d"));
            array_push($empleados, $empleadoEncontrado);
        }
        return $empleados;
    }
    
    public function eliminarEmpleado($idEmpleado) {
        $procedimiento = "EXEC sp_eliminar_administrador @id_trabajador_ = ?";
        $parametros = array(
            array(&$idEmpleado, SQLSRV_PARAM_IN)
        );

        $query = sqlsrv_prepare($this->conn, $procedimiento, $parametros);
        if ($query == false) {
            echo "Error in executing statement 3.\n";
            die(print_r(sqlsrv_errors(), true));
        }
        sqlsrv_query($this->conn, $procedimiento, $parametros);
        
        $procedimiento = "EXEC sp_eliminar_vendedor @id_trabajador_ = ?";
        $parametros = array(
            array(&$idEmpleado, SQLSRV_PARAM_IN)
        );

        $query = sqlsrv_prepare($this->conn, $procedimiento, $parametros);
        if ($query == false) {
            echo "Error in executing statement 3.\n";
            die(print_r(sqlsrv_errors(), true));
        }
        sqlsrv_query($this->conn, $procedimiento, $parametros);
    }
    
    public function modificarEmpleado($empleado) {
        $cedula = $empleado->getId();
        $nombre = $empleado->getNombre();
        $apellidos = $empleado->getApellidos();
        $fecha = $empleado->getFecha();
        
        $procedimiento = "EXEC sp_modificar_administrador @id_trabajador_ = ?, @nombre_ = ?, @apellidos_ = ?, @fecha_nacimiento_ = ?";
        $parametros = array(
            array(&$cedula, SQLSRV_PARAM_IN),
            array(&$nombre, SQLSRV_PARAM_IN),
            array(&$apellidos, SQLSRV_PARAM_IN),
            array(&$fecha, SQLSRV_PARAM_IN)
        );
        $query = sqlsrv_prepare($this->conn, $procedimiento, $parametros);
        if ($query == false) {
            echo "Error in executing statement 3.\n";
            die(print_r(sqlsrv_errors(), true));
        }
        sqlsrv_query($this->conn, $procedimiento, $parametros);
        
        $procedimiento = "EXEC sp_modificar_vendedor @id_trabajador_ = ?, @nombre_ = ?, @apellidos_ = ?, @fecha_nacimiento_ = ?, @funcion = ?";
        $parametros = array(
            array(&$cedula, SQLSRV_PARAM_IN),
            array(&$nombre, SQLSRV_PARAM_IN),
            array(&$apellidos, SQLSRV_PARAM_IN),
            array(&$fecha, SQLSRV_PARAM_IN),
            array("vendedor", SQLSRV_PARAM_IN)
        );
        
        $query = sqlsrv_prepare($this->conn, $procedimiento, $parametros);
        if ($query == false) {
            echo "Error in executing statement 3.\n";
            die(print_r(sqlsrv_errors(), true));
        }
        sqlsrv_query($this->conn, $procedimiento, $parametros);
    }

    public function EmpleadoMes() {
        $procedimiento = "EXEC sp_empleado_del_mes";

        $query = sqlsrv_prepare($this->conn, $procedimiento);

        if ($query === false) {
            echo "Error in executing statement 3.\n";
            die(print_r(sqlsrv_errors(), true));
        }
        $rows = sqlsrv_query($this->conn, $procedimiento);

        $empleado = sqlsrv_fetch_array($rows, SQLSRV_FETCH_ASSOC);

        $empleadoMes = $empleado["nombre"] . $empleado["apellidos"] . $empleado["id_trabajador"];

        return $empleadoMes;
    }

}
