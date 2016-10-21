<?php
include_once 'Nucleo/ConexionMySQL.php';
include_once '../../Modelo/BienDTO.php';

class BienDAO{
    private $conexion;

    public function BienDAO() {
        $this->conexion = new ConexionMySQL();
    }

    public function delete($idBien) {
        $this->conexion->conectar();
        $query = "DELETE FROM bien WHERE  idBien =  ".$idBien." ";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

    public function findAll() {
        $this->conexion->conectar();
        $query = "SELECT * FROM bien";
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $biens = array();
        while ($fila = $result->fetch_row()) {
            $bien = new BienDTO();
            $bien->setIdBien($fila[0]);
            $bien->setIdCategoria($fila[1]);
            $bien->setNombre($fila[2]);
            $bien->setUbicacion($fila[3]);
            $biens[$i] = $bien;
            $i++;
        }
        $this->conexion->desconectar();
        return $biens;
    }

    public function findByID($idBien) {
        $this->conexion->conectar();
        $query = "SELECT * FROM bien WHERE  idBien =  ".$idBien." ";
        $result = $this->conexion->ejecutar($query);
        $bien = new BienDTO();
        while ($fila = $result->fetch_row()) {
            $bien->setIdBien($fila[0]);
            $bien->setIdCategoria($fila[1]);
            $bien->setNombre($fila[2]);
            $bien->setUbicacion($fila[3]);
        }
        $this->conexion->desconectar();
        return $bien;
    }

    public function findLikeAtrr($cadena) {
        $this->conexion->conectar();
        $query = "SELECT * FROM bien WHERE  upper(idBien) LIKE upper(".$cadena.")  OR  upper(idCategoria) LIKE upper(".$cadena.")  OR  upper(nombre) LIKE upper('".$cadena."')  OR  upper(ubicacion) LIKE upper('".$cadena."') ";
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $biens = array();
        while ($fila = $result->fetch_row()) {
            $bien = new BienDTO();
            $bien->setIdBien($fila[0]);
            $bien->setIdCategoria($fila[1]);
            $bien->setNombre($fila[2]);
            $bien->setUbicacion($fila[3]);
            $biens[$i] = $bien;
            $i++;
        }
        $this->conexion->desconectar();
        return $biens;
    }

    public function save($bien) {
        $this->conexion->conectar();
        $query = "INSERT INTO bien (idBien,idCategoria,nombre,ubicacion)"
                . " VALUES ( ".$bien->getIdBien()." ,  ".$bien->getIdCategoria()." , '".$bien->getNombre()."' , '".$bien->getUbicacion()."' )";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

    public function update($bien) {
        $this->conexion->conectar();
        $query = "UPDATE bien SET "
                . "  idCategoria =  ".$bien->getIdCategoria()." ,"
                . "  nombre = '".$bien->getNombre()."' ,"
                . "  ubicacion = '".$bien->getUbicacion()."' "
                . " WHERE  idBien =  ".$bien->getIdBien()." ";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }
}