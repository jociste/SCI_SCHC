<?php

include_once '../../Controlador/SCI_SCHC.php';

$control = SCI_SCHC::getInstancia();

$accion = htmlspecialchars($_REQUEST['accion']);
if ($accion != null) {
    if ($accion == "LISTADO") {
        $perfil = htmlspecialchars($_REQUEST['perfil']);
        $tipo_documentos = $control->getAllTipo_documentos($perfil);
        $json = json_encode($tipo_documentos);
        echo $json;
    } else if ($accion == "AGREGAR") {
        $nombre = htmlspecialchars($_REQUEST['nombre']);
        $descripcion = htmlspecialchars($_REQUEST['descripcion']);
        $idCargos = $_REQUEST["idCargo"];

        $object = $control->getTipo_documentoByNombre($nombre);
        if (($object->getIdTipoDocumento() == null || $object->getIdTipoDocumento() == "")) {

            $idTipoDocumento = $control->getIdTipoDocumentoDisponible();
            
            $tipo_documento = new Tipo_documentoDTO();
            $tipo_documento->setIdTipoDocumento($idTipoDocumento);
            $tipo_documento->setNombre($nombre);
            $tipo_documento->setDescripcion($descripcion);

            $result = $control->addTipo_documento($tipo_documento);

            foreach ($_REQUEST['idCargo'] as $id) {
                $permiso = new Permiso_visualizacion_tipo_documentoDTO();
                $permiso->setIdTipoDocumento($idTipoDocumento);
                $permiso->setIdCargo($id);

                $resultPermisos = $control->addPermiso_visualizacion_tipo_documento($permiso);
            }

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
        $cantidad = $control->Cuentacategoriadocumentosusadas($idTipoDocumento);
        if ($cantidad == 0) {
            $result = $control->removeTipo_documento($idTipoDocumento);
            $resultPermisos = $control->removePermiso_visualizacion_tipo_documento_idTipoDocumento($idTipoDocumento);
        } else {
            $result = false;
        }
        if ($result) {
            if ($resultPermisos) {
                echo json_encode(array('success' => true, 'mensaje' => "Tipo documento eliminado correctamente"));
            } else {
                echo json_encode(array('errorMsg' => 'Lo sentimos, ha ocurrido un error al intentar eliminar los permisos de visualización asociados'));
            }
        } else {
            echo json_encode(array('errorMsg' => 'Lo sentimos, no es posible eliminar este tipo, ya que tiene documentos asociados'));
        }
    } else if ($accion == "BUSCAR") {
        $cadena = htmlspecialchars($_REQUEST['cadena']);
        $tipo_documentos = $control->getTipo_documentoLikeAtrr($cadena);
        $json = json_encode($tipo_documentos);
        echo $json;
    } else if ($accion == "BUSCAR_BY_ID") {
        $idTipoDocumento = htmlspecialchars($_REQUEST['idTipoDocumento']);

        $permisos = $control->getAllPermiso_visualizacion_tipo_documentos_idTipoDocumento($idTipoDocumento);

        $tipo_documento = $control->getTipo_documentoByID($idTipoDocumento);
        $json = json_encode(array("tipo_documento" => $tipo_documento, "permisos" => $permisos));
        echo $json;
    } else if ($accion == "ACTUALIZAR") {
        $idTipoDocumento = htmlspecialchars($_REQUEST['idTipoDocumento']);
        $nombre = htmlspecialchars($_REQUEST['nombre']);
        $descripcion = htmlspecialchars($_REQUEST['descripcion']);
        $fechaCreacion = htmlspecialchars($_REQUEST['fechaCreacion']);
        $idCargos = $_REQUEST["idCargo"];

        $tipo_documento = new Tipo_documentoDTO();
        $tipo_documento->setIdTipoDocumento($idTipoDocumento);
        $tipo_documento->setNombre($nombre);
        $tipo_documento->setDescripcion($descripcion);
        $tipo_documento->setFechaCreacion($fechaCreacion);

        $result = $control->updateTipo_documento($tipo_documento);
        $resultDeletePermisos = $control->removePermiso_visualizacion_tipo_documento_idTipoDocumento($idTipoDocumento);

        foreach ($_REQUEST['idCargo'] as $id) {
            $permiso = new Permiso_visualizacion_tipo_documentoDTO();
            $permiso->setIdTipoDocumento($idTipoDocumento);
            $permiso->setIdCargo($id);

            $resultPermisos = $control->addPermiso_visualizacion_tipo_documento($permiso);
        }


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
