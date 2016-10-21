<?php
include_once 'Nucleo/ConexionMySQL.php';
include_once '../../Modelo/Nivel_funcionariaDTO.php';

class Nivel_funcionariaDAO{
    private $conexion;

    public function Nivel_funcionariaDAO() {
        $this->conexion = new ConexionMySQL();
    }

    public function delete($idNivel) {
        $this->conexion->conectar();
        $query = "DELETE FROM nivel_funcionaria WHERE  idNivel =  ".$idNivel." ";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

    public function findAll() {
        $this->conexion->conectar();
        $query = "SELECT * FROM nivel_funcionaria";
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $nivel_funcionarias = array();
        while ($fila = $result->fetch_row()) {
            $nivel_funcionaria = new Nivel_funcionariaDTO();
            $nivel_funcionaria->setIdNivel($fila[0]);
            $nivel_funcionaria->setRunFuncionaria($fila[1]);
            $nivel_funcionaria->setFechaInicio($fila[2]);
            $nivel_funcionaria->setFechaTermino($fila[3]);
            $nivel_funcionarias[$i] = $nivel_funcionaria;
            $i++;
        }
        $this->conexion->desconectar();
        return $nivel_funcionarias;
    }

    public function findByID($idNivelFuncionaria) {
        $this->conexion->conectar();
        $query = "SELECT * FROM nivel_funcionaria WHERE  idNivelFuncionaria =  ".$idNivelFuncionaria." ";
        $result = $this->conexion->ejecutar($query);
        $nivel_funcionaria = new Nivel_funcionariaDTO();
        while ($fila = $result->fetch_row()) {
            $nivel_funcionaria->setIdNivelFuncionaria($fila[0]);
            $nivel_funcionaria->setIdNivel($fila[1]);
            $nivel_funcionaria->setRunFuncionaria($fila[2]);
            $nivel_funcionaria->setFechaInicio($fila[3]);
            $nivel_funcionaria->setFechaTermino($fila[4]);
        }
        $this->conexion->desconectar();
        return $nivel_funcionaria;
    }
   public function nivelRecienteByRun($runFuncionaria){
       $this->conexion->conectar();
        $query = "SELECT NF.idNivelFuncionaria, NF.idNivel, NF.runFuncionaria, NF.fechaInicio, NF.fechaTermino, N.nombre FROM nivel_funcionaria AS NF JOIN nivel N ON NF.idNivel = N.idNivel WHERE NF.runFuncionaria = '$runFuncionaria' ORDER BY NF.fechaInicio DESC LIMIT 0,1";
        $result = $this->conexion->ejecutar($query);
        $nivel_funcionaria = new Nivel_funcionariaDTO();
        while ($fila = $result->fetch_row()) {
            $nivel_funcionaria->setIdNivelFuncionaria($fila[0]);
            $nivel_funcionaria->setIdNivel($fila[1]);
            $nivel_funcionaria->setRunFuncionaria($fila[2]);
            $nivel_funcionaria->setFechaInicio($fila[3]);
            $nivel_funcionaria->setFechaTermino($fila[4]);
            $nivel_funcionaria->setNombreNivel($fila[5]);
        }
        $this->conexion->desconectar();
        return $nivel_funcionaria;
   }
    
    public function findLikeAtrr($cadena) {
        $this->conexion->conectar();
        $query = "SELECT * FROM nivel_funcionaria WHERE  upper(idNivel) LIKE upper(".$cadena.")  OR  upper(runFuncionaria) LIKE upper(".$cadena.")  OR  upper(fechaInicio) LIKE upper(".$cadena.")  OR  upper(fechaTermino) LIKE upper(".$cadena.") ";
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $nivel_funcionarias = array();
        while ($fila = $result->fetch_row()) {
            $nivel_funcionaria = new Nivel_funcionariaDTO();
            $nivel_funcionaria->setIdNivel($fila[0]);
            $nivel_funcionaria->setRunFuncionaria($fila[1]);
            $nivel_funcionaria->setFechaInicio($fila[2]);
            $nivel_funcionaria->setFechaTermino($fila[3]);
            $nivel_funcionarias[$i] = $nivel_funcionaria;
            $i++;
        }
        $this->conexion->desconectar();
        return $nivel_funcionarias;
    }

    public function save($nivel_funcionaria) {
        $this->conexion->conectar();
        $query = "INSERT INTO nivel_funcionaria (idNivelFuncionaria, idNivel,runFuncionaria,fechaInicio,fechaTermino)"
                . " VALUES ( null, ".$nivel_funcionaria->getIdNivel()." ,  ".$nivel_funcionaria->getRunFuncionaria()." , '".$nivel_funcionaria->getFechaInicio()."' , '".$nivel_funcionaria->getFechaTermino()."' )";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

    public function update($nivel_funcionaria) {
        $this->conexion->conectar();
        $query = "UPDATE nivel_funcionaria SET "
                . "  fechaInicio = '".$nivel_funcionaria->getFechaInicio()."' ,"
                . "  fechaTermino = '".$nivel_funcionaria->getFechaTermino()."' "
                . " WHERE idNivel =  ".$nivel_funcionaria->getIdNivel()." AND runFuncionaria = ".$nivel_funcionaria->getRunFuncionaria();
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result."(".$query.")";
    }
}