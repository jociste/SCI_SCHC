<?php
include_once 'Nucleo/ConexionMySQL.php';
include_once '../../Modelo/CargoDTO.php';

class CargoDAO{
    private $conexion;

    public function CargoDAO() {
        $this->conexion = new ConexionMySQL();
    }

    public function delete($idCargo) {
        $this->conexion->conectar();
        $query = "DELETE FROM cargo WHERE  idCargo =  ".$idCargo." ";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

    public function findAll() {
        $this->conexion->conectar();
        $query = "SELECT * FROM cargo";
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $cargos = array();
        while ($fila = $result->fetch_row()) {
            $cargo = new CargoDTO();
            $cargo->setIdCargo(utf8_encode($fila[0]));
            $cargo->setNombre(utf8_encode($fila[1]));
            $cargos[$i] = $cargo;
            $i++;
        }
        $this->conexion->desconectar();
        return $cargos;
    }

    public function findByID($idCargo) {
        $this->conexion->conectar();
        $query = "SELECT * FROM cargo WHERE  idCargo =  ".$idCargo." ";
        $result = $this->conexion->ejecutar($query);
        $cargo = new CargoDTO();
        while ($fila = $result->fetch_row()) {
            $cargo->setIdCargo($fila[0]);
            $cargo->setNombre($fila[1]);
        }
        $this->conexion->desconectar();
        return $cargo;
    }

    public function findLikeAtrr($cadena) {
        $this->conexion->conectar();
        $query = "SELECT * FROM cargo WHERE  upper(idCargo) LIKE upper(".$cadena.")  OR  upper(nombre) LIKE upper('".$cadena."') ";
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $cargos = array();
        while ($fila = $result->fetch_row()) {
            $cargo = new CargoDTO();
            $cargo->setIdCargo($fila[0]);
            $cargo->setNombre($fila[1]);
            $cargos[$i] = $cargo;
            $i++;
        }
        $this->conexion->desconectar();
        return $cargos;
    }

    public function save($cargo) {
        $this->conexion->conectar();
        $query = "INSERT INTO cargo (idCargo,nombre)"
                . " VALUES ( ".$cargo->getIdCargo()." , '".$cargo->getNombre()."' )";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

    public function update($cargo) {
        $this->conexion->conectar();
        $query = "UPDATE cargo SET "
                . "  nombre = '".$cargo->getNombre()."' "
                . " WHERE  idCargo =  ".$cargo->getIdCargo()." ";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }
}