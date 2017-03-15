<?php

include_once 'Nucleo/ConexionMySQL.php';
include_once '../../Modelo/FuncionariaDTO.php';

class FuncionariaDAO {

    private $conexion;

    public function FuncionariaDAO() {
        $this->conexion = new ConexionMySQL();
    }

    public function delete($runFuncionaria) {
        $this->conexion->conectar();
        $query = "DELETE FROM funcionaria WHERE  runFuncionaria =  " . $runFuncionaria . " ";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

//lo uso
    public function findAll() {
        $this->conexion->conectar();
        $query = "SELECT F.runFuncionaria, F.nombres, F.apellidos, F.fechaNacimiento, F.telefono, F.direccion, F.profesion, F.clave, F.sexo, FC.idCargo,"
                . " FC.fechaInicio, FC.fechaTermino, C.nombre, NF.idNivel, NF.fechaInicio, NF.fechaTermino, N.nombre FROM funcionaria as F left join "
                . "funcionaria_cargo as FC on FC.runFuncionaria = F.runfuncionaria join cargo as C on FC.idCargo = C.idCargo join nivel_funcionaria as "
                . "NF on NF.runFuncionaria = F.runFuncionaria join nivel as N on N.idNivel  = NF.idNivel";
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $funcionarias = array();
        while ($fila = $result->fetch_row()) {
            $funcionaria = new FuncionariaDTO();
            $funcionaria->setRunFuncionaria($fila[0]);
            $funcionaria->setNombres($fila[1]);
            $funcionaria->setApellidos($fila[2]);
            $funcionaria->setFechaNacimiento($fila[3]);
            $funcionaria->setTelefono($fila[4]);
            $funcionaria->setDireccion($fila[5]);
            $funcionaria->setProfesion($fila[6]);
            $funcionaria->setClave($fila[7]);
            $funcionaria->setSexo($fila[8]);
            $funcionaria->setIdCargo($fila[9]);
            $funcionaria->setFechaInicio($fila[10]);
            $funcionaria->setFechaTermino($fila[11]);
            $funcionaria->setNombreCargo($fila[12]);
            $funcionaria->setIdNivel($fila[13]);
            $funcionaria->setFechaInicioNivel($fila[14]);
            $funcionaria->setFechaTerminoNivel($fila[15]);
            $funcionaria->setNombreNivel($fila[16]);
            $funcionarias[$i] = $funcionaria;
            $i++;
        }
        $this->conexion->desconectar();
        return $funcionarias;
    }

    public function findByID($runFuncionaria) {
        $this->conexion->conectar();
        $query = "SELECT F.runFuncionaria, F.nombres, F.apellidos, F.fechaNacimiento, F.telefono, F.direccion, F.profesion, F.clave, F.sexo, F.indicadorVigente  From funcionaria AS F where F.runFuncionaria= '".$runFuncionaria."'";
        $result = $this->conexion->ejecutar($query);
        $funcionaria = new FuncionariaDTO();
        while ($fila = $result->fetch_row()) {
            $funcionaria->setRunFuncionaria($fila[0]);
            $funcionaria->setNombres($fila[1]);
            $funcionaria->setApellidos($fila[2]);
            $funcionaria->setFechaNacimiento($fila[3]);
            $funcionaria->setTelefono($fila[4]);
            $funcionaria->setDireccion($fila[5]);
            $funcionaria->setProfesion($fila[6]);
            $funcionaria->setClave($fila[7]);
            $funcionaria->setSexo($fila[8]);
            $funcionaria->setIndicadorVigente($fila[9]);
        }
        $this->conexion->desconectar();
        return $funcionaria;
    }

    //lO USO
    public function findHabilitados() {
        $this->conexion->conectar();
        $query = "SELECT F.runFuncionaria, F.nombres, F.apellidos, F.fechaNacimiento, F.telefono, F.direccion, F.profesion, F.clave, F.sexo FROM funcionaria as F WHERE F.indicadorVigente = 1 ";
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $funcionarias = array();
        while ($fila = $result->fetch_row()) {
            $funcionaria = new FuncionariaDTO();
            $funcionaria->setRunFuncionaria($fila[0]);
            $funcionaria->setNombres($fila[1]);
            $funcionaria->setApellidos($fila[2]);
            $funcionaria->setFechaNacimiento($fila[3]);
            $funcionaria->setTelefono($fila[4]);
            $funcionaria->setDireccion($fila[5]);
            $funcionaria->setProfesion($fila[6]);
            $funcionaria->setClave($fila[7]);
            $funcionaria->setSexo($fila[8]);
            $funcionarias[$i] = $funcionaria;
            $i++;
        }
        $this->conexion->desconectar();
        return $funcionarias;
    }

//lO USO
    public function findDesHabilitados() {
        $this->conexion->conectar();
        $query = "SELECT F.runFuncionaria, F.nombres, F.apellidos, F.fechaNacimiento, F.telefono, F.direccion, F.profesion, F.clave, F.sexo FROM funcionaria as F WHERE F.indicadorVigente = 0";
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $funcionarias = array();
        while ($fila = $result->fetch_row()) {
            $funcionaria = new FuncionariaDTO();
            $funcionaria->setRunFuncionaria($fila[0]);
            $funcionaria->setNombres($fila[1]);
            $funcionaria->setApellidos($fila[2]);
            $funcionaria->setFechaNacimiento($fila[3]);
            $funcionaria->setTelefono($fila[4]);
            $funcionaria->setDireccion($fila[5]);
            $funcionaria->setProfesion($fila[6]);
            $funcionaria->setClave($fila[7]);
            $funcionaria->setSexo($fila[8]);
            $funcionarias[$i] = $funcionaria;
            $i++;
        }
        $this->conexion->desconectar();
        return $funcionarias;
    }

    public function findLikeAtrr($cadena) {
        $this->conexion->conectar();
        $query = "SELECT * FROM funcionaria WHERE  upper(runFuncionaria) LIKE upper(" . $cadena . ")  OR  upper(clave) LIKE upper(" . $cadena . ")  OR  upper(nombres) LIKE upper('" . $cadena . "')  OR  upper(apellidos) LIKE upper('" . $cadena . "')  OR  upper(fechaNacimiento) LIKE upper('" . $cadena . "')  OR  upper(telefono) LIKE upper(" . $cadena . ")  OR  upper(direccion) LIKE upper('" . $cadena . "')  OR  upper(profesion) LIKE upper('" . $cadena . "')  OR  upper(sexo) LIKE upper('" . $cadena . "') ";
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $funcionarias = array();
        while ($fila = $result->fetch_row()) {
            $funcionaria = new FuncionariaDTO();
            $funcionaria->setRunFuncionaria($fila[0]);
            $funcionaria->setClave($fila[1]);
            $funcionaria->setNombres($fila[2]);
            $funcionaria->setApellidos($fila[3]);
            $funcionaria->setFechaNacimiento($fila[4]);
            $funcionaria->setTelefono($fila[5]);
            $funcionaria->setDireccion($fila[6]);
            $funcionaria->setProfesion($fila[7]);
            $funcionaria->setSexo($fila[8]);
            $funcionarias[$i] = $funcionaria;
            $i++;
        }
        $this->conexion->desconectar();
        return $funcionarias;
    }

    public function save($funcionaria) {
        $this->conexion->conectar();
        $query = "INSERT INTO funcionaria (runFuncionaria, codigoEstablecimiento, indicadorVigente, clave,nombres,apellidos,fechaNacimiento,telefono,direccion,profesion,sexo)"
                . " VALUES ( " . $funcionaria->getRunFuncionaria() . " , 8401017, " . $funcionaria->getIndicadorVigente() . " ,  " . $funcionaria->getClave() . " , '" . $funcionaria->getNombres() . "' , '" . $funcionaria->getApellidos() . "' , '" . $funcionaria->getFechaNacimiento() . "' ,  " . $funcionaria->getTelefono() . " , '" . $funcionaria->getDireccion() . "' , '" . $funcionaria->getProfesion() . "' , '" . $funcionaria->getSexo() . "' )";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

    public function update($funcionaria) {
        $this->conexion->conectar();
        $query = "UPDATE funcionaria SET "
                . "  clave =  " . $funcionaria->getClave() . " ,"
                . "  nombres = '" . $funcionaria->getNombres() . "' ,"
                . "  apellidos = '" . $funcionaria->getApellidos() . "' ,"
                . "  fechaNacimiento = '" . $funcionaria->getFechaNacimiento() . "' ,"
                . "  telefono =  " . $funcionaria->getTelefono() . " ,"
                . "  direccion = '" . $funcionaria->getDireccion() . "' ,"
                . "  profesion = '" . $funcionaria->getProfesion() . "' ,"
                . "  sexo = '" . $funcionaria->getSexo() . "', "
                . "  indicadorVigente = " . $funcionaria->getIndicadorVigente() . " "
                . " WHERE  runFuncionaria =  " . $funcionaria->getRunFuncionaria() . " ";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

}
