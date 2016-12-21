<?php

include_once '../../Controlador/SCI_SCHC.php';

$control = SCI_SCHC::getInstancia();

$accion = htmlspecialchars($_REQUEST['accion']);
if ($accion != null) {
    if ($accion == "LISTADO") {
        $documentos = $control->getAllDocumentos();
        $json = json_encode($documentos);
        echo $json;
    } if ($accion == "LISTADO_PAPELERA") {
        $documentos = $control->getAllDocumentosPapelera();
        $json = json_encode($documentos);
        echo $json;
    } if ($accion == "LISTADO_VIGENTES") {
        $documentos = $control->getAllDocumentosVigentes();
        $json = json_encode($documentos);
        echo $json;
    } else if ($accion == "AGREGAR") {
        session_start();
        $runFuncionaria = $_SESSION["run"];
        $idTipoDocumento = htmlspecialchars($_REQUEST['idTipoDocumento']);
        $nombre = htmlspecialchars($_REQUEST['nombre']);
        $descripcion = htmlspecialchars($_REQUEST['descripcion']);
        $fechaRegistro = htmlspecialchars($_REQUEST['fechaRegistro']);

        /* Diferenciador nombre archivo */
        $hoy = getdate();
        $año = $hoy['year'];
        $mes = $hoy['mon'];
        $dia = $hoy['wday'];
        $hora = $hoy['hours'];
        $minutos = $hoy['minutes'];
        $segundos = $hoy['seconds'];
        $diferenciador = $año . "" . $mes . "" . $dia . "" . $hora . "" . $minutos . "" . $segundos;

        /* Subir Archivo */
        $tipoDocumento = $control->getTipo_documentoByID($idTipoDocumento);
        $dir_subida = "../../Files/Documentos";
        if (!file_exists($dir_subida)) {/* Creamos directorio si no existe */
            mkdir($dir_subida, 0777, true);
        }
        $extensionesPermitidas = array(
            "pdf" => "Pdf",
            "txt" => "Txt",
            "xml" => "Xml",
            "xls" => "Excel",
            "xlsx" => "Excel",
            "xlsm" => "Excel",
            "xlsb" => "Excel",
            "xl" => "Excel",
            "xla" => "Excel",
            "xlb" => "Excel",
            "xlc" => "Excel",
            "xld" => "Excel",
            "xlk" => "Excel",
            "xll" => "Excel",
            "xlm" => "Excel",
            "xlsb" => "Excel",
            "xlshtml" => "Excel",
            "xlsm" => "Excel",
            "xlt" => "Excel",
            "xlv" => "Excel",
            "xlw" => "Excel",
            "docx" => "Word",
            "dotx" => "Word",
            "doc" => "Word",
            "dot" => "Word",
            "dotx" => "Word",
            "dotm" => "Word",
            "docm" => "Word",
            "rtf" => "Word",
            "pps" => "Power Point",
            "ppt" => "Power Point",
            "pptx" => "Power Point",
            "pptm" => "Power Point",
            "ppsx" => "Power Point",
            "ppsm" => "Power Point",
            "potx" => "Power Point",
            "potm" => "Power Point",
            "pot" => "Power Point",
            "jpg" => "Imagen",
            "row" => "Imagen",
            "psd" => "Imagen",
            "bmp" => "Imagen",
            "tiff" => "Imagen",
            "xcf" => "Imagen",
            "gif" => "Imagen",
            "png" => "Imagen",
            "eps" => "Imagen",
            "pcx" => "Imagen",
            "pict" => "Imagen",
            "dng" => "Imagen",
            "wmp" => "Imagen",
            "psb" => "Imagen",
            "jp2" => "Imagen",
            "jpeg" => "Imagen",
            "jpge" => "Imagen"
        );
        $aux = explode(".", $_FILES['documento']['name']);
        $extension = $aux[count($aux) - 1];
        $rutaDocumento = $dir_subida . "/" . $tipoDocumento->getNombre() . "_" . $diferenciador . "." . $extension;
        /* Tamaño Archivo */
        $bytes = $_FILES['documento']['size'];
        $kilobyte = round(($bytes / 1024));
        $megabyte = round(($bytes / 1048576), 2);
        $tamano = "";
        if ($megabyte >= 1) {
            $tamano = $megabyte . " Mb";
        } else {
            $tamano = $kilobyte . " Kb";
        }


        if (array_key_exists(strtolower($extension), $extensionesPermitidas)) {
            if ($megabyte <= 20) {
                $resultSubir = move_uploaded_file($_FILES['documento']['tmp_name'], $rutaDocumento);
                if ($resultSubir) {
                    /* Registrar en la BD */
                    $documento = new DocumentoDTO();
                    $documento->setRunFuncionaria($runFuncionaria);
                    $documento->setIdTipoDocumento($idTipoDocumento);
                    $documento->setNombre($nombre);
                    $documento->setDescripcion($descripcion);
                    $documento->setFechaRegistro($fechaRegistro);
                    $documento->setRutaDocumento($rutaDocumento);
                    $documento->setTamano($tamano);
                    $documento->setFormato($extensionesPermitidas[$extension]);
                    $documento->setEstado(1);

                    $result = $control->addDocumento($documento);

                    if ($result) {
                        echo json_encode(array(
                            'success' => true,
                            'mensaje' => "Documento ingresada correctamente"
                        ));
                    } else {
                        unlink($rutaDocumento);
                        echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
                    }
                } else {
                    echo json_encode(array('errorMsg' => 'Ocurrio un error al subir el documento.'));
                }
            } else {
                echo json_encode(array('errorMsg' => 'El tamaño del archivo no debe superar los 20 MB'));
            }
        } else {
            echo json_encode(array('errorMsg' => 'El documento ingresado no es un formato permitido. (contactese con el administrador)'));
        }
    } else if ($accion == "BORRAR") {
        $idDocumento = htmlspecialchars($_REQUEST['idDocumento']);

        $documento = $control->getDocumentoByID($idDocumento);
        $result = $control->removeDocumento($idDocumento);
        if ($result) {
            unlink($documento->getRutaDocumento());
            echo json_encode(array('success' => true, 'mensaje' => "Documento borrado correctamente"));
        } else {
            echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
        }
    } else if ($accion == "ENVIAR_A_PAPELERA") {
        $idDocumento = htmlspecialchars($_REQUEST['idDocumento']);

        $documento = $control->getDocumentoByID($idDocumento);
        $documento->setEstado(0);
        $result = $control->updateDocumento($documento);
        if ($result) {
            echo json_encode(array('success' => true, 'mensaje' => "Documento borrado correctamente"));
        } else {
            echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
        }
    } else if ($accion == "BUSCAR") {
        $cadena = htmlspecialchars($_REQUEST['cadena']);
        $idTipoDocumento = htmlspecialchars($_REQUEST['idTipoDocumento']);

        $documentos = $control->getDocumentoLikeAtrr($cadena, $idTipoDocumento);
        $json = json_encode($documentos);
        echo $json;
    } else if ($accion == "BUSCAR_PAPELERA") {
        $cadena = htmlspecialchars($_REQUEST['cadena']);

        $documentos = $control->getDocumentoLikeAtrrPapelera($cadena);
        $json = json_encode($documentos);
        echo $json;
    } else if ($accion == "BUSCAR_DOCUMENTO_VALIDOS") {
        $cadena = htmlspecialchars($_REQUEST['cadena']);

        $documentos = $control->getDocumentoLikeAtrrDocumentosValidos($cadena);
        $json = json_encode($documentos);
        echo $json;
    } else if ($accion == "BUSCAR_BY_ID") {
        $idDocumento = htmlspecialchars($_REQUEST['idDocumento']);

        $documento = $control->getDocumentoByID($idDocumento);
        $json = json_encode($documento);
        echo $json;
    } else if ($accion == "ACTUALIZAR") {
        $idDocumento = htmlspecialchars($_REQUEST['idDocumento']);
        $idTipoDocumento = htmlspecialchars($_REQUEST['idTipoDocumento']);
        $nombre = htmlspecialchars($_REQUEST['nombre']);
        $descripcion = htmlspecialchars($_REQUEST['descripcion']);
        $fechaRegistro = htmlspecialchars($_REQUEST['fechaRegistro']);

        $documento = $control->getDocumentoByID($idDocumento);
        $documento->setIdTipoDocumento($idTipoDocumento);
        $documento->setNombre($nombre);
        $documento->setDescripcion($descripcion);
        $documento->setFechaRegistro($fechaRegistro);

        $result = $control->updateDocumento($documento);
        if ($result) {
            echo json_encode(array(
                'success' => true,
                'mensaje' => "Documento actualizada correctamente"
            ));
        } else {
            echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
        }
    } else if ($accion == "RESTAURAR_PAPELERA") {
        $idDocumento = htmlspecialchars($_REQUEST['idDocumento']);

        $documento = $control->getDocumentoByID($idDocumento);
        $documento->setEstado(1);
        $result = $control->updateDocumento($documento);

        if ($result) {
            echo json_encode(array(
                'success' => true,
                'mensaje' => "Documento Restaurado correctamente"
            ));
        } else {
            echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
        }
    }
}
