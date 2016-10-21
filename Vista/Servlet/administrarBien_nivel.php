<?php

include_once '../../Controlador/SCI_SCHC.php';

$control = SCI_SCHC::getInstancia();

$accion = htmlspecialchars($_REQUEST['accion']);
if ($accion != null) {
    if ($accion == "LISTADO") {
        $bien_nivels = $control->getAllBien_nivels();
        $json = json_encode($bien_nivels);
        echo $json;
    } else if ($accion == "AGREGAR") {
        $idNivel = htmlspecialchars($_REQUEST['idNivel']);
        $idBien = htmlspecialchars($_REQUEST['idBien']);
        $fechaInicio = htmlspecialchars($_REQUEST['fechaInicio']);
        $fechaTermino = htmlspecialchars($_REQUEST['fechaTermino']);

        $object = $control->getBien_nivelByID($idBien);
        if (($object->getIdBien() == null || $object->getIdBien() == "")) {
            $bien_nivel = new Bien_nivelDTO();
            $bien_nivel->setIdNivel($idNivel);
            $bien_nivel->setIdBien($idBien);
            $bien_nivel->setFechaInicio($fechaInicio);
            $bien_nivel->setFechaTermino($fechaTermino);

            $result = $control->addBien_nivel($bien_nivel);

            if ($result) {
                echo json_encode(array(
                    'success' => true,
                    'mensaje' => "Bien_nivel ingresada correctamente"
                ));
            } else {
                echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
            }
        } else {
            echo json_encode(array('errorMsg' => 'El o la bien_nivel ya existe, intento nuevamente.'));
        }
    } else if ($accion == "BORRAR") {
        $idBien = htmlspecialchars($_REQUEST['idBien']);

        $result = $control->removeBien_nivel($idBien);
        if ($result) {
            echo json_encode(array('success' => true, 'mensaje' => "Bien_nivel borrado correctamente"));
        } else {
            echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
        }
    } else if ($accion == "BUSCAR") {
        $cadena = htmlspecialchars($_REQUEST['cadena']);
        $bien_nivels = $control->getBien_nivelLikeAtrr($cadena);
        $json = json_encode($bien_nivels);
        echo $json;
    } else if ($accion == "BUSCAR_BY_ID") {
        $idBien = htmlspecialchars($_REQUEST['idBien']);

        $bien_nivel = $control->getBien_nivelByID($idBien);
        $json = json_encode($bien_nivel);
        echo $json;
    } else if ($accion == "ACTUALIZAR") {
        $idNivel = htmlspecialchars($_REQUEST['idNivel']);
        $idBien = htmlspecialchars($_REQUEST['idBien']);
        $fechaInicio = htmlspecialchars($_REQUEST['fechaInicio']);
        $fechaTermino = htmlspecialchars($_REQUEST['fechaTermino']);

            $bien_nivel = new Bien_nivelDTO();
            $bien_nivel->setIdNivel($idNivel);
            $bien_nivel->setIdBien($idBien);
            $bien_nivel->setFechaInicio($fechaInicio);
            $bien_nivel->setFechaTermino($fechaTermino);

        $result = $control->updateBien_nivel($bien_nivel);
        if ($result) {
            echo json_encode(array(
                'success' => true,
                'mensaje' => "Bien_nivel actualizada correctamente"
            ));
        } else {
            echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
        }
    }
}
