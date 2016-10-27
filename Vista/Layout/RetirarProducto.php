<!DOCTYPE html>
<?php
session_start();
if ($_SESSION['autentificado'] != "SI") {
    header("Location: ../../../index.php");
}
$perfil = $_SESSION["idCargo"];
$runFuncionaria = $_SESSION["run"];
?>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- start: Meta -->
        <meta charset="utf-8">
        <title>Sala cuna Hogar de Cristo</title>
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
        <!-- LIBRERIAS PARA AGREGAR APODERADOS -->
        <script type="text/javascript" src="../../Files/Complementos/lib/jquery-easyui-1.4.2/jquery.min.js"></script>
        <script type="text/javascript" src="../../Files/Complementos/lib/jquery-easyui-1.4.2/jquery.easyui.min.js"></script>
        <script type="text/javascript" src="../../Files/Complementos/lib/jquery-easyui-1.4.2/plugins/jquery.datagrid.js"></script>
        <link rel="stylesheet" type="text/css" href="../../Files/Complementos/lib/jquery-easyui-1.4.2/themes/default/easyui.css">
        <link rel="stylesheet" type="text/css" href="../../Files/Complementos/lib/jquery-easyui-1.4.2/themes/icon.css">
        <link rel="stylesheet" type="text/css" href="../../Files/Complementos/lib/jquery-easyui-1.4.2/demo/demo.css">
    </head>
    <body >
        <!-- AQUI VA EL MENU SUPERIROR-->
        <?php
        if ($perfil == 1) {
            include '../Menus/directoraSuperior.php';
        }
//        else if ($perfil == 2) {
//            include '../Menus/educadoraSuperior.php';
//        } else if ($perfil == 3) {
//            include '../Menus/apoderadoSuperior.php';
//        }
        ?>
        <!-- FIN MENU SUPERIOR-->
        <!-- start: Header -->
        <div class="wrap">

            <!-- ALERTA -->
            <div class="container-fluid" style="display: none;">
                <div class="row-fluid">
                    <div class="alert alert-block alert-success">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        Aqui contenido alerta
                    </div>                  
                </div>
            </div>
            <!-- FIN ALERTA -->

            <div class="container-fluid">
                <div class="row-fluid">

                    <!-- AQUI VA EL MENU LEFT-->
                    <?php
                    if ($perfil == 1) {
                        include '../Menus/directoraLeft.php';
                    }
//                    else if ($perfil == 2) {
//                        include '../Menus/educadoraLeft.php';
//                    } else if ($perfil == 3) {
//                        include '../Menus/apoderadoLeft.php';
//                    }
                    ?>
                    <!-- FIN MENU LEFT-->

                    <div id="content" class="span9" >
                        <div class="row-fluid">
                            <div class="social-box social-bordered social-blue">
                                <form id="fm-funcionaria" class="form-horizontal well">
                                    <fieldset>
                                        <div class="span6 content-panels  content-tab2" style="width: 100%">
                                            <a href="#" class="pull-right btn btn-warning"><i class="icon-check"></i> Confirmar Retiro</a>
                                            <h4>Retirar Lote de Productos</h4><hr>
                                            <div class="basic-info" style="width: 100%">  
                                                <form id="fm-Lotes" class="form-horizontal well" style="align-content: center">
                                                    <div class="control-group">
                                                        <label class="control-label" for="idCategoria">categoria</label>
                                                        <div class="controls">
                                                            <select  class="input-xlarge focused" id="idCategoria" name="idCategoria" required>                                                    
                                                            </select>
                                                        </div>
                                                    </div>                                                    
                                                    <div class="control-group">
                                                        <label class="control-label" for="idProducto">Producto</label>
                                                        <div class="controls">
                                                            <select  class="input-xlarge focused" id="idProducto" name="idProducto" required>                                                    
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label" for="cantidad">Cantidad</label>
                                                        <div class="controls">
                                                            <input class="input-xlarge focused" id="cantidad" name="cantidad" type="number" placeholder="Cantidad" required>
                                                        </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label" for="fechaRetiro">Fecha Retiro</label>
                                                        <div class="controls">
                                                            <input class="input-xlarge focused" id="fechaRetiro" name="fechaRetiro" type="date" placeholder="Fecha Retiro" required>
                                                        </div>
                                                    </div>
                                                     <a href="AdministrarLotesProducto.php" class="pull-right btn btn-info"><i class="icon-trash"></i>Cancelar</a>
                                                    <input type="hidden" id="accion" name="accion" value="">
                                                    <input type="hidden" id="idLote" name="idLote" value="<?= $idLote ?>">
                                                </form>

                                            </div>
                                        </div>
                                    </fieldset>
                                    <input type="hidden" id="accion" name="accion" value="">
                                </form>



                                <!-- FIN FORMULARIO-->
                                <!--                                        </div>
                                                                    </div>-->
                            </div>
                        </div>                  

                    </div>
                </div>

            </div>  

        </div><!--/#content.span19-->

        <div class="clearfix"></div>
        <div class="container-fluid m-t-large">
            <footer>
                <p>
                    <span class="pull-left">© <a href="" target="_blank">uExel</a> 2013</span>
                    <span class="hidden-phone pull-right">Powered by: <a href="#">uAdmin Dashboard</a></span>
                </p>
            </footer>
        </div>
    </div>
    <script src="../../Files/js/modernizr.custom.js"></script>
    <script src="../../Files/js/toucheffects.js"></script>
    <!-- Chat Magic Happens here-->
    <script src="../../Files/js/chat/jquery-ui-1.10.1.custom.min.js"></script>
    <script src="../../Files/js/chat/jquery.slimscroll.min.js"></script>
    <script src="../../Files/js/chat/jquery.simplecolorpicker.js"></script>
    <script src="../../Files/js/chat/uipro.min.js"></script>
    <script src="../../Files/js/chat/jquery.ui.chatbox.js"></script>
    <script src="../../Files/js/chat/chatboxManager.js"></script>
    <script src="../../Files/js/chat/jquery.livefilter.js"></script>
    <script src="../../Files/js/chat/app.js"></script>
    <script src="../../Files/js/chat/demo-settings.js"></script><!--
    --><script src="../../Files/js/chat/sidebar.js"></script>
    <script src="../../Files/js/custom.js"></script>

    <!-- Libreria para Validar Rut-->
    <script src="../../Files/js/validarut.js"></script>
    <script>
                                                            $(function () {

                                                            });

    </script>
</body>
</html>