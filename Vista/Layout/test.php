<?php

include_once '../../Controlador/SCI_SCHC.php';
$control = SCI_SCHC::getInstancia();

$idCategoria = utf8_decode(htmlspecialchars($_REQUEST['idCategoria']));
$fechaInicio = utf8_decode(htmlspecialchars($_REQUEST['fechaInicio']));
$fechaTermino = utf8_decode(htmlspecialchars($_REQUEST['fechaTermino']));

$productos = $control->getProductosEnLotesRegistradosByIdCategoriaAndFechas($idCategoria, $fechaInicio, $fechaTermino);
$stock_inicial_productos = $control->getStockProductosByIdCategoriaAndFecha($idCategoria, $fechaInicio);
$lotesRegistrados = $control->getLotesProductosRegistradosPorProductoByIdCategoriaAndFechas($idCategoria, $fechaInicio, $fechaTermino);
$lotesUtilizados = $control->getLotesProductosUsadosPorProductoByIdCategoriaAndFechas($idCategoria, $fechaInicio, $fechaTermino);

$count = 0;
foreach ($productos as $value) {
    $stock_inicial = 0;
    if (array_key_exists($value->getIdProducto(), $stock_inicial_productos)) {
        $stock_inicial = $stock_inicial_productos[$value->getIdProducto()]['stock'];
    }
    $registrados = $lotesRegistrados[$value->getIdProducto()];
    $utilizados = array();
    if (array_key_exists($value->getIdProducto(), $lotesUtilizados)) {
        $utilizados = $lotesUtilizados[$value->getIdProducto()];
    }
    /*
     * - Ordernar el array por fechas
     */
    $registrosYutilizados = array();
    $i = 0;
    foreach ($registrados as $registro) {
        $registrosYutilizados[$i] = array('indicador' => 0, 'fecha' => $registro->getFechaIngreso(), 'datos' => $registro);
        $i++;
    }
    foreach ($utilizados as $utilizado) {
        $registrosYutilizados[$i] = array('indicador' => 1, 'fecha' => $utilizado->getFechaRetiro(), 'datos' => $utilizado);
        $i++;
    }

    /*
      function sortFunction($a, $b) {
      return strtotime($a['fecha']) - strtotime($b['fecha']);
      }

      usort($registrosYutilizados, 'sortFunction'); */


    usort($registrosYutilizados, function($a1, $a2) {
        $v1 = strtotime($a1['fecha']);
        $v2 = strtotime($a2['fecha']);
        return $v1 - $v2; // $v2 - $v1 to reverse direction
    });


    for ($j = 0; $j < count($registrosYutilizados); $j++) {
        if ($registrosYutilizados[$j]['indicador'] == 0) {
            /* Registro */
            $datos = $registrosYutilizados[$j]['datos'];
            $stock_inicial = $stock_inicial + $datos->getCantidad();
            echo '<tr><td class="td-borde alto-xs">' . $datos->getNumeroBoleta() . '</td><td class="td-borde alto-xs">' . $datos->getFechaIngreso() . '</td><td class="td-borde alto-xs">' . $datos->getProveedor() . '</td><td class="td-borde alto-xs">' . $datos->getCantidad() . '</td><td class="td-borde alto-xs"></td><td class="td-borde alto-xs"></td><td class="td-borde alto-xs"></td><td class="td-borde alto-xs"></td><td class="td-borde alto-xs">' . $stock_inicial . '</td><td class="td-borde alto-xs"></td></tr>';
        } else {
            /* Utilizado */
            $datos = $registrosYutilizados[$j]['datos'];
            $stock_inicial = $stock_inicial - $datos->getCantidad();
            echo '<tr><td class="td-borde alto-xs"></td><td class="td-borde alto-xs"></td><td class="td-borde alto-xs"></td><td class="td-borde alto-xs"></td><td class="td-borde alto-xs">' . $datos->getFechaRetiro() . '</td><td class="td-borde alto-xs">' . $datos->getNombres() . '</td><td class="td-borde alto-xs">' . $datos->getCantidad() . '</td><td class="td-borde alto-xs">' . substr($datos->getDestino(), 0, 16) . '...</td><td class="td-borde alto-xs">' . $stock_inicial . '</td><td class="td-borde alto-xs"></td></tr>';
        }
    }
}




?>