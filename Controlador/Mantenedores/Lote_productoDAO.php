<?php

include_once 'Nucleo/ConexionMySQL.php';
include_once '../../Modelo/Lote_productoDTO.php';

class Lote_productoDAO {

    private $conexion;

    public function Lote_productoDAO() {
        $this->conexion = new ConexionMySQL();
    }

    public function delete($idLote) {
        $this->conexion->conectar();
        $query = "DELETE FROM lote_producto WHERE  idLote =  " . $idLote . " ";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

    public function findAllOrdenadosPorVencimiento() {
        $this->conexion->conectar();
        $query = "SELECT p.idLote, p.idProducto, p.numeroBoleta, p.proveedor, p.cantidad, p.fechaVencimiento, p.fechaIngreso, pp.nombre FROM lote_producto as p join producto as pp on pp.idProducto = p.idProducto ORDER by p.fechaVencimiento";
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $lote_productos = array();
        while ($fila = $result->fetch_row()) {
            $lote_producto = new Lote_productoDTO();
            $lote_producto->setIdLote($fila[0]);
            $lote_producto->setIdProducto($fila[1]);
            $lote_producto->setNumeroBoleta($fila[2]);
            $lote_producto->setProveedor($fila[3]);
            $lote_producto->setCantidad($fila[4]);
            $lote_producto->setFechaVencimiento($fila[5]);
            $lote_producto->setFechaIngreso($fila[6]);
            $lote_producto->setNombre($fila[7]);
            $lote_productos[$i] = $lote_producto;
            $i++;
        }
        $this->conexion->desconectar();
        return $lote_productos;
    }

    public function findAllOrdenadosPorBajoStock() {
        $this->conexion->conectar();
        $query = "SELECT p.idLote, p.idProducto, p.numeroBoleta, p.proveedor, p.cantidad, p.fechaVencimiento, p.fechaIngreso, pp.nombre FROM lote_producto as p join producto as pp on pp.idProducto = p.idProducto  WHERE p.cantidad < 11 ORDER by p.cantidad";
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $lote_productos = array();
        while ($fila = $result->fetch_row()) {
            $lote_producto = new Lote_productoDTO();
            $lote_producto->setIdLote($fila[0]);
            $lote_producto->setIdProducto($fila[1]);
            $lote_producto->setNumeroBoleta($fila[2]);
            $lote_producto->setProveedor($fila[3]);
            $lote_producto->setCantidad($fila[4]);
            $lote_producto->setFechaVencimiento($fila[5]);
            $lote_producto->setFechaIngreso($fila[6]);
            $lote_producto->setNombre($fila[7]);
            $lote_productos[$i] = $lote_producto;
            $i++;
        }
        $this->conexion->desconectar();
        return $lote_productos;
    }

    public function findAll() {
        $this->conexion->conectar();
        $query = "SELECT L.idLote,L.idProducto,L.numeroBoleta,L.proveedor,L.cantidad,L.fechaVencimiento,L.fechaIngreso,P.nombre FROM lote_producto L JOIN producto P ON L.idProducto = P.idProducto ";
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $lote_productos = array();
        while ($fila = $result->fetch_row()) {
            $lote_producto = new Lote_productoDTO();
            $lote_producto->setIdLote($fila[0]);
            $lote_producto->setIdProducto($fila[1]);
            $lote_producto->setNumeroBoleta($fila[2]);
            $lote_producto->setProveedor($fila[3]);
            $lote_producto->setCantidad($fila[4]);
            $lote_producto->setFechaVencimiento($fila[5]);
            $lote_producto->setFechaIngreso($fila[6]);
            $lote_producto->setNombre($fila[7]);
            $lote_productos[$i] = $lote_producto;
            $i++;
        }
        $this->conexion->desconectar();
        return $lote_productos;
    }

    public function findByID($idLote) {
        $this->conexion->conectar();
        $query = "SELECT * FROM lote_producto WHERE  idLote =  " . $idLote . " ";
        $result = $this->conexion->ejecutar($query);
        $lote_producto = new Lote_productoDTO();
        while ($fila = $result->fetch_row()) {
            $lote_producto->setIdLote($fila[0]);
            $lote_producto->setIdProducto($fila[1]);
            $lote_producto->setNumeroBoleta($fila[2]);
            $lote_producto->setProveedor($fila[3]);
            $lote_producto->setCantidad($fila[4]);
            $lote_producto->setFechaVencimiento($fila[5]);
            $lote_producto->setFechaIngreso($fila[6]);
        }
        $this->conexion->desconectar();
        return $lote_producto;
    }

    public function findByIdProducto($idProducto) {
        $this->conexion->conectar();
        $query = "SELECT LP.idLote, LP.idProducto, LP.numeroBoleta, LP.proveedor, LP.cantidad, LP.fechaVencimiento, LP.fechaIngreso, P.nombre FROM lote_producto LP JOIN producto P ON LP.idProducto = P.idProducto  WHERE LP.idProducto = " . $idProducto . " ORDER BY LP.fechaVencimiento LIMIT 0,1;";
        $result = $this->conexion->ejecutar($query);
        $lote_producto = new Lote_productoDTO();
        while ($fila = $result->fetch_row()) {
            $lote_producto->setIdLote($fila[0]);
            $lote_producto->setIdProducto($fila[1]);
            $lote_producto->setNumeroBoleta($fila[2]);
            $lote_producto->setProveedor($fila[3]);
            $lote_producto->setCantidad($fila[4]);
            $lote_producto->setFechaVencimiento($fila[5]);
            $lote_producto->setFechaIngreso($fila[6]);
            $lote_producto->setNombre($fila[7]);
        }
        $this->conexion->desconectar();
        return $lote_producto;
    }

    public function findLikeAtrr($cadena) {
        $this->conexion->conectar();
        $query = "SELECT * FROM lote_producto WHERE  upper(idLote) LIKE upper(" . $cadena . ")  OR  upper(idProducto) LIKE upper(" . $cadena . ")  OR  upper(numeroBoleta) LIKE upper(" . $cadena . ")  OR  upper(proveedor) LIKE upper('" . $cadena . "')  OR  upper(cantidad) LIKE upper(" . $cadena . ")  OR  upper(fechaVencimiento) LIKE upper(" . $cadena . ")  OR  upper(fechaIngreso) LIKE upper(" . $cadena . ") ";
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $lote_productos = array();
        while ($fila = $result->fetch_row()) {
            $lote_producto = new Lote_productoDTO();
            $lote_producto->setIdLote($fila[0]);
            $lote_producto->setIdProducto($fila[1]);
            $lote_producto->setNumeroBoleta($fila[2]);
            $lote_producto->setProveedor($fila[3]);
            $lote_producto->setCantidad($fila[4]);
            $lote_producto->setFechaVencimiento($fila[5]);
            $lote_producto->setFechaIngreso($fila[6]);
            $lote_productos[$i] = $lote_producto;
            $i++;
        }
        $this->conexion->desconectar();
        return $lote_productos;
    }

    public function save($lote_producto) {
        $this->conexion->conectar();
        $query = "INSERT INTO lote_producto (idProducto,numeroBoleta,proveedor,cantidad,fechaVencimiento,fechaIngreso)"
                . " VALUES ( " . $lote_producto->getIdProducto() . " ,  " . $lote_producto->getNumeroBoleta() . " , '" . $lote_producto->getProveedor() . "' ,  " . $lote_producto->getCantidad() . " , '" . $lote_producto->getFechaVencimiento() . "' , '" . $lote_producto->getFechaIngreso() . "' )";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

    public function update($lote_producto) {
        $this->conexion->conectar();
        $query = "UPDATE lote_producto SET "
                . "  idProducto =  " . $lote_producto->getIdProducto() . " ,"
                . "  numeroBoleta =  " . $lote_producto->getNumeroBoleta() . " ,"
                . "  proveedor = '" . $lote_producto->getProveedor() . "' ,"
                . "  cantidad =  " . $lote_producto->getCantidad() . " ,"
                . "  fechaVencimiento = '" . $lote_producto->getFechaVencimiento() . "' ,"
                . "  fechaIngreso = '" . $lote_producto->getFechaIngreso() . "' "
                . " WHERE  idLote =  " . $lote_producto->getIdLote() . " ";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

}
