<?php
class ProductoDTO {
    public $idProducto;
    public $idCategoria;
    public $nombre;
    
    public $categoria;

    public function ProductoDTO(){
    }

    function getIdProducto() {
        return $this->idProducto;
    }

    function setIdProducto($idProducto) {
        return $this->idProducto = $idProducto;
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
    
    function getCategoria() {
        return $this->categoria;
    }

    function setCategoria($categoria) {
        $this->categoria = $categoria;
    }
}