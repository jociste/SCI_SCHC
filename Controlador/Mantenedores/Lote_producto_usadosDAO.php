<?php

include_once 'Nucleo/ConexionMySQL.php';
include_once '../../Modelo/Lote_producto_usadosDTO.php';

class Lote_producto_usadosDAO {

    private $conexion;

    public function Lote_producto_usadosDAO() {
        $this->conexion = new ConexionMySQL();
    }

    public function delete($idLoteProductosUsados) {
        $this->conexion->conectar();
        $query = "DELETE FROM lote_producto_usados WHERE  idLoteProductosUsados =  " . $idLoteProductosUsados . " ";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

    public function findAll() {
        $this->conexion->conectar();
        $query = "SELECT * FROM lote_producto_usados";
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $lote_producto_usadoss = array();
        while ($fila = $result->fetch_row()) {
            $lote_producto_usados = new Lote_producto_usadosDTO();
            $lote_producto_usados->setIdLoteProductosUsados($fila[0]);
            $lote_producto_usados->setIdLote($fila[1]);
            $lote_producto_usados->setRunFuncionaria($fila[2]);
            $lote_producto_usados->setCantidad($fila[3]);
            $lote_producto_usados->setFechaRetiro($fila[4]);
            $lote_producto_usados->setDestino($fila[5]);
            $lote_producto_usadoss[$i] = $lote_producto_usados;
            $i++;
        }
        $this->conexion->desconectar();
        return $lote_producto_usadoss;
    }

    public function buscarProductosUsados() {
        $this->conexion->conectar();
        $query = "select lpu.idLoteProductosUsados, lpu.idLote, lp.idProducto, p.nombre, lpu.runFuncionaria, f.nombres, f.apellidos, lpu.cantidad, lpu.fechaRetiro, lpu.destino from lote_producto_usados as lpu 
        join funcionaria as f on lpu.runFuncionaria = f.runFuncionaria join lote_producto as lp on lp.idLote = lpu.idLote
        JOIN producto as p on p.idProducto = lp.idProducto";
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $productosUsados = array();
        while ($fila = $result->fetch_row()) {
            $productos = new Lote_producto_usadosDTO();
            $productos->setIdLoteProductosUsados($fila[0]);
            $productos->setIdLote($fila[1]);
            $productos->setIdProducto($fila[2]);
            $productos->setNombreProducto($fila[3]);
            $productos->setRunFuncionaria($fila[4]);
            $productos->setNombres($fila[5]);
            $productos->setApellidos($fila[6]);
            $productos->setCantidad($fila[7]);
            $productos->setFechaRetiro($fila[8]);
            $productos->setDestino($fila[9]);
            $productosUsados[$i] = $productos;
            $i++;
        }
        $this->conexion->desconectar();
        return $productosUsados;
    }

    public function findByID($idLoteProductosUsados) {
        $this->conexion->conectar();
        $query = "SELECT * FROM lote_producto_usados WHERE  idLoteProductosUsados =  " . $idLoteProductosUsados . " ";
        $result = $this->conexion->ejecutar($query);
        $lote_producto_usados = new Lote_producto_usadosDTO();
        while ($fila = $result->fetch_row()) {
            $lote_producto_usados->setIdLoteProductosUsados($fila[0]);
            $lote_producto_usados->setIdLote($fila[1]);
            $lote_producto_usados->setRunFuncionaria($fila[2]);
            $lote_producto_usados->setCantidad($fila[3]);
            $lote_producto_usados->setFechaRetiro($fila[4]);
            $lote_producto_usados->setDestino($fila[5]);
        }
        $this->conexion->desconectar();
        return $lote_producto_usados;
    }

    public function findLikeAtrr($cadena) {
        $this->conexion->conectar();
        $query = "SELECT * FROM lote_producto_usados WHERE  upper(idLote) LIKE upper(" . $cadena . ")  OR  upper(runFuncionaria) LIKE upper(" . $cadena . ")  OR  upper(cantidad) LIKE upper(" . $cadena . ")  OR  upper(fechaRetiro) LIKE upper(" . $cadena . ")  OR  upper(destino) LIKE upper('" . $cadena . "') ";
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $lote_producto_usadoss = array();
        while ($fila = $result->fetch_row()) {
            $lote_producto_usados = new Lote_producto_usadosDTO();
            $lote_producto_usados->setIdLoteProductosUsados($fila[0]);
            $lote_producto_usados->setIdLote($fila[1]);
            $lote_producto_usados->setRunFuncionaria($fila[2]);
            $lote_producto_usados->setCantidad($fila[3]);
            $lote_producto_usados->setFechaRetiro($fila[4]);
            $lote_producto_usados->setDestino($fila[5]);
            $lote_producto_usadoss[$i] = $lote_producto_usados;
            $i++;
        }
        $this->conexion->desconectar();
        return $lote_producto_usadoss;
    }

    public function save($lote_producto_usados) {
        $this->conexion->conectar();
        $query = "INSERT INTO lote_producto_usados (idLote,runFuncionaria,cantidad,fechaRetiro,destino)"
                . " VALUES ( " . $lote_producto_usados->getIdLote() . " ,  " . $lote_producto_usados->getRunFuncionaria() . " ,  " . $lote_producto_usados->getCantidad() . " , '" . $lote_producto_usados->getFechaRetiro() . "' , '" . $lote_producto_usados->getDestino() . "' )";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

    public function update($lote_producto_usados) {
        $this->conexion->conectar();
        $query = "UPDATE lote_producto_usados SET "
                . "  idLote =  " . $lote_producto_usados->getIdLote() . " ,"
                . "  runFuncionaria =  " . $lote_producto_usados->getRunFuncionaria() . " ,"
                . "  cantidad =  " . $lote_producto_usados->getCantidad() . " ,"
                . "  fechaRetiro = '" . $lote_producto_usados->getFechaRetiro() . "' ,"
                . "  destino = '" . $lote_producto_usados->getDestino() . "' "
                . " WHERE idLoteProductosUsados =  " . $lote_producto_usados->getIdLoteProductosUsados() . " ";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

}
