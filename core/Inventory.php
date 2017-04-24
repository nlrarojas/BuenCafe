<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Inventory
 *
 * @author jumoc
 */

class Inventory {
 
    private $nombreProducto;
    private $cantExistente;
    private $cantVendido;
    private $cantAdquirido;

    
    function __construct($nombreProducto, $cantExistente, $cantVendido, $cantAdquirido) {
        $this->nombreProducto = $nombreProducto;
        $this->cantExistente = $cantExistente;
        $this->cantVendido = $cantVendido;
        $this->cantAdquirido = $cantAdquirido;       
    }

    function getNombreProducto() {
        return $this->nombreProducto;
    }

    function getCantExistente() {
        return $this->cantExistente;
    }

    function getCantVendido() {
        return $this->cantVendido;
    }

    function getCantAdquirido() {
        return $this->cantAdquirido;
    }

    function setNombreProducto($nombreProducto) {
        $this->nombreProducto = $nombreProducto;
    }

    function setCantExistente($cantExistente) {
        $this->cantExistente = $cantExistente;
    }

    function setCantVendido($cantVendido) {
        $this->cantVendido = $cantVendido;
    }

    function setCantAdquirido($cantAdquirido) {
        $this->cantAdquirido = $cantAdquirido;
    }
 
}
