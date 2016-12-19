<?php

include_once '../../Controlador/SCI_SCHC.php';

$control = SCI_SCHC::getInstancia();

$accion = htmlspecialchars($_REQUEST['accion']);
if ($accion != null) {
    if ($accion == "LISTADO") {
        $productos = $control->getAllProductos();
        $json = json_encode($productos);
        echo $json;
    }
    if ($accion == "LISTADOAUXILIAR") {
        $productos = $control->getAllProductosAuxiliar();
        $json = json_encode($productos);
        echo $json;
    } else if ($accion == "AGREGAR") {
        $idCategoria = htmlspecialchars($_REQUEST['idCategoria']);
        $nombre = htmlspecialchars($_REQUEST['nombre']);

        $producto = new ProductoDTO();
        $producto->setIdCategoria($idCategoria);
        $producto->setNombre($nombre);

        $productos = $control->getProductoByNombreIdCategoria($nombre, $idCategoria);
        if (count($productos) == 0) {
            $result = $control->addProducto($producto);
            if ($result) {
                echo json_encode(array(
                    'success' => true,
                    'mensaje' => "Producto ingresado correctamente"
                ));
            } else {
                echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
            }
        } else {
            echo json_encode(array('errorMsg' => 'Ya existe un producto con el nombre ingresado en esta categoria.'));
        }
    } else if ($accion == "AGREGARPRODUCTO") {
        $idCategoria = htmlspecialchars($_REQUEST['idCategoriaProducto']);
        $nombre = htmlspecialchars($_REQUEST['nombreProducto']);

        $producto = new ProductoDTO();
        $producto->setIdCategoria($idCategoria);
        $producto->setNombre($nombre);

        $productos = $control->getProductoByNombreIdCategoria($nombre, $idCategoria);
        if (count($productos) == 0) {
            $result = $control->addProducto($producto);
            if ($result) {
                echo json_encode(array(
                    'success' => true,
                    'mensaje' => "Producto ingresado correctamente"
                ));
            } else {
                echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
            }
        } else {
            echo json_encode(array('errorMsg' => 'Ya existe un producto con el nombre ingresado en esta categoria.'));
        }
    } else if ($accion == "BORRAR") {
        $idProducto = htmlspecialchars($_REQUEST['idProducto']);

        //VALIDAR QUE NO ESTE EN NINGUN LOTE DE PRODUCTO (PENDIENTE)        

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
    } else if ($accion == "BUSCAR_BY_ID_CATEGORIA") {
        $idCategoria = htmlspecialchars($_REQUEST['idCategoria']);
        $productos = $control->getProductoByIDCategoria($idCategoria);
        $json = json_encode($productos);
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
    