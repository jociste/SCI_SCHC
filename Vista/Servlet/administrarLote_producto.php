<?php

include_once '../../Controlador/SCI_SCHC.php';

$control = SCI_SCHC::getInstancia();

$accion = htmlspecialchars($_REQUEST['accion']);
if ($accion != null) {
    if ($accion == "LISTADO") {
        $lote_productos = $control->getAllLote_productos1();
        $json = json_encode($lote_productos);
        echo $json;
    }
    if ($accion == "LISTADOAUXILIAR") {
        $lote_productos = $control->getAllLote_productos_auxiliar();
        $json = json_encode($lote_productos);
        echo $json;
    }
    if ($accion == "LISTADOPRODUCTOSPORVENCER") {
        $lote_productos = $control->getAllLote_productosPorVencer();
        $json = json_encode($lote_productos);
        echo $json;
    }
    if ($accion == "LISTADOPRODUCTOSPORVENCERAUXILIAR") {
        $lote_productos = $control->getAllLote_productosPorVencerAuxiliar();
        $json = json_encode($lote_productos);
        echo $json;
    }
    if ($accion == "CUENTAPRODUCTOSPORVENCER") {
        $cantidad = $control->cuentaProductosPorVencer();
        $json = json_encode($cantidad);
        echo $json;
    } if ($accion == "CUENTAPRODUCTOSBAJOSTOCK") {
        $cantidad = $control->cuentaProductosBajoStock();
        $json = json_encode($cantidad);
        echo $json;
    } else if ($accion == "LISTADOPRODUCTOSBAJOSTOCK") {
        $lote_productos = $control->getAllLote_productosBajoStock();
        $json = json_encode($lote_productos);
        echo $json;
    } else if ($accion == "LISTADOPRODUCTOSBAJOSTOCKAUXILIAR") {
        $lote_productos = $control->getAllLote_productosBajoStockAuxiliar();
        $json = json_encode($lote_productos);
        echo $json;
    } else if ($accion == "AGREGAR") {
        $idProducto = htmlspecialchars($_REQUEST['idProducto']);
        $numeroBoleta = htmlspecialchars($_REQUEST['numeroBoleta']);
        $proveedor = htmlspecialchars($_REQUEST['proveedor']);
        $cantidad = htmlspecialchars($_REQUEST['cantidad']);
        $fechaVencimiento = "";
        if (isset($_REQUEST['fechaVencimiento'])) {
            $fechaVencimiento = htmlspecialchars($_REQUEST['fechaVencimiento']);
        }
        $fechaIngreso = htmlspecialchars($_REQUEST['fechaIngreso']);
        $lote_producto = new Lote_productoDTO();
        $lote_producto->setIdProducto($idProducto);
        $lote_producto->setNumeroBoleta($numeroBoleta);
        $lote_producto->setProveedor($proveedor);
        $lote_producto->setCantidad($cantidad);
        $lote_producto->setFechaVencimiento($fechaVencimiento);
        $lote_producto->setFechaIngreso($fechaIngreso);
        $lote_producto->setStockInicial($cantidad);
        $result = $control->addLote_producto($lote_producto);

        if ($result) {
            echo json_encode(array(
                'success' => true,
                'mensaje' => "Lote_producto ingresada correctamente"
            ));
        } else {
            echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
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
        // $cantidad = htmlspecialchars($_REQUEST['cantidad']);
        $fechaVencimiento = "";
        if (isset($_REQUEST['fechaVencimiento'])) {
            $fechaVencimiento = htmlspecialchars($_REQUEST['fechaVencimiento']);
        }

        $fechaIngreso = htmlspecialchars($_REQUEST['fechaIngreso']);

        $lote_producto = $control->getLote_productoByID($idLote);
        $lote_producto->setIdLote($idLote);
        $lote_producto->setIdProducto($idProducto);
        $lote_producto->setNumeroBoleta($numeroBoleta);
        $lote_producto->setProveedor($proveedor);
        // $lote_producto->setCantidad($cantidad);
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
    } else if ($accion == "RETIRAR_PRODUCTOS") {
        session_start();
        $cantidadProductos = $_REQUEST['cantidadProductos'];
        $rutFuncionario = $_SESSION["run"];

        $lotesUtilizados = array();
        $nLotes = 0;
        $productosNoDisponibles = array();
        $nProd = 0;
        for ($i = 1; $i <= $cantidadProductos; $i++) {
            $idCategoria = -1;
            $idProducto = "";
            $cantidad = 0;
            $fechaRetiro = "";
            $destino = "";
            if (isset($_REQUEST['idCategoria_' . $i])) {
                $idCategoria = $_REQUEST['idCategoria_' . $i];
            }
            if (isset($_REQUEST['idProducto_' . $i])) {
                $idProducto = $_REQUEST['idProducto_' . $i];
            }
            if (isset($_REQUEST['cantidad_' . $i])) {
                $cantidad = $_REQUEST['cantidad_' . $i];
            }
            if (isset($_REQUEST['fechaRetiro_' . $i])) {
                $fechaRetiro = $_REQUEST['fechaRetiro_' . $i];
            }
            if (isset($_REQUEST['destino_' . $i])) {
                $destino = $_REQUEST['destino_' . $i];
            }

            //OBTENER LOTE PRODUCTO A RETIRAR

            if ($idCategoria != -1 && $idProducto != "") {
                $falta = false;
                do {
                    $loteProducto = $control->getLote_productoByIdProducto($idProducto);
                    if ($loteProducto->getIdLote() != null) {
                        if ($loteProducto->getCantidad() >= $cantidad) {
                            $resto = $loteProducto->getCantidad() - $cantidad;
                            $loteProducto->setCantidad($resto);
                            //Descontar Producto Retirado
                            $control->updateLote_producto($loteProducto);
                            //Resgitro Producto Usado
                            $lote_producto_usados = new Lote_producto_usadosDTO();
                            $lote_producto_usados->setIdLote($loteProducto->getIdLote());
                            $lote_producto_usados->setRunFuncionaria($rutFuncionario);
                            $lote_producto_usados->setCantidad($cantidad);
                            $lote_producto_usados->setFechaRetiro($fechaRetiro);
                            $lote_producto_usados->setDestino($destino);

                            $control->addLote_producto_usados($lote_producto_usados);
                            $loteProducto->setCantidad($cantidad);
                            //Registramos de donde se retiro el producto
                            $lotesUtilizados[$nLotes] = $loteProducto;
                            $nLotes++;
                            $falta = false;
                        } else {
                            $resto_faltante = $cantidad - $loteProducto->getCantidad();
                            $loteProducto->setCantidad(0);
                            //Descontar Producto Retirado
                            $control->updateLote_producto($loteProducto);
                            //Resgitro Producto Usado
                            $lote_producto_usados = new Lote_producto_usadosDTO();
                            $lote_producto_usados->setIdLote($loteProducto->getIdLote());
                            $lote_producto_usados->setRunFuncionaria($rutFuncionario);
                            $lote_producto_usados->setCantidad($cantidad - $resto_faltante);
                            $lote_producto_usados->setFechaRetiro($fechaRetiro);
                            $lote_producto_usados->setDestino($destino);

                            $control->addLote_producto_usados($lote_producto_usados);
                            $loteProducto->setCantidad($cantidad - $resto_faltante);
                            //Registramos de donde se retiro el producto
                            $lotesUtilizados[$nLotes] = $loteProducto;
                            $nLotes++;
                            $cantidad = $resto_faltante;
                            $falta = true;
                        }
                    } else {
                        //Registramos no disponibilidad de producto
                        $producto = $control->getProductoByID($idProducto);
                        $producto->setCantidad($cantidad);
                        $productosNoDisponibles[$nProd] = $producto;
                        $nProd++;
                        $falta = false;
                    }
                } while ($falta);
            }
        }

        echo json_encode(array(
            'success' => true,
            'mensaje' => "Lote_producto actualizada correctamente",
            'lotesUtilizados' => $lotesUtilizados,
            'productosNoDisponibles' => $productosNoDisponibles
        ));
    }
}
