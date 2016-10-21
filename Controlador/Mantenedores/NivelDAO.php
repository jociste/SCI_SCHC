<?php
include_once 'Nucleo/ConexionMySQL.php';
include_once '../../Modelo/NivelDTO.php';

class NivelDAO{
    private $conexion;

    public function NivelDAO() {
        $this->conexion = new ConexionMySQL();
    }

    public function delete($idNivel) {
        $this->conexion->conectar();
        $query = "DELETE FROM nivel WHERE  idNivel =  ".$idNivel." ";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

    public function findAll() {
        $this->conexion->conectar();
        $query = "SELECT * FROM nivel";
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $nivels = array();
        while ($fila = $result->fetch_row()) {
            $nivel = new NivelDTO();
            $nivel->setIdNivel($fila[0]);
            $nivel->setDescripcion($fila[1]);
            $nivel->setNombre($fila[2]);
            $nivels[$i] = $nivel;
            $i++;
        }
        $this->conexion->desconectar();
        return $nivels;
    }

    public function findByID($idNivel) {
        $this->conexion->conectar();
        $query = "SELECT * FROM nivel WHERE  idNivel =  ".$idNivel." ";
        $result = $this->conexion->ejecutar($query);
        $nivel = new NivelDTO();
        while ($fila = $result->fetch_row()) {
            $nivel->setIdNivel($fila[0]);
            $nivel->setDescripcion($fila[1]);
            $nivel->setNombre($fila[2]);
        }
        $this->conexion->desconectar();
        return $nivel;
    }

    public function findLikeAtrr($cadena) {
        $this->conexion->conectar();
        $query = "SELECT * FROM nivel WHERE  upper(idNivel) LIKE upper(".$cadena.")  OR  upper(descripcion) LIKE upper('".$cadena."')  OR  upper(nombre) LIKE upper('".$cadena."') ";
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $nivels = array();
        while ($fila = $result->fetch_row()) {
            $nivel = new NivelDTO();
            $nivel->setIdNivel($fila[0]);
            $nivel->setDescripcion($fila[1]);
            $nivel->setNombre($fila[2]);
            $nivels[$i] = $nivel;
            $i++;
        }
        $this->conexion->desconectar();
        return $nivels;
    }

    public function save($nivel) {
        $this->conexion->conectar();
        $query = "INSERT INTO nivel (idNivel,descripcion,nombre)"
                . " VALUES ( ".$nivel->getIdNivel()." , '".$nivel->getDescripcion()."' , '".$nivel->getNombre()."' )";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

    public function update($nivel) {
        $this->conexion->conectar();
        $query = "UPDATE nivel SET "
                . "  descripcion = '".$nivel->getDescripcion()."' ,"
                . "  nombre = '".$nivel->getNombre()."' "
                . " WHERE  idNivel =  ".$nivel->getIdNivel()." ";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }
}