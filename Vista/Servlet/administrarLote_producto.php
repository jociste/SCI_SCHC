<?php

include_once '../../Controlador/SCI_SCHC.php';

$control = SCI_SCHC::getInstancia();

$accion = htmlspecialchars($_REQUEST['accion']);
if ($accion != null) {
    if ($accion == "LISTADO") {
        $lote_productos = $control->getAllLote_productos();
        $json = json_encode($lote_productos);
        echo $json;
    } else if ($accion == "AGREGAR") {
        $idLote = htmlspecialchars($_REQUEST['idLote']);
        $idProducto = htmlspecialchars($_REQUEST['idProducto']);
        $numeroBoleta = htmlspecialchars($_REQUEST['numeroBoleta']);
        $proveedor = htmlspecialchars($_REQUEST['proveedor']);
        $cantidad = htmlspecialchars($_REQUEST['cantidad']);
        $fechaVencimiento = htmlspecialchars($_REQUEST['fechaVencimiento']);
        $fechaIngreso = htmlspecialchars($_REQUEST['fechaIngreso']);

        $object = $control->getLote_productoByID($idLote);
        if (($object->getIdLote() == null || $object->getIdLote() == "")) {
            $lote_producto = new Lote_productoDTO();
            $lote_producto->setIdLote($idLote);
            $lote_producto->setIdProducto($idProducto);
            $lote_producto->setNumeroBoleta($numeroBoleta);
            $lote_producto->setProveedor($proveedor);
            $lote_producto->setCantidad($cantidad);
            $lote_producto->setFechaVencimiento($fechaVencimiento);
            $lote_producto->setFechaIngreso($fechaIngreso);

            $result = $control->addLote_producto($lote_producto);

            if ($result) {
                echo json_encode(array(
                    'success' => true,
                    'mensaje' => "Lote_producto ingresada correctamente"
                ));
            } else {
                echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
            }
        } else {
            echo json_encode(array('errorMsg' => 'El o la lote_producto ya existe, intento nuevamente.'));
        }
    } else if ($accion == "BORRAR") {
        $idLote = htmlspecialchars($_REQUEST['idLote']);

        $result = $control->removeLote_producto($idLote);
        if ($result) {
            echo json_encode(array('success' => true, 'mensaje' => "Lote_producto borrado correctamente"));
        } else {
            echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
        }
    } else if ($accion == "BUSCAR") {
        $cadena = htmlspecialchars($_REQUEST['cadena']);
        $lote_productos = $control->getLote_productoLikeAtrr($cadena);
        $json = json_encode($lote_productos);
        echo $json;
    } else if ($accion == "BUSCAR_BY_ID") {
        $idLote = htmlspecialchars($_REQUEST['idLote']);

        $lote_producto = $control->getLote_productoByID($idLote);
        $json = json_encode($lote_producto);
        echo $json;
    } else if ($accion == "ACTUALIZAR") {
        $idLote = htmlspecialchars($_REQUEST['idLote']);
        $idProducto = htmlspecialchars($_REQUEST['idProducto']);
        $numeroBoleta = htmlspecialchars($_REQUEST['numeroBoleta']);
        $proveedor = htmlspecialchars($_REQUEST['proveedor']);
        $cantidad = htmlspecialchars($_REQUEST['cantidad']);
        $fechaVencimiento = htmlspecialchars($_REQUEST['fechaVencimiento']);
        $fechaIngreso = htmlspecialchars($_REQUEST['fechaIngreso']);

            $lote_producto = new Lote_productoDTO();
            $lote_producto->setIdLote($idLote);
            $lote_producto->setIdProducto($idProducto);
            $lote_producto->setNumeroBoleta($numeroBoleta);
            $lote_producto->setProveedor($proveedor);
            $lote_producto->setCantidad($cantidad);
            $lote_producto->setFechaVencimiento($fechaVencimiento);
            $lote_producto->setFechaIngreso($fechaIngreso);

        $result = $control->updateLote_producto($lote_producto);
        if ($result) {
            echo json_encode(array(
                'success' => true,
                'mensaje' => "Lote_producto actualizada correctamente"
            ));
        } else {
            echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
        }
    }
}
