<?php

include_once '../../Controlador/SCI_SCHC.php';

$control = SCI_SCHC::getInstancia();

$accion = htmlspecialchars($_REQUEST['accion']);
if ($accion != null) {
    if ($accion == "LISTADO") {
        $nivel_funcionarias = $control->getAllNivel_funcionarias();
        $json = json_encode($nivel_funcionarias);
        echo $json;
    } else if ($accion == "AGREGAR") {
        $idNivel = htmlspecialchars($_REQUEST['idNivel']);
        $runFuncionaria = htmlspecialchars($_REQUEST['runFuncionaria']);
        $fechaInicio = htmlspecialchars($_REQUEST['fechaInicio']);
        $fechaTermino = htmlspecialchars($_REQUEST['fechaTermino']);

        $object = $control->getNivel_funcionariaByID($idNivel);
        if (($object->getIdNivel() == null || $object->getIdNivel() == "")) {
            $nivel_funcionaria = new Nivel_funcionariaDTO();
            $nivel_funcionaria->setIdNivel($idNivel);
            $nivel_funcionaria->setRunFuncionaria($runFuncionaria);
            $nivel_funcionaria->setFechaInicio($fechaInicio);
            $nivel_funcionaria->setFechaTermino($fechaTermino);

            $result = $control->addNivel_funcionaria($nivel_funcionaria);

            if ($result) {
                echo json_encode(array(
                    'success' => true,
                    'mensaje' => "Nivel_funcionaria ingresada correctamente"
                ));
            } else {
                echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
            }
        } else {
            echo json_encode(array('errorMsg' => 'El o la nivel_funcionaria ya existe, intento nuevamente.'));
        }
    } else if ($accion == "BORRAR") {
        $idNivel = htmlspecialchars($_REQUEST['idNivel']);

        $result = $control->removeNivel_funcionaria($idNivel);
        if ($result) {
            echo json_encode(array('success' => true, 'mensaje' => "Nivel_funcionaria borrado correctamente"));
        } else {
            echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
        }
    } else if ($accion == "BUSCAR") {
        $cadena = htmlspecialchars($_REQUEST['cadena']);
        $nivel_funcionarias = $control->getNivel_funcionariaLikeAtrr($cadena);
        $json = json_encode($nivel_funcionarias);
        echo $json;
    } else if ($accion == "BUSCAR_BY_ID") {
        $idNivel = htmlspecialchars($_REQUEST['idNivel']);

        $nivel_funcionaria = $control->getNivel_funcionariaByID($idNivel);
        $json = json_encode($nivel_funcionaria);
        echo $json;
    } else if ($accion == "ACTUALIZAR") {
        $idNivel = htmlspecialchars($_REQUEST['idNivel']);
        $runFuncionaria = htmlspecialchars($_REQUEST['runFuncionaria']);
        $fechaInicio = htmlspecialchars($_REQUEST['fechaInicio']);
        $fechaTermino = htmlspecialchars($_REQUEST['fechaTermino']);

            $nivel_funcionaria = new Nivel_funcionariaDTO();
            $nivel_funcionaria->setIdNivel($idNivel);
            $nivel_funcionaria->setRunFuncionaria($runFuncionaria);
            $nivel_funcionaria->setFechaInicio($fechaInicio);
            $nivel_funcionaria->setFechaTermino($fechaTermino);

        $result = $control->updateNivel_funcionaria($nivel_funcionaria);
        if ($result) {
            echo json_encode(array(
                'success' => true,
                'mensaje' => "Nivel_funcionaria actualizada correctamente"
            ));
        } else {
            echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
        }
    }
}
