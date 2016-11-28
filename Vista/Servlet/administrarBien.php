<?php

include_once '../../Controlador/SCI_SCHC.php';

$control = SCI_SCHC::getInstancia();

$accion = htmlspecialchars($_REQUEST['accion']);
if ($accion != null) {
    if ($accion == "LISTADO") {
        $biens = $control->getAllBiens();
        $json = json_encode($biens);
        echo $json;
    } else if ($accion == "LISTADOHABILITADOS") {
        $biens = $control->getAllBiensHabilitados();
        $json = json_encode($biens);
        echo $json;
    } else if ($accion == "AGREGAR") {
        $idNivel = htmlspecialchars($_REQUEST['idNivel']);
        $fechaInicio = htmlspecialchars($_REQUEST['fechaInicio']);
        //Agregar Bien
        $idCategoria = 5;
        $nombre = htmlspecialchars($_REQUEST['nombreBien']);
        $ObjetoNivel = $control->getNivelByID($idNivel);
        $ubicacion = $ObjetoNivel->getNombre();
        $idBien = $control->BuscaMaximoIdBien();
        $bien = new BienDTO();
        $bien->setIdBien($idBien);
        $bien->setIdCategoria($idCategoria);
        $bien->setNombre($nombre);
        $bien->setUbicacion($ubicacion);
        $resultBien = $control->addBien($bien);
        //Comprobante
        $numeroComprobante = htmlspecialchars($_REQUEST['numeroBoleta']);
        $proveedor = htmlspecialchars($_REQUEST['proveedor']);
        $fechaComprobante = htmlspecialchars($_REQUEST['fechaIngreso']);
        $idRegistro = $control->BuscaMaximoIdRegistro();
        $comprobante = new ComprobanteDTO();
        $comprobante->setIdRegistro($idRegistro);
        $comprobante->setIdBien($idBien);
        $comprobante->setNumeroComprobante($numeroComprobante);
        $comprobante->setProveedor($proveedor);
        $comprobante->setFechaComprobante($fechaComprobante);
        $resultComprobante = $control->addComprobante($comprobante);
        //detalle del comprobante
        $descripcion = htmlspecialchars($_REQUEST['descripcion']);
        $cantidad = htmlspecialchars($_REQUEST['cantidad']);
        $precio = htmlspecialchars($_REQUEST['precio']);
        $detalle_comprobante = new Detalle_comprobanteDTO();
        $detalle_comprobante->setIdRegistro($idRegistro);
        $detalle_comprobante->setDescripcion($descripcion);
        $detalle_comprobante->setCantidad($cantidad);
        $detalle_comprobante->setPrecio($precio);
        $resultDetalleComprobante = $control->addDetalle_comprobante($detalle_comprobante);
        //Nivel-Bien
        $idNivelBien = $control->BuscaMaximoIdNivelBien();
        $bien_nivel = new Bien_nivelDTO();
        $bien_nivel->setIdNivelBien($idNivelBien);
        $bien_nivel->setIdNivel($idNivel);
        $bien_nivel->setIdBien($idBien);
        $bien_nivel->setFechaInicio($fechaInicio);
        $bien_nivel->setFechaTermino('0000-00-00');
        $resultNivel = $control->addBien_nivel($bien_nivel);
        if ($resultBien && $resultComprobante && $resultDetalleComprobante && $resultNivel) {
            echo json_encode(array(
                'success' => true,
                'mensaje' => "Bien ingresado correctamente."
            ));
        } else {
            echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
        }
    } 
    else if ($accion == "BORRAR") {
        $idBien = htmlspecialchars($_REQUEST['idBien']);

        $result = $control->removeBien($idBien);
        if ($result) {
            echo json_encode(array('success' => true, 'mensaje' => "Bien borrado correctamente"));
        } else {
            echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
        }
    } else if ($accion == "BUSCAR") {
        $cadena = htmlspecialchars($_REQUEST['cadena']);
        $biens = $control->getBienLikeAtrr($cadena);
        $json = json_encode($biens);
        echo $json;
    } else if ($accion == "BUSCAR_BY_ID") {
        $idBien = htmlspecialchars($_REQUEST['idBien']);
        $bien = $control->getBienByID($idBien);
        $json = json_encode($bien);
        echo $json;
    } else if ($accion == "ACTUALIZAR") {
        //Recibir Datos
        $idNivel = htmlspecialchars($_REQUEST['idNivel']);
        $idBien = htmlspecialchars($_REQUEST['idBien']);
        $idCategoria = htmlspecialchars($_REQUEST['idCategoria']);
        $idRegistro = htmlspecialchars($_REQUEST['idRegistro']);
        $idNivelBien = htmlspecialchars($_REQUEST['idNivelBien']);

        $fechaInicio = htmlspecialchars($_REQUEST['fechaInicio']);
        $nombre = htmlspecialchars($_REQUEST['nombreBien']);
        $numeroComprobante = htmlspecialchars($_REQUEST['numeroBoleta']);
        $proveedor = htmlspecialchars($_REQUEST['proveedor']);
        $fechaComprobante = htmlspecialchars($_REQUEST['fechaIngreso']);
        $descripcion = htmlspecialchars($_REQUEST['descripcion']);
        $cantidad = htmlspecialchars($_REQUEST['cantidad']);
        $precio = htmlspecialchars($_REQUEST['precio']);
        $hoy = date('Y') . "-" . date('m') . "-" . date('d');

        //Buscar objetos Anteriores
        $objetoBienAnterior = $control->getBienByID($idBien);
        $objetoBienAnterior->setNombre($nombre);
         $ObjetoNivel = $control->getNivelByID($idNivel);
        $ubicacion = $ObjetoNivel->getNombre();

        $objetoNivelBienAnterior = $control->getBien_nivelByID($idNivelBien);
        if ($objetoNivelBienAnterior->getIdNivel() != $idNivel) {
            $objetoNivelBienAnterior->setFechaTermino($hoy);
            $objetoBienAnterior->setUbicacion($ubicacion);

            $idNivelBien = $control->BuscaMaximoIdNivelBien();
            $bien_nivel = new Bien_nivelDTO();
            $bien_nivel->setIdNivelBien($idNivelBien);
            $bien_nivel->setIdNivel($idNivel);
            $bien_nivel->setIdBien($idBien);
            $bien_nivel->setFechaInicio($fechaInicio);
            $bien_nivel->setFechaTermino('0000-00-00');
            $resultNivelBien = $control->addBien_nivel($bien_nivel);
        }
        $resultBien = $control->updateBien($objetoBienAnterior);
        //Cambiar los simples
        $objetoComprobanteAnterior = $control->getComprobanteByID($idRegistro);
        $objetoComprobanteAnterior->setDescripcion($descripcion);
        $objetoComprobanteAnterior->setCantidad($cantidad);
        $objetoComprobanteAnterior->setPrecio($precio);
        $resultComprobante = $control->updateComprobante($objetoComprobanteAnterior);
        $objetoDetalleComprobanteAnterior = $control->getDetalle_comprobanteByID($idRegistro);
        $objetoDetalleComprobanteAnterior->setNumeroComprobante($numeroComprobante);
        $objetoDetalleComprobanteAnterior->setProveedor($proveedor);
        $objetoDetalleComprobanteAnterior->setFechaComprobante($fechaComprobante);
        $resultDetalleComprobante = $control->updateDetalle_comprobante($objetoDetalleComprobanteAnterior);

     
        
      
        if ($resultBien && $resultComprobante && $resultDetalleComprobante && $resultNivel) {
            echo json_encode(array(
                'success' => true,
                'mensaje' => "Bien ingresado correctamente."
            ));
        } else {
            echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
        }
    }
}
