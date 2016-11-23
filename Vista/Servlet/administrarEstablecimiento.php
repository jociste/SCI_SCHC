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
        $nombreEstablecimiento = htmlspecialchars($_REQUEST['nombreEstablecimiento']);
        $direccionCalleEstablecimiento = htmlspecialchars($_REQUEST['direccionCalleEstablecimiento']);
        $direccionNumeroEstablecimiento = htmlspecialchars($_REQUEST['direccionNumeroEstablecimiento']);
        $ciudadEstablecimiento = htmlspecialchars($_REQUEST['ciudadEstablecimiento']);
        $regionEstablecimiento = htmlspecialchars($_REQUEST['regionEstablecimiento']);
        $telefonoEstablecimiento = htmlspecialchars($_REQUEST['telefonoEstablecimiento']);
        $emailEstablecimiento = htmlspecialchars($_REQUEST['emailEstablecimiento']);

        $idEntidadAdministradora = htmlspecialchars($_REQUEST['idEntidadAdministradora']);
        $nombreEntidadAdministradora = htmlspecialchars($_REQUEST['nombreEntidadAdministradora']);
        $rutEntidadAdministradora = htmlspecialchars($_REQUEST['rutEntidadAdministradora']);
        $provinciaEntidadAdministradora = htmlspecialchars($_REQUEST['provinciaEntidadAdministradora']);
        $regionEntidadAdministradora = htmlspecialchars($_REQUEST['regionEntidadAdministradora']);
        $representanteLegal = htmlspecialchars($_REQUEST['representanteLegal']);
        $rutRepresentanteLegal = htmlspecialchars($_REQUEST['rutRepresentanteLegal']);
        $telefonoRepresentanteLegal = htmlspecialchars($_REQUEST['telefonoRepresentanteLegal']);
        $emailRepresentanteLegal = htmlspecialchars($_REQUEST['emailRepresentanteLegal']);

        /* Entidad Administradora */
        $resultEntidad;
        if ($idEntidadAdministradora == null || $idEntidadAdministradora == "") {
            $idEntidadAdministradora = $control->getIdEntidadAdministradoraDisponible();
            $entidad_administradora = new Entidad_administradoraDTO();
            $entidad_administradora->setIdEntidadAdministradora($idEntidadAdministradora);
            $entidad_administradora->setNombreEntidadAdministradora($nombreEntidadAdministradora);
            $entidad_administradora->setRutEntidadAdministradora($rutEntidadAdministradora);
            $entidad_administradora->setProvinciaEntidadAdministradora($provinciaEntidadAdministradora);
            $entidad_administradora->setRegionEntidadAdministradora($regionEntidadAdministradora);
            $entidad_administradora->setRepresentanteLegal($representanteLegal);
            $entidad_administradora->setRutRepresentanteLegal($rutRepresentanteLegal);
            $entidad_administradora->setTelefonoRepresentanteLegal($telefonoRepresentanteLegal);
            $entidad_administradora->setEmailRepresentanteLegal($emailRepresentanteLegal);
            $resultEntidad = $control->addEntidad_administradora($entidad_administradora);            
        } else {
            $entidad_administradora = new Entidad_administradoraDTO();
            $entidad_administradora->setIdEntidadAdministradora($idEntidadAdministradora);
            $entidad_administradora->setNombreEntidadAdministradora($nombreEntidadAdministradora);
            $entidad_administradora->setRutEntidadAdministradora($rutEntidadAdministradora);
            $entidad_administradora->setProvinciaEntidadAdministradora($provinciaEntidadAdministradora);
            $entidad_administradora->setRegionEntidadAdministradora($regionEntidadAdministradora);
            $entidad_administradora->setRepresentanteLegal($representanteLegal);
            $entidad_administradora->setRutRepresentanteLegal($rutRepresentanteLegal);
            $entidad_administradora->setTelefonoRepresentanteLegal($telefonoRepresentanteLegal);
            $entidad_administradora->setEmailRepresentanteLegal($emailRepresentanteLegal);
            $resultEntidad = $control->updateEntidad_administradora($entidad_administradora);
        }

        /* Establecimiento */
        $resultEstablecimiento;
        $object = $control->getEstablecimientoByID($codigoEstablecimiento);

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

        if (($object->getCodigoEstablecimiento() == null || $object->getCodigoEstablecimiento() == "")) {
            $resultEstablecimiento = $control->addEstablecimiento($establecimiento);
        } else {
            $resultEstablecimiento = $control->updateEstablecimiento($establecimiento);
        }

        if ($resultEstablecimiento) {
            echo json_encode(array('success' => true, 'mensaje' => "Datos guardados correctamente"));
        } else {
            echo json_encode(array('errorMsg' => 'Ha ocurrido un error. '.$resultEstablecimiento." - ".$resultEntidad));
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
