<?php

include_once 'Nucleo/ConexionMySQL.php';
include_once '../../Modelo/ProductoDTO.php';

class ProductoDAO {

    private $conexion;

    public function ProductoDAO() {
        $this->conexion = new ConexionMySQL();
    }

    public function delete($idProducto) {
        $this->conexion->conectar();
        $query = "DELETE FROM producto WHERE  idProducto =  " . $idProducto . " ";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

    public function findAll() {
        $this->conexion->conectar();
        $query = "SELECT P.idProducto, P.idCategoria, P.nombre, C.nombre as nombreCategoria FROM producto P JOIN categoria C ON P.idCategoria = C.idCategoria ";
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $productos = array();
        while ($fila = $result->fetch_row()) {
            $producto = new ProductoDTO();
            $producto->setIdProducto($fila[0]);
            $producto->setIdCategoria($fila[1]);
            $producto->setNombre($fila[2]);
            $producto->setCategoria($fila[3]);
            $productos[$i] = $producto;
            $i++;
        }
        $this->conexion->desconectar();
        return $productos;
    }

    public function findAllAuxiliar() {
        $this->conexion->conectar();
        $query = "SELECT P.idProducto, P.idCategoria, P.nombre, C.nombre as nombreCategoria 
FROM producto P JOIN categoria C ON P.idCategoria = C.idCategoria JOIN permiso_visualizacion_categoria AS pvc on pvc.idCategoria = C.idCategoria join cargo as ca on ca.idCargo = pvc.idCargo 
where ca.idCargo = 4";
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $productos = array();
        while ($fila = $result->fetch_row()) {
            $producto = new ProductoDTO();
            $producto->setIdProducto($fila[0]);
            $producto->setIdCategoria($fila[1]);
            $producto->setNombre($fila[2]);
            $producto->setCategoria($fila[3]);
            $productos[$i] = $producto;
            $i++;
        }
        $this->conexion->desconectar();
        return $productos;
    }

    public function findByID($idProducto) {
        $this->conexion->conectar();
        $query = "SELECT * FROM producto WHERE  idProducto =  " . $idProducto . " ";
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

    public function findByIDCategoria($idCategoria) {
        $this->conexion->conectar();
        $query = "SELECT * FROM producto WHERE idCategoria =  " . $idCategoria . " ";
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

    public function findByIiCategoria($idCategoria) {
        $this->conexion->conectar();
        $query = "SELECT * FROM producto WHERE idCategoria =  " . $idCategoria . " ";
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

    public function findLikeAtrr($cadena) {
        $this->conexion->conectar();
        $query = "SELECT * FROM producto WHERE  upper(idProducto) LIKE upper(" . $cadena . ")  OR  upper(idCategoria) LIKE upper(" . $cadena . ")  OR  upper(nombre) LIKE upper('" . $cadena . "') ";
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
        $query = "INSERT INTO producto (idCategoria,nombre)"
                . " VALUES (" . $producto->getIdCategoria() . " , '" . $producto->getNombre() . "' )";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

    public function update($producto) {
        $this->conexion->conectar();
        $query = "UPDATE producto SET "
                . "  idCategoria =  " . $producto->getIdCategoria() . " ,"
                . "  nombre = '" . $producto->getNombre() . "' "
                . " WHERE  idProducto =  " . $producto->getIdProducto() . " ";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

    public function findByNombreAndIdCategoria($nombre, $idCategoria) {
        $this->conexion->conectar();
        $query = "SELECT * FROM producto WHERE idCategoria = " . $idCategoria . " AND upper(nombre) = upper('" . $nombre . "') ";
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

    public function productosEnLotesRegistradosByIdCategoriaAndFechas($idCategoria, $fechaInicio, $fechaTermino) {
        $this->conexion->conectar();
        $query = "SELECT p.idProducto, p.idCategoria, p.nombre FROM lote_producto lp JOIN producto p ON lp.idProducto = p.idProducto WHERE p.idCategoria = " . $idCategoria . " AND lp.fechaIngreso BETWEEN '" . $fechaInicio . "' AND '" . $fechaTermino . "' GROUP BY p.idProducto ORDER BY p.idProducto ";
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $productos = array();
        while ($fila = $result->fetch_row()) {
            $producto = new ProductoDTO();
            $producto->setIdProducto($fila[0]);
            $producto->setIdCategoria($fila[1]);
            $producto->setNombre(utf8_decode($fila[2]));
            $productos[$i] = $producto;
            $i++;
        }
        $this->conexion->desconectar();
        return $productos;
    }

}
