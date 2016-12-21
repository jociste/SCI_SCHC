<?php

include_once 'Nucleo/ConexionMySQL.php';
include_once '../../Modelo/DocumentoDTO.php';

class DocumentoDAO {

    private $conexion;

    public function DocumentoDAO() {
        $this->conexion = new ConexionMySQL();
    }

    public function delete($idDocumento) {
        $this->conexion->conectar();
        $query = "DELETE FROM documento WHERE  idDocumento =  " . $idDocumento . " ";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

    public function findAll() {
        $this->conexion->conectar();
        $query = "SELECT * FROM documento";
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $documentos = array();
        while ($fila = $result->fetch_row()) {
            $documento = new DocumentoDTO();
            $documento->setIdDocumento($fila[0]);
            $documento->setRunFuncionaria($fila[1]);
            $documento->setIdTipoDocumento($fila[2]);
            $documento->setNombre($fila[3]);
            $documento->setDescripcion($fila[4]);
            $documento->setFechaRegistro($fila[5]);
            $documento->setRutaDocumento($fila[6]);
            $documento->setTamano($fila[7]);
            $documento->setFormato($fila[8]);
            $documento->setEstado($fila[9]);
            $documentos[$i] = $documento;
            $i++;
        }
        $this->conexion->desconectar();
        return $documentos;
    }

    public function findAllVigentes() {
        $this->conexion->conectar();
        $query = "SELECT * FROM documento WHERE estado = 1 ";
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $documentos = array();
        while ($fila = $result->fetch_row()) {
            $documento = new DocumentoDTO();
            $documento->setIdDocumento($fila[0]);
            $documento->setRunFuncionaria($fila[1]);
            $documento->setIdTipoDocumento($fila[2]);
            $documento->setNombre($fila[3]);
            $documento->setDescripcion($fila[4]);
            $documento->setFechaRegistro($fila[5]);
            $documento->setRutaDocumento($fila[6]);
            $documento->setTamano($fila[7]);
            $documento->setFormato($fila[8]);
            $documento->setEstado($fila[9]);
            $documentos[$i] = $documento;
            $i++;
        }
        $this->conexion->desconectar();
        return $documentos;
    }

    public function findAllPapelera() {
        $this->conexion->conectar();
        $query = "SELECT * FROM documento WHERE estado = 0 ";
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $documentos = array();
        while ($fila = $result->fetch_row()) {
            $documento = new DocumentoDTO();
            $documento->setIdDocumento($fila[0]);
            $documento->setRunFuncionaria($fila[1]);
            $documento->setIdTipoDocumento($fila[2]);
            $documento->setNombre($fila[3]);
            $documento->setDescripcion($fila[4]);
            $documento->setFechaRegistro($fila[5]);
            $documento->setRutaDocumento($fila[6]);
            $documento->setTamano($fila[7]);
            $documento->setFormato($fila[8]);
            $documento->setEstado($fila[9]);
            $documentos[$i] = $documento;
            $i++;
        }
        $this->conexion->desconectar();
        return $documentos;
    }

    public function findByID($idDocumento) {
        $this->conexion->conectar();
        $query = "SELECT * FROM documento WHERE  idDocumento =  " . $idDocumento . " ";
        $result = $this->conexion->ejecutar($query);
        $documento = new DocumentoDTO();
        while ($fila = $result->fetch_row()) {
            $documento->setIdDocumento($fila[0]);
            $documento->setRunFuncionaria($fila[1]);
            $documento->setIdTipoDocumento($fila[2]);
            $documento->setNombre($fila[3]);
            $documento->setDescripcion($fila[4]);
            $documento->setFechaRegistro($fila[5]);
            $documento->setRutaDocumento($fila[6]);
            $documento->setTamano($fila[7]);
            $documento->setFormato($fila[8]);
            $documento->setEstado($fila[9]);
        }
        $this->conexion->desconectar();
        return $documento;
    }

    public function findLikeAtrr($cadena, $idTipoDocumento) {
        $this->conexion->conectar();
        $query = "SELECT * FROM documento WHERE idTipoDocumento = " . $idTipoDocumento . " AND estado = 1 AND (upper(runFuncionaria) LIKE upper('%" . $cadena . "%') OR  upper(nombre) LIKE upper('%" . $cadena . "%')  OR  upper(descripcion) LIKE upper('%" . $cadena . "%'))";
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $documentos = array();
        if ($result) {
            while ($fila = $result->fetch_row()) {
                $documento = new DocumentoDTO();
                $documento->setIdDocumento($fila[0]);
                $documento->setRunFuncionaria($fila[1]);
                $documento->setIdTipoDocumento($fila[2]);
                $documento->setNombre($fila[3]);
                $documento->setDescripcion($fila[4]);
                $documento->setFechaRegistro($fila[5]);
                $documento->setRutaDocumento($fila[6]);
                $documento->setTamano($fila[7]);
                $documento->setFormato($fila[8]);
                $documento->setEstado($fila[9]);
                $documentos[$i] = $documento;
                $i++;
            }
        }
        $this->conexion->desconectar();
        return $documentos;
    }

    public function findLikeAtrrDocumentosValidos($cadena) {
        $this->conexion->conectar();
        $query = "SELECT * FROM documento WHERE estado = 1 AND (upper(runFuncionaria) LIKE upper('%" . $cadena . "%') OR  upper(nombre) LIKE upper('%" . $cadena . "%')  OR  upper(descripcion) LIKE upper('%" . $cadena . "%'))";
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $documentos = array();
        if ($result) {
            while ($fila = $result->fetch_row()) {
                $documento = new DocumentoDTO();
                $documento->setIdDocumento($fila[0]);
                $documento->setRunFuncionaria($fila[1]);
                $documento->setIdTipoDocumento($fila[2]);
                $documento->setNombre($fila[3]);
                $documento->setDescripcion($fila[4]);
                $documento->setFechaRegistro($fila[5]);
                $documento->setRutaDocumento($fila[6]);
                $documento->setTamano($fila[7]);
                $documento->setFormato($fila[8]);
                $documento->setEstado($fila[9]);
                $documentos[$i] = $documento;
                $i++;
            }
        }
        $this->conexion->desconectar();
        return $documentos;
    }

    public function findLikeAtrrPapelera($cadena) {
        $this->conexion->conectar();
        $query = "SELECT * FROM documento WHERE estado = 0 AND (upper(runFuncionaria) LIKE upper('%" . $cadena . "%') OR  upper(nombre) LIKE upper('%" . $cadena . "%')  OR  upper(descripcion) LIKE upper('%" . $cadena . "%'))";
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $documentos = array();
        if ($result) {
            while ($fila = $result->fetch_row()) {
                $documento = new DocumentoDTO();
                $documento->setIdDocumento($fila[0]);
                $documento->setRunFuncionaria($fila[1]);
                $documento->setIdTipoDocumento($fila[2]);
                $documento->setNombre($fila[3]);
                $documento->setDescripcion($fila[4]);
                $documento->setFechaRegistro($fila[5]);
                $documento->setRutaDocumento($fila[6]);
                $documento->setTamano($fila[7]);
                $documento->setFormato($fila[8]);
                $documento->setEstado($fila[9]);
                $documentos[$i] = $documento;
                $i++;
            }
        }
        $this->conexion->desconectar();
        return $documentos;
    }

    public function save($documento) {
        $this->conexion->conectar();
        $query = "INSERT INTO documento (runFuncionaria,idTipoDocumento,nombre,descripcion,fechaRegistro,rutaDocumento,tamano,formato,estado)"
                . " VALUES ( " . $documento->getRunFuncionaria() . " ,  " . $documento->getIdTipoDocumento() . " , '" . $documento->getNombre() . "' , '" . $documento->getDescripcion() . "' , '" . $documento->getFechaRegistro() . "' , '" . $documento->getRutaDocumento() . "' ,  '" . $documento->getTamano() . "' , '" . $documento->getFormato() . "', " . $documento->getEstado() . " )";
        //var_dump($query);
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

    public function update($documento) {
        $this->conexion->conectar();
        $query = "UPDATE documento SET "
                . "  runFuncionaria =  " . $documento->getRunFuncionaria() . " ,"
                . "  idTipoDocumento =  " . $documento->getIdTipoDocumento() . " ,"
                . "  nombre = '" . $documento->getNombre() . "' ,"
                . "  descripcion = '" . $documento->getDescripcion() . "' ,"
                . "  fechaRegistro = '" . $documento->getFechaRegistro() . "' ,"
                . "  rutaDocumento = '" . $documento->getRutaDocumento() . "' ,"
                . "  tamano =  '" . $documento->getTamano() . "', "
                . "  formato = '" . $documento->getFormato() . "', "
                . "  estado = " . $documento->getEstado() . " "
                . " WHERE  idDocumento =  " . $documento->getIdDocumento() . " ";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

}
