<?php

include_once '../../Controlador/SCI_SCHC.php';

$control = SCI_SCHC::getInstancia();

$accion = htmlspecialchars($_REQUEST['accion']);
if ($accion != null) {
    if ($accion == "LISTADO") {
        $funcionarias = $control->getAllFuncionarias();
        $json = json_encode($funcionarias);
        echo $json;
    }//listo
    if ($accion == "LISTADOHABILITADAS") {
        $funcionarias = $control->getAllFuncionariasHabilitadas();
        for ($i = 0; $i < count($funcionarias); $i++) {
            $cargo = $control->cargoFuncionariaRecienteByRun($funcionarias[$i]->getRunFuncionaria());
            $nivel = $control->nivelFuncionariaRecienteByRun($funcionarias[$i]->getRunFuncionaria());

            $funcionarias[$i]->setIdCargoFuncionaria($cargo->getIdCargoFuncionaria());
            $funcionarias[$i]->setIdCargo($cargo->getIdCargo());
            $funcionarias[$i]->setFechaInicio($cargo->getFechaInicio());
            $funcionarias[$i]->setFechaTermino($cargo->getFechaTermino());
            $funcionarias[$i]->setNombreCargo($cargo->getNombreCargo());

            $funcionarias[$i]->setIdNivelFuncionaria($nivel->getIdNivelFuncionaria());
            $funcionarias[$i]->setIdNivel($nivel->getIdNivel());
            $funcionarias[$i]->setFechaInicioNivel($nivel->getFechaInicio());
            $funcionarias[$i]->setFechaTerminoNivel($nivel->getFechaTermino());
            $funcionarias[$i]->setNombreNivel($nivel->getNombreNivel());
        }

        $json = json_encode($funcionarias);
        echo $json;
    }//listo
    if ($accion == "REESTABLECER_FUNCIONARIA") {
        $runFuncionaria = htmlspecialchars($_REQUEST['runFuncionaria']);
        $funcionaria = $control->getFuncionariaByID($runFuncionaria);
        $funcionaria->setIndicadorVigente(1);
        $resultFuncionaria = $control->updateFuncionaria($funcionaria);
        if ($resultFuncionaria) {
            echo json_encode(array(
                'success' => true,
                'mensaje' => "Funcionaria actualizada correctamente"
            ));
        } else {
            echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
        }
    }//listo

    if ($accion == "LISTADODESHABILITADAS") {
        $funcionarias = $control->getAllFuncionariasDesHabilitadas();
        for ($i = 0; $i < count($funcionarias); $i++) {
            $cargo = $control->cargoFuncionariaRecienteByRun($funcionarias[$i]->getRunFuncionaria());
            $nivel = $control->nivelFuncionariaRecienteByRun($funcionarias[$i]->getRunFuncionaria());

            $funcionarias[$i]->setIdCargoFuncionaria($cargo->getIdCargoFuncionaria());
            $funcionarias[$i]->setIdCargo($cargo->getIdCargo());
            $funcionarias[$i]->setFechaInicio($cargo->getFechaInicio());
            $funcionarias[$i]->setFechaTermino($cargo->getFechaTermino());
            $funcionarias[$i]->setNombreCargo($cargo->getNombreCargo());

            $funcionarias[$i]->setIdNivelFuncionaria($nivel->getIdNivelFuncionaria());
            $funcionarias[$i]->setIdNivel($nivel->getIdNivel());
            $funcionarias[$i]->setFechaInicioNivel($nivel->getFechaInicio());
            $funcionarias[$i]->setFechaTerminoNivel($nivel->getFechaTermino());
            $funcionarias[$i]->setNombreNivel($nivel->getNombreNivel());
        }

        $json = json_encode($funcionarias);
        echo $json;
    }//listo
    else if ($accion == "AGREGAR") {
        // Funcionaria
        $runFuncionaria = htmlspecialchars($_REQUEST['runFuncionaria']);
        $runFuncionaria = substr($runFuncionaria, 0, -1);

        $clave = htmlspecialchars($_REQUEST['clave']);
        $nombres = htmlspecialchars($_REQUEST['nombres']);
        $apellidos = htmlspecialchars($_REQUEST['apellidos']);
        $fechaNacimiento = htmlspecialchars($_REQUEST['fechaNacimiento']);
        $telefono = htmlspecialchars($_REQUEST['telefono']);
        $direccion = htmlspecialchars($_REQUEST['direccion']);
        $profesion = htmlspecialchars($_REQUEST['profesion']);
        $sexo = htmlspecialchars($_REQUEST['sexo']);
        //funcionariaCargo
        $idCargo = htmlspecialchars($_REQUEST['idCargo']);
        $fechaInicio = htmlspecialchars($_REQUEST['fechaInicio']);
        $fechaTermino = null;
        if (isset($_REQUEST['fechaTermino'])) {
            $fechaTermino = htmlspecialchars($_REQUEST['fechaTermino']);
        }
        // var_dump($fechaTermino);
        //funcionariaNivel
        $idNivel = htmlspecialchars($_REQUEST['idNivel']);
        $fechaInicioNivel = htmlspecialchars($_REQUEST['fechaInicioNivel']);
        $fechaTerminoNivel = null;
        if (isset($_REQUEST['fechaTerminoNivel'])) {
            $fechaTerminoNivel = htmlspecialchars($_REQUEST['fechaTerminoNivel']);
        }
        $estado = 1;
        $object = $control->getFuncionariaByID($runFuncionaria);
        if (($object->getRunFuncionaria() == null || $object->getRunFuncionaria() == "")) {
            $funcionaria = new FuncionariaDTO();
            $funcionaria->setRunFuncionaria($runFuncionaria);
            $funcionaria->setClave($clave);
            $funcionaria->setNombres($nombres);
            $funcionaria->setApellidos($apellidos);
            $funcionaria->setFechaNacimiento($fechaNacimiento);
            $funcionaria->setTelefono($telefono);
            $funcionaria->setDireccion($direccion);
            $funcionaria->setProfesion($profesion);
            $funcionaria->setSexo($sexo);
            $funcionaria->setIndicadorVigente($estado);
            $funcionaria->setIdCargo($idCargo);
            $funcionaria->setFechaInicio($fechaInicio);
            $funcionaria->setFechaTermino($fechaTermino);
            $funcionaria->setIdNivel($idNivel);
            $funcionaria->setFechaInicio($fechaInicioNivel);
            $funcionaria->setFechaTermino($fechaTerminoNivel);

            $resultFuncionaria = $control->addFuncionaria($funcionaria);
            //Funcionaria - Cargo
            $funcionaria_cargo = new Funcionaria_cargoDTO();
            $funcionaria_cargo->setIdCargo($idCargo);
            $funcionaria_cargo->setRunFuncionaria($runFuncionaria);
            $funcionaria_cargo->setFechaInicio($fechaInicio);
            $funcionaria_cargo->setFechaTermino($fechaTermino);
            //Funcionaria-Nivel
            $nivel_funcionaria = new Nivel_funcionariaDTO();
            $nivel_funcionaria->setIdNivel($idNivel);
            $nivel_funcionaria->setRunFuncionaria($runFuncionaria);
            $nivel_funcionaria->setFechaInicio($fechaInicioNivel);
            $nivel_funcionaria->setFechaTermino($fechaTerminoNivel);
            //Resultados
            $resultNivelFuncionaria = $control->addNivel_funcionaria($nivel_funcionaria);
            $resultCargoFuncionaria = $control->addFuncionaria_cargo($funcionaria_cargo);

            if ($resultFuncionaria && $resultNivelFuncionaria && $resultCargoFuncionaria) {
                echo json_encode(array(
                    'success' => true,
                    'mensaje' => "Funcionaria ingresada correctamente"
                ));
            } else {
                echo json_encode(array('errorMsg' => 'Ha ocurrido un error. $fechaTermino ' . $fechaTermino));
            }
        } else {
            echo json_encode(array('errorMsg' => 'El o la funcionaria ya existe, intento nuevamente.'));
        }
    } //Listo
    else if ($accion == "BORRAR") {
        $runFuncionaria = htmlspecialchars($_REQUEST['runFuncionaria']);

        $funcionaria = $control->getFuncionariaByID($runFuncionaria);
        $funcionaria->setIndicadorVigente(0);
        $resultFuncionaria = $control->updateFuncionaria($funcionaria);

        $cargo = $control->cargoFuncionariaRecienteByRun($funcionaria->getRunFuncionaria());
        $nivel = $control->nivelFuncionariaRecienteByRun($funcionaria->getRunFuncionaria());

        $hoy = date('Y') . "-" . date('m') . "-" . date('d');

        $cargo->setFechaTermino($hoy);
        $resultCargoFuncionaria = $control->updateFuncionaria_cargo($cargo);

        $nivel->setFechaTermino($hoy);
        $resultNivelFuncionaria = $control->updateNivel_funcionaria($nivel);

        $result = $resultFuncionaria && $resultCargoFuncionaria && $resultNivelFuncionaria ? true : false;

        if ($result) {
            echo json_encode(array('success' => true, 'mensaje' => "Funcionaria Eliminada correctamente"));
        } else {
            echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
        }
    } else if ($accion == "BUSCAR") {
        $cadena = htmlspecialchars($_REQUEST['cadena']);
        $funcionarias = $control->getFuncionariaLikeAtrr($cadena);

        for ($i = 0; $i < count($funcionarias); $i++) {
            $cargo = $control->cargoFuncionariaRecienteByRun($funcionarias[$i]->getRunFuncionaria());
            $nivel = $control->nivelFuncionariaRecienteByRun($funcionarias[$i]->getRunFuncionaria());

            $funcionarias[$i]->setIdCargoFuncionaria($cargo->getIdCargoFuncionaria());
            $funcionarias[$i]->setIdCargo($cargo->getIdCargo());
            $funcionarias[$i]->setFechaInicio($cargo->getFechaInicio());
            $funcionarias[$i]->setFechaTermino($cargo->getFechaTermino());
            $funcionarias[$i]->setNombreCargo($cargo->getNombreCargo());

            $funcionarias[$i]->setIdNivelFuncionaria($nivel->getIdNivelFuncionaria());
            $funcionarias[$i]->setIdNivel($nivel->getIdNivel());
            $funcionarias[$i]->setFechaInicioNivel($nivel->getFechaInicio());
            $funcionarias[$i]->setFechaTerminoNivel($nivel->getFechaTermino());
            $funcionarias[$i]->setNombreNivel($nivel->getNombreNivel());
        }

        $json = json_encode($funcionarias);
        echo $json;
    } else if ($accion == "BUSCAR_BY_ID") {
        $runFuncionaria = htmlspecialchars($_REQUEST['runFuncionaria']);

        $funcionaria = $control->getFuncionariaByID($runFuncionaria);
        $cargo = $control->cargoFuncionariaRecienteByRun($funcionaria->getRunFuncionaria());
        $nivel = $control->nivelFuncionariaRecienteByRun($funcionaria->getRunFuncionaria());
        $funcionaria->setIdCargoFuncionaria($cargo->getIdCargoFuncionaria());

        $funcionaria->setIdCargo($cargo->getIdCargo());
        $funcionaria->setFechaInicio($cargo->getFechaInicio());
        $funcionaria->setFechaTermino($cargo->getFechaTermino());
        $funcionaria->setNombreCargo($cargo->getNombreCargo());

        $funcionaria->setIdNivelFuncionaria($nivel->getIdNivelFuncionaria());
        $funcionaria->setIdNivel($nivel->getIdNivel());
        $funcionaria->setFechaInicioNivel($nivel->getFechaInicio());
        $funcionaria->setFechaTerminoNivel($nivel->getFechaTermino());
        $funcionaria->setNombreNivel($nivel->getNombreNivel());

        $json = json_encode($funcionaria);
        echo $json;
    } else if ($accion == "ACTUALIZAR") {
        $hoy = date('Y') . "-" . date('m') . "-" . date('d');
        // recibe datos Funcionaria
        $runFuncionaria = htmlspecialchars($_REQUEST['runFuncionaria']);
        $runFuncionaria = substr($runFuncionaria, 0, -1);
        $clave = htmlspecialchars($_REQUEST['clave']);
        $nombres = htmlspecialchars($_REQUEST['nombres']);
        $apellidos = htmlspecialchars($_REQUEST['apellidos']);
        $fechaNacimiento = htmlspecialchars($_REQUEST['fechaNacimiento']);
        $telefono = htmlspecialchars($_REQUEST['telefono']);
        $direccion = htmlspecialchars($_REQUEST['direccion']);
        $profesion = htmlspecialchars($_REQUEST['profesion']);
        $sexo = htmlspecialchars($_REQUEST['sexo']);
        //var_dump($runFuncionaria);
        //buscar la funcionaria y la actualizo        
        $funcionaria = $control->getFuncionariaById($runFuncionaria);
        $funcionaria->setRunFuncionaria($runFuncionaria);
        $funcionaria->setClave($clave);
        $funcionaria->setNombres($nombres);
        $funcionaria->setApellidos($apellidos);
        $funcionaria->setFechaNacimiento($fechaNacimiento);
        $funcionaria->setTelefono($telefono);
        $funcionaria->setDireccion($direccion);
        $funcionaria->setProfesion($profesion);
        $funcionaria->setSexo($sexo);
        $resultFuncionaria = $control->updateFuncionaria($funcionaria);
        //funcionariaCargo
        $idCargoFuncionaria = htmlspecialchars($_REQUEST['idCargoFuncionariaEditar']);
        $idCargoNuevo = htmlspecialchars($_REQUEST['idCargo']);
        $idCargoAnterior = htmlspecialchars($_REQUEST['idCargoEditar']);
        $fechaInicio = htmlspecialchars($_REQUEST['fechaInicio']);
        $fechaTermino = null;
        if (isset($_REQUEST['fechaTermino'])) {
            $fechaTermino = htmlspecialchars($_REQUEST['fechaTermino']);
        }
        $fechaPermitida = true;
        $resultCargoFuncionaria;
        $resultCargoFuncionariaNueva;
        $funcionaria_cargo = $control->getFuncionaria_CargoById($idCargoFuncionaria); //CARGO ACTUAL
        if ($idCargoNuevo == $idCargoAnterior) {//MANTIENE EL CARGO
            //$funcionaria_cargo->setFechaInicio($fechaInicio); //No modificar 
            $funcionaria_cargo->setFechaTermino($fechaTermino);
            $resultCargoFuncionaria = $control->updateFuncionaria_cargo($funcionaria_cargo);
        } else {//CAMBIO EL CARGO
            if ($funcionaria_cargo->getFechaTermino() == "0000-00-00") {//Si el cargo anterior tenia fecha de termino respetar esa fecha.
                $funcionaria_cargo->setFechaTermino($hoy);
            }else if($funcionaria_cargo->getFechaTermino() > $hoy){
                $funcionaria_cargo->setFechaTermino($hoy);
            }
            
            
            $funcionaria_cargo_nueva = new Funcionaria_cargoDTO();
            $funcionaria_cargo_nueva->setIdCargo($idCargoNuevo);
            $funcionaria_cargo_nueva->setRunFuncionaria($runFuncionaria);
            $funcionaria_cargo_nueva->setFechaInicio($fechaInicio);
            $funcionaria_cargo_nueva->setFechaTermino($fechaTermino);

            if ($funcionaria_cargo->getFechaTermino() > $fechaInicio) {//Validar que la fecha de inicio del nuevo cargo sea mayor a la de termnino del cargo anterior
                $fechaPermitida = false;
            } else {
                $resultCargoFuncionaria = $control->updateFuncionaria_cargo($funcionaria_cargo);
                $resultCargoFuncionariaNueva = $control->addFuncionaria_Cargo($funcionaria_cargo_nueva);
            }
        }
        $fechaPermitidaNivel = true;
        if ($fechaPermitida) {//VALIDAR QUE LA EDICION DEL CARGO ESTE CORRECTO
            //funcionariaNivel
            $idNivelFuncionaria = htmlspecialchars($_REQUEST['idNivelFuncionariaEditar']);
            $idNivelNuevo = htmlspecialchars($_REQUEST['idNivel']);
            $idNivelAnterior = htmlspecialchars($_REQUEST['idNivelEditar']);
            $fechaInicioNivel = htmlspecialchars($_REQUEST['fechaInicioNivel']);
            $fechaTerminoNivel = null;
            if (isset($_REQUEST['fechaTerminoNivel'])) {
                $fechaTerminoNivel = htmlspecialchars($_REQUEST['fechaTerminoNivel']);
            }
            $nivel_funcionaria = $control->getNivel_FuncionariaById($idNivelFuncionaria);
            if ($idNivelNuevo == $idNivelAnterior) {//No se modifico el nivel
                $nivel_funcionaria->setFechaInicio($fechaInicioNivel); //No modificar 
                $nivel_funcionaria->setFechaTermino($fechaTerminoNivel);
                if ($fechaTerminoNivel <= $fechaTermino) {//la fecha de termino del nivel debe ser menor o igual a la de termino del contrato
                    $resultNivelFuncionaria = $control->updateNivel_funcionaria($nivel_funcionaria);
                } else {
                    $fechaPermitidaNivel = false;
                }
            } else {
                if ($nivel_funcionaria->getFechaTermino() == "0000-00-00") {//Si el cargo anterior tenia fecha de termino respetar esa fecha.
                    $nivel_funcionaria->setFechaTermino($hoy);
                }                

                $resultNivelFuncionaria = $control->updateNivel_funcionaria($nivel_funcionaria);
                $nivel_funcionaria_nueva = new Nivel_funcionariaDTO();
                $nivel_funcionaria_nueva->setIdNivel($idNivelNuevo);
                $nivel_funcionaria_nueva->setRunFuncionaria($runFuncionaria);
                $nivel_funcionaria_nueva->setFechaInicio($fechaInicioNivel);
                $nivel_funcionaria_nueva->setFechaTermino($fechaTerminoNivel);

                if ($fechaTerminoNivel <= $fechaTermino) {//la fecha de termino del nivel debe ser menor o igual a la de termino del contrato
                    if ($nivel_funcionaria->getFechaTermino() < $fechaInicioNivel) {//Validar que la fecha de inicio del nuevo nivel sea mayor a la de termino del nivel anterior
                        $resultNivelFuncionariaNueva = $control->addNivel_funcionaria($nivel_funcionaria_nueva);
                    } else {
                        $fechaPermitidaNivel = false;
                    }
                } else {
                    $fechaPermitidaNivel = false;
                }
            }

            if ($fechaPermitidaNivel) {//Si la fecha del nivel es correcta
                $result = $resultFuncionaria && ($resultCargoFuncionaria || ($resultCargoFuncionaria && $resultCargoFuncionariaNueva)) && ($resultNivelFuncionaria || ($resultNivelFuncionaria && $resultNivelFuncionariaNueva)) ? true : false;

                if ($result) {
                    echo json_encode(array(
                        'success' => true,
                        'mensaje' => "Funcionaria actualizada correctamente"
                    ));
                } else {
                    echo json_encode(array('errorMsg' => 'Ha ocurrido un error.' . $resultNivelFuncionaria));
                }
            } else {
                echo json_encode(array('errorMsg' => 'La fecha de termino del nivel tiene que ser menor a la de termino del contrato, y/o la fecha de inicio debe ser mayor a la de termino del nivel anterior.'));
            }
        } else {
            echo json_encode(array('errorMsg' => 'La fecha de inicio del nuevo cargo debe ser mayor a ' . $funcionaria_cargo->getFechaTermino()));
        }
    } else if ($accion == "ACTUALIZAR_MI_PERFIL_FUNCIONARIA") {
        $RunFuncionaria = htmlspecialchars($_REQUEST['runFuncionariaEditar']);
        $telefono = htmlspecialchars($_REQUEST['telefono']);
        $direccion = htmlspecialchars($_REQUEST['direccion']);
        $clave = htmlspecialchars($_REQUEST['clave']);
        $funcionaria = $control->getFuncionariaById($RunFuncionaria);
        $funcionaria->setTelefono($telefono);
        $funcionaria->setDireccion($direccion);
        $funcionaria->setClave($clave);
        $resultFuncionaria = $control->updateFuncionaria($funcionaria);
        if ($resultFuncionaria) {
            echo json_encode(array(
                'success' => true,
                'mensaje' => "Datos actualizados correctamente"
            ));
        } else {
            echo json_encode(array('errorMsg' => 'El usuario no pudo ser Actualizado'));
        }
    } //Listo
}
    