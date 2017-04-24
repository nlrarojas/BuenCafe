<?php

class Cliente {
    private $cedula;
    private $nombre;
    private $apellidos;
    private $fechaNacimiento;
    private $puntajeAcumulado;
    private $premiosCanjeados;
    
    function __construct($cedula, $nombre, $apellidos, $fechaNacimiento, $puntajeAcumulado, $premiosCanjeados) {
        $this->cedula = $cedula;
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->fechaNacimiento = $fechaNacimiento;
        $this->puntajeAcumulado = $puntajeAcumulado;
        $this->premiosCanjeados = $premiosCanjeados;
    }
    
    function getCedula() {
        return $this->cedula;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getApellidos() {
        return $this->apellidos;
    }

    function getFechaNacimiento() {
        return $this->fechaNacimiento;
    }

    function getPuntajeAcumulado() {
        return $this->puntajeAcumulado;
    }

    function getPremiosCanjeados() {
        return $this->premiosCanjeados;
    }

    function setCedula($cedula) {
        $this->cedula = $cedula;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setApellidos($apellidos) {
        $this->apellidos = $apellidos;
    }

    function setFechaNacimiento($fechaNacimiento) {
        $this->fechaNacimiento = $fechaNacimiento;
    }

    function setPuntajeAcumulado($puntajeAcumulado) {
        $this->puntajeAcumulado = $puntajeAcumulado;
    }

    function setPremiosCanjeados($premiosCanjeados) {
        $this->premiosCanjeados = $premiosCanjeados;
    }    
}
