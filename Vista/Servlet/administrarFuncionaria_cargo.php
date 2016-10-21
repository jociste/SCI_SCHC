<?php

include_once '../../Controlador/SCI_SCHC.php';

$control = SCI_SCHC::getInstancia();

$accion = htmlspecialchars($_REQUEST['accion']);
if ($accion != null) {
    if ($accion == "LISTADO") {
        $funcionaria_cargos = $control->getAllFuncionaria_cargos();
        $json = json_encode($funcionaria_cargos);
        echo $json;
    } else if ($accion == "AGREGAR") {
        $idCargo = htmlspecialchars($_REQUEST['idCargo']);
        $runFuncionaria = htmlspecialchars($_REQUEST['runFuncionaria']);
        $fechaInicio = htmlspecialchars($_REQUEST['fechaInicio']);
        $fechaTermino = htmlspecialchars($_REQUEST['fechaTermino']);

        $object = $control->getFuncionaria_cargoByID($idCargo);
        if (($object->getIdCargo() == null || $object->getIdCargo() == "")) {
            $funcionaria_cargo = new Funcionaria_cargoDTO();
            $funcionaria_cargo->setIdCargo($idCargo);
            $funcionaria_cargo->setRunFuncionaria($runFuncionaria);
            $funcionaria_cargo->setFechaInicio($fechaInicio);
            $funcionaria_cargo->setFechaTermino($fechaTermino);

            $result = $control->addFuncionaria_cargo($funcionaria_cargo);

            if ($result) {
                echo json_encode(array(
                    'success' => true,
                    'mensaje' => "Funcionaria_cargo ingresada correctamente"
                ));
            } else {
                echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
            }
        } else {
            echo json_encode(array('errorMsg' => 'El o la funcionaria_cargo ya existe, intento nuevamente.'));
        }
    } else if ($accion == "BORRAR") {
        $idCargo = htmlspecialchars($_REQUEST['idCargo']);

        $result = $control->removeFuncionaria_cargo($idCargo);
        if ($result) {
            echo json_encode(array('success' => true, 'mensaje' => "Funcionaria_cargo borrado correctamente"));
        } else {
            echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
        }
    } else if ($accion == "BUSCAR") {
        $cadena = htmlspecialchars($_REQUEST['cadena']);
        $funcionaria_cargos = $control->getFuncionaria_cargoLikeAtrr($cadena);
        $json = json_encode($funcionaria_cargos);
        echo $json;
    } else if ($accion == "BUSCAR_BY_ID") {
        $idCargo = htmlspecialchars($_REQUEST['idCargo']);

        $funcionaria_cargo = $control->getFuncionaria_cargoByID($idCargo);
        $json = json_encode($funcionaria_cargo);
        echo $json;
    } else if ($accion == "ACTUALIZAR") {
        $idCargo = htmlspecialchars($_REQUEST['idCargo']);
        $runFuncionaria = htmlspecialchars($_REQUEST['runFuncionaria']);
        $fechaInicio = htmlspecialchars($_REQUEST['fechaInicio']);
        $fechaTermino = htmlspecialchars($_REQUEST['fechaTermino']);

            $funcionaria_cargo = new Funcionaria_cargoDTO();
            $funcionaria_cargo->setIdCargo($idCargo);
            $funcionaria_cargo->setRunFuncionaria($runFuncionaria);
            $funcionaria_cargo->setFechaInicio($fechaInicio);
            $funcionaria_cargo->setFechaTermino($fechaTermino);

        $result = $control->updateFuncionaria_cargo($funcionaria_cargo);
        if ($result) {
            echo json_encode(array(
                'success' => true,
                'mensaje' => "Funcionaria_cargo actualizada correctamente"
            ));
        } else {
            echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
        }
    }
}
