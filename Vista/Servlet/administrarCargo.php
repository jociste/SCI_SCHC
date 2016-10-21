<?php

include_once '../../Controlador/SCI_SCHC.php';

$control = SCI_SCHC::getInstancia();

$accion = htmlspecialchars($_REQUEST['accion']);
if ($accion != null) {
    if ($accion == "LISTADO") {
        $cargos = $control->getAllCargos();
        $json = json_encode($cargos);
        echo $json;
    } else if ($accion == "AGREGAR") {
        $idCargo = htmlspecialchars($_REQUEST['idCargo']);
        $nombre = htmlspecialchars($_REQUEST['nombre']);

        $object = $control->getCargoByID($idCargo);
        if (($object->getIdCargo() == null || $object->getIdCargo() == "")) {
            $cargo = new CargoDTO();
            $cargo->setIdCargo($idCargo);
            $cargo->setNombre($nombre);

            $result = $control->addCargo($cargo);

            if ($result) {
                echo json_encode(array(
                    'success' => true,
                    'mensaje' => "Cargo ingresada correctamente"
                ));
            } else {
                echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
            }
        } else {
            echo json_encode(array('errorMsg' => 'El o la cargo ya existe, intento nuevamente.'));
        }
    } else if ($accion == "BORRAR") {
        $idCargo = htmlspecialchars($_REQUEST['idCargo']);

        $result = $control->removeCargo($idCargo);
        if ($result) {
            echo json_encode(array('success' => true, 'mensaje' => "Cargo borrado correctamente"));
        } else {
            echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
        }
    } else if ($accion == "BUSCAR") {
        $cadena = htmlspecialchars($_REQUEST['cadena']);
        $cargos = $control->getCargoLikeAtrr($cadena);
        $json = json_encode($cargos);
        echo $json;
    } else if ($accion == "BUSCAR_BY_ID") {
        $idCargo = htmlspecialchars($_REQUEST['idCargo']);

        $cargo = $control->getCargoByID($idCargo);
        $json = json_encode($cargo);
        echo $json;
    } else if ($accion == "ACTUALIZAR") {
        $idCargo = htmlspecialchars($_REQUEST['idCargo']);
        $nombre = htmlspecialchars($_REQUEST['nombre']);

            $cargo = new CargoDTO();
            $cargo->setIdCargo($idCargo);
            $cargo->setNombre($nombre);

        $result = $control->updateCargo($cargo);
        if ($result) {
            echo json_encode(array(
                'success' => true,
                'mensaje' => "Cargo actualizada correctamente"
            ));
        } else {
            echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
        }
    }
}
