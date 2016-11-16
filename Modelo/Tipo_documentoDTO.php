<?php
class Tipo_documentoDTO {
    public $idTipoDocumento;
    public $nombre;
    public $descripcion;
    public $fechaCreacion;

    public function Tipo_documentoDTO(){
    }

    function getIdTipoDocumento() {
        return $this->idTipoDocumento;
    }

    function setIdTipoDocumento($idTipoDocumento) {
        return $this->idTipoDocumento = $idTipoDocumento;
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

    function getFechaCreacion() {
        return $this->fechaCreacion;
    }

    function setFechaCreacion($fechaCreacion) {
        return $this->fechaCreacion = $fechaCreacion;
    }

}