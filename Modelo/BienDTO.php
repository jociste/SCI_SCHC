<?php
class BienDTO {
    public $idBien;
    public $idCategoria;
    public $nombre;
    public $ubicacion;

    public function BienDTO(){
    }

    function getIdBien() {
        return $this->idBien;
    }

    function setIdBien($idBien) {
        return $this->idBien = $idBien;
    }

    function getIdCategoria() {
        return $this->idCategoria;
    }

    function setIdCategoria($idCategoria) {
        return $this->idCategoria = $idCategoria;
    }

    function getNombre() {
        return $this->nombre;
    }

    function setNombre($nombre) {
        return $this->nombre = $nombre;
    }

    function getUbicacion() {
        return $this->ubicacion;
    }

    function setUbicacion($ubicacion) {
        return $this->ubicacion = $ubicacion;
    }

}