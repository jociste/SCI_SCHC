<?php
class Permiso_visualizacion_categoriaDTO {
    public $idCargo;
    public $idCategoria;

    public function Permiso_visualizacion_categoriaDTO(){
    }

    function getIdCargo() {
        return $this->idCargo;
    }

    function setIdCargo($idCargo) {
        return $this->idCargo = $idCargo;
    }

    function getIdCategoria() {
        return $this->idCategoria;
    }

    function setIdCategoria($idCategoria) {
        return $this->idCategoria = $idCategoria;
    }

}