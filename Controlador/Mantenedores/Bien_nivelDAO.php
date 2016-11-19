<?php

include_once 'Nucleo/ConexionMySQL.php';
include_once '../../Modelo/Bien_nivelDTO.php';

class Bien_nivelDAO {

    private $conexion;

    public function Bien_nivelDAO() {
        $this->conexion = new ConexionMySQL();
    }

    public function delete($idBien) {
        $this->conexion->conectar();
        $query = "DELETE FROM bien_nivel WHERE  idBien =  " . $idBien . " ";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

    public function findAll() {
        $this->conexion->conectar();
        $query = "select bn.idNivelBien, n.idNivel, n.nombre, bn.idBien, bn.fechaInicio, bn.fechaTermino, ca.idCategoria, ca.nombre, b.nombre, b.ubicacion,
        c.idRegistro, c.numeroComprobante, c.proveedor, c.fechaComprobante, dc.descripcion, dc.cantidad, dc.precio FROM nivel as n JOIN 
        bien_nivel as bn on n.idNivel = bn.idNivel JOIN bien as b on b.idBien = bn.idBien JOIN comprobante as c on c.idBien = c.idBien JOIN
        detalle_comprobante as dc ON dc.idRegistro = c.idRegistro JOIN categoria as ca on ca.idCategoria = b.idCategoria";
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $bien_nivels = array();
        while ($fila = $result->fetch_row()) {
            $bien_nivel = new Bien_nivelDTO();
            $bien_nivel->setIdNivelBien($fila[0]);
            $bien_nivel->setIdNivel($fila[1]);
            $bien_nivel->setNombreNivel($fila[2]);
            $bien_nivel->setIdBien($fila[3]);
            $bien_nivel->setFechaInicio($fila[4]);
            $bien_nivel->setFechaTermino($fila[5]);
            $bien_nivel->setIdCategoria($fila[6]);
            $bien_nivel->setNombreCategoria($fila[7]);            
            $bien_nivel->setNombre($fila[8]);
            $bien_nivel->setUbicacion($fila[9]);
            $bien_nivel->setIdRegistro($fila[10]);
            $bien_nivel->setNumeroComprobante($fila[11]);
            $bien_nivel->setProveedor($fila[12]);
            $bien_nivel->setFechaComprobante($fila[13]);
            $bien_nivel->setDescripcion($fila[14]);
            $bien_nivel->setCantidad($fila[15]);
            $bien_nivel->setPrecio($fila[16]);
            $bien_nivels[$i] = $bien_nivel;
            $i++;
        }
        $this->conexion->desconectar();
        return $bien_nivels;
    }

        public function BuscaMaximoIdNivelBien() {
        $this->conexion->conectar();
        $query = "select max(idNivelBien)+1 FROM bien_nivel";
        $result = $this->conexion->ejecutar($query);
        $IdNivelBien = 0;
        while ($fila = $result->fetch_row()) {
            $IdNivelBien = $fila[0];
        }
        $this->conexion->desconectar();
        return $IdNivelBien;
    }
    public function findByID($idNivelBien) {
        $this->conexion->conectar();
        $query = "SELECT * FROM bien_nivel WHERE  idNivelBien =  " . idNivelBien . " ";
        $result = $this->conexion->ejecutar($query);
        $bien_nivel = new Bien_nivelDTO();
        while ($fila = $result->fetch_row()) {
            $bien_nivel->setIdNivelBien($fila[0]);
            $bien_nivel->setIdNivel($fila[1]);
            $bien_nivel->setIdBien($fila[2]);
            $bien_nivel->setFechaInicio($fila[3]);
            $bien_nivel->setFechaTermino($fila[4]);
        }
        $this->conexion->desconectar();
        return $bien_nivel;
    }

    public function findLikeAtrr($cadena) {
        $this->conexion->conectar();
        $query = "SELECT * FROM bien_nivel WHERE  upper(idNivel) LIKE upper(" . $cadena . ")  OR  upper(idBien) LIKE upper(" . $cadena . ")  OR  upper(fechaInicio) LIKE upper(" . $cadena . ")  OR  upper(fechaTermino) LIKE upper(" . $cadena . ") ";
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $bien_nivels = array();
        while ($fila = $result->fetch_row()) {
            $bien_nivel = new Bien_nivelDTO();
            $bien_nivel->setIdNivel($fila[0]);
            $bien_nivel->setIdBien($fila[1]);
            $bien_nivel->setFechaInicio($fila[2]);
            $bien_nivel->setFechaTermino($fila[3]);
            $bien_nivels[$i] = $bien_nivel;
            $i++;
        }
        $this->conexion->desconectar();
        return $bien_nivels;
    }

    public function save($bien_nivel) {
        $this->conexion->conectar();
        $query = "INSERT INTO bien_nivel (idNivelBien,idNivel,idBien,fechaInicio,fechaTermino)"
                . " VALUES ( " . $bien_nivel->getIdNivelBien() . " ,  " . $bien_nivel->getIdNivel(). " ,  " . $bien_nivel->getIdBien() . " , '" . $bien_nivel->getFechaInicio() . "' , '" . $bien_nivel->getFechaTermino() . "' )";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

    public function update($bien_nivel) {
        $this->conexion->conectar();
        $query = "UPDATE bien_nivel SET "
                . "  idNivel =  " . $bien_nivel->getIdNivel() . " ,"
                . "  idBien =  " . $bien_nivel->getIdBien() . " ,"
                . "  fechaInicio = '" . $bien_nivel->getFechaInicio() . "' ,"
                . "  fechaTermino = '" . $bien_nivel->getFechaTermino() . "' "
                . " WHERE  idNivelBien =  " . $bien_nivel->getIdNivelBien() . " ";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

}
