<?php
include_once 'Nucleo/ConexionMySQL.php';
include_once '../../Modelo/Bien_nivelDTO.php';

class Bien_nivelDAO{
    private $conexion;

    public function Bien_nivelDAO() {
        $this->conexion = new ConexionMySQL();
    }

    public function delete($idBien) {
        $this->conexion->conectar();
        $query = "DELETE FROM bien_nivel WHERE  idBien =  ".$idBien." ";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

    public function findAll() {
        $this->conexion->conectar();
        $query = "SELECT * FROM bien_nivel";
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $bien_nivels = array();
        while ($fila = $result->fetch_row()) {
            $bien_nivel = new Bien_nivelDTO();
            $bien_nivel->setIdNivel($fila[0]);
            $bien_nivel->setIdBien($fila[1]);
            $bien_nivel->setFechaInicio($fila[2]);
            $bien_nivel->setFechaTermino($fila[3]);
            $bien_nivels[$i] = $bien_nivel;
            $i++;
        }
        $this->conexion->desconectar();
        return $bien_nivels;
    }

    public function findByID($idBien) {
        $this->conexion->conectar();
        $query = "SELECT * FROM bien_nivel WHERE  idBien =  ".$idBien." ";
        $result = $this->conexion->ejecutar($query);
        $bien_nivel = new Bien_nivelDTO();
        while ($fila = $result->fetch_row()) {
            $bien_nivel->setIdNivel($fila[0]);
            $bien_nivel->setIdBien($fila[1]);
            $bien_nivel->setFechaInicio($fila[2]);
            $bien_nivel->setFechaTermino($fila[3]);
        }
        $this->conexion->desconectar();
        return $bien_nivel;
    }

    public function findLikeAtrr($cadena) {
        $this->conexion->conectar();
        $query = "SELECT * FROM bien_nivel WHERE  upper(idNivel) LIKE upper(".$cadena.")  OR  upper(idBien) LIKE upper(".$cadena.")  OR  upper(fechaInicio) LIKE upper(".$cadena.")  OR  upper(fechaTermino) LIKE upper(".$cadena.") ";
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $bien_nivels = array();
        while ($fila = $result->fetch_row()) {
            $bien_nivel = new Bien_nivelDTO();
            $bien_nivel->setIdNivel($fila[0]);
            $bien_nivel->setIdBien($fila[1]);
            $bien_nivel->setFechaInicio($fila[2]);
            $bien_nivel->setFechaTermino($fila[3]);
            $bien_nivels[$i] = $bien_nivel;
            $i++;
        }
        $this->conexion->desconectar();
        return $bien_nivels;
    }

    public function save($bien_nivel) {
        $this->conexion->conectar();
        $query = "INSERT INTO bien_nivel (idNivel,idBien,fechaInicio,fechaTermino)"
                . " VALUES ( ".$bien_nivel->getIdNivel()." ,  ".$bien_nivel->getIdBien()." , ".$bien_nivel->getFechaInicio()." , ".$bien_nivel->getFechaTermino()." )";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

    public function update($bien_nivel) {
        $this->conexion->conectar();
        $query = "UPDATE bien_nivel SET "
                . "  idNivel =  ".$bien_nivel->getIdNivel()." ,"
                . "  fechaInicio = ".$bien_nivel->getFechaInicio()." ,"
                . "  fechaTermino = ".$bien_nivel->getFechaTermino()." "
                . " WHERE  idBien =  ".$bien_nivel->getIdBien()." ";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }
}