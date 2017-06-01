<?php

include_once 'model/DefaultModel.php';
include_once 'core/Cliente.php';
include_once 'core/Empleado.php';
include_once 'core/Inventory.php';

class DefaultController {

    private $model;

    public function __construct() {
        $this->model = new DefaultModel();
    }

    public function invoke() {
        if (isset($_GET['Ventas'])) {
            include "view/Ventas.php";
        }
        if (isset($_GET['InsertarClientes'])) {
            if ($_GET['InsertarClientes'] == 'ingresar') {
                $nuevoCliente = new Cliente($_POST["tCedula"], $_POST["tNombre"], $_POST["tApellidos"], $_POST["tFecha"], 0, 0);
                $this->model->insertarCliente($nuevoCliente);
            }
            include 'view/InsertarClientes.php';
        }
        if (isset($_GET['ModificarCliente'])) {
            if($_GET["ModificarCliente"] == "modificar"){
                $cedulaCliente = $_GET["cedula"];
                $clienteModificar = new Cliente($cedulaCliente, $_POST["tNombre"], $_POST["tApellidos"], $_POST["tFecha"], $_POST["tPuntaje"], $_POST["tPremios"]);
                $this->model->modificarCliente($clienteModificar);
            }
            if($_GET["ModificarCliente"] == "buscar"){
                $cedulaCliente = $_POST["tCedula"];
                $resultadoBusqueda = $this->model->buscarCliente($cedulaCliente);
            }
            include 'view/ModificarClientes.php';
        }
        if (isset($_GET['EliminarCliente'])) {
            if($_GET["EliminarCliente"] == "eliminar"){
                $cedulaCliente = $_GET["cedula"];                
                $this->model->eliminarCliente($cedulaCliente);
            }
            if($_GET["EliminarCliente"] == "buscar"){
                $cedulaCliente = $_POST["tCedula"];
                $resultadoBusqueda = $this->model->buscarCliente($cedulaCliente);
            }
            include 'view/EliminarClientes.php';
        }
        
        if (isset($_GET['InsertarProductoFactura'])) {
            if($_GET['InsertarProductoFactura']== "ingresar"){
                $this->model->insertarProductoFactura($_POST["id_factura"], $_POST["nombreProducto"]);
                $resultadoBusqueda = $this->model->obtenerInventario();
                include 'view/Inventario.php';
            }else{
                include 'view/InsertarProductoFactura.php';
            }
        }
        
        if (isset($_GET['Inventario'])) {
             $resultadoBusqueda = $this->model->obtenerInventario();
            include 'view/Inventario.php';
        }
        
        if (isset($_GET['BuscarCliente'])) {
            if($_GET["BuscarCliente"] == "buscar"){
                if(isset($_GET["modificarCliente"])){
                    $cedulaCliente = $_GET["modificarCliente"];
                    $resultadoBusqueda = $this->model->buscarCliente($cedulaCliente);
                    include 'view/ModificarClientes.php';
                }else if(isset($_GET["eliminarCliente"])){
                    $cedulaCliente = $_GET["eliminarCliente"];
                    $resultadoBusqueda = $this->model->buscarCliente($cedulaCliente);
                    include 'view/EliminarClientes.php';
                }else{
                    $cedulaCliente = $_POST["tCedula"];
                    if($cedulaCliente == ""){
                        $resultadoBusqueda = $this->model->buscarTodosLosClientes();                    
                    }else{
                        $resultadoBusqueda = $this->model->buscarCliente($cedulaCliente);
                    }
                    include 'view/BuscarClientes.php';
                }
            }else{
                include 'view/BuscarClientes.php';
            }
        } 
        if(isset($_GET['insertarEmpleado'])){
            if($_GET['insertarEmpleado'] == 'ingresar'){
                $tipoEmpleado = $_POST['tipoEmpleado'];
                $nuevoEmpleado = new Empleado($_POST["tCedula"], $_POST["tNombre"], $_POST["tApellidos"], $_POST["tFecha"]);
                if($tipoEmpleado == "vendedor"){
                    $this->model->insertarEmpleado(1, $nuevoEmpleado);
                }else{
                    $this->model->insertarEmpleado(2, $nuevoEmpleado);
                }
            }
            include 'view/InsertarEmpleado.php';
        }
        if(isset($_GET['BuscarEmpleado'])){
            if($_GET['BuscarEmpleado'] == 'buscar'){
                if(isset($_GET["modificarEmpleado"])){
                    $idEmpleado = $_GET["modificarEmpleado"];                    
                    $resultadoBusqueda = $this->model->buscarEmpleado($idEmpleado);
                    include 'view/ModificarEmpleado.php';
                } else if(isset($_GET["eliminarEmpleado"])){
                    $idEmpleado = $_GET["eliminarEmpleado"];
                    $resultadoBusqueda = $this->model->buscarEmpleado($idEmpleado);
                    include 'view/EliminarEmpleado.php';
                } else{
                    $idEmpleado = $_POST["tCedula"];                    
                    if($idEmpleado == ""){
                        $resultadoBusqueda = $this->model->buscarTodosLosEmpleados();                    
                    }else{                        
                        $resultadoBusqueda = $this->model->buscarEmpleado($idEmpleado);
                    }
                    include 'view/BuscarEmpleado.php';
                }
            }else{
                include 'view/BuscarEmpleado.php';
            }
        }
        if(isset($_GET['EliminarEmpleado'])){
            if($_GET["EliminarEmpleado"] == "eliminar"){
                $idEmpleado= $_GET["id"];                
                $this->model->eliminarEmpleado($idEmpleado);
            }
            if($_GET["EliminarEmpleado"] == "buscar"){
                $idEmpleado = $_POST["tCedula"];
                $resultadoBusqueda = $this->model->buscarEmpleado($idEmpleado);                
                
            }
            include 'view/EliminarEmpleado.php';
        }
        if(isset($_GET['ModificarEmpleado'])){
            if($_GET["ModificarEmpleado"] == "modificar"){
                $idEmpleado = $_GET["id"];
                $empleadoModificar = new Empleado($idEmpleado, $_POST["tNombre"], $_POST["tApellidos"], $_POST["tFecha"]);
                $this->model->modificarEmpleado($empleadoModificar);
            }
            if($_GET["ModificarEmpleado"] == "buscar"){
                $idEmpleado = $_POST["tCedula"];
                $resultadoBusqueda = $this->model->buscarEmpleado($idEmpleado);
            }
            include 'view/ModificarEmpleado.php';
        }
        if(isset($_GET['InsertarProductos'])){
            
        }
        if (isset($_GET['EmpleadoMes'])) {
            if($_GET["EmpleadoMes"] == "empleadomes"){
                $empleadoMes =  $this->model->EmpleadoMes();                   
            }
            include 'view/ObtenerEmpleadoMes.php';
        }
        if(isset($_GET['facturar'])){
            
        } else {
            include 'view/indexView.php';
        }
    }
}
