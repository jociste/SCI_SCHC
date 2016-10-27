<?php
class Bien_nivelDTO {
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

    public function Bien_nivelDTO(){
    }
    function getNombreCategoria() {
        return $this->nombreCategoria;
    }

    function getNombreNivel() {
        return $this->nombreNivel;
    }

    function setNombreCategoria($nombreCategoria) {
        $this->nombreCategoria = $nombreCategoria;
    }

    function setNombreNivel($nombreNivel) {
        $this->nombreNivel = $nombreNivel;
    }

        function getIdNivelBien() {
        return $this->idNivelBien;
    }

    function getIdCategoria() {
        return $this->idCategoria;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getUbicacion() {
        return $this->ubicacion;
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

    function setIdNivelBien($idNivelBien) {
        $this->idNivelBien = $idNivelBien;
    }

    function setIdCategoria($idCategoria) {
        $this->idCategoria = $idCategoria;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setUbicacion($ubicacion) {
        $this->ubicacion = $ubicacion;
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

    
    function getIdNivel() {
        return $this->idNivel;
    }

    function setIdNivel($idNivel) {
        return $this->idNivel = $idNivel;
    }

    function getIdBien() {
        return $this->idBien;
    }

    function setIdBien($idBien) {
        return $this->idBien = $idBien;
    }

    function getFechaInicio() {
        return $this->fechaInicio;
    }

    function setFechaInicio($fechaInicio) {
        return $this->fechaInicio = $fechaInicio;
    }

    function getFechaTermino() {
        return $this->fechaTermino;
    }

    function setFechaTermino($fechaTermino) {
        return $this->fechaTermino = $fechaTermino;
    }

}