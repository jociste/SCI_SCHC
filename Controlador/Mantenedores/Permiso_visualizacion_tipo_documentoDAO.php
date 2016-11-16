<?php
include_once 'Nucleo/ConexionMySQL.php';
include_once '../../Modelo/Permiso_visualizacion_tipo_documentoDTO.php';

class Permiso_visualizacion_tipo_documentoDAO{
    private $conexion;

    public function Permiso_visualizacion_tipo_documentoDAO() {
        $this->conexion = new ConexionMySQL();
    }

    public function delete($idCargo) {
        $this->conexion->conectar();
        $query = "DELETE FROM permiso_visualizacion_tipo_documento WHERE  idCargo =  ".$idCargo." ";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

    public function findAll() {
        $this->conexion->conectar();
        $query = "SELECT * FROM permiso_visualizacion_tipo_documento";
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $permiso_visualizacion_tipo_documentos = array();
        while ($fila = $result->fetch_row()) {
            $permiso_visualizacion_tipo_documento = new Permiso_visualizacion_tipo_documentoDTO();
            $permiso_visualizacion_tipo_documento->setIdTipoDocumento($fila[0]);
            $permiso_visualizacion_tipo_documento->setIdCargo($fila[1]);
            $permiso_visualizacion_tipo_documentos[$i] = $permiso_visualizacion_tipo_documento;
            $i++;
        }
        $this->conexion->desconectar();
        return $permiso_visualizacion_tipo_documentos;
    }

    public function findByID($idCargo) {
        $this->conexion->conectar();
        $query = "SELECT * FROM permiso_visualizacion_tipo_documento WHERE  idCargo =  ".$idCargo." ";
        $result = $this->conexion->ejecutar($query);
        $permiso_visualizacion_tipo_documento = new Permiso_visualizacion_tipo_documentoDTO();
        while ($fila = $result->fetch_row()) {
            $permiso_visualizacion_tipo_documento->setIdTipoDocumento($fila[0]);
            $permiso_visualizacion_tipo_documento->setIdCargo($fila[1]);
        }
        $this->conexion->desconectar();
        return $permiso_visualizacion_tipo_documento;
    }

    public function findLikeAtrr($cadena) {
        $this->conexion->conectar();
        $query = "SELECT * FROM permiso_visualizacion_tipo_documento WHERE  upper(idTipoDocumento) LIKE upper(".$cadena.")  OR  upper(idCargo) LIKE upper(".$cadena.") ";
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $permiso_visualizacion_tipo_documentos = array();
        while ($fila = $result->fetch_row()) {
            $permiso_visualizacion_tipo_documento = new Permiso_visualizacion_tipo_documentoDTO();
            $permiso_visualizacion_tipo_documento->setIdTipoDocumento($fila[0]);
            $permiso_visualizacion_tipo_documento->setIdCargo($fila[1]);
            $permiso_visualizacion_tipo_documentos[$i] = $permiso_visualizacion_tipo_documento;
            $i++;
        }
        $this->conexion->desconectar();
        return $permiso_visualizacion_tipo_documentos;
    }

    public function save($permiso_visualizacion_tipo_documento) {
        $this->conexion->conectar();
        $query = "INSERT INTO permiso_visualizacion_tipo_documento (idTipoDocumento,idCargo)"
                . " VALUES ( ".$permiso_visualizacion_tipo_documento->getIdTipoDocumento()." ,  ".$permiso_visualizacion_tipo_documento->getIdCargo()." )";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

    public function update($permiso_visualizacion_tipo_documento) {
        $this->conexion->conectar();
        $query = "UPDATE permiso_visualizacion_tipo_documento SET "
                . "  idTipoDocumento =  ".$permiso_visualizacion_tipo_documento->getIdTipoDocumento()." ,"
                . " WHERE  idCargo =  ".$permiso_visualizacion_tipo_documento->getIdCargo()." ";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }
}