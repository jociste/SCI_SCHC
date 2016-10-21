<?php
class CargoDTO {
    public $idCargo;
    public $nombre;

    public function CargoDTO(){
    }

    function getIdCargo() {
        return $this->idCargo;
    }

    function setIdCargo($idCargo) {
        return $this->idCargo = $idCargo;
    }

    function getNombre() {
        return $this->nombre;
    }

    function setNombre($nombre) {
        return $this->nombre = $nombre;
    }

}