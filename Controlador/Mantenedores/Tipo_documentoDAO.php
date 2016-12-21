<?php

include_once 'Nucleo/ConexionMySQL.php';
include_once '../../Modelo/Tipo_documentoDTO.php';

class Tipo_documentoDAO {

    private $conexion;

    public function Tipo_documentoDAO() {
        $this->conexion = new ConexionMySQL();
    }
    public function cuenta($idTipoDocumento) {
        $this->conexion->conectar();
        $query = "SELECT count(*) FROM documento d JOIN tipo_documento tp ON d.idTipoDocumento = tP.idTipoDocumento  WHERE d.idTipoDocumento = ". $idTipoDocumento;
        $result = $this->conexion->ejecutar($query);
        $cantidad = 0;
        while ($fila = $result->fetch_row()) {
            $cantidad = $fila[0];
        }
        $this->conexion->desconectar();
        return $cantidad;
    }
    public function getIdDisponible() {
        $this->conexion->conectar();
        $query = "SELECT (max(idTipoDocumento) + 1) as id FROM tipo_documento";
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

    public function delete($idTipoDocumento) {
        $this->conexion->conectar();
        $query = "DELETE FROM tipo_documento WHERE  idTipoDocumento =  " . $idTipoDocumento . " ";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

    public function findAll() {
        $this->conexion->conectar();
        $query = "SELECT * FROM tipo_documento";
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $tipo_documentos = array();
        while ($fila = $result->fetch_row()) {
            $tipo_documento = new Tipo_documentoDTO();
            $tipo_documento->setIdTipoDocumento($fila[0]);
            $tipo_documento->setNombre($fila[1]);
            $tipo_documento->setDescripcion($fila[2]);
            $tipo_documento->setFechaCreacion($fila[3]);
            $tipo_documentos[$i] = $tipo_documento;
            $i++;
        }
        $this->conexion->desconectar();
        return $tipo_documentos;
    }

    public function findByID($idTipoDocumento) {
        $this->conexion->conectar();
        $query = "SELECT * FROM tipo_documento WHERE  idTipoDocumento =  " . $idTipoDocumento . " ";
        $result = $this->conexion->ejecutar($query);
        $tipo_documento = new Tipo_documentoDTO();
        while ($fila = $result->fetch_row()) {
            $tipo_documento->setIdTipoDocumento($fila[0]);
            $tipo_documento->setNombre($fila[1]);
            $tipo_documento->setDescripcion($fila[2]);
            $tipo_documento->setFechaCreacion($fila[3]);
        }
        $this->conexion->desconectar();
        return $tipo_documento;
    }

    public function findByNombre($nombre) {
        $this->conexion->conectar();
        $query = "SELECT * FROM tipo_documento WHERE upper(nombre) = upper(" . $nombre . ")";
        $result = $this->conexion->ejecutar($query);
        $tipo_documento = new Tipo_documentoDTO();
        if ($result) {
            while ($fila = $result->fetch_row()) {
                $tipo_documento->setIdTipoDocumento($fila[0]);
                $tipo_documento->setNombre($fila[1]);
                $tipo_documento->setDescripcion($fila[2]);
                $tipo_documento->setFechaCreacion($fila[3]);
            }
        }
        $this->conexion->desconectar();
        return $tipo_documento;
    }

    public function findLikeAtrr($cadena) {
        $this->conexion->conectar();
        $query = "SELECT * FROM tipo_documento WHERE  upper(idTipoDocumento) LIKE upper(" . $cadena . ")  OR  upper(nombre) LIKE upper('" . $cadena . "')  OR  upper(descripcion) LIKE upper('" . $cadena . "')  OR  upper(fechaCreacion) LIKE upper('" . $cadena . "') ";
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $tipo_documentos = array();
        while ($fila = $result->fetch_row()) {
            $tipo_documento = new Tipo_documentoDTO();
            $tipo_documento->setIdTipoDocumento($fila[0]);
            $tipo_documento->setNombre($fila[1]);
            $tipo_documento->setDescripcion($fila[2]);
            $tipo_documento->setFechaCreacion($fila[3]);
            $tipo_documentos[$i] = $tipo_documento;
            $i++;
        }
        $this->conexion->desconectar();
        return $tipo_documentos;
    }

    public function save($tipo_documento) {
        $this->conexion->conectar();
        $query = "INSERT INTO tipo_documento (idTipoDocumento, nombre,descripcion,fechaCreacion)"
                . " VALUES (" . $tipo_documento->getIdTipoDocumento() . " , '" . $tipo_documento->getNombre() . "' , '" . $tipo_documento->getDescripcion() . "' , now() )";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

    public function update($tipo_documento) {
        $this->conexion->conectar();
        $query = "UPDATE tipo_documento SET "
                . "  nombre = '" . $tipo_documento->getNombre() . "' ,"
                . "  descripcion = '" . $tipo_documento->getDescripcion() . "' ,"
                . "  fechaCreacion = '" . $tipo_documento->getFechaCreacion() . "' "
                . " WHERE  idTipoDocumento =  " . $tipo_documento->getIdTipoDocumento() . " ";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

}
