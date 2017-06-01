<?php

/**
 * Description of Inventario
 *
 * @author Nelson
 */
class Inventario {
    private $nombre;
    private $existencia;
    private $aquirida;
    private $vendida;
    private $cedulaAdministrador;
    
    function __construct($nombre, $existencia, $aquirida, $vendida, $cedulaAdministrador) {
        $this->nombre = $nombre;
        $this->existencia = $existencia;
        $this->aquirida = $aquirida;
        $this->vendida = $vendida;
        $this->cedulaAdministrador = $cedulaAdministrador;
    }
    
    function getNombre() {
        return $this->nombre;
    }

    function getExistencia() {
        return $this->existencia;
    }

    function getAquirida() {
        return $this->aquirida;
    }

    function getVendida() {
        return $this->vendida;
    }

    function getCedulaAdministrador() {
        return $this->cedulaAdministrador;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setExistencia($existencia) {
        $this->existencia = $existencia;
    }

    function setAquirida($aquirida) {
        $this->aquirida = $aquirida;
    }

    function setVendida($vendida) {
        $this->vendida = $vendida;
    }

    function setCedulaAdministrador($cedulaAdministrador) {
        $this->cedulaAdministrador = $cedulaAdministrador;
    }


}
