<!DOCTYPE html>
<?php
session_start();
if ($_SESSION['autentificado'] != "SI") {
    header("Location: ../../index.php");
}
$perfil = $_SESSION["idCargo"];
?>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- start: Meta -->
        <meta charset="utf-8">
        <title>Sala cuna Hogar de Cristo</title>
        <!-- end: Meta -->
        <link id="page_favicon" href="../../Files/img/logo.png" rel="icon" type="image/x-icon" />

        <!-- end: Meta -->
        <link id="page_favicon" href="../../Files/img/logo.png" rel="icon" type="image/x-icon" />
        <!-- start: CSS -->
        <link href="../../Files/Complementos/bootstrap/css/bootstrap-flat.css" rel="stylesheet">        
        <link href="../../Files/Complementos/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
        <link  href="../../Files/css/style.css" rel="stylesheet">
        <link  href="../../Files/css/chat.css" rel="stylesheet">  
        <link href="../../Files/css/chat.plugin.css" rel="stylesheet">
        <link  href="../../Files/js/charts/jquery.easy-pie-chart.css" rel="stylesheet">  
        <link  href="../../Files/Complementos/lib/selectize/selectize.css" rel="stylesheet">  
        <link  href="../../Files/css/component.css" rel="stylesheet"> 
        <link  href="../../Files/css/style-responsive.css" rel="stylesheet">
        <script src="../../Files/js/jquery.js"></script>
        <script src="../../Files/Complementos/lib/selectize/selectize.js"></script>        
        <script src="../../Files/Complementos/bootstrap/js/bootstrap.min.js"></script>        
        <script src="../../Files/js/charts/jquery.sparkline.min.js?v1.4.0"></script>
        <script src="../../Files/js/charts/jquery.easy-pie-chart.js?v1.4.0"></script>
        <script src="../../Files/js/charts/raphael.2.1.0.min.js?v1.4.0"></script>
        <script src="../../Files/js/charts/justgage.1.0.1.min.js?v1.4.0"></script>
        <script src="../../Files/Complementos/lib/scroll-slim/jquery.slimscroll.min.js"></script>
        <script src="../../Files/js/common.js"></script>

        <link rel="stylesheet" type="text/css" href="../../Files/Complementos/lib/jquery-easyui-1.4.2/themes/default/easyui.css">
        <link rel="stylesheet" type="text/css" href="../../Files/Complementos/lib/jquery-easyui-1.4.2/themes/icon.css">
        <link rel="stylesheet" type="text/css" href="../../Files/Complementos/lib/jquery-easyui-1.4.2/demo/demo.css">
        <link rel="stylesheet" type="text/css" href="../../Files/Complementos/lib/ladda/js/ladda.js">


    </head>
    <body>
        <?php
        if ($perfil == 1) {
            include '../Menus/directoraSuperiorInicio.php';
        } else if ($perfil == 4) {
            include '../Menus/auxiliarSuperiorInicio.php';
        } else if ($perfil == 6) {
            include '../Menus/adminSuperiorInicio.php';
        }
        ?>
        <!-- FIN MENU SUPERIOR-->
        <!-- start: Header -->
        <div class="wrap" style="background-image: url('../../Files/img/fondohome.jpg');  background-repeat: no-repeat; background-size: 100%;">
            <div class="container-fluid" >                
                <div class="row-fluid">
                    <?php
                    if ($perfil == 1) {
                        include '../Menus/directoraBotonesInterior.php';
                    } else if ($perfil == 4) {
                        include '../Menus/auxiliarBotonesInterior.php';
                    } else if ($perfil == 6) {
                        include '../Menus/adminBotonesInterior.php';
                    }
                    ?>

                </div>
            </div>
        </div>
        <script>
            $(function () {
                cargarAlertasPorVencer();
                cargarAlertasStock();
            });
            function cargarAlertasPorVencer() {
                var url_json = '../Servlet/administrarLote_producto.php?accion=CUENTAPRODUCTOSPORVENCER';
                $.getJSON(
                        url_json,
                        function (datos) {
                            if (datos > 0) {
                                document.getElementById("AlertaPorVencer").style.display = "block";
                            } else {
                                document.getElementById("AlertaPorVencer").style.display = "none";
                            }
                        }
                );
            }
            function cargarAlertasStock() {
                var url_json = '../Servlet/administrarLote_producto.php?accion=CUENTAPRODUCTOSBAJOSTOCK';
                $.getJSON(
                        url_json,
                        function (datos) {
                            if (datos > 0) {
                                document.getElementById("AlertaBajoStock").style.display = "block";
                            } else {
                                document.getElementById("AlertaBajoStock").style.display = "none";
                            }
                        }
                );
            }
        </script>
    </body>
</html>
