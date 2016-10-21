<?php
include_once 'Nucleo/ConexionMySQL.php';
include_once '../../Modelo/Lote_producto_usadosDTO.php';

class Lote_producto_usadosDAO{
    private $conexion;

    public function Lote_producto_usadosDAO() {
        $this->conexion = new ConexionMySQL();
    }

    public function delete($idLote) {
        $this->conexion->conectar();
        $query = "DELETE FROM lote_producto_usados WHERE  idLote =  ".$idLote." ";
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
            $lote_producto_usados->setIdLote($fila[0]);
            $lote_producto_usados->setRunFuncionaria($fila[1]);
            $lote_producto_usados->setCantidad($fila[2]);
            $lote_producto_usados->setFechaRetiro($fila[3]);
            $lote_producto_usados->setDestino($fila[4]);
            $lote_producto_usadoss[$i] = $lote_producto_usados;
            $i++;
        }
        $this->conexion->desconectar();
        return $lote_producto_usadoss;
    }

    public function findByID($idLote) {
        $this->conexion->conectar();
        $query = "SELECT * FROM lote_producto_usados WHERE  idLote =  ".$idLote." ";
        $result = $this->conexion->ejecutar($query);
        $lote_producto_usados = new Lote_producto_usadosDTO();
        while ($fila = $result->fetch_row()) {
            $lote_producto_usados->setIdLote($fila[0]);
            $lote_producto_usados->setRunFuncionaria($fila[1]);
            $lote_producto_usados->setCantidad($fila[2]);
            $lote_producto_usados->setFechaRetiro($fila[3]);
            $lote_producto_usados->setDestino($fila[4]);
        }
        $this->conexion->desconectar();
        return $lote_producto_usados;
    }

    public function findLikeAtrr($cadena) {
        $this->conexion->conectar();
        $query = "SELECT * FROM lote_producto_usados WHERE  upper(idLote) LIKE upper(".$cadena.")  OR  upper(runFuncionaria) LIKE upper(".$cadena.")  OR  upper(cantidad) LIKE upper(".$cadena.")  OR  upper(fechaRetiro) LIKE upper(".$cadena.")  OR  upper(destino) LIKE upper('".$cadena."') ";
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $lote_producto_usadoss = array();
        while ($fila = $result->fetch_row()) {
            $lote_producto_usados = new Lote_producto_usadosDTO();
            $lote_producto_usados->setIdLote($fila[0]);
            $lote_producto_usados->setRunFuncionaria($fila[1]);
            $lote_producto_usados->setCantidad($fila[2]);
            $lote_producto_usados->setFechaRetiro($fila[3]);
            $lote_producto_usados->setDestino($fila[4]);
            $lote_producto_usadoss[$i] = $lote_producto_usados;
            $i++;
        }
        $this->conexion->desconectar();
        return $lote_producto_usadoss;
    }

    public function save($lote_producto_usados) {
        $this->conexion->conectar();
        $query = "INSERT INTO lote_producto_usados (idLote,runFuncionaria,cantidad,fechaRetiro,destino)"
                . " VALUES ( ".$lote_producto_usados->getIdLote()." ,  ".$lote_producto_usados->getRunFuncionaria()." ,  ".$lote_producto_usados->getCantidad()." , ".$lote_producto_usados->getFechaRetiro()." , '".$lote_producto_usados->getDestino()."' )";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

    public function update($lote_producto_usados) {
        $this->conexion->conectar();
        $query = "UPDATE lote_producto_usados SET "
                . "  runFuncionaria =  ".$lote_producto_usados->getRunFuncionaria()." ,"
                . "  cantidad =  ".$lote_producto_usados->getCantidad()." ,"
                . "  fechaRetiro = ".$lote_producto_usados->getFechaRetiro()." ,"
                . "  destino = '".$lote_producto_usados->getDestino()."' "
                . " WHERE  idLote =  ".$lote_producto_usados->getIdLote()." ";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }
}