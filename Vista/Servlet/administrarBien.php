<?php

include_once '../../Controlador/SCI_SCHC.php';

$control = SCI_SCHC::getInstancia();

$accion = htmlspecialchars($_REQUEST['accion']);
if ($accion != null) {
    if ($accion == "LISTADO") {
        $biens = $control->getAllBiens();
        $json = json_encode($biens);
        echo $json;
    } else if ($accion == "AGREGAR") {
        $idBien = htmlspecialchars($_REQUEST['idBien']);
        $idCategoria = htmlspecialchars($_REQUEST['idCategoria']);
        $nombre = htmlspecialchars($_REQUEST['nombre']);
        $ubicacion = htmlspecialchars($_REQUEST['ubicacion']);

        $object = $control->getBienByID($idBien);
        if (($object->getIdBien() == null || $object->getIdBien() == "")) {
            $bien = new BienDTO();
            $bien->setIdBien($idBien);
            $bien->setIdCategoria($idCategoria);
            $bien->setNombre($nombre);
            $bien->setUbicacion($ubicacion);

            $result = $control->addBien($bien);

            if ($result) {
                echo json_encode(array(
                    'success' => true,
                    'mensaje' => "Bien ingresada correctamente"
                ));
            } else {
                echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
            }
        } else {
            echo json_encode(array('errorMsg' => 'El o la bien ya existe, intento nuevamente.'));
        }
    } else if ($accion == "BORRAR") {
        $idBien = htmlspecialchars($_REQUEST['idBien']);

        $result = $control->removeBien($idBien);
        if ($result) {
            echo json_encode(array('success' => true, 'mensaje' => "Bien borrado correctamente"));
        } else {
            echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
        }
    } else if ($accion == "BUSCAR") {
        $cadena = htmlspecialchars($_REQUEST['cadena']);
        $biens = $control->getBienLikeAtrr($cadena);
        $json = json_encode($biens);
        echo $json;
    } else if ($accion == "BUSCAR_BY_ID") {
        $idBien = htmlspecialchars($_REQUEST['idBien']);

        $bien = $control->getBienByID($idBien);
        $json = json_encode($bien);
        echo $json;
    } else if ($accion == "ACTUALIZAR") {
        $idBien = htmlspecialchars($_REQUEST['idBien']);
        $idCategoria = htmlspecialchars($_REQUEST['idCategoria']);
        $nombre = htmlspecialchars($_REQUEST['nombre']);
        $ubicacion = htmlspecialchars($_REQUEST['ubicacion']);

            $bien = new BienDTO();
            $bien->setIdBien($idBien);
            $bien->setIdCategoria($idCategoria);
            $bien->setNombre($nombre);
            $bien->setUbicacion($ubicacion);

        $result = $control->updateBien($bien);
        if ($result) {
            echo json_encode(array(
                'success' => true,
                'mensaje' => "Bien actualizada correctamente"
            ));
        } else {
            echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
        }
    }
}
