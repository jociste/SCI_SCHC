<?php
include_once 'Nucleo/ConexionMySQL.php';
include_once '../../Modelo/Permiso_visualizacion_categoriaDTO.php';

class Permiso_visualizacion_categoriaDAO{
    private $conexion;

    public function Permiso_visualizacion_categoriaDAO() {
        $this->conexion = new ConexionMySQL();
    }

    public function delete($idCargo) {
        $this->conexion->conectar();
        $query = "DELETE FROM permiso_visualizacion_categoria WHERE  idCargo =  ".$idCargo." ";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

    public function findAll() {
        $this->conexion->conectar();
        $query = "SELECT * FROM permiso_visualizacion_categoria";
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $permiso_visualizacion_categorias = array();
        while ($fila = $result->fetch_row()) {
            $permiso_visualizacion_categoria = new Permiso_visualizacion_categoriaDTO();
            $permiso_visualizacion_categoria->setIdCargo($fila[0]);
            $permiso_visualizacion_categoria->setIdCategoria($fila[1]);
            $permiso_visualizacion_categorias[$i] = $permiso_visualizacion_categoria;
            $i++;
        }
        $this->conexion->desconectar();
        return $permiso_visualizacion_categorias;
    }

    public function findByID($idCargo) {
        $this->conexion->conectar();
        $query = "SELECT * FROM permiso_visualizacion_categoria WHERE  idCargo =  ".$idCargo." ";
        $result = $this->conexion->ejecutar($query);
        $permiso_visualizacion_categoria = new Permiso_visualizacion_categoriaDTO();
        while ($fila = $result->fetch_row()) {
            $permiso_visualizacion_categoria->setIdCargo($fila[0]);
            $permiso_visualizacion_categoria->setIdCategoria($fila[1]);
        }
        $this->conexion->desconectar();
        return $permiso_visualizacion_categoria;
    }

    public function findLikeAtrr($cadena) {
        $this->conexion->conectar();
        $query = "SELECT * FROM permiso_visualizacion_categoria WHERE  upper(idCargo) LIKE upper(".$cadena.")  OR  upper(idCategoria) LIKE upper(".$cadena.") ";
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $permiso_visualizacion_categorias = array();
        while ($fila = $result->fetch_row()) {
            $permiso_visualizacion_categoria = new Permiso_visualizacion_categoriaDTO();
            $permiso_visualizacion_categoria->setIdCargo($fila[0]);
            $permiso_visualizacion_categoria->setIdCategoria($fila[1]);
            $permiso_visualizacion_categorias[$i] = $permiso_visualizacion_categoria;
            $i++;
        }
        $this->conexion->desconectar();
        return $permiso_visualizacion_categorias;
    }

    public function save($permiso_visualizacion_categoria) {
        $this->conexion->conectar();
        $query = "INSERT INTO permiso_visualizacion_categoria (idCargo,idCategoria)"
                . " VALUES ( ".$permiso_visualizacion_categoria->getIdCargo()." ,  ".$permiso_visualizacion_categoria->getIdCategoria()." )";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

    public function update($permiso_visualizacion_categoria) {
        $this->conexion->conectar();
        $query = "UPDATE permiso_visualizacion_categoria SET "
                . "  idCategoria =  ".$permiso_visualizacion_categoria->getIdCategoria()." "
                . " WHERE  idCargo =  ".$permiso_visualizacion_categoria->getIdCargo()." ";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }
}