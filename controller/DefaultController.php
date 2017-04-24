<?php

include_once 'model/DefaultModel.php';
include_once 'core/Cliente.php';

class DefaultController {

    private $model;

    public function __construct() {
        $this->model = new DefaultModel();
    }

    public function invoke() {
        if (isset($_GET['Ventas'])) {
            include "view/Ventas.php";
        } else if (isset($_GET['InsertarClientes'])) {
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
        } else {
            include 'view/indexView.php';
        }
    }
}
