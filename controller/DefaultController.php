<?php

include_once 'model/DefaultModel.php';
include_once 'core/Cliente.php';
include_once 'core/Inventory.php';

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
            include 'view/ModificarClientes.php';
        }
        if (isset($_GET['EliminarCliente'])) {
            include 'view/EliminarClientes.php';
        }
        
        if (isset($_GET['InsertarProductoFactura'])) {
            include 'view/InsertarProductoFactura.php';
        }
        
        if (isset($_GET['Inventario'])) {
             $resultadoBusqueda = $this->model->obtenerInventario();
            include 'view/Inventario.php';
        }
        
        if (isset($_GET['BuscarCliente'])) {
            if($_GET["BuscarCliente"] == "buscar"){
                $cedulaCliente = $_POST["tCedula"];
                if($cedulaCliente == ""){
                    $resultadoBusqueda = $this->model->buscarTodosLosClientes();
                }else{
                    $resultadoBusqueda = $this->model->buscarCliente($cedulaCliente);
                }
            }
            include 'view/BuscarClientes.php';
        } else {
            include 'view/indexView.php';
        }
    }
}
