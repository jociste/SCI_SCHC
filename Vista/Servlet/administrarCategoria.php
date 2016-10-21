<?php

include_once '../../Controlador/SCI_SCHC.php';

$control = SCI_SCHC::getInstancia();

$accion = htmlspecialchars($_REQUEST['accion']);
if ($accion != null) {
    if ($accion == "LISTADO") {
        $categorias = $control->getAllCategorias();
        $json = json_encode($categorias);
        echo $json;
    } else if ($accion == "AGREGAR") {
        $idCategoria = htmlspecialchars($_REQUEST['idCategoria']);
        $nombre = htmlspecialchars($_REQUEST['nombre']);
        $descripcion = htmlspecialchars($_REQUEST['descripcion']);

        $object = $control->getCategoriaByID($idCategoria);
        if (($object->getIdCategoria() == null || $object->getIdCategoria() == "")) {
            $categoria = new CategoriaDTO();
            $categoria->setIdCategoria($idCategoria);
            $categoria->setNombre($nombre);
            $categoria->setDescripcion($descripcion);

            $result = $control->addCategoria($categoria);

            if ($result) {
                echo json_encode(array(
                    'success' => true,
                    'mensaje' => "Categoria ingresada correctamente"
                ));
            } else {
                echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
            }
        } else {
            echo json_encode(array('errorMsg' => 'El o la categoria ya existe, intento nuevamente.'));
        }
    } else if ($accion == "BORRAR") {
        $idCategoria = htmlspecialchars($_REQUEST['idCategoria']);

        $result = $control->removeCategoria($idCategoria);
        if ($result) {
            echo json_encode(array('success' => true, 'mensaje' => "Categoria borrado correctamente"));
        } else {
            echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
        }
    } else if ($accion == "BUSCAR") {
        $cadena = htmlspecialchars($_REQUEST['cadena']);
        $categorias = $control->getCategoriaLikeAtrr($cadena);
        $json = json_encode($categorias);
        echo $json;
    } else if ($accion == "BUSCAR_BY_ID") {
        $idCategoria = htmlspecialchars($_REQUEST['idCategoria']);

        $categoria = $control->getCategoriaByID($idCategoria);
        $json = json_encode($categoria);
        echo $json;
    } else if ($accion == "ACTUALIZAR") {
        $idCategoria = htmlspecialchars($_REQUEST['idCategoria']);
        $nombre = htmlspecialchars($_REQUEST['nombre']);
        $descripcion = htmlspecialchars($_REQUEST['descripcion']);

            $categoria = new CategoriaDTO();
            $categoria->setIdCategoria($idCategoria);
            $categoria->setNombre($nombre);
            $categoria->setDescripcion($descripcion);

        $result = $control->updateCategoria($categoria);
        if ($result) {
            echo json_encode(array(
                'success' => true,
                'mensaje' => "Categoria actualizada correctamente"
            ));
        } else {
            echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
        }
    }
}
