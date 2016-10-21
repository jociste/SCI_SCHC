<?php
class ComprobanteDTO {
    public $idRegistro;
    public $idBien;
    public $numeroComprobante;
    public $proveedor;
    public $fechaComprobante;

    public function ComprobanteDTO(){
    }

    function getIdRegistro() {
        return $this->idRegistro;
    }

    function setIdRegistro($idRegistro) {
        return $this->idRegistro = $idRegistro;
    }

    function getIdBien() {
        return $this->idBien;
    }

    function setIdBien($idBien) {
        return $this->idBien = $idBien;
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