<?php

include_once 'Nucleo/ConexionMySQL.php';
include_once '../../Modelo/EstablecimientoDTO.php';
include_once '../../Modelo/Entidad_administradoraDTO.php';

class EstablecimientoDAO {

    private $conexion;

    public function EstablecimientoDAO() {
        $this->conexion = new ConexionMySQL();
    }

    public function delete($codigoEstablecimiento) {
        $this->conexion->conectar();
        $query = "DELETE FROM establecimiento WHERE  codigoEstablecimiento =  " . $codigoEstablecimiento . " ";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

    public function findAll() {
        $this->conexion->conectar();
        $query = "SELECT E.codigoEstablecimiento, E.idEntidadAdministradora, E.nombreEstablecimiento, E.direccionCalleEstablecimiento, E.direccionNumeroEstablecimiento, E.ciudadEstablecimiento, E.regionEstablecimiento, E.telefonoEstablecimiento, E.emailEstablecimiento, "
                . " EA.nombreEntidadAdministradora, EA.rutEntidadAdministradora, EA.provinciaEntidadAdministradora, EA.regionEntidadAdministradora, EA.representanteLegal, EA.rutRepresentanteLegal, EA.telefonoRepresentanteLegal, EA.emailRepresentanteLegal "
                . " FROM establecimiento E JOIN entidad_administradora EA ON E.idEntidadAdministradora = EA.idEntidadAdministradora ";
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $establecimientos = array();
        while ($fila = $result->fetch_row()) {
            $establecimiento = new EstablecimientoDTO();
            $establecimiento->setCodigoEstablecimiento($fila[0]);
            $establecimiento->setIdEntidadAdministradora($fila[1]);
            $establecimiento->setNombreEstablecimiento($fila[2]);
            $establecimiento->setDireccionCalleEstablecimiento($fila[3]);
            $establecimiento->setDireccionNumeroEstablecimiento($fila[4]);
            $establecimiento->setCiudadEstablecimiento($fila[5]);
            $establecimiento->setRegionEstablecimiento($fila[6]);
            $establecimiento->setTelefonoEstablecimiento($fila[7]);
            $establecimiento->setEmailEstablecimiento($fila[8]);
            
            $entidadAdministradora = new Entidad_administradoraDTO();
            $entidadAdministradora->setIdEntidadAdministradora($fila[1]);
            $entidadAdministradora->setNombreEntidadAdministradora($fila[9]);
            $entidadAdministradora->setRutEntidadAdministradora($fila[10]);
            $entidadAdministradora->setProvinciaEntidadAdministradora($fila[11]);
            $entidadAdministradora->setRegionEntidadAdministradora($fila[12]);
            $entidadAdministradora->setRepresentanteLegal($fila[13]);
            $entidadAdministradora->setRutRepresentanteLegal($fila[14]);
            $entidadAdministradora->setTelefonoRepresentanteLegal($fila[15]);
            $entidadAdministradora->setEmailRepresentanteLegal($fila[16]);
            
            $establecimiento->setEntidadAdministradora($entidadAdministradora);
            $establecimientos[$i] = $establecimiento;
            $i++;
        }
        $this->conexion->desconectar();
        return $establecimientos;
    }

    public function findByID($codigoEstablecimiento) {
        $this->conexion->conectar();
        $query = "SELECT * FROM establecimiento WHERE  codigoEstablecimiento =  " . $codigoEstablecimiento . " ";
        $result = $this->conexion->ejecutar($query);
        $establecimiento = new EstablecimientoDTO();
        while ($fila = $result->fetch_row()) {
            $establecimiento->setCodigoEstablecimiento($fila[0]);
            $establecimiento->setIdEntidadAdministradora($fila[1]);
            $establecimiento->setNombreEstablecimiento($fila[2]);
            $establecimiento->setDireccionCalleEstablecimiento($fila[3]);
            $establecimiento->setDireccionNumeroEstablecimiento($fila[4]);
            $establecimiento->setCiudadEstablecimiento($fila[5]);
            $establecimiento->setRegionEstablecimiento($fila[6]);
            $establecimiento->setTelefonoEstablecimiento($fila[7]);
            $establecimiento->setEmailEstablecimiento($fila[8]);
        }
        $this->conexion->desconectar();
        return $establecimiento;
    }

    public function findLikeAtrr($cadena) {
        $this->conexion->conectar();
        $query = "SELECT * FROM establecimiento WHERE  upper(codigoEstablecimiento) LIKE upper(" . $cadena . ")  OR  upper(idEntidadAdministradora) LIKE upper(" . $cadena . ")  OR  upper(nombreEstablecimiento) LIKE upper('" . $cadena . "')  OR  upper(direccionCalleEstablecimiento) LIKE upper('" . $cadena . "')  OR  upper(direccionNumeroEstablecimiento) LIKE upper(" . $cadena . ")  OR  upper(ciudadEstablecimiento) LIKE upper('" . $cadena . "')  OR  upper(regionEstablecimiento) LIKE upper('" . $cadena . "')  OR  upper(telefonoEstablecimiento) LIKE upper(" . $cadena . ")  OR  upper(emailEstablecimiento) LIKE upper('" . $cadena . "') ";
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $establecimientos = array();
        while ($fila = $result->fetch_row()) {
            $establecimiento = new EstablecimientoDTO();
            $establecimiento->setCodigoEstablecimiento($fila[0]);
            $establecimiento->setIdEntidadAdministradora($fila[1]);
            $establecimiento->setNombreEstablecimiento($fila[2]);
            $establecimiento->setDireccionCalleEstablecimiento($fila[3]);
            $establecimiento->setDireccionNumeroEstablecimiento($fila[4]);
            $establecimiento->setCiudadEstablecimiento($fila[5]);
            $establecimiento->setRegionEstablecimiento($fila[6]);
            $establecimiento->setTelefonoEstablecimiento($fila[7]);
            $establecimiento->setEmailEstablecimiento($fila[8]);
            $establecimientos[$i] = $establecimiento;
            $i++;
        }
        $this->conexion->desconectar();
        return $establecimientos;
    }

    public function save($establecimiento) {
        $this->conexion->conectar();
        $query = "INSERT INTO establecimiento (codigoEstablecimiento,idEntidadAdministradora,nombreEstablecimiento,direccionCalleEstablecimiento,direccionNumeroEstablecimiento,ciudadEstablecimiento,regionEstablecimiento,telefonoEstablecimiento,emailEstablecimiento)"
                . " VALUES ( " . $establecimiento->getCodigoEstablecimiento() . " ,  " . $establecimiento->getIdEntidadAdministradora() . " , '" . $establecimiento->getNombreEstablecimiento() . "' , '" . $establecimiento->getDireccionCalleEstablecimiento() . "' ,  " . $establecimiento->getDireccionNumeroEstablecimiento() . " , '" . $establecimiento->getCiudadEstablecimiento() . "' , '" . $establecimiento->getRegionEstablecimiento() . "' ,  " . $establecimiento->getTelefonoEstablecimiento() . " , '" . $establecimiento->getEmailEstablecimiento() . "' )";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

    public function update($establecimiento) {
        $this->conexion->conectar();
        $query = "UPDATE establecimiento SET "
                . "  idEntidadAdministradora =  " . $establecimiento->getIdEntidadAdministradora() . " ,"
                . "  nombreEstablecimiento = '" . $establecimiento->getNombreEstablecimiento() . "' ,"
                . "  direccionCalleEstablecimiento = '" . $establecimiento->getDireccionCalleEstablecimiento() . "' ,"
                . "  direccionNumeroEstablecimiento =  " . $establecimiento->getDireccionNumeroEstablecimiento() . " ,"
                . "  ciudadEstablecimiento = '" . $establecimiento->getCiudadEstablecimiento() . "' ,"
                . "  regionEstablecimiento = '" . $establecimiento->getRegionEstablecimiento() . "' ,"
                . "  telefonoEstablecimiento =  " . $establecimiento->getTelefonoEstablecimiento() . " ,"
                . "  emailEstablecimiento = '" . $establecimiento->getEmailEstablecimiento() . "' "
                . " WHERE  codigoEstablecimiento =  " . $establecimiento->getCodigoEstablecimiento() . " ";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

}
