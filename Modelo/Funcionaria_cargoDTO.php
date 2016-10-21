<?php
class Funcionaria_cargoDTO {
    public $idCargoFuncionaria ;
    public $idCargo;
    public $idCargoTmp;
    public $runFuncionaria;
    public $fechaInicio;
    public $fechaTermino;  
    public $nombreCargo;

    public function Funcionaria_cargoDTO(){
    }
    
    function getIdCargoFuncionaria() {
        return $this->idCargoFuncionaria;
    }

    function setIdCargoFuncionaria($idCargoFuncionaria) {
        $this->idCargoFuncionaria = $idCargoFuncionaria;
    }

        
    function getIdCargoTmp() {
        return $this->idCargoTmp;
    }

    function setIdCargoTmp($idCargoTmp) {
        $this->idCargoTmp = $idCargoTmp;
    }

        function getIdCargo() {
        return $this->idCargo;
    }

    function setIdCargo($idCargo) {
        return $this->idCargo = $idCargo;
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

    function getNombreCargo() {
        return $this->nombreCargo;
    }

    function setNombreCargo($nombreCargo) {
        $this->nombreCargo = $nombreCargo;
    }

}