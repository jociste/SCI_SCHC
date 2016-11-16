<?php
class Permiso_visualizacion_tipo_documentoDTO {
    public $idTipoDocumento;
    public $idCargo;

    public function Permiso_visualizacion_tipo_documentoDTO(){
    }

    function getIdTipoDocumento() {
        return $this->idTipoDocumento;
    }

    function setIdTipoDocumento($idTipoDocumento) {
        return $this->idTipoDocumento = $idTipoDocumento;
    }

    function getIdCargo() {
        return $this->idCargo;
    }

    function setIdCargo($idCargo) {
        return $this->idCargo = $idCargo;
    }

}