<?php
include_once 'Nucleo/ConexionMySQL.php';
include_once '../../Modelo/Estado_funcionariaDTO.php';

class Estado_funcionariaDAO{
    private $conexion;

    public function Estado_funcionariaDAO() {
        $this->conexion = new ConexionMySQL();
    }

    public function delete($idEstado) {
        $this->conexion->conectar();
        $query = "DELETE FROM estado_funcionaria WHERE  idEstado =  ".$idEstado." ";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

    public function findAll() {
        $this->conexion->conectar();
        $query = "SELECT * FROM estado_funcionaria";
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $estado_funcionarias = array();
        while ($fila = $result->fetch_row()) {
            $estado_funcionaria = new Estado_funcionariaDTO();
            $estado_funcionaria->setIdEstado($fila[0]);
            $estado_funcionaria->setDescripcionEstado($fila[1]);
            $estado_funcionarias[$i] = $estado_funcionaria;
            $i++;
        }
        $this->conexion->desconectar();
        return $estado_funcionarias;
    }

    public function findByID($idEstado) {
        $this->conexion->conectar();
        $query = "SELECT * FROM estado_funcionaria WHERE  idEstado =  ".$idEstado." ";
        $result = $this->conexion->ejecutar($query);
        $estado_funcionaria = new Estado_funcionariaDTO();
        while ($fila = $result->fetch_row()) {
            $estado_funcionaria->setIdEstado($fila[0]);
            $estado_funcionaria->setDescripcionEstado($fila[1]);
        }
        $this->conexion->desconectar();
        return $estado_funcionaria;
    }

    public function findLikeAtrr($cadena) {
        $this->conexion->conectar();
        $query = "SELECT * FROM estado_funcionaria WHERE  upper(idEstado) LIKE upper(".$cadena.")  OR  upper(descripcionEstado) LIKE upper('".$cadena."') ";
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $estado_funcionarias = array();
        while ($fila = $result->fetch_row()) {
            $estado_funcionaria = new Estado_funcionariaDTO();
            $estado_funcionaria->setIdEstado($fila[0]);
            $estado_funcionaria->setDescripcionEstado($fila[1]);
            $estado_funcionarias[$i] = $estado_funcionaria;
            $i++;
        }
        $this->conexion->desconectar();
        return $estado_funcionarias;
    }

    public function save($estado_funcionaria) {
        $this->conexion->conectar();
        $query = "INSERT INTO estado_funcionaria (idEstado,descripcionEstado)"
                . " VALUES ( ".$estado_funcionaria->getIdEstado()." , '".$estado_funcionaria->getDescripcionEstado()."' )";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

    public function update($estado_funcionaria) {
        $this->conexion->conectar();
        $query = "UPDATE estado_funcionaria SET "
                . "  descripcionEstado = '".$estado_funcionaria->getDescripcionEstado()."' "
                . " WHERE  idEstado =  ".$estado_funcionaria->getIdEstado()." ";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }
}