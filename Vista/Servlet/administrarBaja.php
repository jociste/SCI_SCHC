<?php

include_once '../../Controlador/SCI_SCHC.php';

$control = SCI_SCHC::getInstancia();

$accion = htmlspecialchars($_REQUEST['accion']);
if ($accion != null) {
    if ($accion == "LISTADO") {
        $bajas = $control->getAllBajas();
        $json = json_encode($bajas);
        echo $json;
    } else if ($accion == "AGREGAR") {
        $idBaja = htmlspecialchars($_REQUEST['idBaja']);
        $idBien = htmlspecialchars($_REQUEST['idBien']);
        $fechaBaaja = htmlspecialchars($_REQUEST['fechaBaaja']);
        $motivo = htmlspecialchars($_REQUEST['motivo']);

        $object = $control->getBajaByID($idBaja);
        if (($object->getIdBaja() == null || $object->getIdBaja() == "")) {
            $baja = new BajaDTO();
            $baja->setIdBaja($idBaja);
            $baja->setIdBien($idBien);
            $baja->setFechaBaaja($fechaBaaja);
            $baja->setMotivo($motivo);

            $result = $control->addBaja($baja);

            if ($result) {
                echo json_encode(array(
                    'success' => true,
                    'mensaje' => "Baja ingresada correctamente"
                ));
            } else {
                echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
            }
        } else {
            echo json_encode(array('errorMsg' => 'El o la baja ya existe, intento nuevamente.'));
        }
    } else if ($accion == "BORRAR") {
        $idBaja = htmlspecialchars($_REQUEST['idBaja']);

        $result = $control->removeBaja($idBaja);
        if ($result) {
            echo json_encode(array('success' => true, 'mensaje' => "Baja borrado correctamente"));
        } else {
            echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
        }
    } else if ($accion == "BUSCAR") {
        $cadena = htmlspecialchars($_REQUEST['cadena']);
        $bajas = $control->getBajaLikeAtrr($cadena);
        $json = json_encode($bajas);
        echo $json;
    } else if ($accion == "BUSCAR_BY_ID") {
        $idBaja = htmlspecialchars($_REQUEST['idBaja']);

        $baja = $control->getBajaByID($idBaja);
        $json = json_encode($baja);
        echo $json;
    } else if ($accion == "ACTUALIZAR") {
        $idBaja = htmlspecialchars($_REQUEST['idBaja']);
        $idBien = htmlspecialchars($_REQUEST['idBien']);
        $fechaBaaja = htmlspecialchars($_REQUEST['fechaBaaja']);
        $motivo = htmlspecialchars($_REQUEST['motivo']);

            $baja = new BajaDTO();
            $baja->setIdBaja($idBaja);
            $baja->setIdBien($idBien);
            $baja->setFechaBaaja($fechaBaaja);
            $baja->setMotivo($motivo);

        $result = $control->updateBaja($baja);
        if ($result) {
            echo json_encode(array(
                'success' => true,
                'mensaje' => "Baja actualizada correctamente"
            ));
        } else {
            echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
        }
    }
}
