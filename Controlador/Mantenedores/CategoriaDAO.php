<?php

include_once 'Nucleo/ConexionMySQL.php';
include_once '../../Modelo/CategoriaDTO.php';

class CategoriaDAO {

    private $conexion;

    public function CategoriaDAO() {
        $this->conexion = new ConexionMySQL();
    }

    public function getIdDisponible() {
        $this->conexion->conectar();
        $query = "SELECT (max(idCategoria)+1) as id FROM categoria";
        $result = $this->conexion->ejecutar($query);
        $id = 1;
        if ($result) {
            while ($fila = $result->fetch_row()) {
                $id = $fila[0];
            }
        }
        $this->conexion->desconectar();
        return $id;
    }

    public function delete($idCategoria) {
        $this->conexion->conectar();
        $query = "DELETE FROM categoria WHERE idCategoria =  " . $idCategoria . " ";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

    public function findAll() {
        $this->conexion->conectar();
        $query = "SELECT * FROM categoria";
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $categorias = array();
        while ($fila = $result->fetch_row()) {
            $categoria = new CategoriaDTO();
            $categoria->setIdCategoria($fila[0]);
            $categoria->setNombre($fila[1]);
            $categoria->setDescripcion($fila[2]);
            $categorias[$i] = $categoria;
            $i++;
        }
        $this->conexion->desconectar();
        return $categorias;
    }

    public function findAllAuxiliar($perfil) {
        $this->conexion->conectar();
        $query = "SELECT * FROM categoria as C JOIN permiso_visualizacion_categoria AS pvc on pvc.idCategoria = C.idCategoria join cargo as ca on ca.idCargo = pvc.idCargo 
        where ca.idCargo = ".$perfil;
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $categorias = array();
        while ($fila = $result->fetch_row()) {
            $categoria = new CategoriaDTO();
            $categoria->setIdCategoria($fila[0]);
            $categoria->setNombre($fila[1]);
            $categoria->setDescripcion($fila[2]);
            $categorias[$i] = $categoria;
            $i++;
        }
        $this->conexion->desconectar();
        return $categorias;
    }

    public function findByID($idCategoria) {
        $this->conexion->conectar();
        $query = "SELECT * FROM categoria WHERE  idCategoria =  " . $idCategoria . " ";
        $result = $this->conexion->ejecutar($query);
        $categoria = new CategoriaDTO();
        while ($fila = $result->fetch_row()) {
            $categoria->setIdCategoria($fila[0]);
            $categoria->setNombre($fila[1]);
            $categoria->setDescripcion($fila[2]);
        }
        $this->conexion->desconectar();
        return $categoria;
    }

    public function findLikeAtrr($cadena) {
        $this->conexion->conectar();
        $query = "SELECT * FROM categoria WHERE  upper(idCategoria) LIKE upper(" . $cadena . ")  OR  upper(nombre) LIKE upper('" . $cadena . "')  OR  upper(descripcion) LIKE upper('" . $cadena . "') ";
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $categorias = array();
        while ($fila = $result->fetch_row()) {
            $categoria = new CategoriaDTO();
            $categoria->setIdCategoria($fila[0]);
            $categoria->setNombre($fila[1]);
            $categoria->setDescripcion($fila[2]);
            $categorias[$i] = $categoria;
            $i++;
        }
        $this->conexion->desconectar();
        return $categorias;
    }

    public function save($categoria) {
        $this->conexion->conectar();
        $query = "INSERT INTO categoria (idCategoria,nombre,descripcion)"
                . " VALUES (" . $categoria->getIdCategoria() . ", '" . $categoria->getNombre() . "' , '" . $categoria->getDescripcion() . "' )";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

    public function update($categoria) {
        $this->conexion->conectar();
        $query = "UPDATE categoria SET "
                . "  nombre = '" . $categoria->getNombre() . "' ,"
                . "  descripcion = '" . $categoria->getDescripcion() . "' "
                . " WHERE  idCategoria =  " . $categoria->getIdCategoria() . " ";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

}
