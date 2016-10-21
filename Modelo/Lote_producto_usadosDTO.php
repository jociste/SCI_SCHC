<?php
class Lote_producto_usadosDTO {
    public $idLote;
    public $runFuncionaria;
    public $cantidad;
    public $fechaRetiro;
    public $destino;

    public function Lote_producto_usadosDTO(){
    }

    function getIdLote() {
        return $this->idLote;
    }

    function setIdLote($idLote) {
        return $this->idLote = $idLote;
    }

    function getRunFuncionaria() {
        return $this->runFuncionaria;
    }

    function setRunFuncionaria($runFuncionaria) {
        return $this->runFuncionaria = $runFuncionaria;
    }

    function getCantidad() {
        return $this->cantidad;
    }

    function setCantidad($cantidad) {
        return $this->cantidad = $cantidad;
    }

    function getFechaRetiro() {
        return $this->fechaRetiro;
    }

    function setFechaRetiro($fechaRetiro) {
        return $this->fechaRetiro = $fechaRetiro;
    }

    function getDestino() {
        return $this->destino;
    }

    function setDestino($destino) {
        return $this->destino = $destino;
    }

}