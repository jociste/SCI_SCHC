<?php
include_once 'Nucleo/ConexionMySQL.php';
include_once '../../Modelo/Datos_generalesDTO.php';

class Datos_generalesDAO{
    private $conexion;

    public function Datos_generalesDAO() {
        $this->conexion = new ConexionMySQL();
    }

    public function delete($codigoEstablecimiento) {
        $this->conexion->conectar();
        $query = "DELETE FROM datos_generales WHERE  codigoEstablecimiento =  ".$codigoEstablecimiento." ";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

    public function findAll() {
        $this->conexion->conectar();
        $query = "SELECT * FROM datos_generales";
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $datos_generaless = array();
        while ($fila = $result->fetch_row()) {
            $datos_generales = new Datos_generalesDTO();
            $datos_generales->setCodigoEstablecimiento($fila[0]);
            $datos_generales->setNombreEstablecimiento($fila[1]);
            $datos_generales->setDireccionCalleEstablecimiento($fila[2]);
            $datos_generales->setDireccionNumeroEstablecimiento($fila[3]);
            $datos_generales->setCiudadEstablecimiento($fila[4]);
            $datos_generales->setRegionEstablecimiento($fila[5]);
            $datos_generales->setTelefonoEstablecimiento($fila[6]);
            $datos_generales->setEmailEstablecimiento($fila[7]);
            $datos_generales->setNombreEntidadAdministradora($fila[8]);
            $datos_generales->setRutEntidadAdministradora($fila[9]);
            $datos_generales->setProvinciaEntidadAdministradora($fila[10]);
            $datos_generales->setRegionEntidadAdministradora($fila[11]);
            $datos_generales->setRepresentanteLegal($fila[12]);
            $datos_generales->setRutRepresentanteLegal($fila[13]);
            $datos_generales->setTelefonoRepresentanteLegal($fila[14]);
            $datos_generales->setEmailRepresentanteLegal($fila[15]);
            $datos_generaless[$i] = $datos_generales;
            $i++;
        }
        $this->conexion->desconectar();
        return $datos_generaless;
    }

    public function findByID($codigoEstablecimiento) {
        $this->conexion->conectar();
        $query = "SELECT * FROM datos_generales WHERE  codigoEstablecimiento =  ".$codigoEstablecimiento." ";
        $result = $this->conexion->ejecutar($query);
        $datos_generales = new Datos_generalesDTO();
        while ($fila = $result->fetch_row()) {
            $datos_generales->setCodigoEstablecimiento($fila[0]);
            $datos_generales->setNombreEstablecimiento($fila[1]);
            $datos_generales->setDireccionCalleEstablecimiento($fila[2]);
            $datos_generales->setDireccionNumeroEstablecimiento($fila[3]);
            $datos_generales->setCiudadEstablecimiento($fila[4]);
            $datos_generales->setRegionEstablecimiento($fila[5]);
            $datos_generales->setTelefonoEstablecimiento($fila[6]);
            $datos_generales->setEmailEstablecimiento($fila[7]);
            $datos_generales->setNombreEntidadAdministradora($fila[8]);
            $datos_generales->setRutEntidadAdministradora($fila[9]);
            $datos_generales->setProvinciaEntidadAdministradora($fila[10]);
            $datos_generales->setRegionEntidadAdministradora($fila[11]);
            $datos_generales->setRepresentanteLegal($fila[12]);
            $datos_generales->setRutRepresentanteLegal($fila[13]);
            $datos_generales->setTelefonoRepresentanteLegal($fila[14]);
            $datos_generales->setEmailRepresentanteLegal($fila[15]);
        }
        $this->conexion->desconectar();
        return $datos_generales;
    }

    public function findLikeAtrr($cadena) {
        $this->conexion->conectar();
        $query = "SELECT * FROM datos_generales WHERE  upper(codigoEstablecimiento) LIKE upper(".$cadena.")  OR  upper(nombreEstablecimiento) LIKE upper('".$cadena."')  OR  upper(direccionCalleEstablecimiento) LIKE upper('".$cadena."')  OR  upper(direccionNumeroEstablecimiento) LIKE upper(".$cadena.")  OR  upper(ciudadEstablecimiento) LIKE upper('".$cadena."')  OR  upper(regionEstablecimiento) LIKE upper('".$cadena."')  OR  upper(telefonoEstablecimiento) LIKE upper(".$cadena.")  OR  upper(emailEstablecimiento) LIKE upper('".$cadena."')  OR  upper(nombreEntidadAdministradora) LIKE upper('".$cadena."')  OR  upper(rutEntidadAdministradora) LIKE upper('".$cadena."')  OR  upper(provinciaEntidadAdministradora) LIKE upper('".$cadena."')  OR  upper(regionEntidadAdministradora) LIKE upper('".$cadena."')  OR  upper(representanteLegal) LIKE upper('".$cadena."')  OR  upper(telefonoRepresentanteLegal) LIKE upper(".$cadena.")  OR  upper(emailRepresentanteLegal) LIKE upper('".$cadena."') ";
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $datos_generaless = array();
        while ($fila = $result->fetch_row()) {
            $datos_generales = new Datos_generalesDTO();
            $datos_generales->setCodigoEstablecimiento($fila[0]);
            $datos_generales->setNombreEstablecimiento($fila[1]);
            $datos_generales->setDireccionCalleEstablecimiento($fila[2]);
            $datos_generales->setDireccionNumeroEstablecimiento($fila[3]);
            $datos_generales->setCiudadEstablecimiento($fila[4]);
            $datos_generales->setRegionEstablecimiento($fila[5]);
            $datos_generales->setTelefonoEstablecimiento($fila[6]);
            $datos_generales->setEmailEstablecimiento($fila[7]);
            $datos_generales->setNombreEntidadAdministradora($fila[8]);
            $datos_generales->setRutEntidadAdministradora($fila[9]);
            $datos_generales->setProvinciaEntidadAdministradora($fila[10]);
            $datos_generales->setRegionEntidadAdministradora($fila[11]);
            $datos_generales->setRepresentanteLegal($fila[12]);
            $datos_generales->setRutRepresentanteLegal($fila[13]);
            $datos_generales->setTelefonoRepresentanteLegal($fila[14]);
            $datos_generales->setEmailRepresentanteLegal($fila[15]);
            $datos_generaless[$i] = $datos_generales;
            $i++;
        }
        $this->conexion->desconectar();
        return $datos_generaless;
    }

    public function save($datos_generales) {
        $this->conexion->conectar();
        $query = "INSERT INTO datos_generales (codigoEstablecimiento,nombreEstablecimiento,direccionCalleEstablecimiento,direccionNumeroEstablecimiento,ciudadEstablecimiento,regionEstablecimiento,telefonoEstablecimiento,emailEstablecimiento,nombreEntidadAdministradora,rutEntidadAdministradora,provinciaEntidadAdministradora,regionEntidadAdministradora,representanteLegal,rutRepresentanteLegal,telefonoRepresentanteLegal,emailRepresentanteLegal)"
                . " VALUES ( ".$datos_generales->getCodigoEstablecimiento()." , '".$datos_generales->getNombreEstablecimiento()."' , '".$datos_generales->getDireccionCalleEstablecimiento()."' ,  ".$datos_generales->getDireccionNumeroEstablecimiento()." , '".$datos_generales->getCiudadEstablecimiento()."' , '".$datos_generales->getRegionEstablecimiento()."' ,  ".$datos_generales->getTelefonoEstablecimiento()." , '".$datos_generales->getEmailEstablecimiento()."' , '".$datos_generales->getNombreEntidadAdministradora()."' , '".$datos_generales->getRutEntidadAdministradora()."' , '".$datos_generales->getProvinciaEntidadAdministradora()."' , '".$datos_generales->getRegionEntidadAdministradora()."' , '".$datos_generales->getRepresentanteLegal()."', '".$datos_generales->getRutRepresentanteLegal()."' ,  ".$datos_generales->getTelefonoRepresentanteLegal()." , '".$datos_generales->getEmailRepresentanteLegal()."' )";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

    public function update($datos_generales) {
        $this->conexion->conectar();
        $query = "UPDATE datos_generales SET "
                . "  nombreEstablecimiento = '".$datos_generales->getNombreEstablecimiento()."' ,"
                . "  direccionCalleEstablecimiento = '".$datos_generales->getDireccionCalleEstablecimiento()."' ,"
                . "  direccionNumeroEstablecimiento =  ".$datos_generales->getDireccionNumeroEstablecimiento()." ,"
                . "  ciudadEstablecimiento = '".$datos_generales->getCiudadEstablecimiento()."' ,"
                . "  regionEstablecimiento = '".$datos_generales->getRegionEstablecimiento()."' ,"
                . "  telefonoEstablecimiento =  ".$datos_generales->getTelefonoEstablecimiento()." ,"
                . "  emailEstablecimiento = '".$datos_generales->getEmailEstablecimiento()."' ,"
                . "  nombreEntidadAdministradora = '".$datos_generales->getNombreEntidadAdministradora()."' ,"
                . "  rutEntidadAdministradora = '".$datos_generales->getRutEntidadAdministradora()."' ,"
                . "  provinciaEntidadAdministradora = '".$datos_generales->getProvinciaEntidadAdministradora()."' ,"
                . "  regionEntidadAdministradora = '".$datos_generales->getRegionEntidadAdministradora()."' ,"
                . "  representanteLegal = '".$datos_generales->getRepresentanteLegal()."' ,"
                . "  rutRepresentanteLegal = '".$datos_generales->getRutRepresentanteLegal()."' ,"
                . "  telefonoRepresentanteLegal =  ".$datos_generales->getTelefonoRepresentanteLegal()." ,"
                . "  emailRepresentanteLegal = '".$datos_generales->getEmailRepresentanteLegal()."' "
                . " WHERE  codigoEstablecimiento =  ".$datos_generales->getCodigoEstablecimiento()." ";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }
}