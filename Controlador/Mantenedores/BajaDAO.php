<?php

include_once 'Nucleo/ConexionMySQL.php';
include_once '../../Modelo/BajaDTO.php';

class BajaDAO {

    private $conexion;

    public function BajaDAO() {
        $this->conexion = new ConexionMySQL();
    }

    public function BuscaMaximoIdBaja() {
        $this->conexion->conectar();
        $query = "select max(idBaja)+1 FROM baja";
        $result = $this->conexion->ejecutar($query);
        $bien = 1;
        while ($fila = $result->fetch_row()) {
            $bien = $fila[0];
        }
        $this->conexion->desconectar();
        return $bien;
    }

    public function delete($idBaja) {
        $this->conexion->conectar();
        $query = "DELETE FROM baja WHERE  idBaja =  " . $idBaja . " ";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

    public function findAll() {
        $this->conexion->conectar();
        $query = "SELECT * FROM baja";
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $bajas = array();
        while ($fila = $result->fetch_row()) {
            $baja = new BajaDTO();
            $baja->setIdBaja($fila[0]);
            $baja->setIdBien($fila[1]);
            $baja->setFechaBaja($fila[2]);
            $baja->setMotivo($fila[3]);
            $bajas[$i] = $baja;
            $i++;
        }
        $this->conexion->desconectar();
        return $bajas;
    }

    public function findByID($idBaja) {
        $this->conexion->conectar();
        $query = "SELECT * FROM baja WHERE  idBaja =  " . $idBaja . " ";
        $result = $this->conexion->ejecutar($query);
        $baja = new BajaDTO();
        while ($fila = $result->fetch_row()) {
            $baja->setIdBaja($fila[0]);
            $baja->setIdBien($fila[1]);
            $baja->setFechaBaja($fila[2]);
            $baja->setMotivo($fila[3]);
        }
        $this->conexion->desconectar();
        return $baja;
    }

    public function findLikeAtrr($cadena) {
        $this->conexion->conectar();
        $query = "SELECT * FROM baja WHERE  upper(idBaja) LIKE upper(" . $cadena . ")  OR  upper(idBien) LIKE upper(" . $cadena . ")  OR  upper(fechaBaja) LIKE upper(" . $cadena . ")  OR  upper(motivo) LIKE upper('" . $cadena . "') ";
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $bajas = array();
        while ($fila = $result->fetch_row()) {
            $baja = new BajaDTO();
            $baja->setIdBaja($fila[0]);
            $baja->setIdBien($fila[1]);
            $baja->setFechaBaja($fila[2]);
            $baja->setMotivo($fila[3]);
            $bajas[$i] = $baja;
            $i++;
        }
        $this->conexion->desconectar();
        return $bajas;
    }

    public function save($baja) {
        $this->conexion->conectar();
        $query = "INSERT INTO baja (idBaja,idBien,fechaBaja,motivo)"
                . " VALUES ( " . $baja->getIdBaja() . " ,  " . $baja->getIdBien() . " , '" . $baja->getFechaBaja() . "' , '" . $baja->getMotivo() . "' )";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

    public function update($baja) {
        $this->conexion->conectar();
        $query = "UPDATE baja SET "
                . "  idBien =  " . $baja->getIdBien() . " ,"
                . "  fechaBaja = " . $baja->getFechaBaja() . " ,"
                . "  motivo = '" . $baja->getMotivo() . "' "
                . " WHERE  idBaja =  " . $baja->getIdBaja() . " ";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

}
