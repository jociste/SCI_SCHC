<?php

include_once '../../Controlador/SCI_SCHC.php';

$control = SCI_SCHC::getInstancia();

$accion = htmlspecialchars($_REQUEST['accion']);
if ($accion != null) {
    if ($accion == "LISTADO") {
        $lote_producto_usadoss = $control->getAllLote_producto_usadoss();
        $json = json_encode($lote_producto_usadoss);
        echo $json;
    } else if ($accion == "AGREGAR") {
        $idLote = htmlspecialchars($_REQUEST['idLote']);
        $runFuncionaria = htmlspecialchars($_REQUEST['runFuncionaria']);
        $cantidad = htmlspecialchars($_REQUEST['cantidad']);
        $fechaRetiro = htmlspecialchars($_REQUEST['fechaRetiro']);
        $destino = htmlspecialchars($_REQUEST['destino']);

        $object = $control->getLote_producto_usadosByID($idLote);
        if (($object->getIdLote() == null || $object->getIdLote() == "")) {
            $lote_producto_usados = new Lote_producto_usadosDTO();
            $lote_producto_usados->setIdLote($idLote);
            $lote_producto_usados->setRunFuncionaria($runFuncionaria);
            $lote_producto_usados->setCantidad($cantidad);
            $lote_producto_usados->setFechaRetiro($fechaRetiro);
            $lote_producto_usados->setDestino($destino);

            $result = $control->addLote_producto_usados($lote_producto_usados);

            if ($result) {
                echo json_encode(array(
                    'success' => true,
                    'mensaje' => "Lote_producto_usados ingresada correctamente"
                ));
            } else {
                echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
            }
        } else {
            echo json_encode(array('errorMsg' => 'El o la lote_producto_usados ya existe, intento nuevamente.'));
        }
    } else if ($accion == "BORRAR") {
        $idLote = htmlspecialchars($_REQUEST['idLote']);

        $result = $control->removeLote_producto_usados($idLote);
        if ($result) {
            echo json_encode(array('success' => true, 'mensaje' => "Lote_producto_usados borrado correctamente"));
        } else {
            echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
        }
    } else if ($accion == "BUSCAR") {
        $cadena = htmlspecialchars($_REQUEST['cadena']);
        $lote_producto_usadoss = $control->getLote_producto_usadosLikeAtrr($cadena);
        $json = json_encode($lote_producto_usadoss);
        echo $json;
    } else if ($accion == "BUSCAR_BY_ID") {
        $idLote = htmlspecialchars($_REQUEST['idLote']);

        $lote_producto_usados = $control->getLote_producto_usadosByID($idLote);
        $json = json_encode($lote_producto_usados);
        echo $json;
    } else if ($accion == "ACTUALIZAR") {
        $idLote = htmlspecialchars($_REQUEST['idLote']);
        $runFuncionaria = htmlspecialchars($_REQUEST['runFuncionaria']);
        $cantidad = htmlspecialchars($_REQUEST['cantidad']);
        $fechaRetiro = htmlspecialchars($_REQUEST['fechaRetiro']);
        $destino = htmlspecialchars($_REQUEST['destino']);

            $lote_producto_usados = new Lote_producto_usadosDTO();
            $lote_producto_usados->setIdLote($idLote);
            $lote_producto_usados->setRunFuncionaria($runFuncionaria);
            $lote_producto_usados->setCantidad($cantidad);
            $lote_producto_usados->setFechaRetiro($fechaRetiro);
            $lote_producto_usados->setDestino($destino);

        $result = $control->updateLote_producto_usados($lote_producto_usados);
        if ($result) {
            echo json_encode(array(
                'success' => true,
                'mensaje' => "Lote_producto_usados actualizada correctamente"
            ));
        } else {
            echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
        }
    }
}
