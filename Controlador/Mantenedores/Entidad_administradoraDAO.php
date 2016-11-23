<?php

include_once 'Nucleo/ConexionMySQL.php';
include_once '../../Modelo/Entidad_administradoraDTO.php';

class Entidad_administradoraDAO {

    private $conexion;

    public function Entidad_administradoraDAO() {
        $this->conexion = new ConexionMySQL();
    }

    public function getIDDisponible() {
        $this->conexion->conectar();
        $query = "SELECT max(idEntidadAdministradora)+1 as id FROM entidad_administradora";
        $result = $this->conexion->ejecutar($query);
        $id = 1;
        while ($fila = $result->fetch_row()) {
            if ($fila[0] != "") {
                $id = $fila[0];
            }
        }
        $this->conexion->desconectar();
        return $id;
    }

    public function delete($idEntidadAdministradora) {
        $this->conexion->conectar();
        $query = "DELETE FROM entidad_administradora WHERE  idEntidadAdministradora =  " . $idEntidadAdministradora . " ";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

    public function findAll() {
        $this->conexion->conectar();
        $query = "SELECT * FROM entidad_administradora";
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $entidad_administradoras = array();
        while ($fila = $result->fetch_row()) {
            $entidad_administradora = new Entidad_administradoraDTO();
            $entidad_administradora->setIdEntidadAdministradora($fila[0]);
            $entidad_administradora->setNombreEntidadAdministradora($fila[1]);
            $entidad_administradora->setRutEntidadAdministradora($fila[2]);
            $entidad_administradora->setProvinciaEntidadAdministradora($fila[3]);
            $entidad_administradora->setRegionEntidadAdministradora($fila[4]);
            $entidad_administradora->setRepresentanteLegal($fila[5]);
            $entidad_administradora->setRutRepresentanteLegal($fila[6]);
            $entidad_administradora->setTelefonoRepresentanteLegal($fila[7]);
            $entidad_administradora->setEmailRepresentanteLegal($fila[8]);
            $entidad_administradoras[$i] = $entidad_administradora;
            $i++;
        }
        $this->conexion->desconectar();
        return $entidad_administradoras;
    }

    public function findByID($idEntidadAdministradora) {
        $this->conexion->conectar();
        $query = "SELECT * FROM entidad_administradora WHERE  idEntidadAdministradora =  " . $idEntidadAdministradora . " ";
        $result = $this->conexion->ejecutar($query);
        $entidad_administradora = new Entidad_administradoraDTO();
        while ($fila = $result->fetch_row()) {
            $entidad_administradora->setIdEntidadAdministradora($fila[0]);
            $entidad_administradora->setNombreEntidadAdministradora($fila[1]);
            $entidad_administradora->setRutEntidadAdministradora($fila[2]);
            $entidad_administradora->setProvinciaEntidadAdministradora($fila[3]);
            $entidad_administradora->setRegionEntidadAdministradora($fila[4]);
            $entidad_administradora->setRepresentanteLegal($fila[5]);
            $entidad_administradora->setRutRepresentanteLegal($fila[6]);
            $entidad_administradora->setTelefonoRepresentanteLegal($fila[7]);
            $entidad_administradora->setEmailRepresentanteLegal($fila[8]);
        }
        $this->conexion->desconectar();
        return $entidad_administradora;
    }

    public function findLikeAtrr($cadena) {
        $this->conexion->conectar();
        $query = "SELECT * FROM entidad_administradora WHERE  upper(idEntidadAdministradora) LIKE upper(" . $cadena . ")  OR  upper(nombreEntidadAdministradora) LIKE upper('" . $cadena . "')  OR  upper(rutEntidadAdministradora) LIKE upper('" . $cadena . "')  OR  upper(provinciaEntidadAdministradora) LIKE upper('" . $cadena . "')  OR  upper(regionEntidadAdministradora) LIKE upper('" . $cadena . "')  OR  upper(representanteLegal) LIKE upper('" . $cadena . "')  OR  upper(telefonoRepresentanteLegal) LIKE upper(" . $cadena . ")  OR  upper(emailRepresentanteLegal) LIKE upper('" . $cadena . "') ";
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $entidad_administradoras = array();
        while ($fila = $result->fetch_row()) {
            $entidad_administradora = new Entidad_administradoraDTO();
            $entidad_administradora->setIdEntidadAdministradora($fila[0]);
            $entidad_administradora->setNombreEntidadAdministradora($fila[1]);
            $entidad_administradora->setRutEntidadAdministradora($fila[2]);
            $entidad_administradora->setProvinciaEntidadAdministradora($fila[3]);
            $entidad_administradora->setRegionEntidadAdministradora($fila[4]);
            $entidad_administradora->setRepresentanteLegal($fila[5]);
            $entidad_administradora->setRutRepresentanteLegal($fila[6]);
            $entidad_administradora->setTelefonoRepresentanteLegal($fila[7]);
            $entidad_administradora->setEmailRepresentanteLegal($fila[8]);
            $entidad_administradoras[$i] = $entidad_administradora;
            $i++;
        }
        $this->conexion->desconectar();
        return $entidad_administradoras;
    }

    public function save($entidad_administradora) {
        $this->conexion->conectar();
        $query = "INSERT INTO entidad_administradora (idEntidadAdministradora,nombreEntidadAdministradora,rutEntidadAdministradora,provinciaEntidadAdministradora,regionEntidadAdministradora,representanteLegal,rutRepresentanteLegal,telefonoRepresentanteLegal,emailRepresentanteLegal)"
                . " VALUES ( " . $entidad_administradora->getIdEntidadAdministradora() . " , '" . $entidad_administradora->getNombreEntidadAdministradora() . "' , '" . $entidad_administradora->getRutEntidadAdministradora() . "' , '" . $entidad_administradora->getProvinciaEntidadAdministradora() . "' , '" . $entidad_administradora->getRegionEntidadAdministradora() . "' , '" . $entidad_administradora->getRepresentanteLegal() . "' , '" . $entidad_administradora->getRutRepresentanteLegal() . "', " . $entidad_administradora->getTelefonoRepresentanteLegal() . " , '" . $entidad_administradora->getEmailRepresentanteLegal() . "' )";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

    public function update($entidad_administradora) {
        $this->conexion->conectar();
        $query = "UPDATE entidad_administradora SET "
                . "  nombreEntidadAdministradora = '" . $entidad_administradora->getNombreEntidadAdministradora() . "' ,"
                . "  rutEntidadAdministradora = '" . $entidad_administradora->getRutEntidadAdministradora() . "' ,"
                . "  provinciaEntidadAdministradora = '" . $entidad_administradora->getProvinciaEntidadAdministradora() . "' ,"
                . "  regionEntidadAdministradora = '" . $entidad_administradora->getRegionEntidadAdministradora() . "' ,"
                . "  representanteLegal = '" . $entidad_administradora->getRepresentanteLegal() . "' ,"
                . "  rutRepresentanteLegal = '" . $entidad_administradora->getRutRepresentanteLegal() . "' ,"
                . "  telefonoRepresentanteLegal =  " . $entidad_administradora->getTelefonoRepresentanteLegal() . " ,"
                . "  emailRepresentanteLegal = '" . $entidad_administradora->getEmailRepresentanteLegal() . "' "
                . " WHERE  idEntidadAdministradora =  " . $entidad_administradora->getIdEntidadAdministradora() . " ";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

}
