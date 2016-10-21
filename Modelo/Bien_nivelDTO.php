<?php
class Bien_nivelDTO {
    public $idNivel;
    public $idBien;
    public $fechaInicio;
    public $fechaTermino;

    public function Bien_nivelDTO(){
    }

    function getIdNivel() {
        return $this->idNivel;
    }

    function setIdNivel($idNivel) {
        return $this->idNivel = $idNivel;
    }

    function getIdBien() {
        return $this->idBien;
    }

    function setIdBien($idBien) {
        return $this->idBien = $idBien;
    }

    function getFechaInicio() {
        return $this->fechaInicio;
    }

    function setFechaInicio($fechaInicio) {
        return $this->fechaInicio = $fechaInicio;
    }

    function getFechaTermino() {
        return $this->fechaTermino;
    }

    function setFechaTermino($fechaTermino) {
        return $this->fechaTermino = $fechaTermino;
    }

}