<?php

include_once '../../Controlador/SCI_SCHC.php';

$control = SCI_SCHC::getInstancia();

$accion = htmlspecialchars($_REQUEST['accion']);
if ($accion != null) {
    if ($accion == "LISTADO") {
        $documentos = $control->getAllDocumentos();
        $json = json_encode($documentos);
        echo $json;
    } else if ($accion == "AGREGAR") {
        $idDocumento = htmlspecialchars($_REQUEST['idDocumento']);
        $runFuncionaria = htmlspecialchars($_REQUEST['runFuncionaria']);
        $idTipoDocumento = htmlspecialchars($_REQUEST['idTipoDocumento']);
        $nombre = htmlspecialchars($_REQUEST['nombre']);
        $descripcion = htmlspecialchars($_REQUEST['descripcion']);
        $fechaRegistro = htmlspecialchars($_REQUEST['fechaRegistro']);
        $rutaDocumento = htmlspecialchars($_REQUEST['rutaDocumento']);
        $tamano = htmlspecialchars($_REQUEST['tamano']);

        $object = $control->getDocumentoByID($idDocumento);
        if (($object->getIdDocumento() == null || $object->getIdDocumento() == "")) {
            $documento = new DocumentoDTO();
            $documento->setIdDocumento($idDocumento);
            $documento->setRunFuncionaria($runFuncionaria);
            $documento->setIdTipoDocumento($idTipoDocumento);
            $documento->setNombre($nombre);
            $documento->setDescripcion($descripcion);
            $documento->setFechaRegistro($fechaRegistro);
            $documento->setRutaDocumento($rutaDocumento);
            $documento->setTamano($tamano);

            $result = $control->addDocumento($documento);

            if ($result) {
                echo json_encode(array(
                    'success' => true,
                    'mensaje' => "Documento ingresada correctamente"
                ));
            } else {
                echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
            }
        } else {
            echo json_encode(array('errorMsg' => 'El o la documento ya existe, intento nuevamente.'));
        }
    } else if ($accion == "BORRAR") {
        $idDocumento = htmlspecialchars($_REQUEST['idDocumento']);

        $result = $control->removeDocumento($idDocumento);
        if ($result) {
            echo json_encode(array('success' => true, 'mensaje' => "Documento borrado correctamente"));
        } else {
            echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
        }
    } else if ($accion == "BUSCAR") {
        $cadena = htmlspecialchars($_REQUEST['cadena']);
        $documentos = $control->getDocumentoLikeAtrr($cadena);
        $json = json_encode($documentos);
        echo $json;
    } else if ($accion == "BUSCAR_BY_ID") {
        $idDocumento = htmlspecialchars($_REQUEST['idDocumento']);

        $documento = $control->getDocumentoByID($idDocumento);
        $json = json_encode($documento);
        echo $json;
    } else if ($accion == "ACTUALIZAR") {
        $idDocumento = htmlspecialchars($_REQUEST['idDocumento']);
        $runFuncionaria = htmlspecialchars($_REQUEST['runFuncionaria']);
        $idTipoDocumento = htmlspecialchars($_REQUEST['idTipoDocumento']);
        $nombre = htmlspecialchars($_REQUEST['nombre']);
        $descripcion = htmlspecialchars($_REQUEST['descripcion']);
        $fechaRegistro = htmlspecialchars($_REQUEST['fechaRegistro']);
        $rutaDocumento = htmlspecialchars($_REQUEST['rutaDocumento']);
        $tamano = htmlspecialchars($_REQUEST['tamano']);

            $documento = new DocumentoDTO();
            $documento->setIdDocumento($idDocumento);
            $documento->setRunFuncionaria($runFuncionaria);
            $documento->setIdTipoDocumento($idTipoDocumento);
            $documento->setNombre($nombre);
            $documento->setDescripcion($descripcion);
            $documento->setFechaRegistro($fechaRegistro);
            $documento->setRutaDocumento($rutaDocumento);
            $documento->setTamano($tamano);

        $result = $control->updateDocumento($documento);
        if ($result) {
            echo json_encode(array(
                'success' => true,
                'mensaje' => "Documento actualizada correctamente"
            ));
        } else {
            echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
        }
    }
}
