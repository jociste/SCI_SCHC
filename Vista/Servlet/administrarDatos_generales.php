<?php

include_once '../../Controlador/SCI_SCHC.php';

$control = SCI_SCHC::getInstancia();

$accion = htmlspecialchars($_REQUEST['accion']);
if ($accion != null) {
    if ($accion == "LISTADO") {
        $datos_generaless = $control->getAllDatos_generaless();
        $json = json_encode($datos_generaless);
        echo $json;
    } else if ($accion == "AGREGAR") {
        $codigoEstablecimiento = htmlspecialchars($_REQUEST['codigoEstablecimiento']);
        $nombreEstablecimiento = htmlspecialchars($_REQUEST['nombreEstablecimiento']);
        $direccionCalleEstablecimiento = htmlspecialchars($_REQUEST['direccionCalleEstablecimiento']);
        $direccionNumeroEstablecimiento = htmlspecialchars($_REQUEST['direccionNumeroEstablecimiento']);
        $ciudadEstablecimiento = htmlspecialchars($_REQUEST['ciudadEstablecimiento']);
        $regionEstablecimiento = htmlspecialchars($_REQUEST['regionEstablecimiento']);
        $telefonoEstablecimiento = htmlspecialchars($_REQUEST['telefonoEstablecimiento']);
        $emailEstablecimiento = htmlspecialchars($_REQUEST['emailEstablecimiento']);
        $nombreEntidadAdministradora = htmlspecialchars($_REQUEST['nombreEntidadAdministradora']);
        $rutEntidadAdministradora = htmlspecialchars($_REQUEST['rutEntidadAdministradora']);
        $provinciaEntidadAdministradora = htmlspecialchars($_REQUEST['provinciaEntidadAdministradora']);
        $regionEntidadAdministradora = htmlspecialchars($_REQUEST['regionEntidadAdministradora']);
        $representanteLegal = htmlspecialchars($_REQUEST['representanteLegal']);
        $rutRepresentanteLegal = htmlspecialchars($_REQUEST['rutRepresentanteLegal']);
        $telefonoRepresentanteLegal = htmlspecialchars($_REQUEST['telefonoRepresentanteLegal']);
        $emailRepresentanteLegal = htmlspecialchars($_REQUEST['emailRepresentanteLegal']);

        $datos_generales = $control->getDatos_generalesByID($codigoEstablecimiento);
        if (($datos_generales->getCodigoEstablecimiento() == null || $datos_generales->getCodigoEstablecimiento() == "")) {
            $datos_generales = new Datos_generalesDTO();
            $datos_generales->setCodigoEstablecimiento($codigoEstablecimiento);
            $datos_generales->setNombreEstablecimiento($nombreEstablecimiento);
            $datos_generales->setDireccionCalleEstablecimiento($direccionCalleEstablecimiento);
            $datos_generales->setDireccionNumeroEstablecimiento($direccionNumeroEstablecimiento);
            $datos_generales->setCiudadEstablecimiento($ciudadEstablecimiento);
            $datos_generales->setRegionEstablecimiento($regionEstablecimiento);
            $datos_generales->setTelefonoEstablecimiento($telefonoEstablecimiento);
            $datos_generales->setEmailEstablecimiento($emailEstablecimiento);
            $datos_generales->setNombreEntidadAdministradora($nombreEntidadAdministradora);
            $datos_generales->setRutEntidadAdministradora($rutEntidadAdministradora);
            $datos_generales->setProvinciaEntidadAdministradora($provinciaEntidadAdministradora);
            $datos_generales->setRegionEntidadAdministradora($regionEntidadAdministradora);
            $datos_generales->setRepresentanteLegal($representanteLegal);
            $datos_generales->setRutRepresentanteLegal($rutRepresentanteLegal);
            $datos_generales->setTelefonoRepresentanteLegal($telefonoRepresentanteLegal);
            $datos_generales->setEmailRepresentanteLegal($emailRepresentanteLegal);

            $result = $control->addDatos_generales($datos_generales);

            if ($result) {
                echo json_encode(array(
                    'success' => true,
                    'mensaje' => "Datos generales ingresada correctamente"
                ));
            } else {
                echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
            }
        } else {
            $datos_generales->setCodigoEstablecimiento($codigoEstablecimiento);
            $datos_generales->setNombreEstablecimiento($nombreEstablecimiento);
            $datos_generales->setDireccionCalleEstablecimiento($direccionCalleEstablecimiento);
            $datos_generales->setDireccionNumeroEstablecimiento($direccionNumeroEstablecimiento);
            $datos_generales->setCiudadEstablecimiento($ciudadEstablecimiento);
            $datos_generales->setRegionEstablecimiento($regionEstablecimiento);
            $datos_generales->setTelefonoEstablecimiento($telefonoEstablecimiento);
            $datos_generales->setEmailEstablecimiento($emailEstablecimiento);
            $datos_generales->setNombreEntidadAdministradora($nombreEntidadAdministradora);
            $datos_generales->setRutEntidadAdministradora($rutEntidadAdministradora);
            $datos_generales->setProvinciaEntidadAdministradora($provinciaEntidadAdministradora);
            $datos_generales->setRegionEntidadAdministradora($regionEntidadAdministradora);
            $datos_generales->setRepresentanteLegal($representanteLegal);
            $datos_generales->setRutRepresentanteLegal($rutRepresentanteLegal);
            $datos_generales->setTelefonoRepresentanteLegal($telefonoRepresentanteLegal);
            $datos_generales->setEmailRepresentanteLegal($emailRepresentanteLegal);

            $result = $control->updateDatos_generales($datos_generales);
            if ($result) {
                echo json_encode(array(
                    'success' => true,
                    'mensaje' => "Datos generales actualizada correctamente"
                ));
            } else {
                echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
            }
        }
    } else if ($accion == "BORRAR") {
        $codigoEstablecimiento = htmlspecialchars($_REQUEST['codigoEstablecimiento']);

        $result = $control->removeDatos_generales($codigoEstablecimiento);
        if ($result) {
            echo json_encode(array('success' => true, 'mensaje' => "Datos_generales borrado correctamente"));
        } else {
            echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
        }
    } else if ($accion == "BUSCAR") {
        $cadena = htmlspecialchars($_REQUEST['cadena']);
        $datos_generaless = $control->getDatos_generalesLikeAtrr($cadena);
        $json = json_encode($datos_generaless);
        echo $json;
    } else if ($accion == "BUSCAR_BY_ID") {
        $codigoEstablecimiento = htmlspecialchars($_REQUEST['codigoEstablecimiento']);

        $datos_generales = $control->getDatos_generalesByID($codigoEstablecimiento);
        $json = json_encode($datos_generales);
        echo $json;
    } else if ($accion == "ACTUALIZAR") {
        $codigoEstablecimiento = htmlspecialchars($_REQUEST['codigoEstablecimiento']);
        $nombreEstablecimiento = htmlspecialchars($_REQUEST['nombreEstablecimiento']);
        $direccionCalleEstablecimiento = htmlspecialchars($_REQUEST['direccionCalleEstablecimiento']);
        $direccionNumeroEstablecimiento = htmlspecialchars($_REQUEST['direccionNumeroEstablecimiento']);
        $ciudadEstablecimiento = htmlspecialchars($_REQUEST['ciudadEstablecimiento']);
        $regionEstablecimiento = htmlspecialchars($_REQUEST['regionEstablecimiento']);
        $telefonoEstablecimiento = htmlspecialchars($_REQUEST['telefonoEstablecimiento']);
        $emailEstablecimiento = htmlspecialchars($_REQUEST['emailEstablecimiento']);
        $nombreEntidadAdministradora = htmlspecialchars($_REQUEST['nombreEntidadAdministradora']);
        $rutEntidadAdministradora = htmlspecialchars($_REQUEST['rutEntidadAdministradora']);
        $provinciaEntidadAdministradora = htmlspecialchars($_REQUEST['provinciaEntidadAdministradora']);
        $regionEntidadAdministradora = htmlspecialchars($_REQUEST['regionEntidadAdministradora']);
        $representanteLegal = htmlspecialchars($_REQUEST['representanteLegal']);
        $rutRepresentanteLegal = htmlspecialchars($_REQUEST['rutRepresentanteLegal']);
        $telefonoRepresentanteLegal = htmlspecialchars($_REQUEST['telefonoRepresentanteLegal']);
        $emailRepresentanteLegal = htmlspecialchars($_REQUEST['emailRepresentanteLegal']);

        $datos_generales = new Datos_generalesDTO();
        $datos_generales->setCodigoEstablecimiento($codigoEstablecimiento);
        $datos_generales->setNombreEstablecimiento($nombreEstablecimiento);
        $datos_generales->setDireccionCalleEstablecimiento($direccionCalleEstablecimiento);
        $datos_generales->setDireccionNumeroEstablecimiento($direccionNumeroEstablecimiento);
        $datos_generales->setCiudadEstablecimiento($ciudadEstablecimiento);
        $datos_generales->setRegionEstablecimiento($regionEstablecimiento);
        $datos_generales->setTelefonoEstablecimiento($telefonoEstablecimiento);
        $datos_generales->setEmailEstablecimiento($emailEstablecimiento);
        $datos_generales->setNombreEntidadAdministradora($nombreEntidadAdministradora);
        $datos_generales->setRutEntidadAdministradora($rutEntidadAdministradora);
        $datos_generales->setProvinciaEntidadAdministradora($provinciaEntidadAdministradora);
        $datos_generales->setRegionEntidadAdministradora($regionEntidadAdministradora);
        $datos_generales->setRepresentanteLegal($representanteLegal);
        $datos_generales->setRutRepresentanteLegal($rutRepresentanteLegal);
        $datos_generales->setTelefonoRepresentanteLegal($telefonoRepresentanteLegal);
        $datos_generales->setEmailRepresentanteLegal($emailRepresentanteLegal);

        $result = $control->updateDatos_generales($datos_generales);
        if ($result) {
            echo json_encode(array(
                'success' => true,
                'mensaje' => "Datos_generales actualizada correctamente"
            ));
        } else {
            echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
        }
    }
}
