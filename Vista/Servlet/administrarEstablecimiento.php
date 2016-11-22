<?php

include_once '../../Controlador/SCI_SCHC.php';

$control = SCI_SCHC::getInstancia();

$accion = htmlspecialchars($_REQUEST['accion']);
if ($accion != null) {
    if ($accion == "LISTADO") {
        $establecimientos = $control->getAllEstablecimientos();
        $json = json_encode($establecimientos);
        echo $json;
    } else if ($accion == "AGREGAR") {
        $codigoEstablecimiento = htmlspecialchars($_REQUEST['codigoEstablecimiento']);
        $idEntidadAdministradora = htmlspecialchars($_REQUEST['idEntidadAdministradora']);
        $nombreEstablecimiento = htmlspecialchars($_REQUEST['nombreEstablecimiento']);
        $direccionCalleEstablecimiento = htmlspecialchars($_REQUEST['direccionCalleEstablecimiento']);
        $direccionNumeroEstablecimiento = htmlspecialchars($_REQUEST['direccionNumeroEstablecimiento']);
        $ciudadEstablecimiento = htmlspecialchars($_REQUEST['ciudadEstablecimiento']);
        $regionEstablecimiento = htmlspecialchars($_REQUEST['regionEstablecimiento']);
        $telefonoEstablecimiento = htmlspecialchars($_REQUEST['telefonoEstablecimiento']);
        $emailEstablecimiento = htmlspecialchars($_REQUEST['emailEstablecimiento']);

        $object = $control->getEstablecimientoByID($codigoEstablecimiento);
        if (($object->getCodigoEstablecimiento() == null || $object->getCodigoEstablecimiento() == "")) {
            $establecimiento = new EstablecimientoDTO();
            $establecimiento->setCodigoEstablecimiento($codigoEstablecimiento);
            $establecimiento->setIdEntidadAdministradora($idEntidadAdministradora);
            $establecimiento->setNombreEstablecimiento($nombreEstablecimiento);
            $establecimiento->setDireccionCalleEstablecimiento($direccionCalleEstablecimiento);
            $establecimiento->setDireccionNumeroEstablecimiento($direccionNumeroEstablecimiento);
            $establecimiento->setCiudadEstablecimiento($ciudadEstablecimiento);
            $establecimiento->setRegionEstablecimiento($regionEstablecimiento);
            $establecimiento->setTelefonoEstablecimiento($telefonoEstablecimiento);
            $establecimiento->setEmailEstablecimiento($emailEstablecimiento);

            $result = $control->addEstablecimiento($establecimiento);

            if ($result) {
                echo json_encode(array(
                    'success' => true,
                    'mensaje' => "Establecimiento ingresada correctamente"
                ));
            } else {
                echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
            }
        } else {
            echo json_encode(array('errorMsg' => 'El o la establecimiento ya existe, intento nuevamente.'));
        }
    } else if ($accion == "BORRAR") {
        $codigoEstablecimiento = htmlspecialchars($_REQUEST['codigoEstablecimiento']);

        $result = $control->removeEstablecimiento($codigoEstablecimiento);
        if ($result) {
            echo json_encode(array('success' => true, 'mensaje' => "Establecimiento borrado correctamente"));
        } else {
            echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
        }
    } else if ($accion == "BUSCAR") {
        $cadena = htmlspecialchars($_REQUEST['cadena']);
        $establecimientos = $control->getEstablecimientoLikeAtrr($cadena);
        $json = json_encode($establecimientos);
        echo $json;
    } else if ($accion == "BUSCAR_BY_ID") {
        $codigoEstablecimiento = htmlspecialchars($_REQUEST['codigoEstablecimiento']);

        $establecimiento = $control->getEstablecimientoByID($codigoEstablecimiento);
        $json = json_encode($establecimiento);
        echo $json;
    } else if ($accion == "ACTUALIZAR") {
        $codigoEstablecimiento = htmlspecialchars($_REQUEST['codigoEstablecimiento']);
        $idEntidadAdministradora = htmlspecialchars($_REQUEST['idEntidadAdministradora']);
        $nombreEstablecimiento = htmlspecialchars($_REQUEST['nombreEstablecimiento']);
        $direccionCalleEstablecimiento = htmlspecialchars($_REQUEST['direccionCalleEstablecimiento']);
        $direccionNumeroEstablecimiento = htmlspecialchars($_REQUEST['direccionNumeroEstablecimiento']);
        $ciudadEstablecimiento = htmlspecialchars($_REQUEST['ciudadEstablecimiento']);
        $regionEstablecimiento = htmlspecialchars($_REQUEST['regionEstablecimiento']);
        $telefonoEstablecimiento = htmlspecialchars($_REQUEST['telefonoEstablecimiento']);
        $emailEstablecimiento = htmlspecialchars($_REQUEST['emailEstablecimiento']);

            $establecimiento = new EstablecimientoDTO();
            $establecimiento->setCodigoEstablecimiento($codigoEstablecimiento);
            $establecimiento->setIdEntidadAdministradora($idEntidadAdministradora);
            $establecimiento->setNombreEstablecimiento($nombreEstablecimiento);
            $establecimiento->setDireccionCalleEstablecimiento($direccionCalleEstablecimiento);
            $establecimiento->setDireccionNumeroEstablecimiento($direccionNumeroEstablecimiento);
            $establecimiento->setCiudadEstablecimiento($ciudadEstablecimiento);
            $establecimiento->setRegionEstablecimiento($regionEstablecimiento);
            $establecimiento->setTelefonoEstablecimiento($telefonoEstablecimiento);
            $establecimiento->setEmailEstablecimiento($emailEstablecimiento);

        $result = $control->updateEstablecimiento($establecimiento);
        if ($result) {
            echo json_encode(array(
                'success' => true,
                'mensaje' => "Establecimiento actualizada correctamente"
            ));
        } else {
            echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
        }
    }
}
