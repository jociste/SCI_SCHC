<?php

include_once 'Nucleo/ConexionMySQL.php';
include_once '../../Modelo/ComprobanteDTO.php';

class ComprobanteDAO {

    private $conexion;

    public function ComprobanteDAO() {
        $this->conexion = new ConexionMySQL();
    }

    public function delete($idRegistro) {
        $this->conexion->conectar();
        $query = "DELETE FROM comprobante WHERE  idRegistro =  " . $idRegistro . " ";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

    public function findAll() {
        $this->conexion->conectar();
        $query = "SELECT * FROM comprobante";
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $comprobantes = array();
        while ($fila = $result->fetch_row()) {
            $comprobante = new ComprobanteDTO();
            $comprobante->setIdRegistro($fila[0]);
            $comprobante->setIdBien($fila[1]);
            $comprobante->setNumeroComprobante($fila[2]);
            $comprobante->setProveedor($fila[3]);
            $comprobante->setFechaComprobante($fila[4]);
            $comprobantes[$i] = $comprobante;
            $i++;
        }
        $this->conexion->desconectar();
        return $comprobantes;
    }

    public function findByID($idRegistro) {
        $this->conexion->conectar();
        $query = "SELECT * FROM comprobante WHERE  idRegistro =  " . $idRegistro . " ";
        $result = $this->conexion->ejecutar($query);
        $comprobante = new ComprobanteDTO();
        while ($fila = $result->fetch_row()) {
            $comprobante->setIdRegistro($fila[0]);
            $comprobante->setIdBien($fila[1]);
            $comprobante->setNumeroComprobante($fila[2]);
            $comprobante->setProveedor($fila[3]);
            $comprobante->setFechaComprobante($fila[4]);
        }
        $this->conexion->desconectar();
        return $comprobante;
    }

    public function findLikeAtrr($cadena) {
        $this->conexion->conectar();
        $query = "SELECT * FROM comprobante WHERE  upper(idRegistro) LIKE upper(" . $cadena . ")  OR  upper(idBien) LIKE upper(" . $cadena . ")  OR  upper(numeroComprobante) LIKE upper(" . $cadena . ")  OR  upper(proveedor) LIKE upper('" . $cadena . "')  OR  upper(fechaComprobante) LIKE upper(" . $cadena . ") ";
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $comprobantes = array();
        while ($fila = $result->fetch_row()) {
            $comprobante = new ComprobanteDTO();
            $comprobante->setIdRegistro($fila[0]);
            $comprobante->setIdBien($fila[1]);
            $comprobante->setNumeroComprobante($fila[2]);
            $comprobante->setProveedor($fila[3]);
            $comprobante->setFechaComprobante($fila[4]);
            $comprobantes[$i] = $comprobante;
            $i++;
        }
        $this->conexion->desconectar();
        return $comprobantes;
    }

    public function BuscaMaximoIdRegistro() {
        $this->conexion->conectar();
        $query = "select max(idRegistro)+1 FROM comprobante";
        $result = $this->conexion->ejecutar($query);
        $comprobante = 0;
        while ($fila = $result->fetch_row()) {
            $comprobante = $fila[0];
        }
        $this->conexion->desconectar();
        return $comprobante;
    }

    public function save($comprobante) {
        $this->conexion->conectar();
        $query = "INSERT INTO comprobante (idRegistro,idBien,numeroComprobante,proveedor,fechaComprobante)"
                . " VALUES ( " . $comprobante->getIdRegistro() . " ,  " . $comprobante->getIdBien() . " ,  " . $comprobante->getNumeroComprobante() . " , '" . $comprobante->getProveedor() . "' , '" . $comprobante->getFechaComprobante() . "' )";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

    public function update($comprobante) {
        $this->conexion->conectar();
        $query = "UPDATE comprobante SET "
                . "  idBien =  " . $comprobante->getIdBien() . " ,"
                . "  numeroComprobante =  " . $comprobante->getNumeroComprobante() . " ,"
                . "  proveedor = '" . $comprobante->getProveedor() . "' ,"
                . "  fechaComprobante = '" . $comprobante->getFechaComprobante() . "' "
                . " WHERE  idRegistro =  " . $comprobante->getIdRegistro() . " ";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

}
