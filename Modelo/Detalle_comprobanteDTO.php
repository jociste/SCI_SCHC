<?php
class Detalle_comprobanteDTO {
    public $idRegistro;
    public $descripcion;
    public $cantidad;
    public $precio;

    public function Detalle_comprobanteDTO(){
    }

    function getIdRegistro() {
        return $this->idRegistro;
    }

    function setIdRegistro($idRegistro) {
        return $this->idRegistro = $idRegistro;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function setDescripcion($descripcion) {
        return $this->descripcion = $descripcion;
    }

    function getCantidad() {
        return $this->cantidad;
    }

    function setCantidad($cantidad) {
        return $this->cantidad = $cantidad;
    }

    function getPrecio() {
        return $this->precio;
    }

    function setPrecio($precio) {
        return $this->precio = $precio;
    }

}