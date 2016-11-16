<?php
class Datos_generalesDTO {
    public $codigoEstablecimiento;
    public $nombreEstablecimiento;
    public $direccionCalleEstablecimiento;
    public $direccionNumeroEstablecimiento;
    public $ciudadEstablecimiento;
    public $regionEstablecimiento;
    public $telefonoEstablecimiento;
    public $emailEstablecimiento;
    public $nombreEntidadAdministradora;
    public $rutEntidadAdministradora;
    public $provinciaEntidadAdministradora;
    public $regionEntidadAdministradora;
    public $representanteLegal;
    public $telefonoRepresentanteLegal;
    public $emailRepresentanteLegal;

    public function Datos_generalesDTO(){
    }

    function getCodigoEstablecimiento() {
        return $this->codigoEstablecimiento;
    }

    function setCodigoEstablecimiento($codigoEstablecimiento) {
        return $this->codigoEstablecimiento = $codigoEstablecimiento;
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

    function getNombreEntidadAdministradora() {
        return $this->nombreEntidadAdministradora;
    }

    function setNombreEntidadAdministradora($nombreEntidadAdministradora) {
        return $this->nombreEntidadAdministradora = $nombreEntidadAdministradora;
    }

    function getRutEntidadAdministradora() {
        return $this->rutEntidadAdministradora;
    }

    function setRutEntidadAdministradora($rutEntidadAdministradora) {
        return $this->rutEntidadAdministradora = $rutEntidadAdministradora;
    }

    function getProvinciaEntidadAdministradora() {
        return $this->provinciaEntidadAdministradora;
    }

    function setProvinciaEntidadAdministradora($provinciaEntidadAdministradora) {
        return $this->provinciaEntidadAdministradora = $provinciaEntidadAdministradora;
    }

    function getRegionEntidadAdministradora() {
        return $this->regionEntidadAdministradora;
    }

    function setRegionEntidadAdministradora($regionEntidadAdministradora) {
        return $this->regionEntidadAdministradora = $regionEntidadAdministradora;
    }

    function getRepresentanteLegal() {
        return $this->representanteLegal;
    }

    function setRepresentanteLegal($representanteLegal) {
        return $this->representanteLegal = $representanteLegal;
    }

    function getTelefonoRepresentanteLegal() {
        return $this->telefonoRepresentanteLegal;
    }

    function setTelefonoRepresentanteLegal($telefonoRepresentanteLegal) {
        return $this->telefonoRepresentanteLegal = $telefonoRepresentanteLegal;
    }

    function getEmailRepresentanteLegal() {
        return $this->emailRepresentanteLegal;
    }

    function setEmailRepresentanteLegal($emailRepresentanteLegal) {
        return $this->emailRepresentanteLegal = $emailRepresentanteLegal;
    }

}