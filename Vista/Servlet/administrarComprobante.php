<?php

include_once '../../Controlador/SCI_SCHC.php';

$control = SCI_SCHC::getInstancia();

$accion = htmlspecialchars($_REQUEST['accion']);
if ($accion != null) {
    if ($accion == "LISTADO") {
        $comprobantes = $control->getAllComprobantes();
        $json = json_encode($comprobantes);
        echo $json;
    } else if ($accion == "AGREGAR") {
        $idRegistro = htmlspecialchars($_REQUEST['idRegistro']);
        $idBien = htmlspecialchars($_REQUEST['idBien']);
        $numeroComprobante = htmlspecialchars($_REQUEST['numeroComprobante']);
        $proveedor = htmlspecialchars($_REQUEST['proveedor']);
        $fechaComprobante = htmlspecialchars($_REQUEST['fechaComprobante']);

        $object = $control->getComprobanteByID($idRegistro);
        if (($object->getIdRegistro() == null || $object->getIdRegistro() == "")) {
            $comprobante = new ComprobanteDTO();
            $comprobante->setIdRegistro($idRegistro);
            $comprobante->setIdBien($idBien);
            $comprobante->setNumeroComprobante($numeroComprobante);
            $comprobante->setProveedor($proveedor);
            $comprobante->setFechaComprobante($fechaComprobante);

            $result = $control->addComprobante($comprobante);

            if ($result) {
                echo json_encode(array(
                    'success' => true,
                    'mensaje' => "Comprobante ingresada correctamente"
                ));
            } else {
                echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
            }
        } else {
            echo json_encode(array('errorMsg' => 'El o la comprobante ya existe, intento nuevamente.'));
        }
    } else if ($accion == "BORRAR") {
        $idRegistro = htmlspecialchars($_REQUEST['idRegistro']);

        $result = $control->removeComprobante($idRegistro);
        if ($result) {
            echo json_encode(array('success' => true, 'mensaje' => "Comprobante borrado correctamente"));
        } else {
            echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
        }
    } else if ($accion == "BUSCAR") {
        $cadena = htmlspecialchars($_REQUEST['cadena']);
        $comprobantes = $control->getComprobanteLikeAtrr($cadena);
        $json = json_encode($comprobantes);
        echo $json;
    } else if ($accion == "BUSCAR_BY_ID") {
        $idRegistro = htmlspecialchars($_REQUEST['idRegistro']);

        $comprobante = $control->getComprobanteByID($idRegistro);
        $json = json_encode($comprobante);
        echo $json;
    } else if ($accion == "ACTUALIZAR") {
        $idRegistro = htmlspecialchars($_REQUEST['idRegistro']);
        $idBien = htmlspecialchars($_REQUEST['idBien']);
        $numeroComprobante = htmlspecialchars($_REQUEST['numeroComprobante']);
        $proveedor = htmlspecialchars($_REQUEST['proveedor']);
        $fechaComprobante = htmlspecialchars($_REQUEST['fechaComprobante']);

            $comprobante = new ComprobanteDTO();
            $comprobante->setIdRegistro($idRegistro);
            $comprobante->setIdBien($idBien);
            $comprobante->setNumeroComprobante($numeroComprobante);
            $comprobante->setProveedor($proveedor);
            $comprobante->setFechaComprobante($fechaComprobante);

        $result = $control->updateComprobante($comprobante);
        if ($result) {
            echo json_encode(array(
                'success' => true,
                'mensaje' => "Comprobante actualizada correctamente"
            ));
        } else {
            echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
        }
    }
}
