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
    } else if ($accion == "LISTADODESHABILITADOS") {
        $biens = $control->getAllBiensDesHabilitados();
        $json = json_encode($biens);
        echo $json;
    } else if ($accion == "AGREGAR") {
        $cantidad = htmlspecialchars($_REQUEST['cantidad']);
        $idNivel = htmlspecialchars($_REQUEST['idNivel']);
        $fechaInicio = htmlspecialchars($_REQUEST['fechaInicio']);
        $nombre = htmlspecialchars($_REQUEST['nombreBien']);
        $numeroComprobante = htmlspecialchars($_REQUEST['numeroBoleta']);
        $proveedor = htmlspecialchars($_REQUEST['proveedor']);
        $fechaComprobante = htmlspecialchars($_REQUEST['fechaIngreso']);
        $descripcion = htmlspecialchars($_REQUEST['descripcion']);
        $precio = htmlspecialchars($_REQUEST['precio']);
        $idCategoria = htmlspecialchars($_REQUEST['idCategoria']);

        $idRegistro = $control->BuscaMaximoIdRegistro();

        $ObjetoNivel = $control->getNivelByID($idNivel);
        $ubicacion = $ObjetoNivel->getNombre();

        $comprobante = new ComprobanteDTO();
        $comprobante->setIdRegistro($idRegistro);
        $comprobante->setNumeroComprobante($numeroComprobante);
        $comprobante->setProveedor($proveedor);
        $comprobante->setFechaComprobante($fechaComprobante);
        $resultComprobante = $control->addComprobante($comprobante);

        $detalle_comprobante = new Detalle_comprobanteDTO();
        $detalle_comprobante->setIdRegistro($idRegistro);
        $detalle_comprobante->setDescripcion($descripcion);
        $detalle_comprobante->setCantidad($cantidad);
        $detalle_comprobante->setPrecio($precio);
        $resultDetalleComprobante = $control->addDetalle_comprobante($detalle_comprobante);
        $error = FALSE;
        $idBienes = array();
        $ib = 0;
        $idNivelBienes = array();
        $inb = 0;
        for ($i = 0; $i < $cantidad; $i++) {
            $idBien = $control->BuscaMaximoIdBien();
            $bien = new BienDTO();
            $bien->setIdBien($idBien);
            $bien->setIdRegistro($idRegistro);
            $bien->setIdCategoria($idCategoria);
            $bien->setNombre($nombre);
            $bien->setUbicacion($ubicacion);
            $resultBien = $control->addBien($bien);

            if ($resultBien) {
                $idBienes[$ib] = $idBien;
                $ib++;
            } else {
                $error = TRUE;
                break;
            }
            $idNivelBien = $control->BuscaMaximoIdNivelBien();
            $bien_nivel = new Bien_nivelDTO();
            $bien_nivel->setIdNivelBien($idNivelBien);
            $bien_nivel->setIdNivel($idNivel);
            $bien_nivel->setIdBien($idBien);
            $bien_nivel->setFechaInicio($fechaInicio);
            $bien_nivel->setFechaTermino('0000-00-00');
            $resultNivel = $control->addBien_nivel($bien_nivel);

            if ($resultNivel) {
                $idNivelBienes[$inb] = $idNivelBienes;
                $inb++;
            } else {
                $error = TRUE;
                break;
            }
        }

        if (!$error && $resultBien && $resultComprobante && $resultDetalleComprobante && $resultNivel) {
            echo json_encode(array(
                'success' => true,
                'mensaje' => "Bien ingresado correctamente."
            ));
        } else {
            for ($i = 0; $i < $inb; $i++) {
                $control->removeBien_nivel($idNivelBienes[$i]);
            }
            for ($i = 0; $i < $ib; $i++) {
                $control->removeBien($idBienes[$i]);
            }
            $control->removeDetalle_comprobante($idRegistro);
            $control->removeComprobante($idRegistro);

            echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
        }
    } else if ($accion == "BORRAR") {
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
        $idNivel = htmlspecialchars($_REQUEST['idNivel']);
        $idBien = htmlspecialchars($_REQUEST['idBien']);
        $idCategoria = htmlspecialchars($_REQUEST['idCategoria']);
        $idNivelBien = htmlspecialchars($_REQUEST['idNivelBien']);
        $fechaInicio = htmlspecialchars($_REQUEST['fechaInicio']);
        $nombre = htmlspecialchars($_REQUEST['nombreBien']);
        $descripcion = htmlspecialchars($_REQUEST['descripcion']);
        $hoy = date('Y') . "-" . date('m') . "-" . date('d');
        $objetoBienAnterior = $control->getBienByIDEditar($idBien);
        $objetoBienAnterior->setNombre($nombre);
        $objetoBienAnterior->setIdCategoria($idCategoria);
        
        $ObjetoNivel = $control->getNivelByID($idNivel);
        $resultBien;
        $objetoNivelBienAnterior = $control->getBien_nivelByID($idNivelBien);
        if ($objetoNivelBienAnterior->getIdNivel() != $idNivel) {
            $objetoNivelBienAnterior->setFechaTermino($hoy);
            $resultObjetoNivelBienAnterior = $control->updateBien_nivel($objetoNivelBienAnterior);
            $ubicacion = $ObjetoNivel->getNombre();
            $objetoBienAnterior->setUbicacion($ubicacion);
            $resultBien = $control->updateBien($objetoBienAnterior);
            $idNivelBienNuevo = $control->BuscaMaximoIdNivelBien();
            $bien_nivel = new Bien_nivelDTO();
            $bien_nivel->setIdNivelBien($idNivelBienNuevo);
            $bien_nivel->setIdNivel($idNivel);
            $bien_nivel->setIdBien($idBien);
            $bien_nivel->setFechaInicio($fechaInicio);
            $bien_nivel->setFechaTermino('0000-00-00');
            $resultNivelBien = $control->addBien_nivel($bien_nivel);

            if ($resultBien && $resultNivelBien && $resultObjetoNivelBienAnterior) {
                echo json_encode(array(
                    'success' => true,
                    'mensaje' => "Bien Actualizado Correctamente."
                ));
            } else {
                echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
            }
        } else {
            
            $resultBien = $control->updateBien($objetoBienAnterior);
            if ($resultBien) {
                echo json_encode(array(
                    'success' => true,
                    'mensaje' => "Bien Actualizado Correctamente."
                ));
            } else {
                echo json_encode(array('errorMsg' => 'Ha ocurrido un error al actualizar el bien.'.$resultBien.')'));
            }
        }
    } else if ($accion == "DARDEBAJA") {
        $idBien = htmlspecialchars($_REQUEST['idBien']);
        $idNivelBien = htmlspecialchars($_REQUEST['idNivelBien']);
        $motivo = htmlspecialchars($_REQUEST['motivo']);
        $hoy = date('Y') . "-" . date('m') . "-" . date('d');
        $fechaBaja = htmlspecialchars($_REQUEST['fechaBaja']);
        $objetoNivelBienAnterior = $control->getBien_nivelByID($idNivelBien);
        $objetoNivelBienAnterior->setFechaTermino($hoy);
        $resultObjetoNivelBienAnterior = $control->updateBien_nivel($objetoNivelBienAnterior);
        $idBaja = $control->BuscaMaximoIdBaja();
        if($idBaja == NULL || $idBaja == ''){
            $idBaja = 1;
        }
        $nuevaBaja = new BajaDTO();
        $nuevaBaja->setIdBaja($idBaja);
        $nuevaBaja->setIdBien($idBien);
        $nuevaBaja->setMotivo($motivo);
        $nuevaBaja->setFechaBaja($fechaBaja);
        $resultBaja = $control->addBaja($nuevaBaja);

        if ($resultBaja) {
            if ($resultObjetoNivelBienAnterior) {
                echo json_encode(array(
                    'success' => true,
                    'mensaje' => "Bien Dado de Baja correctamente."
                ));
            } else {
                echo json_encode(array('errorMsg' => 'Ha ocurrido un error al actualizar los datos del Bien Dado de Baja.'));
            }
        } else {
            echo json_encode(array('errorMsg' => 'Ha ocurrido un error al dar de Baja el Bien.'));
        }
    }
}

