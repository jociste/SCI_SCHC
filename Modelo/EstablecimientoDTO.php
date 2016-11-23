<?php
class EstablecimientoDTO {
    public $codigoEstablecimiento;
    public $idEntidadAdministradora;
    public $nombreEstablecimiento;
    public $direccionCalleEstablecimiento;
    public $direccionNumeroEstablecimiento;
    public $ciudadEstablecimiento;
    public $regionEstablecimiento;
    public $telefonoEstablecimiento;
    public $emailEstablecimiento;
    
    public $entidadAdministradora;

    public function EstablecimientoDTO(){
    }

    function getCodigoEstablecimiento() {
        return $this->codigoEstablecimiento;
    }

    function setCodigoEstablecimiento($codigoEstablecimiento) {
        return $this->codigoEstablecimiento = $codigoEstablecimiento;
    }

    function getIdEntidadAdministradora() {
        return $this->idEntidadAdministradora;
    }

    function setIdEntidadAdministradora($idEntidadAdministradora) {
        return $this->idEntidadAdministradora = $idEntidadAdministradora;
    }

    function getNombreEstablecimiento() {
        return $this->nombreEstablecimiento;
    }

    function setNombreEstablecimiento($nombreEstablecimiento) {
        return $this->nombreEstablecimiento = $nombreEstablecimiento;
    }

    function getDireccionCalleEstablecimiento() {
        return $this->direccionCalleEstablecimiento;
    }

    function setDireccionCalleEstablecimiento($direccionCalleEstablecimiento) {
        return $this->direccionCalleEstablecimiento = $direccionCalleEstablecimiento;
    }

    function getDireccionNumeroEstablecimiento() {
        return $this->direccionNumeroEstablecimiento;
    }

    function setDireccionNumeroEstablecimiento($direccionNumeroEstablecimiento) {
        return $this->direccionNumeroEstablecimiento = $direccionNumeroEstablecimiento;
    }

    function getCiudadEstablecimiento() {
        return $this->ciudadEstablecimiento;
    }

    function setCiudadEstablecimiento($ciudadEstablecimiento) {
        return $this->ciudadEstablecimiento = $ciudadEstablecimiento;
    }

    function getRegionEstablecimiento() {
        return $this->regionEstablecimiento;
    }

    function setRegionEstablecimiento($regionEstablecimiento) {
        return $this->regionEstablecimiento = $regionEstablecimiento;
    }

    function getTelefonoEstablecimiento() {
        return $this->telefonoEstablecimiento;
    }

    function setTelefonoEstablecimiento($telefonoEstablecimiento) {
        return $this->telefonoEstablecimiento = $telefonoEstablecimiento;
    }

    function getEmailEstablecimiento() {
        return $this->emailEstablecimiento;
    }

    function setEmailEstablecimiento($emailEstablecimiento) {
        return $this->emailEstablecimiento = $emailEstablecimiento;
    }
    
    function getEntidadAdministradora() {
        return $this->entidadAdministradora;
    }

    function setEntidadAdministradora($entidadAdministradora) {
        $this->entidadAdministradora = $entidadAdministradora;
    }

}