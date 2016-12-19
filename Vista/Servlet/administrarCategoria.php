<?php

include_once '../../Controlador/SCI_SCHC.php';

$control = SCI_SCHC::getInstancia();

$accion = htmlspecialchars($_REQUEST['accion']);
if ($accion != null) {
    if ($accion == "LISTADO") {
        $categorias = $control->getAllCategorias();
        $json = json_encode($categorias);
        echo $json;
    }
    if ($accion == "LISTADOAUXILIAR") {
        $categorias = $control->getAllCategoriasAuxiliar();
        $json = json_encode($categorias);
        echo $json;
    } else if ($accion == "AGREGAR") {
        $nombre = htmlspecialchars($_REQUEST['nombre']);
        $descripcion = htmlspecialchars($_REQUEST['descripcion']);
        $idCargos = $_REQUEST["idCargo"];

        $idCategoria = $control->getIdDisponible_Categoria();
        $categoria = new CategoriaDTO();
        $categoria->setIdCategoria($idCategoria);
        $categoria->setNombre($nombre);
        $categoria->setDescripcion($descripcion);

        $result = $control->addCategoria($categoria);

        foreach ($_REQUEST['idCargo'] as $id) {
            $permiso = new Permiso_visualizacion_categoriaDTO();
            $permiso->setIdCategoria($idCategoria);
            $permiso->setIdCargo($id);

            $resultPermisos = $control->addPermiso_visualizacion_categoria($permiso);
        }

        if ($result) {
            echo json_encode(array(
                'success' => true,
                'mensaje' => "Categoria ingresada correctamente"
            ));
        } else {
            echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
        }
    } else if ($accion == "BORRAR") {
        $idCategoria = htmlspecialchars($_REQUEST['idCategoria']);

        //Consulta si tiene bienes
        $bienes = $control->getBienesByIdCategoria($idCategoria);
        //Consulta si tiene Productos
        $productos = $control->getProductosByIdCategoria($idCategoria);

        if (count($bienes) == 0 && count($productos) == 0) {
            $result = $control->removeCategoria($idCategoria);
            if ($result) {
                echo json_encode(array('success' => true, 'mensaje' => "Categoria borrado correctamente"));
            } else {
                echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
            }
        } else {
            echo json_encode(array('errorMsg' => 'No se puede eliminar la categoria, tiene bienes o productos asociados.'));
        }
    } else if ($accion == "BUSCAR") {
        $cadena = htmlspecialchars($_REQUEST['cadena']);
        $categorias = $control->getCategoriaLikeAtrr($cadena);
        $json = json_encode($categorias);
        echo $json;
    } else if ($accion == "BUSCAR_BY_ID") {
        $idCategoria = htmlspecialchars($_REQUEST['idCategoria']);
        
        $permisos = $control->getAllPermiso_visualizacion_categoriaByIdCategoria($idCategoria);

        $categoria = $control->getCategoriaByID($idCategoria);
        $json = json_encode(array("categoria" => $categoria,"permisos" => $permisos));
        echo $json;
    } else if ($accion == "ACTUALIZAR") {
        $idCategoria = htmlspecialchars($_REQUEST['idCategoria']);
        $nombre = htmlspecialchars($_REQUEST['nombre']);
        $descripcion = htmlspecialchars($_REQUEST['descripcion']);
        $idCargos = $_REQUEST["idCargo"];

        $categoria = new CategoriaDTO();
        $categoria->setIdCategoria($idCategoria);
        $categoria->setNombre($nombre);
        $categoria->setDescripcion($descripcion);

        $result = $control->updateCategoria($categoria);
        $resultDeletePermisos = $control->removePermiso_visualizacion_categoria_idCategoria($idCategoria);
        
        foreach ($_REQUEST['idCargo'] as $id) {
            $permiso = new Permiso_visualizacion_categoriaDTO();
            $permiso->setIdCategoria($idCategoria);
            $permiso->setIdCargo($id);

            $resultPermisos = $control->addPermiso_visualizacion_categoria($permiso);
        }
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
