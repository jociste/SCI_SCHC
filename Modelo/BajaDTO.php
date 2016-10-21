<?php
class BajaDTO {
    public $idBaja;
    public $idBien;
    public $fechaBaaja;
    public $motivo;

    public function BajaDTO(){
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

    function getFechaBaaja() {
        return $this->fechaBaaja;
    }

    function setFechaBaaja($fechaBaaja) {
        return $this->fechaBaaja = $fechaBaaja;
    }

    function getMotivo() {
        return $this->motivo;
    }

    function setMotivo($motivo) {
        return $this->motivo = $motivo;
    }

}