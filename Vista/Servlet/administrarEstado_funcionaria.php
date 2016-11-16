<?php

include_once '../../Controlador/SCI_SCHC.php';

$control = SCI_SCHC::getInstancia();

$accion = htmlspecialchars($_REQUEST['accion']);
if ($accion != null) {
    if ($accion == "LISTADO") {
        $estado_funcionarias = $control->getAllEstado_funcionarias();
        $json = json_encode($estado_funcionarias);
        echo $json;
    } else if ($accion == "AGREGAR") {
        $idEstado = htmlspecialchars($_REQUEST['idEstado']);
        $descripcionEstado = htmlspecialchars($_REQUEST['descripcionEstado']);

        $object = $control->getEstado_funcionariaByID($idEstado);
        if (($object->getIdEstado() == null || $object->getIdEstado() == "")) {
            $estado_funcionaria = new Estado_funcionariaDTO();
            $estado_funcionaria->setIdEstado($idEstado);
            $estado_funcionaria->setDescripcionEstado($descripcionEstado);

            $result = $control->addEstado_funcionaria($estado_funcionaria);

            if ($result) {
                echo json_encode(array(
                    'success' => true,
                    'mensaje' => "Estado_funcionaria ingresada correctamente"
                ));
            } else {
                echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
            }
        } else {
            echo json_encode(array('errorMsg' => 'El o la estado_funcionaria ya existe, intento nuevamente.'));
        }
    } else if ($accion == "BORRAR") {
        $idEstado = htmlspecialchars($_REQUEST['idEstado']);

        $result = $control->removeEstado_funcionaria($idEstado);
        if ($result) {
            echo json_encode(array('success' => true, 'mensaje' => "Estado_funcionaria borrado correctamente"));
        } else {
            echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
        }
    } else if ($accion == "BUSCAR") {
        $cadena = htmlspecialchars($_REQUEST['cadena']);
        $estado_funcionarias = $control->getEstado_funcionariaLikeAtrr($cadena);
        $json = json_encode($estado_funcionarias);
        echo $json;
    } else if ($accion == "BUSCAR_BY_ID") {
        $idEstado = htmlspecialchars($_REQUEST['idEstado']);

        $estado_funcionaria = $control->getEstado_funcionariaByID($idEstado);
        $json = json_encode($estado_funcionaria);
        echo $json;
    } else if ($accion == "ACTUALIZAR") {
        $idEstado = htmlspecialchars($_REQUEST['idEstado']);
        $descripcionEstado = htmlspecialchars($_REQUEST['descripcionEstado']);

            $estado_funcionaria = new Estado_funcionariaDTO();
            $estado_funcionaria->setIdEstado($idEstado);
            $estado_funcionaria->setDescripcionEstado($descripcionEstado);

        $result = $control->updateEstado_funcionaria($estado_funcionaria);
        if ($result) {
            echo json_encode(array(
                'success' => true,
                'mensaje' => "Estado_funcionaria actualizada correctamente"
            ));
        } else {
            echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
        }
    }
}
