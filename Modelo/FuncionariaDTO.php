<?php

class FuncionariaDTO {  
    //Funcionaria
    public $runFuncionaria;
    public $idEstado;
    public $nombres;
    public $apellidos;
    public $fechaNacimiento;
    public $telefono;
    public $direccion;
    public $profesion;
    public $clave;
    public $sexo;
    //Funcionaria-Cargo 
    public $idCargoFuncionaria;
    public $idCargo;
    public $fechaInicio;
    public $fechaTermino;
    //cargo
    public $nombreCargo;
    //Nivel-funcionaria;
    public $idNivelFuncionaria;
    public $idNivel;    
    public $fechaInicioNivel;
    public $fechaTerminoNivel;
    //nivel
    public $nombreNivel;
    
    public function FuncionariaDTO() {
        
    }
    function getIdCargoFuncionaria() {
        return $this->idCargoFuncionaria;
    }
    function getIdEstado() {
        return $this->idEstado;
    }

    function setIdEstado($idEstado) {
        $this->idEstado = $idEstado;
    }

    
    function getIdNivelFuncionaria() {
        return $this->idNivelFuncionaria;
    }

    function setIdCargoFuncionaria($idCargoFuncionaria) {
        $this->idCargoFuncionaria = $idCargoFuncionaria;
    }

    function setIdNivelFuncionaria($idNivelFuncionaria) {
        $this->idNivelFuncionaria = $idNivelFuncionaria;
    }

    function getRunFuncionaria() {
        return $this->runFuncionaria;
    }

    function getNombres() {
        return $this->nombres;
    }

    function getApellidos() {
        return $this->apellidos;
    }

    function getFechaNacimiento() {
        return $this->fechaNacimiento;
    }

    function getTelefono() {
        return $this->telefono;
    }

    function getDireccion() {
        return $this->direccion;
    }

    function getProfesion() {
        return $this->profesion;
    }

    function getClave() {
        return $this->clave;
    }

    function getIdCargo() {
        return $this->idCargo;
    }

    function getFechaInicio() {
        return $this->fechaInicio;
    }

    function getFechaTermino() {
        return $this->fechaTermino;
    }

    function getSexo() {
        return $this->sexo;
    }

    function getNombreCargo() {
        return $this->nombreCargo;
    }
    function getIdNivel() {
        return $this->idNivel;
    }

    function getFechaInicioNivel() {
        return $this->fechaInicioNivel;
    }

    function getFechaTerminoNivel() {
        return $this->fechaTerminoNivel;
    }

    function getNombreNivel() {
        return $this->$nombreNivel;
    }

    function setIdNivel($idNivel) {
        $this->idNivel = $idNivel;
    }

    function setFechaInicioNivel($fechaInicioNivel) {
        $this->fechaInicioNivel = $fechaInicioNivel;
    }

    function setFechaTerminoNivel($fechaTerminoNivel) {
        $this->fechaTerminoNivel = $fechaTerminoNivel;
    }

    function setNombreNivel($nombreNivel) {
        $this->nombreNivel = $nombreNivel;
    }

    
    function setNombreCargo($nombreCargo) {
        $this->nombreCargo = $nombreCargo;
    }

    function setSexo($sexo) {
        $this->sexo = $sexo;
    }

    function setRunFuncionaria($runFuncionaria) {
        $this->runFuncionaria = $runFuncionaria;
    }

    function setNombres($nombres) {
        $this->nombres = $nombres;
    }

    function setApellidos($apellidos) {
        $this->apellidos = $apellidos;
    }

    function setFechaNacimiento($fechaNacimiento) {
        $this->fechaNacimiento = $fechaNacimiento;
    }

    function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    function setProfesion($profesion) {
        $this->profesion = $profesion;
    }

    function setClave($clave) {
        $this->clave = $clave;
    }

    function setIdCargo($idCargo) {
        $this->idCargo = $idCargo;
    }

    function setFechaInicio($fechaInicio) {
        $this->fechaInicio = $fechaInicio;
    }

    function setFechaTermino($fechaTermino) {
        $this->fechaTermino = $fechaTermino;
    }

}
