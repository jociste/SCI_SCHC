<?php

include_once 'Nucleo/ConexionMySQL.php';
include_once '../../Modelo/Funcionaria_cargoDTO.php';

class Funcionaria_cargoDAO {

    private $conexion;

    public function Funcionaria_cargoDAO() {
        $this->conexion = new ConexionMySQL();
    }

    public function delete($idCargo) {
        $this->conexion->conectar();
        $query = "DELETE FROM funcionaria_cargo WHERE  idCargo =  " . $idCargo . " ";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

    public function findAll() {
        $this->conexion->conectar();
        $query = "SELECT * FROM funcionaria_cargo";
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $funcionaria_cargos = array();
        while ($fila = $result->fetch_row()) {
            $funcionaria_cargo = new Funcionaria_cargoDTO();
            $funcionaria_cargo->setIdCargo($fila[0]);
            $funcionaria_cargo->setRunFuncionaria($fila[1]);
            $funcionaria_cargo->setFechaInicio($fila[2]);
            $funcionaria_cargo->setFechaTermino($fila[3]);
            $funcionaria_cargos[$i] = $funcionaria_cargo;
            $i++;
        }
        $this->conexion->desconectar();
        return $funcionaria_cargos;
    }

    public function findByID($idCargoFuncionaria) {
        $this->conexion->conectar();
        $query = "SELECT * FROM funcionaria_cargo WHERE  idCargoFuncionaria =  " . $idCargoFuncionaria . " ";
        $result = $this->conexion->ejecutar($query);
        $funcionaria_cargo = new Funcionaria_cargoDTO();
        while ($fila = $result->fetch_row()) {
            $funcionaria_cargo->setIdCargoFuncionaria($fila[0]);
            $funcionaria_cargo->setIdCargo($fila[1]);
            $funcionaria_cargo->setRunFuncionaria($fila[2]);
            $funcionaria_cargo->setFechaInicio($fila[3]);
            $funcionaria_cargo->setFechaTermino($fila[4]);
        }
        $this->conexion->desconectar();
        return $funcionaria_cargo;
    }

    public function findByIDOPC($runFuncionaria) {
        $this->conexion->conectar();
        $query = "select fc.runFuncionaria, fc.fechainicio, fc.fechaTermino , c.nombre , fc.idCargoFuncionaria, c.idCargo from funcionaria_cargo fc
        join cargo as c on c.idCargo = fc.idCargo
        where fc.runFuncionaria = " . $runFuncionaria . " order by fc.fechainicio";
        $result = $this->conexion->ejecutar($query);
        $funcionarias = array();
        $i=0;
        while ($fila = $result->fetch_row()) {
            $funcionaria_cargo = new Funcionaria_cargoDTO();
            $funcionaria_cargo->setRunFuncionaria($fila[0]);
            $funcionaria_cargo->setFechaInicio($fila[1]);
            $funcionaria_cargo->setFechaTermino($fila[2]);
            $funcionaria_cargo->setNombreCargo($fila[3]);
            $funcionaria_cargo->setIdCargoFuncionaria($fila[4]);
            $funcionaria_cargo->setIdCargo($fila[5]);
            $funcionaria_cargo->setIdCargoTmp($fila[5]);
            $funcionarias[$i] = $funcionaria_cargo;
            $i++;
        }
        $this->conexion->desconectar();
        return $funcionarias;
    }

    public function cargoRecienteByRun($runFuncionaria) {
        $this->conexion->conectar();
        $query = "select FC.idCargoFuncionaria, C.idCargo, FC.runFuncionaria, FC.fechaInicio, FC.fechaTermino, C.nombre from funcionaria_cargo AS FC JOIN cargo AS C ON C.idCargo = FC.idCargo WHERE FC.runFuncionaria = '$runFuncionaria' ORDER BY FC.fechaInicio DESC LIMIT 0,1 ";
        $result = $this->conexion->ejecutar($query);
        $funcionaria_cargo = new Funcionaria_cargoDTO();
        while ($fila = $result->fetch_row()) {
            $funcionaria_cargo->setIdCargoFuncionaria($fila[0]);
            $funcionaria_cargo->setIdCargo($fila[1]);
            $funcionaria_cargo->setRunFuncionaria($fila[2]);
            $funcionaria_cargo->setFechaInicio($fila[3]);
            $funcionaria_cargo->setFechaTermino($fila[4]);
            $funcionaria_cargo->setNombreCargo($fila[5]);
        }
        $this->conexion->desconectar();
        return $funcionaria_cargo;
    }

    public function findLikeAtrr($cadena) {
        $this->conexion->conectar();
        $query = "SELECT * FROM funcionaria_cargo WHERE  upper(idCargo) LIKE upper(" . $cadena . ")  OR  upper(runFuncionaria) LIKE upper(" . $cadena . ")  OR  upper(fechaInicio) LIKE upper(" . $cadena . ")  OR  upper(fechaTermino) LIKE upper(" . $cadena . ") ";
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $funcionaria_cargos = array();
        while ($fila = $result->fetch_row()) {
            $funcionaria_cargo = new Funcionaria_cargoDTO();
            $funcionaria_cargo->setIdCargo($fila[0]);
            $funcionaria_cargo->setRunFuncionaria($fila[1]);
            $funcionaria_cargo->setFechaInicio($fila[2]);
            $funcionaria_cargo->setFechaTermino($fila[3]);
            $funcionaria_cargos[$i] = $funcionaria_cargo;
            $i++;
        }
        $this->conexion->desconectar();
        return $funcionaria_cargos;
    }

    public function save($funcionaria_cargo) {
        $this->conexion->conectar();
        $query = "INSERT INTO funcionaria_cargo (idCargoFuncionaria, idCargo,runFuncionaria,fechaInicio,fechaTermino)"
                . " VALUES (null, " . $funcionaria_cargo->getIdCargo() . " ,  " . $funcionaria_cargo->getRunFuncionaria() . " , '" . $funcionaria_cargo->getFechaInicio() . "' , '" . $funcionaria_cargo->getFechaTermino() . "' )";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

    public function update($funcionaria_cargo) {
        $this->conexion->conectar();
        $query = "UPDATE funcionaria_cargo SET "
                . "  fechaInicio = '" . $funcionaria_cargo->getFechaInicio() . "' ,"
                . "  fechaTermino = '" . $funcionaria_cargo->getFechaTermino() . "' "
                . " WHERE  idCargo =  " . $funcionaria_cargo->getIdCargo() . " AND runFuncionaria = " . $funcionaria_cargo->getRunFuncionaria();
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

}
