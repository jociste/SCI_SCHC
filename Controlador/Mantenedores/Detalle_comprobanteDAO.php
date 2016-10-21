<?php
include_once 'Nucleo/ConexionMySQL.php';
include_once '../../Modelo/Detalle_comprobanteDTO.php';

class Detalle_comprobanteDAO{
    private $conexion;

    public function Detalle_comprobanteDAO() {
        $this->conexion = new ConexionMySQL();
    }

    public function delete($idRegistro) {
        $this->conexion->conectar();
        $query = "DELETE FROM detalle_comprobante WHERE  idRegistro =  ".$idRegistro." ";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

    public function findAll() {
        $this->conexion->conectar();
        $query = "SELECT * FROM detalle_comprobante";
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $detalle_comprobantes = array();
        while ($fila = $result->fetch_row()) {
            $detalle_comprobante = new Detalle_comprobanteDTO();
            $detalle_comprobante->setIdRegistro($fila[0]);
            $detalle_comprobante->setDescripcion($fila[1]);
            $detalle_comprobante->setCantidad($fila[2]);
            $detalle_comprobante->setPrecio($fila[3]);
            $detalle_comprobantes[$i] = $detalle_comprobante;
            $i++;
        }
        $this->conexion->desconectar();
        return $detalle_comprobantes;
    }

    public function findByID($idRegistro) {
        $this->conexion->conectar();
        $query = "SELECT * FROM detalle_comprobante WHERE  idRegistro =  ".$idRegistro." ";
        $result = $this->conexion->ejecutar($query);
        $detalle_comprobante = new Detalle_comprobanteDTO();
        while ($fila = $result->fetch_row()) {
            $detalle_comprobante->setIdRegistro($fila[0]);
            $detalle_comprobante->setDescripcion($fila[1]);
            $detalle_comprobante->setCantidad($fila[2]);
            $detalle_comprobante->setPrecio($fila[3]);
        }
        $this->conexion->desconectar();
        return $detalle_comprobante;
    }

    public function findLikeAtrr($cadena) {
        $this->conexion->conectar();
        $query = "SELECT * FROM detalle_comprobante WHERE  upper(idRegistro) LIKE upper(".$cadena.")  OR  upper(descripcion) LIKE upper('".$cadena."')  OR  upper(cantidad) LIKE upper(".$cadena.")  OR  upper(precio) LIKE upper(".$cadena.") ";
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $detalle_comprobantes = array();
        while ($fila = $result->fetch_row()) {
            $detalle_comprobante = new Detalle_comprobanteDTO();
            $detalle_comprobante->setIdRegistro($fila[0]);
            $detalle_comprobante->setDescripcion($fila[1]);
            $detalle_comprobante->setCantidad($fila[2]);
            $detalle_comprobante->setPrecio($fila[3]);
            $detalle_comprobantes[$i] = $detalle_comprobante;
            $i++;
        }
        $this->conexion->desconectar();
        return $detalle_comprobantes;
    }

    public function save($detalle_comprobante) {
        $this->conexion->conectar();
        $query = "INSERT INTO detalle_comprobante (idRegistro,descripcion,cantidad,precio)"
                . " VALUES ( ".$detalle_comprobante->getIdRegistro()." , '".$detalle_comprobante->getDescripcion()."' ,  ".$detalle_comprobante->getCantidad()." ,  ".$detalle_comprobante->getPrecio()." )";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

    public function update($detalle_comprobante) {
        $this->conexion->conectar();
        $query = "UPDATE detalle_comprobante SET "
                . "  descripcion = '".$detalle_comprobante->getDescripcion()."' ,"
                . "  cantidad =  ".$detalle_comprobante->getCantidad()." ,"
                . "  precio =  ".$detalle_comprobante->getPrecio()." "
                . " WHERE  idRegistro =  ".$detalle_comprobante->getIdRegistro()." ";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }
}