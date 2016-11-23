<?php

include_once '../../Controlador/SCI_SCHC.php';

$control = SCI_SCHC::getInstancia();

$accion = htmlspecialchars($_REQUEST['accion']);
if ($accion != null) {
    if ($accion == "LISTADO") {
        $entidad_administradoras = $control->getAllEntidad_administradoras();
        $json = json_encode($entidad_administradoras);
        echo $json;
    } else if ($accion == "AGREGAR") {
        $idEntidadAdministradora = htmlspecialchars($_REQUEST['idEntidadAdministradora']);
        $nombreEntidadAdministradora = htmlspecialchars($_REQUEST['nombreEntidadAdministradora']);
        $rutEntidadAdministradora = htmlspecialchars($_REQUEST['rutEntidadAdministradora']);
        $provinciaEntidadAdministradora = htmlspecialchars($_REQUEST['provinciaEntidadAdministradora']);
        $regionEntidadAdministradora = htmlspecialchars($_REQUEST['regionEntidadAdministradora']);
        $representanteLegal = htmlspecialchars($_REQUEST['representanteLegal']);
        $rutRepresentanteLegal = htmlspecialchars($_REQUEST['rutRepresentanteLegal']);
        $telefonoRepresentanteLegal = htmlspecialchars($_REQUEST['telefonoRepresentanteLegal']);
        $emailRepresentanteLegal = htmlspecialchars($_REQUEST['emailRepresentanteLegal']);

        $object = $control->getEntidad_administradoraByID($idEntidadAdministradora);
        if (($object->getIdEntidadAdministradora() == null || $object->getIdEntidadAdministradora() == "")) {
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

            $result = $control->addEntidad_administradora($entidad_administradora);

            if ($result) {
                echo json_encode(array(
                    'success' => true,
                    'mensaje' => "Entidad_administradora ingresada correctamente"
                ));
            } else {
                echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
            }
        } else {
            echo json_encode(array('errorMsg' => 'El o la entidad_administradora ya existe, intento nuevamente.'));
        }
    } else if ($accion == "BORRAR") {
        $idEntidadAdministradora = htmlspecialchars($_REQUEST['idEntidadAdministradora']);

        $result = $control->removeEntidad_administradora($idEntidadAdministradora);
        if ($result) {
            echo json_encode(array('success' => true, 'mensaje' => "Entidad_administradora borrado correctamente"));
        } else {
            echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
        }
    } else if ($accion == "BUSCAR") {
        $cadena = htmlspecialchars($_REQUEST['cadena']);
        $entidad_administradoras = $control->getEntidad_administradoraLikeAtrr($cadena);
        $json = json_encode($entidad_administradoras);
        echo $json;
    } else if ($accion == "BUSCAR_BY_ID") {
        $idEntidadAdministradora = htmlspecialchars($_REQUEST['idEntidadAdministradora']);

        $entidad_administradora = $control->getEntidad_administradoraByID($idEntidadAdministradora);
        $json = json_encode($entidad_administradora);
        echo $json;
    } else if ($accion == "ACTUALIZAR") {
        $idEntidadAdministradora = htmlspecialchars($_REQUEST['idEntidadAdministradora']);
        $nombreEntidadAdministradora = htmlspecialchars($_REQUEST['nombreEntidadAdministradora']);
        $rutEntidadAdministradora = htmlspecialchars($_REQUEST['rutEntidadAdministradora']);
        $provinciaEntidadAdministradora = htmlspecialchars($_REQUEST['provinciaEntidadAdministradora']);
        $regionEntidadAdministradora = htmlspecialchars($_REQUEST['regionEntidadAdministradora']);
        $representanteLegal = htmlspecialchars($_REQUEST['representanteLegal']);
        $rutRepresentanteLegal = htmlspecialchars($_REQUEST['rutRepresentanteLegal']);
        $telefonoRepresentanteLegal = htmlspecialchars($_REQUEST['telefonoRepresentanteLegal']);
        $emailRepresentanteLegal = htmlspecialchars($_REQUEST['emailRepresentanteLegal']);

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

        $result = $control->updateEntidad_administradora($entidad_administradora);
        if ($result) {
            echo json_encode(array(
                'success' => true,
                'mensaje' => "Entidad_administradora actualizada correctamente"
            ));
        } else {
            echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
        }
    }
}
