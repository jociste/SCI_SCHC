<?php
class BienDTO {
   //Bien-nivel
    public $idNivelBien;
    public $idNivel;
    public $idBien;
    public $fechaInicio;
    public $fechaTermino;
    //Bien
    public $idCategoria;
    public $nombre;
    public $ubicacion;
    //Comprobante
    public $idRegistro;
    public $numeroComprobante;
    public $proveedor;
    public $fechaComprobante;
    //detalle del comprobante
    public $descripcion;
    public $cantidad;
    public $precio;
    //categoria
    public $nombreCategoria;
    //nivel
    public $nombreNivel;

    public function BienDTO(){
    }
    function getIdNivelBien() {
        return $this->idNivelBien;
    }

    function getIdNivel() {
        return $this->idNivel;
    }

    function getFechaInicio() {
        return $this->fechaInicio;
    }

    function getFechaTermino() {
        return $this->fechaTermino;
    }

    function getIdRegistro() {
        return $this->idRegistro;
    }

    function getNumeroComprobante() {
        return $this->numeroComprobante;
    }

    function getProveedor() {
        return $this->proveedor;
    }

    function getFechaComprobante() {
        return $this->fechaComprobante;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getCantidad() {
        return $this->cantidad;
    }

    function getPrecio() {
        return $this->precio;
    }

    function getNombreCategoria() {
        return $this->nombreCategoria;
    }

    function getNombreNivel() {
        return $this->nombreNivel;
    }

    function setIdNivelBien($idNivelBien) {
        $this->idNivelBien = $idNivelBien;
    }

    function setIdNivel($idNivel) {
        $this->idNivel = $idNivel;
    }

    function setFechaInicio($fechaInicio) {
        $this->fechaInicio = $fechaInicio;
    }

    function setFechaTermino($fechaTermino) {
        $this->fechaTermino = $fechaTermino;
    }

    function setIdRegistro($idRegistro) {
        $this->idRegistro = $idRegistro;
    }

    function setNumeroComprobante($numeroComprobante) {
        $this->numeroComprobante = $numeroComprobante;
    }

    function setProveedor($proveedor) {
        $this->proveedor = $proveedor;
    }

    function setFechaComprobante($fechaComprobante) {
        $this->fechaComprobante = $fechaComprobante;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function setCantidad($cantidad) {
        $this->cantidad = $cantidad;
    }

    function setPrecio($precio) {
        $this->precio = $precio;
    }

    function setNombreCategoria($nombreCategoria) {
        $this->nombreCategoria = $nombreCategoria;
    }

    function setNombreNivel($nombreNivel) {
        $this->nombreNivel = $nombreNivel;
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