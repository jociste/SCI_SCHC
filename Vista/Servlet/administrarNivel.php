<?php

include_once '../../Controlador/SCI_SCHC.php';

$control = SCI_SCHC::getInstancia();

$accion = htmlspecialchars($_REQUEST['accion']);
if ($accion != null) {
    if ($accion == "LISTADO") {
        $nivels = $control->getAllNivels();
        $json = json_encode($nivels);
        echo $json;
    } else if ($accion == "AGREGAR") {
        $idNivel = htmlspecialchars($_REQUEST['idNivel']);
        $descripcion = htmlspecialchars($_REQUEST['descripcion']);
        $nombre = htmlspecialchars($_REQUEST['nombre']);
        $object = $control->getNivelByID($idNivel);
        if (($object->getIdNivel() == null || $object->getIdNivel() == "")) {
            $nivel = new NivelDTO();
            $nivel->setIdNivel($idNivel);
            $nivel->setDescripcion($descripcion);
            $nivel->setNombre($nombre);

            $result = $control->addNivel($nivel);

            if ($result) {
                echo json_encode(array(
                    'success' => true,
                    'mensaje' => "Nivel ingresada correctamente"
                ));
            } else {
                echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
            }
        } else {
            echo json_encode(array('errorMsg' => 'El o la nivel ya existe, intento nuevamente.'));
        }
    } else if ($accion == "BORRAR") {
        $idNivel = htmlspecialchars($_REQUEST['idNivel']);

        $result = $control->removeNivel($idNivel);
        if ($result) {
            echo json_encode(array('success' => true, 'mensaje' => "Nivel borrado correctamente"));
        } else {
            echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
        }
    } else if ($accion == "BUSCAR") {
        $cadena = htmlspecialchars($_REQUEST['cadena']);
        $nivels = $control->getNivelLikeAtrr($cadena);
        $json = json_encode($nivels);
        echo $json;
    } else if ($accion == "BUSCAR_BY_ID") {
        $idNivel = htmlspecialchars($_REQUEST['idNivel']);

        $nivel = $control->getNivelByID($idNivel);
        $json = json_encode($nivel);
        echo $json;
    } else if ($accion == "ACTUALIZAR") {
        $idNivel = htmlspecialchars($_REQUEST['idNivel']);
        $descripcion = htmlspecialchars($_REQUEST['descripcion']);
        $nombre = htmlspecialchars($_REQUEST['nombre']);

            $nivel = new NivelDTO();
            $nivel->setIdNivel($idNivel);
            $nivel->setDescripcion($descripcion);
            $nivel->setNombre($nombre);

        $result = $control->updateNivel($nivel);
        if ($result) {
            echo json_encode(array(
                'success' => true,
                'mensaje' => "Nivel actualizada correctamente"
            ));
        } else {
            echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
        }
    }
}
