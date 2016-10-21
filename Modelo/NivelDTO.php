<?php
class NivelDTO {
    public $idNivel;
    public $descripcion;
    public $nombre;

    public function NivelDTO(){
    }

    function getIdNivel() {
        return $this->idNivel;
    }

    function setIdNivel($idNivel) {
        return $this->idNivel = $idNivel;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function setDescripcion($descripcion) {
        return $this->descripcion = $descripcion;
    }

    function getNombre() {
        return $this->nombre;
    }

    function setNombre($nombre) {
        return $this->nombre = $nombre;
    }

}