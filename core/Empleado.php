<?php

/**
 * Description of Empleado
 *
 * @author Nelson
 */
class Empleado {
    private $id;
    private $nombre;
    private $apellidos;
    private $fecha;
    
    function __construct($id, $nombre, $apellidos, $fecha) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->fecha = $fecha;
    }

    function getId() {
        return $this->id;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getApellidos() {
        return $this->apellidos;
    }

    function getFecha() {
        return $this->fecha;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setApellidos($apellidos) {
        $this->apellidos = $apellidos;
    }

    function setFecha($fecha) {
        $this->fecha = $fecha;
    }
}
