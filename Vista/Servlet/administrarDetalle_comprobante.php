<?php

include_once '../../Controlador/SCI_SCHC.php';

$control = SCI_SCHC::getInstancia();

$accion = htmlspecialchars($_REQUEST['accion']);
if ($accion != null) {
    if ($accion == "LISTADO") {
        $detalle_comprobantes = $control->getAllDetalle_comprobantes();
        $json = json_encode($detalle_comprobantes);
        echo $json;
    } else if ($accion == "AGREGAR") {
        $idRegistro = htmlspecialchars($_REQUEST['idRegistro']);
        $descripcion = htmlspecialchars($_REQUEST['descripcion']);
        $cantidad = htmlspecialchars($_REQUEST['cantidad']);
        $precio = htmlspecialchars($_REQUEST['precio']);

        $object = $control->getDetalle_comprobanteByID($idRegistro);
        if (($object->getIdRegistro() == null || $object->getIdRegistro() == "")) {
            $detalle_comprobante = new Detalle_comprobanteDTO();
            $detalle_comprobante->setIdRegistro($idRegistro);
            $detalle_comprobante->setDescripcion($descripcion);
            $detalle_comprobante->setCantidad($cantidad);
            $detalle_comprobante->setPrecio($precio);

            $result = $control->addDetalle_comprobante($detalle_comprobante);

            if ($result) {
                echo json_encode(array(
                    'success' => true,
                    'mensaje' => "Detalle_comprobante ingresada correctamente"
                ));
            } else {
                echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
            }
        } else {
            echo json_encode(array('errorMsg' => 'El o la detalle_comprobante ya existe, intento nuevamente.'));
        }
    } else if ($accion == "BORRAR") {
        $idRegistro = htmlspecialchars($_REQUEST['idRegistro']);

        $result = $control->removeDetalle_comprobante($idRegistro);
        if ($result) {
            echo json_encode(array('success' => true, 'mensaje' => "Detalle_comprobante borrado correctamente"));
        } else {
            echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
        }
    } else if ($accion == "BUSCAR") {
        $cadena = htmlspecialchars($_REQUEST['cadena']);
        $detalle_comprobantes = $control->getDetalle_comprobanteLikeAtrr($cadena);
        $json = json_encode($detalle_comprobantes);
        echo $json;
    } else if ($accion == "BUSCAR_BY_ID") {
        $idRegistro = htmlspecialchars($_REQUEST['idRegistro']);

        $detalle_comprobante = $control->getDetalle_comprobanteByID($idRegistro);
        $json = json_encode($detalle_comprobante);
        echo $json;
    } else if ($accion == "ACTUALIZAR") {
        $idRegistro = htmlspecialchars($_REQUEST['idRegistro']);
        $descripcion = htmlspecialchars($_REQUEST['descripcion']);
        $cantidad = htmlspecialchars($_REQUEST['cantidad']);
        $precio = htmlspecialchars($_REQUEST['precio']);

            $detalle_comprobante = new Detalle_comprobanteDTO();
            $detalle_comprobante->setIdRegistro($idRegistro);
            $detalle_comprobante->setDescripcion($descripcion);
            $detalle_comprobante->setCantidad($cantidad);
            $detalle_comprobante->setPrecio($precio);

        $result = $control->updateDetalle_comprobante($detalle_comprobante);
        if ($result) {
            echo json_encode(array(
                'success' => true,
                'mensaje' => "Detalle_comprobante actualizada correctamente"
            ));
        } else {
            echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
        }
    }
}
