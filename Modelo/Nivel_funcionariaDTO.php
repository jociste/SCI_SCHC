<?php

class Nivel_funcionariaDTO {

    public $idNivelFuncionaria;
    public $idNivelTemp;
    public $idNivel;
    public $runFuncionaria;
    public $fechaInicio;
    public $fechaTermino;
    
    public $nombreNivel;

    public function Nivel_funcionariaDTO() {
        
    }

    function getIdNivelFuncionaria() {
        return $this->idNivelFuncionaria;
    }

    function setIdNivelFuncionaria($idNivelFuncionaria) {
        $this->idNivelFuncionaria = $idNivelFuncionaria;
    }

    function getIdNivelTemp() {
        return $this->idNivelTemp;
    }

    function setIdNivelTemp($idNivelTemp) {
        $this->idNivelTemp = $idNivelTemp;
    }

    function getIdNivel() {
        return $this->idNivel;
    }

    function setIdNivel($idNivel) {
        return $this->idNivel = $idNivel;
    }

    function getRunFuncionaria() {
        return $this->runFuncionaria;
    }

    function setRunFuncionaria($runFuncionaria) {
        return $this->runFuncionaria = $runFuncionaria;
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

    function getNombreNivel() {
        return $this->nombreNivel;
    }

    function setNombreNivel($nombreNivel) {
        $this->nombreNivel = $nombreNivel;
    }


}
