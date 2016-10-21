<?php
include_once 'Nucleo/ConexionMySQL.php';
include_once '../../Modelo/ProductoDTO.php';

class ProductoDAO{
    private $conexion;

    public function ProductoDAO() {
        $this->conexion = new ConexionMySQL();
    }

    public function delete($idProducto) {
        $this->conexion->conectar();
        $query = "DELETE FROM producto WHERE  idProducto =  ".$idProducto." ";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

    public function findAll() {
        $this->conexion->conectar();
        $query = "SELECT * FROM producto";
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $productos = array();
        while ($fila = $result->fetch_row()) {
            $producto = new ProductoDTO();
            $producto->setIdProducto($fila[0]);
            $producto->setIdCategoria($fila[1]);
            $producto->setNombre($fila[2]);
            $productos[$i] = $producto;
            $i++;
        }
        $this->conexion->desconectar();
        return $productos;
    }

    public function findByID($idProducto) {
        $this->conexion->conectar();
        $query = "SELECT * FROM producto WHERE  idProducto =  ".$idProducto." ";
        $result = $this->conexion->ejecutar($query);
        $producto = new ProductoDTO();
        while ($fila = $result->fetch_row()) {
            $producto->setIdProducto($fila[0]);
            $producto->setIdCategoria($fila[1]);
            $producto->setNombre($fila[2]);
        }
        $this->conexion->desconectar();
        return $producto;
    }

    public function findLikeAtrr($cadena) {
        $this->conexion->conectar();
        $query = "SELECT * FROM producto WHERE  upper(idProducto) LIKE upper(".$cadena.")  OR  upper(idCategoria) LIKE upper(".$cadena.")  OR  upper(nombre) LIKE upper('".$cadena."') ";
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $productos = array();
        while ($fila = $result->fetch_row()) {
            $producto = new ProductoDTO();
            $producto->setIdProducto($fila[0]);
            $producto->setIdCategoria($fila[1]);
            $producto->setNombre($fila[2]);
            $productos[$i] = $producto;
            $i++;
        }
        $this->conexion->desconectar();
        return $productos;
    }

    public function save($producto) {
        $this->conexion->conectar();
        $query = "INSERT INTO producto (idProducto,idCategoria,nombre)"
                . " VALUES ( ".$producto->getIdProducto()." ,  ".$producto->getIdCategoria()." , '".$producto->getNombre()."' )";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

    public function update($producto) {
        $this->conexion->conectar();
        $query = "UPDATE producto SET "
                . "  idCategoria =  ".$producto->getIdCategoria()." ,"
                . "  nombre = '".$producto->getNombre()."' "
                . " WHERE  idProducto =  ".$producto->getIdProducto()." ";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }
}