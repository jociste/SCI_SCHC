<?php
ob_start(); //Iniciar Buffer

include_once '../../Controlador/SCI_SCHC.php';
$control = SCI_SCHC::getInstancia();

$idCategoria = utf8_decode(htmlspecialchars($_REQUEST['idCategoria']));

$codigoEstablecimiento = utf8_decode(htmlspecialchars($_REQUEST['codigoEstablecimiento']));
$nombreEstablecimiento = utf8_decode(htmlspecialchars($_REQUEST['nombreEstablecimiento']));
$direccionCalleEstablecimiento = utf8_decode(htmlspecialchars($_REQUEST['direccionCalleEstablecimiento']));
$direccionNumeroEstablecimiento = utf8_decode(htmlspecialchars($_REQUEST['direccionNumeroEstablecimiento']));
$ciudadEstablecimiento = utf8_decode(htmlspecialchars($_REQUEST['ciudadEstablecimiento']));
$regionEstablecimiento = utf8_decode(htmlspecialchars($_REQUEST['regionEstablecimiento']));
$telefonoEstablecimiento = utf8_decode(htmlspecialchars($_REQUEST['telefonoEstablecimiento']));
$emailEstablecimiento = utf8_decode(htmlspecialchars($_REQUEST['emailEstablecimiento']));

$nombreEntidadAdministradora = utf8_decode(htmlspecialchars($_REQUEST['nombreEntidadAdministradora']));
$rutEntidadAdministradora = utf8_decode(htmlspecialchars($_REQUEST['rutEntidadAdministradora']));
$provinciaEntidadAdministradora = utf8_decode(htmlspecialchars($_REQUEST['provinciaEntidadAdministradora']));
$regionEntidadAdministradora = utf8_decode(htmlspecialchars($_REQUEST['regionEntidadAdministradora']));
$representanteLegal = utf8_decode(htmlspecialchars($_REQUEST['representanteLegal']));
$rutRepresentanteLegal = utf8_decode(htmlspecialchars($_REQUEST['rutRepresentanteLegal']));
$telefonoRepresentanteLegal = utf8_decode(htmlspecialchars($_REQUEST['telefonoRepresentanteLegal']));
$emailRepresentanteLegal = utf8_decode(htmlspecialchars($_REQUEST['emailRepresentanteLegal']));

$fechaInicio = utf8_decode(htmlspecialchars($_REQUEST['fechaInicio']));
$fechaTermino = utf8_decode(htmlspecialchars($_REQUEST['fechaTermino']));

$materialesDidacticos = "";
$utilesSaludHigene = "";
$materialesOficina = "";
$utilesAseo = "";

if ($idCategoria == 1) {
    $materialesDidacticos = "X";
} else if ($idCategoria == 2) {
    $materialesOficina = "X";
} else if ($idCategoria == 3) {
    $utilesSaludHigene = "X";
} else if ($idCategoria == 4) {
    $utilesAseo = "X";
}

$productos = $control->getProductosEnLotesRegistradosByIdCategoriaAndFechas($idCategoria, $fechaInicio, $fechaTermino);
$stock_inicial_productos = $control->getStockProductosByIdCategoriaAndFecha($idCategoria, $fechaInicio);
$lotesRegistrados = $control->getLotesProductosRegistradosPorProductoByIdCategoriaAndFechas($idCategoria, $fechaInicio, $fechaTermino);
$lotesUtilizados = $control->getLotesProductosUsadosPorProductoByIdCategoriaAndFechas($idCategoria, $fechaInicio, $fechaTermino);
?>
<html>
    <head>
        <style type="text/css">
            body{
                //font-family: Calibri;
                font-family:Arial, sans-serif;
                font-size: 11px;
                font-style: normal;
                font-variant: normal;
                font-weight: 400;
                line-height: 11px;   
            }
            .center{
                text-align: center;
            }
            
            .right {
                text-align: right;
                padding-right: 10px;
            }
            
            .left {
                text-align: left;
                padding-left: 10px;
            }

            .table {
                width: 733.22px;
                border-spacing:0;
                border-collapse:collapse;
                border-color:black;
            }
            .td-borde{
                border: black 1px solid;
            }

            .table td {
                font-size:10px;
                //padding:10px 5px;
                border-style:solid;
                border-width:1px;
                overflow:hidden;
                word-break:normal;
                border-color:black;
                color: black;
            }
            .table th {
                font-size:11px;
                height: 40px;
            }
            .fondo{
                background-color: #BDBDBD;
            }

            .alto-xs{
                height: 15.11px;//4mm
            }
            .alto-xm{
                height: 18.89px;//5mm
            }
            .alto-xl{
                height: 26.45px;//7mm
            }
            .alto-ms{
                height: 37.79px;//10mm
            }
            .alto-ms12{
                height: 45.35px;//12mm
            }
            .alto-mm{
                height: 79.37px;//21mm
            }
            /*ALTURAS*/
            .ancho-13mm{
                width: 49.13px;
            }
            .ancho-14mm{
                width: 52.91px;
            }
            .ancho-15mm{
                width: 56.69px;
            }
            .ancho-17mm{
                width: 64.25px;
            }
            .ancho-18mm{
                width: 68.03px;//18mm
            }
            .ancho-19mm{
                width: 71.81px;//19mm
            }
            .ancho-23mm{
                width: 86.92px;//23mm
            }
            .ancho-30mm{
                width: 113.38px;//30mm
            }
            .ancho-32mm{
                width: 120.94px;
            }
            .ancho-34mm{
                width: 128.50px;//34mm
            }
            .ancho-43mm{
                width: 162.51px;//43mm
            }
            .ancho-56mm{
                width: 211.65px;//56mm
            }
            .ancho-62mm{
                width: 234.33px;
            }
            .ancho-69mm{
                width: 260.78px;//69mm
            }
            .ancho-71mm{
                width: 268.34px;//71mm
            }
            .ancho-80mm{
                width: 302.36px;//80mm
            }
            .ancho-84mm{
                width: 317.48px;
            }
            .ancho-94mm{
                width: 355.27px;//94mm
            }
            .ancho-100mm{
                width: 377.95px;
            }
            .ancho-117mm{
                width: 442.20px;
            }
            .ancho-129mm{
                width: 487.55px;
            }
            .ancho-132mm{
                width: 498.89px;
            }
            .ancho-137mm{
                width: 517.79px;//137mm
            }

        </style>
    </head>
    <body>
        <div>
            <table class="table">
                <tr><th align="center"><h5>ANEXO 15<br>CONTROL FLUJOS DE EXISTENCIAS</h5></th></tr>
            </table>
        </div>
        <div>
            <table class="table">
                <tr><td class="td-borde alto-xs" colspan="4">1.- IDENTIFICAR LA NATURALEZA DE LOS ART&Iacute;CULOS DETALLADOS (marcar con una "X")</td></tr>
                <tr><td class="td-borde fondo alto-xl ancho-71mm">a) Materiales Did&aacute;cticos y de Ense&ntilde;anza</td><td class="td-borde alto-xl ancho-18mm center"><?= $materialesDidacticos ?></td><td class="td-borde fondo alto-xl ancho-80mm">b) Materiales de Oficina</td><td class="td-borde alto-xl ancho-19mm center"><?= $materialesOficina ?></td></tr>
                <tr><td class="td-borde fondo alto-xl ancho-71mm">c) Materiales y &uacute;tiles de salud e higiene</td><td class="td-borde alto-xl ancho-18mm center"><?= $utilesSaludHigene ?></td><td class="td-borde fondo alto-xl ancho-80mm">d) &Uacute;tiles de aseo (Utilizados para la limpieza del recinto)</td><td class="td-borde alto-xl ancho-19mm center"><?= $utilesAseo ?></td></tr>
            </table>
        </div>
        <br>
        <div>
            <table class="table">
                <tr><td class="td-borde alto-xm" colspan="5">2.- IDENTIFICACI&Oacute;N DEL ESTABLECIMIENTO</td></tr>
                <tr><td class="td-borde alto-xm ancho-137mm center" colspan="4"><?= $nombreEstablecimiento ?></td><td class="td-borde alto-xm ancho-56mm center"><?= $codigoEstablecimiento ?></td></tr>
                <tr><td class="td-borde fondo alto-xs ancho-137mm" colspan="4" align="center">Nombre del Establecimiento</td><td class="td-borde fondo alto-xs ancho-56mm" align="center">C&oacute;digo del Establecimiento</td></tr>
                <tr><td class="td-borde alto-xm ancho-94mm center" colspan="2"><?= $direccionCalleEstablecimiento ?></td><td class="td-borde alto-xm ancho-30mm center"><?= $direccionNumeroEstablecimiento ?></td><td class="td-borde alto-xm ancho-69mm center" colspan="2"><?= $ciudadEstablecimiento ?></td></tr>
                <tr><td class="td-borde fondo alto-xs ancho-94mm" colspan="2" align="center">Calle</td><td class="td-borde fondo alto-xs ancho-30mm" align="center">N&deg;</td><td class="td-borde fondo alto-xs ancho-69mm" colspan="2" align="center">Comuna/Localidad</td></tr>
                <tr><td class="td-borde alto-xm ancho-62mm center"><?= $regionEstablecimiento ?></td><td class="td-borde alto-xm ancho-32mm center"><?= $telefonoEstablecimiento ?></td><td class="td-borde alto-xm ancho-100mm center" colspan="3"><?= $emailEstablecimiento ?></td></tr>
                <tr><td class="td-borde fondo alto-xs ancho-62mm" align="center">Regi&oacute;n</td><td class="td-borde fondo alto-xs ancho-32mm" align="center">Tel&eacute;fono</td><td class="td-borde fondo alto-xs ancho-100mm" colspan="3" align="center">E-Mail</td></tr>
            </table>
        </div>
        <br>        
        <div>
            <table class="table">
                <tr><td class="td-borde alto-xm" colspan="4">3.- IDENTIFICACI&Oacute;N DE LA ENTIDAD ADMINISTRADORA</td></tr>
                <tr><td class="td-borde alto-xm ancho-94mm center"><?= $nombreEntidadAdministradora ?></td><td class="td-borde alto-xm ancho-43mm center"><?= $rutEntidadAdministradora ?></td><td class="td-borde alto-xm ancho-23mm center"><?= $provinciaEntidadAdministradora ?></td><td class="td-borde alto-xm ancho-34mm center"><?= $regionEntidadAdministradora ?></td></tr>
                <tr><td class="td-borde fondo alto-xs ancho-94mm" align="center">Nombre de la Entidad</td><td class="td-borde fondo alto-xs ancho-43mm" align="center">RUT</td><td class="td-borde fondo alto-xs ancho-23mm" align="center">Provincia</td><td class="td-borde fondo alto-xs ancho-34mm" align="center">Regi&oacute;n</td></tr>
                <tr><td class="td-borde alto-xm ancho-94mm center"><?= $representanteLegal ?></td><td class="td-borde alto-xm ancho-43mm center"><?= $rutRepresentanteLegal ?></td><td class="td-borde alto-xm ancho-23mm center"><?= $telefonoRepresentanteLegal ?></td><td class="td-borde alto-xm ancho-34mm center"><?= $emailRepresentanteLegal ?></td></tr>
                <tr><td class="td-borde fondo alto-xs ancho-94mm" align="center">Nombre Representante Legal de la Entidad</td><td class="td-borde fondo alto-xs ancho-43mm" align="center">RUT Representante Legal</td><td class="td-borde fondo alto-xs ancho-23mm" align="center">Tel&eacute;fono</td><td class="td-borde fondo alto-xs ancho-34mm" align="center">E-Mail</td></tr>
            </table>
        </div>
        <br>        
        <div>
            <table class="table">
                <tr><td class="td-borde alto-xm">4.- DETALLE DE LAS FICHAS DE EXISTENCIAS</td></tr>
            </table>
        </div>
        <br>
        <?php
        $count = 0;
        foreach ($productos as $value) {
            $stock_inicial = 0;
            if (array_key_exists($value->getIdProducto(), $stock_inicial_productos)) {
                $stock_inicial = $stock_inicial_productos[$value->getIdProducto()]['stock'];
            }
            ?>       
            <div>
                <table class="table">
                    <tr><td class="td-borde fondo alto-xs ancho-71mm" colspan="4">DESCRIPCI&Oacute;N DEL ART&Iacute;CULO:</td><td class="td-borde ancho-117mm" colspan="6">&nbsp;&nbsp;&nbsp;<?= $value->getNombre() ?></td></tr>
                    <tr><td class="td-borde fondo alto-ms ancho-71mm" colspan="4" align="center">INGRESOS</td><td class="td-borde fondo alto-ms ancho-84mm" colspan="4" align="center">RETIROS PARA SU USO</td><td class="td-borde fondo ancho-15mm" rowspan="2" align="center">SALDO</td><td class="td-borde fondo alto-ms ancho-19mm" align="center">DE USO EXCLUSIVO DE JUNJI</td></tr>
                    <tr><td class="td-borde fondo alto-mm ancho-13mm" align="center" valign="top">N&deg; Factura o Boleta</td><td class="td-borde fondo alto-mm ancho-17mm" align="center" valign="top">Fecha (dd/mm/aa)</td><td class="td-borde fondo alto-mm ancho-32mm" align="center" valign="top">Proveedor</td><td class="td-borde fondo alto-mm ancho-14mm" align="center" valign="top">Cantidad Ingresada</td><td class="td-borde fondo alto-mm ancho-18mm" align="center" valign="top">Fecha del Retiro (dd/mm/aa)</td><td class="td-borde fondo alto-mm ancho-30mm" align="center" valign="top">Nombre y firma de persona que retira</td><td class="td-borde fondo alto-mm ancho-13mm" align="center" valign="top">Cantidad retirada</td><td class="td-borde fondo alto-mm ancho-23mm" align="center" valign="top">Destino</td><td class="td-borde fondo alto-mm ancho-19mm" align="center" valign="top">V&deg; 8&deg;Del Fiscalizador (en el &uacute;ltimo saldo a la fecha de la fiscalizaci&oacute;n)</td></tr>                    
                    <?php
                    $registrados = $lotesRegistrados[$value->getIdProducto()];
                    $utilizados = array();
                    if (array_key_exists($value->getIdProducto(), $lotesUtilizados)) {
                        $utilizados = $lotesUtilizados[$value->getIdProducto()];
                    }

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
                     * - Ordernar el array por fechas
                     */
                    usort($registrosYutilizados, function($a1, $a2) {
                        $v1 = strtotime($a1['fecha']);
                        $v2 = strtotime($a2['fecha']);
                        return $v1 - $v2; // $v2 - $v1 to reverse direction
                    });

                    $totalRegistros = 0;
                    for ($j = 0; $j < count($registrosYutilizados); $j++) {
                        if ($registrosYutilizados[$j]['indicador'] == 0) {
                            /* Registro */
                            $datos = $registrosYutilizados[$j]['datos'];
                            $stock_inicial = $stock_inicial + $datos->getCantidad();
                            echo '<tr><td class="td-borde alto-xs">' . $datos->getNumeroBoleta() . '</td><td class="td-borde alto-xs">' . $datos->getFechaIngreso() . '</td><td class="td-borde alto-xs">' . $datos->getProveedor() . '</td><td class="td-borde alto-xs right">' . $datos->getCantidad() . '</td><td class="td-borde alto-xs"></td><td class="td-borde alto-xs"></td><td class="td-borde alto-xs"></td><td class="td-borde alto-xs"></td><td class="td-borde alto-xs right">' . $stock_inicial . '</td><td class="td-borde alto-xs"></td></tr>';
                        } else {
                            /* Utilizado */
                            $datos = $registrosYutilizados[$j]['datos'];
                            $stock_inicial = $stock_inicial - $datos->getCantidad();
                            echo '<tr><td class="td-borde alto-xs"></td><td class="td-borde alto-xs"></td><td class="td-borde alto-xs"></td><td class="td-borde alto-xs"></td><td class="td-borde alto-xs">' . $datos->getFechaRetiro() . '</td><td class="td-borde alto-xs">' . $datos->getNombres() . '</td><td class="td-borde alto-xs right">' . $datos->getCantidad() . '</td><td class="td-borde alto-xs">' . substr($datos->getDestino(), 0, 16) . '...</td><td class="td-borde alto-xs right">' . $stock_inicial . '</td><td class="td-borde alto-xs"></td></tr>';
                        }
                        $totalRegistros++;
                    }
                    if ($totalRegistros < 15) {
                        for ($j = 0; $j < (15 - $totalRegistros); $j++) {
                            echo '<tr><td class="td-borde alto-xs"></td><td class="td-borde alto-xs"></td><td class="td-borde alto-xs"></td><td class="td-borde alto-xs"></td><td class="td-borde alto-xs"></td><td class="td-borde alto-xs"></td><td class="td-borde alto-xs"></td><td class="td-borde alto-xs"></td><td class="td-borde alto-xs"></td><td class="td-borde alto-xs"></td></tr>';
                        }
                    }
                    ?>
                </table>
            </div>
            <br>
            <?php
            $count++;
            if ($count == 2) {
                echo "<br><br><br><br>";
            }
            if ($count > 2) {
                if (($count - 2) % 3 == 0) {
                    echo "<br><br><br>";
                }
            }
        }
        ?>
        <div>
            <table class="table">
                <tr><td class="td-borde fondo">5.- OBSERVACIONES DE LA DIRECTORA DEL ESTABLECIMIENTO Y/O DEL ENCARGADO DEL CONTROL DE LAS EXISTENCIAS (indicar fechas de revisi&oacute;n y/o de cuadraturas) y sus respectivas observaciones.</td></tr>
                <tr><td class="td-borde alto-xm"></td></tr>
                <tr><td class="td-borde alto-xm"></td></tr>
                <tr><td class="td-borde alto-xm"></td></tr>
                <tr><td class="td-borde alto-xm"></td></tr>
                <tr><td class="td-borde alto-xm"></td></tr>
                <tr><td class="td-borde alto-xm"></td></tr>
                <tr><td class="td-borde alto-xm"></td></tr>
                <tr><td class="td-borde alto-xm"></td></tr>
            </table>
        </div>
        <br>
        <div>
            <table class="table">
                <tr><td class="td-borde fondo alto-xm" colspan="3">6.- DE USO EXCLUSIVO DE LA DIRECCI&Oacute;N REGIONAL DE LA JUNJI (a la fecha de la fiscalizaci&oacute;n)</td></tr>
                <tr><td class="td-borde fondo alto-xm ancho-62mm">FECHA FISCALIZACI&Oacute;N</td><td class="td-borde alto-xm ancho-132mm" colspan="2"></td></tr>
                <tr><td class="td-borde alto-xm" colspan="3">OBSERVACIONES:</td></tr>
                <tr><td class="td-borde alto-xm" colspan="3"></td></tr>
                <tr><td class="td-borde alto-xm" colspan="3"></td></tr>
                <tr><td class="td-borde alto-xm" colspan="3"></td></tr>
                <tr><td class="td-borde alto-xm" colspan="3"></td></tr>
                <tr><td class="td-borde alto-xm" colspan="3"></td></tr>
                <tr><td class="td-borde alto-xm" colspan="3"></td></tr>
                <tr><td class="td-borde alto-xm" colspan="3"></td></tr>
                <tr><td class="td-borde alto-xm" colspan="3"></td></tr>
                <tr><td class="td-borde alto-xm" colspan="3"></td></tr>
                <tr><td class="td-borde alto-ms12 ancho-129mm" colspan="2"></td><td class="td-borde alto-ms12 ancho-69mm"></td></tr>
                <tr><td class="td-borde fondo alto-xl ancho-129mm" colspan="2">7.- NOMBRE, FRIMA Y TIMBRE DE LA DIRECTORA DEL ESTABLECIMIENTO</td><td class="td-borde fondo alto-xl ancho-69mm" align="center">NOMBRE Y FIRMA DE LA ENCARGADA(O) DE LA BODEGA (en el caso de corresponder)</td></tr>
            </table>
        </div>
    </body>
</html>
<?php
$html = ob_get_clean();
$html = utf8_encode($html);

define('MPDF_PATH', "../../Files/Complementos/mpdf60/");
include(MPDF_PATH . "mpdf.php");
$mpdf = new mPDF('UTF-8', array(216, 330));
$mpdf->allow_charset_conversion = true;
$mpdf->charset_in = 'UTF-8';
$mpdf->WriteHTML($html);
$mpdf->Output('Control Flujos de Existencias', 'I');

exit();
?>
