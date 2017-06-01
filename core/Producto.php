<?php

/**
 * Description of Producto
 *
 * @author Nelson
 */
class Producto {
    private $nombre;
    private $descripcion;
    private $precio;
    private $valorPuntos;
    private $puntosOtorga;
    private $cedulaAdministrador;
    
    function __construct($nombre, $descripcion, $precio, $valorPuntos, $puntosOtorga, $cedulaAdministrador) {
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->precio = $precio;
        $this->valorPuntos = $valorPuntos;
        $this->puntosOtorga = $puntosOtorga;
        $this->cedulaAdministrador = $cedulaAdministrador;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getPrecio() {
        return $this->precio;
    }

    function getValorPuntos() {
        return $this->valorPuntos;
    }

    function getPuntosOtorga() {
        return $this->puntosOtorga;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function setPrecio($precio) {
        $this->precio = $precio;
    }

    function setValorPuntos($valorPuntos) {
        $this->valorPuntos = $valorPuntos;
    }

    function setPuntosOtorga($puntosOtorga) {
        $this->puntosOtorga = $puntosOtorga;
    }
    function getCedulaAdministrador() {
        return $this->cedulaAdministrador;
    }

    function setCedulaAdministrador($cedulaAdministrador) {
        $this->cedulaAdministrador = $cedulaAdministrador;
    }
}
