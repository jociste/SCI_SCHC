<?php

class ComprobanteDTO {

    public $idRegistro;
    public $numeroComprobante;
    public $proveedor;
    public $fechaComprobante;

    public function ComprobanteDTO() {
        
    }

    function getIdRegistro() {
        return $this->idRegistro;
    }

    function setIdRegistro($idRegistro) {
        return $this->idRegistro = $idRegistro;
    }

    function getNumeroComprobante() {
        return $this->numeroComprobante;
    }

    function setNumeroComprobante($numeroComprobante) {
        return $this->numeroComprobante = $numeroComprobante;
    }

    function getProveedor() {
        return $this->proveedor;
    }

    function setProveedor($proveedor) {
        return $this->proveedor = $proveedor;
    }

    function getFechaComprobante() {
        return $this->fechaComprobante;
    }

    function setFechaComprobante($fechaComprobante) {
        return $this->fechaComprobante = $fechaComprobante;
    }

}
