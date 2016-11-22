<?php
class Entidad_administradoraDTO {
    public $idEntidadAdministradora;
    public $nombreEntidadAdministradora;
    public $rutEntidadAdministradora;
    public $provinciaEntidadAdministradora;
    public $regionEntidadAdministradora;
    public $representanteLegal;
    public $telefonoRepresentanteLegal;
    public $emailRepresentanteLegal;

    public function Entidad_administradoraDTO(){
    }

    function getIdEntidadAdministradora() {
        return $this->idEntidadAdministradora;
    }

    function setIdEntidadAdministradora($idEntidadAdministradora) {
        return $this->idEntidadAdministradora = $idEntidadAdministradora;
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