<?php
class DocumentoDTO {
    public $idDocumento;
    public $runFuncionaria;
    public $idTipoDocumento;
    public $nombre;
    public $descripcion;
    public $fechaRegistro;
    public $rutaDocumento;
    public $tamano;
    public $formato;

    public function DocumentoDTO(){
    }

    function getIdDocumento() {
        return $this->idDocumento;
    }

    function setIdDocumento($idDocumento) {
        return $this->idDocumento = $idDocumento;
    }

    function getRunFuncionaria() {
        return $this->runFuncionaria;
    }

    function setRunFuncionaria($runFuncionaria) {
        return $this->runFuncionaria = $runFuncionaria;
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

    function getFechaRegistro() {
        return $this->fechaRegistro;
    }

    function setFechaRegistro($fechaRegistro) {
        return $this->fechaRegistro = $fechaRegistro;
    }

    function getRutaDocumento() {
        return $this->rutaDocumento;
    }

    function setRutaDocumento($rutaDocumento) {
        return $this->rutaDocumento = $rutaDocumento;
    }

    function getTamano() {
        return $this->tamano;
    }

    function setTamano($tamano) {
        return $this->tamano = $tamano;
    }
    
    function getFormato() {
        return $this->formato;
    }

    function setFormato($formato) {
        $this->formato = $formato;
    }
}