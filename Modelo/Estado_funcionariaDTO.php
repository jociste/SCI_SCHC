<?php
class Estado_funcionariaDTO {
    public $idEstado;
    public $descripcionEstado;

    public function Estado_funcionariaDTO(){
    }

    function getIdEstado() {
        return $this->idEstado;
    }

    function setIdEstado($idEstado) {
        return $this->idEstado = $idEstado;
    }

    function getDescripcionEstado() {
        return $this->descripcionEstado;
    }

    function setDescripcionEstado($descripcionEstado) {
        return $this->descripcionEstado = $descripcionEstado;
    }

}