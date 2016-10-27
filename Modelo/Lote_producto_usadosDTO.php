<?php

class Lote_producto_usadosDTO {

    public $idLoteProductosUsados;
    public $idLote;
    public $runFuncionaria;
    public $cantidad;
    public $fechaRetiro;
    public $destino;
    public $idProducto;
    public $nombreProducto;
    public $nombres;
    public $apellidos;

    public function Lote_producto_usadosDTO() {
        
    }
    function getIdProducto() {
        return $this->idProducto;
    }

    function getNombreProducto() {
        return $this->nombreProducto;
    }

    function getNombres() {
        return $this->nombres;
    }

    function getApellidos() {
        return $this->apellidos;
    }

    function setIdProducto($idProducto) {
        $this->idProducto = $idProducto;
    }

    function setNombreProducto($nombreProducto) {
        $this->nombreProducto = $nombreProducto;
    }

    function setNombres($nombres) {
        $this->nombres = $nombres;
    }

    function setApellidos($apellidos) {
        $this->apellidos = $apellidos;
    }

    function getIdLoteProductosUsados() {
        return $this->idLoteProductosUsados;
    }

    function setIdLoteProductosUsados($idLoteProductosUsados) {
        $this->idLoteProductosUsados = $idLoteProductosUsados;
    }

    function getIdLote() {
        return $this->idLote;
    }

    function setIdLote($idLote) {
        return $this->idLote = $idLote;
    }

    function getRunFuncionaria() {
        return $this->runFuncionaria;
    }

    function setRunFuncionaria($runFuncionaria) {
        return $this->runFuncionaria = $runFuncionaria;
    }

    function getCantidad() {
        return $this->cantidad;
    }

    function setCantidad($cantidad) {
        return $this->cantidad = $cantidad;
    }

    function getFechaRetiro() {
        return $this->fechaRetiro;
    }

    function setFechaRetiro($fechaRetiro) {
        return $this->fechaRetiro = $fechaRetiro;
    }

    function getDestino() {
        return $this->destino;
    }

    function setDestino($destino) {
        return $this->destino = $destino;
    }

}
