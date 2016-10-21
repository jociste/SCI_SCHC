<?php
class CategoriaDTO {
    public $idCategoria;
    public $nombre;
    public $descripcion;

    public function CategoriaDTO(){
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

    function getDescripcion() {
        return $this->descripcion;
    }

    function setDescripcion($descripcion) {
        return $this->descripcion = $descripcion;
    }

}