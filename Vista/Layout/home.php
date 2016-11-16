<!DOCTYPE html>
<?php
session_start();
if ($_SESSION['autentificado'] != "SI") {
    header("Location: ../../../index.php");
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
            include '../Menus/directoraSuperior.php';
        }
//         else if ($perfil == 2) {
//            include '../Menus/educadoraSuperior.php';
//        } else if ($perfil == 3) {
//            include '../Menus/apoderadoSuperior.php';
//        }
        ?>
        <!-- FIN MENU SUPERIOR-->
        <!-- start: Header -->
        <div class="wrap">
            <div class="container-fluid">                
                <div class="row-fluid">
                    <div id="content" class="span9" style="width: 100%; align-content: center; padding-left: 30%; padding-top: 5%; background-image: url('../../Files/img/fondohome.jpg');  background-repeat: no-repeat; background-size: 100%;">
                        <a href="AdministrarFuncionariasHabilitadas.php" class="button button-pill btn btn-warning" style="height: 83px; width: 110px; padding-top: 50px"><i class="icon-group"></i>&nbsp;Personal</a>  &nbsp;                      
                        <a href="AdministrarLotesProducto.php" class="button button-pill btn btn-info" style="height: 83px; width: 110px; padding-top: 50px"><i class="icon-archive"></i>&nbsp;Inventario Productos</a>&nbsp;  &nbsp;                       
                        <a href="AdministrarBienes.php" class="button button-pill btn btn-primary" style="height: 83px; width: 110px; padding-top: 50px"><i class="icon-folder-close"></i>&nbsp;Inventario Bienes</a> &nbsp;                       
                        <a href="AdministrarDocumentos.php" class="button button-pill btn btn-danger" style="height: 83px; width: 110px; padding-top: 50px"><i class="icon-folder-open"></i>&nbsp;Documentos</a>                        
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
