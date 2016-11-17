<?php

include_once '../../Controlador/SCI_SCHC.php';

$control = SCI_SCHC::getInstancia();

$accion = htmlspecialchars($_REQUEST['accion']);
if ($accion != null) {
    if ($accion == "LISTADO") {
        $tipo_documentos = $control->getAllTipo_documentos();
        $json = json_encode($tipo_documentos);
        echo $json;
    } else if ($accion == "AGREGAR") {        
        $nombre = htmlspecialchars($_REQUEST['nombre']);
        $descripcion = htmlspecialchars($_REQUEST['descripcion']);

        $object = $control->getTipo_documentoByNombre($nombre);
        if (($object->getIdTipoDocumento() == null || $object->getIdTipoDocumento() == "")) {
            $tipo_documento = new Tipo_documentoDTO();            
            $tipo_documento->setNombre($nombre);
            $tipo_documento->setDescripcion($descripcion);

            $result = $control->addTipo_documento($tipo_documento);

            if ($result) {
                echo json_encode(array(
                    'success' => true,
                    'mensaje' => "Tipo documento ingresada correctamente"
                ));
            } else {
                echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
            }
        } else {
            echo json_encode(array('errorMsg' => 'Ya existe una categoria con el nombre ingresado.'));
        }
    } else if ($accion == "BORRAR") {
        $idTipoDocumento = htmlspecialchars($_REQUEST['idTipoDocumento']);

        $result = $control->removeTipo_documento($idTipoDocumento);
        if ($result) {
            echo json_encode(array('success' => true, 'mensaje' => "Tipo_documento borrado correctamente"));
        } else {
            echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
        }
    } else if ($accion == "BUSCAR") {
        $cadena = htmlspecialchars($_REQUEST['cadena']);
        $tipo_documentos = $control->getTipo_documentoLikeAtrr($cadena);
        $json = json_encode($tipo_documentos);
        echo $json;
    } else if ($accion == "BUSCAR_BY_ID") {
        $idTipoDocumento = htmlspecialchars($_REQUEST['idTipoDocumento']);

        $tipo_documento = $control->getTipo_documentoByID($idTipoDocumento);
        $json = json_encode($tipo_documento);
        echo $json;
    } else if ($accion == "ACTUALIZAR") {
        $idTipoDocumento = htmlspecialchars($_REQUEST['idTipoDocumento']);
        $nombre = htmlspecialchars($_REQUEST['nombre']);
        $descripcion = htmlspecialchars($_REQUEST['descripcion']);
        $fechaCreacion = htmlspecialchars($_REQUEST['fechaCreacion']);

            $tipo_documento = new Tipo_documentoDTO();
            $tipo_documento->setIdTipoDocumento($idTipoDocumento);
            $tipo_documento->setNombre($nombre);
            $tipo_documento->setDescripcion($descripcion);
            $tipo_documento->setFechaCreacion($fechaCreacion);

        $result = $control->updateTipo_documento($tipo_documento);
        if ($result) {
            echo json_encode(array(
                'success' => true,
                'mensaje' => "Tipo_documento actualizada correctamente"
            ));
        } else {
            echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
        }
    }
}
