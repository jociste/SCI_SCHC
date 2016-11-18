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
        $query = "SELECT bn.idNivelBien, ni.idNivel, b.idBien, bn.fechaInicio, bn.fechaTermino, c.idCategoria, b.nombre, b.ubicacion, co.idRegistro, 
        co.numeroComprobante, co.proveedor, co.fechaComprobante, de.descripcion, de.cantidad, de.precio, c.nombre, ni.nombre 
        FROM bien as b JOIN bien_nivel as bn on b.idBien = bn.idBien 
        JOIN categoria c ON c.idCategoria = b.idCategoria 
        JOIN comprobante as co ON co.idBien = b.idBien
        JOIN detalle_comprobante as de ON de.idRegistro = co.idRegistro
        JOIN nivel as ni ON ni.idNivel = bn.idNivel";
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $biens = array();
        while ($fila = $result->fetch_row()) {
            $bien = new BienDTO();
            $bien->setIdNivelBien($fila[0]);
            $bien->setIdNivel($fila[1]);
            $bien->setIdBien($fila[2]);
            $bien->setFechaInicio($fila[3]);            
            $bien->setFechaTermino($fila[4]);
            $bien->setIdCategoria($fila[5]);
            $bien->setNombre($fila[6]);
            $bien->setUbicacion($fila[7]);
            $bien->setIdRegistro($fila[8]);            
            $bien->setNumeroComprobante($fila[9]);
            $bien->setProveedor($fila[10]);
            $bien->setFechaComprobante($fila[11]);
            $bien->setDescripcion($fila[12]);
            $bien->setCantidad($fila[13]);            
            $bien->setPrecio($fila[14]);
            $bien->setNombreCategoria($fila[15]);
            $bien->setNombreNivel($fila[16]);
            $biens[$i] = $bien;
            $i++;
        }
        $this->conexion->desconectar();
        return $biens;
    }
    public function findAllHabilitados() {
        $this->conexion->conectar();
        $query = "SELECT bn.idNivelBien, ni.idNivel, b.idBien, bn.fechaInicio, bn.fechaTermino, c.idCategoria, b.nombre, b.ubicacion, co.idRegistro, 
        co.numeroComprobante, co.proveedor, co.fechaComprobante, de.descripcion, de.cantidad, de.precio, c.nombre, ni.nombre 
        FROM bien as b JOIN bien_nivel as bn on b.idBien = bn.idBien 
        JOIN categoria c ON c.idCategoria = b.idCategoria 
        JOIN comprobante as co ON co.idBien = b.idBien
        JOIN detalle_comprobante as de ON de.idRegistro = co.idRegistro
        JOIN nivel as ni ON ni.idNivel = bn.idNivel";
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $biens = array();
        while ($fila = $result->fetch_row()) {
            $bien = new BienDTO();
            $bien->setIdNivelBien($fila[0]);
            $bien->setIdNivel($fila[1]);
            $bien->setIdBien($fila[2]);
            $bien->setFechaInicio($fila[3]);            
            $bien->setFechaTermino($fila[4]);
            $bien->setIdCategoria($fila[5]);
            $bien->setNombre($fila[6]);
            $bien->setUbicacion($fila[7]);
            $bien->setIdRegistro($fila[8]);            
            $bien->setNumeroComprobante($fila[9]);
            $bien->setProveedor($fila[10]);
            $bien->setFechaComprobante($fila[11]);
            $bien->setDescripcion($fila[12]);
            $bien->setCantidad($fila[13]);            
            $bien->setPrecio($fila[14]);
            $bien->setNombreCategoria($fila[15]);
            $bien->setNombreNivel($fila[16]);
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
    
    public function findByIdCategoria($idCategoria) {
        $this->conexion->conectar();
        $query = "SELECT * FROM bien WHERE  idCategoria =  ".$idCategoria." ";
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

    public function BuscaMaximoIdBien() {
        $this->conexion->conectar();
        $query = "select max(idBien)+1 FROM bien";
         $result = $this->conexion->ejecutar($query);
        $bien = 0;
        while ($fila = $result->fetch_row()) {
            $bien = $fila[0];
        }
        $this->conexion->desconectar();
        return $bien;
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