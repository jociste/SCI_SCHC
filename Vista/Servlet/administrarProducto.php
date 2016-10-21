<?php

include_once '../../Controlador/SCI_SCHC.php';

$control = SCI_SCHC::getInstancia();

$accion = htmlspecialchars($_REQUEST['accion']);
if ($accion != null) {
    if ($accion == "LISTADO") {
        $productos = $control->getAllProductos();
        $json = json_encode($productos);
        echo $json;
    } else if ($accion == "AGREGAR") {
        $idProducto = htmlspecialchars($_REQUEST['idProducto']);
        $idCategoria = htmlspecialchars($_REQUEST['idCategoria']);
        $nombre = htmlspecialchars($_REQUEST['nombre']);

        $object = $control->getProductoByID($idProducto);
        if (($object->getIdProducto() == null || $object->getIdProducto() == "")) {
            $producto = new ProductoDTO();
            $producto->setIdProducto($idProducto);
            $producto->setIdCategoria($idCategoria);
            $producto->setNombre($nombre);

            $result = $control->addProducto($producto);

            if ($result) {
                echo json_encode(array(
                    'success' => true,
                    'mensaje' => "Producto ingresada correctamente"
                ));
            } else {
                echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
            }
        } else {
            echo json_encode(array('errorMsg' => 'El o la producto ya existe, intento nuevamente.'));
        }
    } else if ($accion == "BORRAR") {
        $idProducto = htmlspecialchars($_REQUEST['idProducto']);

        $result = $control->removeProducto($idProducto);
        if ($result) {
            echo json_encode(array('success' => true, 'mensaje' => "Producto borrado correctamente"));
        } else {
            echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
        }
    } else if ($accion == "BUSCAR") {
        $cadena = htmlspecialchars($_REQUEST['cadena']);
        $productos = $control->getProductoLikeAtrr($cadena);
        $json = json_encode($productos);
        echo $json;
    } else if ($accion == "BUSCAR_BY_ID") {
        $idProducto = htmlspecialchars($_REQUEST['idProducto']);

        $producto = $control->getProductoByID($idProducto);
        $json = json_encode($producto);
        echo $json;
    } else if ($accion == "ACTUALIZAR") {
        $idProducto = htmlspecialchars($_REQUEST['idProducto']);
        $idCategoria = htmlspecialchars($_REQUEST['idCategoria']);
        $nombre = htmlspecialchars($_REQUEST['nombre']);

            $producto = new ProductoDTO();
            $producto->setIdProducto($idProducto);
            $producto->setIdCategoria($idCategoria);
            $producto->setNombre($nombre);

        $result = $control->updateProducto($producto);
        if ($result) {
            echo json_encode(array(
                'success' => true,
                'mensaje' => "Producto actualizada correctamente"
            ));
        } else {
            echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
        }
    }
}
