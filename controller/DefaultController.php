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
        }else if(isset($_GET['Clientes'])){
            if ($_GET['Clientes'] == 'ingresar') {
                echo $_POST["tFecha"];
                $nuevoCliente = new Cliente($_POST["tCedula"], $_POST["tNombre"], $_POST["tApellidos"], $_POST["tFecha"], 0, 0);
                $this->model->insertarCliente($nuevoCliente);
            }
            include 'view/Clientes.php';
        }else{
            include 'view/indexView.php';
        }
    }
}