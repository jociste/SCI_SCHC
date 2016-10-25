<?php
class Lote_productoDTO {
    public $idLote;
    public $idProducto;
    public $numeroBoleta;
    public $proveedor;
    public $cantidad;
    public $fechaVencimiento;
    public $fechaIngreso;
    
    public $nombre;

    public function Lote_productoDTO(){
    }

    function getIdLote() {
        return $this->idLote;
    }

    function setIdLote($idLote) {
        return $this->idLote = $idLote;
    }

    function getIdProducto() {
        return $this->idProducto;
    }

    function setIdProducto($idProducto) {
        return $this->idProducto = $idProducto;
    }

    function getNumeroBoleta() {
        return $this->numeroBoleta;
    }

    function setNumeroBoleta($numeroBoleta) {
        return $this->numeroBoleta = $numeroBoleta;
    }

    function getProveedor() {
        return $this->proveedor;
    }

    function setProveedor($proveedor) {
        return $this->proveedor = $proveedor;
    }

    function getCantidad() {
        return $this->cantidad;
    }

    function setCantidad($cantidad) {
        return $this->cantidad = $cantidad;
    }

    function getFechaVencimiento() {
        return $this->fechaVencimiento;
    }

    function setFechaVencimiento($fechaVencimiento) {
        return $this->fechaVencimiento = $fechaVencimiento;
    }

    function getFechaIngreso() {
        return $this->fechaIngreso;
    }

    function setFechaIngreso($fechaIngreso) {
        return $this->fechaIngreso = $fechaIngreso;
    }

    function getNombre() {
        return $this->nombre;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }
}