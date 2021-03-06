<?php
ob_start(); //Iniciar Buffer

include_once '../../Controlador/SCI_SCHC.php';
$control = SCI_SCHC::getInstancia();

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

$idNivel = utf8_decode(htmlspecialchars($_REQUEST['idNivelDadosBaja']));
$fechaActual = utf8_decode(htmlspecialchars($_REQUEST['fechaActual']));

$bienes;
if (isset($_REQUEST['sinFechasDadosDeBaja'])) {
    $bienes = $control->getAllBiensDesHabilitadosByIdNivel($idNivel);
} else {
    $fechaInicio = utf8_decode(htmlspecialchars($_REQUEST['fechaInicioDadosDeBaja']));
    $fechaTermino = utf8_decode(htmlspecialchars($_REQUEST['fechaTerminoDadosDeBaja']));
    $bienes = $control->getAllBiensDesHabilitadosByIdNivelAndFechas($idNivel,$fechaInicio,$fechaTermino);
}

$salaCuna = "";
$nivelMedio = "";
$transicion = "";
$heterogeneo = "";
$otros = "";

if ($idNivel == 1) {
    $salaCuna = "X";
} else if ($idNivel == 2) {
    $nivelMedio = "X";
} else if ($idNivel == 3) {
    $transicion = "X";
} else if ($idNivel == 4) {
    $heterogeneo = "X";
} else {
    $nivel = $control->getNivelByID($idNivel);
    $otros = $nivel->getNombre();
}
?>

<html>
    <head>
        <style type="text/css">
            body{
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

            .left{
                text-align: left;
            }

            .right{
                text-align: right;
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
                height: 15.11px;
            }
            .alto-xm{
                height: 18.89px;
            }
            .alto-xl{
                height: 26.45px;
            }
            .alto-ms{
                height: 37.79px;
            }
            .alto-ms12{
                height: 45.35px;
            }
            .alto-ms17{
                height: 64.25px;
            }
            .alto-mm{
                height: 79.37px;
            }
            /*ALTURAS*/
            .ancho-10mm{
                width: 37.79px;
            }
            .ancho-11mm{
                width: 41.57px;
            }
            .ancho-12mm{
                width: 45.35px;
            }
            .ancho-13mm{
                width: 49.13px;
            }
            .ancho-14mm{
                width: 52.91px;
            }
            .ancho-15mm{
                width: 56.69px;
            }
            .ancho-16mm{
                width: 60.47px;
            }
            .ancho-17mm{
                width: 64.25px;
            }
            .ancho-18mm{
                width: 68.03px;
            }
            .ancho-19mm{
                width: 71.81px;
            }
            .ancho-23mm{
                width: 86.92px;
            }
            .ancho-30mm{
                width: 113.38px;
            }
            .ancho-32mm{
                width: 120.94px;
            }
            .ancho-34mm{
                width: 128.50px;
            }
            .ancho-43mm{
                width: 162.51px;
            }
            .ancho-46mm{
                width: 173.85px;
            }
            .ancho-56mm{
                width: 211.65px;
            }
            .ancho-62mm{
                width: 234.33px;
            }
            .ancho-69mm{
                width: 260.78px;
            }
            .ancho-71mm{
                width: 268.34px;
            }
            .ancho-80mm{
                width: 302.36px;
            }
            .ancho-84mm{
                width: 317.48px;
            }
            .ancho-94mm{
                width: 355.27px;
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
                width: 517.79px;
            }

        </style>
    </head>
    <body>
        <div>
            <table class="table">
                <tr><th align="center"><h5>REPORTE<br>BIENES MUEBLES DADOS DE BAJA</h5></th></tr>
            </table>
        </div>
        <div>
            <table class="table">
                <tr><td class="td-borde fondo alto-xs" colspan="4">1.- FECHA DE REALIZACI&Oacute;N O DE ACTUALIZACI&Oacute;N DEL REPORTE (dd/mm/aa):</td><td class="td-borde ancho-69mm center"><?= $fechaActual ?></td></tr>
            </table>
        </div>
        <br>
        <div>
            <table class="table">
                <tr><td class="td-borde alto-xm" colspan="5">2.- IDENTIFICACI&Oacute;N DEL ESTABLECIMIENTO</td></tr>
                <tr><td class="td-borde alto-xm ancho-137mm center" colspan="4"><?= $nombreEstablecimiento ?></td><td class="td-borde alto-xm ancho-56mm center"><?= $codigoEstablecimiento ?></td></tr>
                <tr><td class="td-borde fondo alto-xs ancho-137mm" colspan="4" align="center">Nombre del Establecimiento</td><td class="td-borde fondo alto-xs ancho-56mm" align="center">C&oacute;digo del Establecimiento</td></tr>
                <tr><td class="td-borde alto-xm ancho-94mm center" colspan="2"><?= $direccionCalleEstablecimiento ?></td><td class="td-borde alto-xm ancho-30mm center"><?= $direccionNumeroEstablecimiento ?></td><td class="td-borde alto-xm ancho-69mm center" colspan="2"><?= $ciudadEstablecimiento ?></td></tr>
                <tr><td class="td-borde fondo alto-xs ancho-94mm" colspan="2" align="center">Calle</td><td class="td-borde fondo alto-xs ancho-30mm" align="center">N&deg;</td><td class="td-borde fondo alto-xs ancho-69mm center" colspan="2" align="center">Comuna/Localidad</td></tr>
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
                <tr><td class="td-borde alto-xm" colspan="5">4.- IDENTIFICACI&Oacute;N DE LA SALA O UNIDAD DE DESTINO (Se&ntilde;ale la capacidad autorizada, seg&uacute;n la sala o espacio en donde se hayan destinado los bienes muebles)</td></tr>
                <tr><td class="td-borde alto-xm ancho-30mm center"><?= $salaCuna ?></td><td class="td-borde alto-xm ancho-46mm center"><?= $nivelMedio ?></td><td class="td-borde alto-xm ancho-23mm center"><?= $transicion ?></td><td class="td-borde alto-xm ancho-30mm center"><?= $heterogeneo ?></td><td class="td-borde alto-xm ancho-69mm center"><?= $otros ?></td></tr>
                <tr><td class="td-borde fondo alto-xm ancho-30mm" align="center">Sala Cuna</td><td class="td-borde fondo alto-xm ancho-46mm" align="center">Nivel Medio</td><td class="td-borde fondo alto-xm ancho-23mm" align="center">Transici&oacute;n</td><td class="td-borde fondo alto-xm ancho-30mm" align="center">Heterog&eacute;neo</td><td class="td-borde fondo alto-xm ancho-69mm" align="center">Otro</td></tr>
            </table>
        </div>
        <br>
        <div>
            <table class="table">
                <tr><td class="td-borde alto-xm ancho-71mm" colspan="8">5.- DETALLE DE BIENES INMUEBLES DADOS DE BAJA</td></tr>                
                <tr><td class="td-borde fondo alto-ms ancho-34mm" align="center" valign="top">Nombre Bien</td><td class="td-borde fondo ancho-32mm" align="center" valign="top">Fecha de Adquisici&oacute;n</td><td class="td-borde fondo ancho-32mm" align="center" valign="top">Fecha Baja</td><td class="td-borde fondo ancho-100mm" align="center" valign="top">Motivo Por El Cual Fue Dado De Baja</td></tr>
                <?php
                $count = 0;
                foreach ($bienes as $bien) {
                    echo '<tr><td class="td-borde alto-xs">' . $bien->getNombreBien() . '</td><td class="td-borde alto-xs">' . $bien->getFechaComprobante() . '</td><td class="td-borde alto-xs">' . $bien->getFechaBaja() . '</td><td class="td-borde alto-xs">' . $bien->getMotivo() . '</td></tr>';
                    $count++;
                }
                if ($count < 36) {
                    $resto = 36 - $count;
                    for ($i = 0; $i < $resto; $i++) {
                        echo '<tr><td class="td-borde alto-xs"></td><td class="td-borde alto-xs"></td><td class="td-borde alto-xs"></td><td class="td-borde alto-xs"></td></tr>';
                    }
                }
                ?>
            </table>
        </div>
    </body>
</html>
<?php
$html = ob_get_clean();
$html = utf8_encode($html);

define('MPDF_PATH', "../../Files/Complementos/mpdf60/");
include(MPDF_PATH . "mpdf.php");
$mpdf = new mPDF('UTF-8', array(216, 279));
$mpdf->allow_charset_conversion = true;
$mpdf->charset_in = 'UTF-8';
$mpdf->WriteHTML($html);
$mpdf->Output('Inventario Bienes Inmuebles.pdf', 'I');

exit();
?>
