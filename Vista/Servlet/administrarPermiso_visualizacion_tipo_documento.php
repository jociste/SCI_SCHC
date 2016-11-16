<?php

include_once '../../Controlador/SCI_SCHC.php';

$control = SCI_SCHC::getInstancia();

$accion = htmlspecialchars($_REQUEST['accion']);
if ($accion != null) {
    if ($accion == "LISTADO") {
        $permiso_visualizacion_tipo_documentos = $control->getAllPermiso_visualizacion_tipo_documentos();
        $json = json_encode($permiso_visualizacion_tipo_documentos);
        echo $json;
    } else if ($accion == "AGREGAR") {
        $idTipoDocumento = htmlspecialchars($_REQUEST['idTipoDocumento']);
        $idCargo = htmlspecialchars($_REQUEST['idCargo']);

        $object = $control->getPermiso_visualizacion_tipo_documentoByID($idCargo);
        if (($object->getIdCargo() == null || $object->getIdCargo() == "")) {
            $permiso_visualizacion_tipo_documento = new Permiso_visualizacion_tipo_documentoDTO();
            $permiso_visualizacion_tipo_documento->setIdTipoDocumento($idTipoDocumento);
            $permiso_visualizacion_tipo_documento->setIdCargo($idCargo);

            $result = $control->addPermiso_visualizacion_tipo_documento($permiso_visualizacion_tipo_documento);

            if ($result) {
                echo json_encode(array(
                    'success' => true,
                    'mensaje' => "Permiso_visualizacion_tipo_documento ingresada correctamente"
                ));
            } else {
                echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
            }
        } else {
            echo json_encode(array('errorMsg' => 'El o la permiso_visualizacion_tipo_documento ya existe, intento nuevamente.'));
        }
    } else if ($accion == "BORRAR") {
        $idCargo = htmlspecialchars($_REQUEST['idCargo']);

        $result = $control->removePermiso_visualizacion_tipo_documento($idCargo);
        if ($result) {
            echo json_encode(array('success' => true, 'mensaje' => "Permiso_visualizacion_tipo_documento borrado correctamente"));
        } else {
            echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
        }
    } else if ($accion == "BUSCAR") {
        $cadena = htmlspecialchars($_REQUEST['cadena']);
        $permiso_visualizacion_tipo_documentos = $control->getPermiso_visualizacion_tipo_documentoLikeAtrr($cadena);
        $json = json_encode($permiso_visualizacion_tipo_documentos);
        echo $json;
    } else if ($accion == "BUSCAR_BY_ID") {
        $idCargo = htmlspecialchars($_REQUEST['idCargo']);

        $permiso_visualizacion_tipo_documento = $control->getPermiso_visualizacion_tipo_documentoByID($idCargo);
        $json = json_encode($permiso_visualizacion_tipo_documento);
        echo $json;
    } else if ($accion == "ACTUALIZAR") {
        $idTipoDocumento = htmlspecialchars($_REQUEST['idTipoDocumento']);
        $idCargo = htmlspecialchars($_REQUEST['idCargo']);

            $permiso_visualizacion_tipo_documento = new Permiso_visualizacion_tipo_documentoDTO();
            $permiso_visualizacion_tipo_documento->setIdTipoDocumento($idTipoDocumento);
            $permiso_visualizacion_tipo_documento->setIdCargo($idCargo);

        $result = $control->updatePermiso_visualizacion_tipo_documento($permiso_visualizacion_tipo_documento);
        if ($result) {
            echo json_encode(array(
                'success' => true,
                'mensaje' => "Permiso_visualizacion_tipo_documento actualizada correctamente"
            ));
        } else {
            echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
        }
    }
}
