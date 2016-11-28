<?php
class BajaDTO {
    public $idBaja;
    public $idBien;
    public $fechaBaja;
    public $motivo;
    public $nombreCategoria;
    public $nombreBien;
    public $fechaComprobante;
 
    public function BajaDTO(){
    }
    function getNombreCategoria() {
        return $this->nombreCategoria;
    }

    function getNombreBien() {
        return $this->nombreBien;
    }

    function getFechaComprobante() {
        return $this->fechaComprobante;
    }

    function setNombreCategoria($nombreCategoria) {
        $this->nombreCategoria = $nombreCategoria;
    }

    function setNombreBien($nombreBien) {
        $this->nombreBien = $nombreBien;
    }

    function setFechaComprobante($fechaComprobante) {
        $this->fechaComprobante = $fechaComprobante;
    }

        function getIdBaja() {
        return $this->idBaja;
    }

    function setIdBaja($idBaja) {
        return $this->idBaja = $idBaja;
    }

    function getIdBien() {
        return $this->idBien;
    }

    function setIdBien($idBien) {
        return $this->idBien = $idBien;
    }

    function getFechaBaja() {
        return $this->fechaBaja;
    }

    function setFechaBaja($fechaBaja) {
        return $this->fechaBaja = $fechaBaja;
    }

    function getMotivo() {
        return $this->motivo;
    }

    function setMotivo($motivo) {
        return $this->motivo = $motivo;
    }

}