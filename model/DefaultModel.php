<?php
require_once 'utility/ConexionDB.php';

/**
 *
 */
class DefaultModel {

    private $conexion;
    
    public function __construct() {
        $this->conexion = new ConexionDB();
    }
}
