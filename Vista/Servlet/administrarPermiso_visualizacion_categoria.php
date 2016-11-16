<?php

include_once '../../Controlador/SCI_SCHC.php';

$control = SCI_SCHC::getInstancia();

$accion = htmlspecialchars($_REQUEST['accion']);
if ($accion != null) {
    if ($accion == "LISTADO") {
        $permiso_visualizacion_categorias = $control->getAllPermiso_visualizacion_categorias();
        $json = json_encode($permiso_visualizacion_categorias);
        echo $json;
    } else if ($accion == "AGREGAR") {
        $idCargo = htmlspecialchars($_REQUEST['idCargo']);
        $idCategoria = htmlspecialchars($_REQUEST['idCategoria']);

        $object = $control->getPermiso_visualizacion_categoriaByID($idCargo);
        if (($object->getIdCargo() == null || $object->getIdCargo() == "")) {
            $permiso_visualizacion_categoria = new Permiso_visualizacion_categoriaDTO();
            $permiso_visualizacion_categoria->setIdCargo($idCargo);
            $permiso_visualizacion_categoria->setIdCategoria($idCategoria);

            $result = $control->addPermiso_visualizacion_categoria($permiso_visualizacion_categoria);

            if ($result) {
                echo json_encode(array(
                    'success' => true,
                    'mensaje' => "Permiso_visualizacion_categoria ingresada correctamente"
                ));
            } else {
                echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
            }
        } else {
            echo json_encode(array('errorMsg' => 'El o la permiso_visualizacion_categoria ya existe, intento nuevamente.'));
        }
    } else if ($accion == "BORRAR") {
        $idCargo = htmlspecialchars($_REQUEST['idCargo']);

        $result = $control->removePermiso_visualizacion_categoria($idCargo);
        if ($result) {
            echo json_encode(array('success' => true, 'mensaje' => "Permiso_visualizacion_categoria borrado correctamente"));
        } else {
            echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
        }
    } else if ($accion == "BUSCAR") {
        $cadena = htmlspecialchars($_REQUEST['cadena']);
        $permiso_visualizacion_categorias = $control->getPermiso_visualizacion_categoriaLikeAtrr($cadena);
        $json = json_encode($permiso_visualizacion_categorias);
        echo $json;
    } else if ($accion == "BUSCAR_BY_ID") {
        $idCargo = htmlspecialchars($_REQUEST['idCargo']);

        $permiso_visualizacion_categoria = $control->getPermiso_visualizacion_categoriaByID($idCargo);
        $json = json_encode($permiso_visualizacion_categoria);
        echo $json;
    } else if ($accion == "ACTUALIZAR") {
        $idCargo = htmlspecialchars($_REQUEST['idCargo']);
        $idCategoria = htmlspecialchars($_REQUEST['idCategoria']);

            $permiso_visualizacion_categoria = new Permiso_visualizacion_categoriaDTO();
            $permiso_visualizacion_categoria->setIdCargo($idCargo);
            $permiso_visualizacion_categoria->setIdCategoria($idCategoria);

        $result = $control->updatePermiso_visualizacion_categoria($permiso_visualizacion_categoria);
        if ($result) {
            echo json_encode(array(
                'success' => true,
                'mensaje' => "Permiso_visualizacion_categoria actualizada correctamente"
            ));
        } else {
            echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
        }
    }
}
