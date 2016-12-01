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

        <link rel="stylesheet" type="text/css" href="../../Files/Complementos/lib/jquery-easyui-1.4.2/themes/metro-green/easyui.css">
        <link rel="stylesheet" type="text/css" href="../../Files/Complementos/lib/jquery-easyui-1.4.2/themes/icon.css">
        <link rel="stylesheet" type="text/css" href="../../Files/Complementos/lib/jquery-easyui-1.4.2/demo/demo.css">
        <script src="../../Files/Complementos/lib/jquery-easyui-1.4.2/jquery.easyui.min.js"></script>

        <!-- Bootstrap Select-->
        <link rel="stylesheet" type="text/css" href="../../Files/Complementos/bootstrap-select/dist/css/bootstrap-select.css">
        <script type="text/javascript"charset="utf8" src="../../Files/Complementos/bootstrap-select/dist/js/bootstrap-select.js"></script>

    </head>
    <body >
        <!-- AQUI VA EL MENU SUPERIROR-->
        <?php
        if ($perfil == 1) {
            include '../Menus/directoraSuperior.php';
        } else if ($perfil == 2) {
            include '../Menus/educadoraSuperior.php';
        } else if ($perfil == 3) {
            include '../Menus/apoderadoSuperior.php';
        }
        ?>
        <!-- FIN MENU SUPERIOR-->
        <!-- start: Header -->
        <div class="wrap">
            <div class="container-fluid">
                <div class="row-fluid">
                    <!-- AQUI VA EL MENU LEFT-->
                    <?php
                    if ($perfil == 1) {
                        include '../Menus/directoraLeftDocumentos.php';
                    }
//                    else if ($perfil == 2) {
//                        include '../Menus/educadoraLeft.php';
//                    } else if ($perfil == 3) {
//                        include '../Menus/apoderadoLeft.php';
//                    }
                    ?>
                    <!-- FIN MENU LEFT-->
                    <div id="content" class="span9" style="width: 80%">
                        <div class="row-fluid">                          
                            <div class="span6 text-center">
                                <form id="fm-buscar" method="POST">
                                    <div class="input-prepend input-append">
                                        <div class="btn-group" id="select-categoria">
                                            <select class="selectpicker" id="idTipoDocumento" name="idTipoDocumento" data-live-search="true">
                                            </select>
                                        </div>
                                        <input class="input-block-level" placeholder="Buscar Documento en .." id="cadena" name="cadena" type="text">
                                        <a class="btn btn-primary" onclick="buscar()"><i class="icon-search"></i> Buscar</a>
                                    </div>
                                </form>
                            </div>
                        </div> 
                        
                        <div class="span3 ">
                            <button class="btn btn-primary" onClick="location.href = 'agregarDocumento.php'"><i class="icon-plus"></i> Agregar Documentos</button>
                        </div> 
                        <br>
                        <hr>
                        <br>
                        <div id="resultado-busqueda">

                        </div>
                    </div>
                </div>
            </div> 
        </div>
        <footer>
            <p>
                <span class="pull-left">© <a href="" target="_blank">Sala Cuna y Jardín Infantil Hogar de Cristo</a> 2016</span>
            </p>
        </footer>
    </div>
    <script src="../../Files/js/modernizr.custom.js"></script>
    <script src="../../Files/js/toucheffects.js"></script>

    <script>
                                $(function () {
                                    cargarCategorias();
                                });

                                function cargarCategorias() {
                                    var url_json = '../Servlet/administrarTipo_documento.php?accion=LISTADO';
                                    $.getJSON(
                                            url_json,
                                            function (datos) {
                                                $("#idTipoDocumento").empty();
                                                $.each(datos, function (k, v) {
                                                    var contenido = "<option data-tokens='" + v.idTipoDocumento + "' value='" + v.idTipoDocumento + "'>" + v.nombre + "</option>";
                                                    $("#idTipoDocumento").append(contenido);
                                                });
                                                $('.selectpicker').selectpicker('refresh');
                                            }
                                    );
                                }

                                function buscar() {
                                    var url_json = '../Servlet/administrarDocumento.php?accion=BUSCAR&' + $("#fm-buscar").serialize();
                                    $.getJSON(
                                            url_json,
                                            function (datos) {
                                                $("#resultado-busqueda").empty();
                                                $.each(datos, function (k, v) {
                                                    //+ "<a class='pull-left' href='#'><img class='media-object' data-src='holder.js/120x120' alt='120x120' src='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAACDUlEQVR4Xu2Yz6/BQBDHpxoEcfTjVBVx4yjEv+/EQdwa14pTE04OBO+92WSavqoXOuFp+u1JY3d29rvfmQ9r7Xa7L8rxY0EAOAAlgB6Q4x5IaIKgACgACoACoECOFQAGgUFgEBgEBnMMAfwZAgaBQWAQGAQGgcEcK6DG4Pl8ptlsRpfLxcjYarVoOBz+knSz2dB6vU78Lkn7V8S8d8YqAa7XK83ncyoUCjQej2m5XNIPVmkwGFC73TZrypjD4fCQAK+I+ZfBVQLwZlerFXU6Her1eonreJ5HQRAQn2qj0TDukHm1Ws0Ix2O2260RrlQqpYqZtopVAoi1y+UyHY9Hk0O32w3FkI06jkO+74cC8Dh2y36/p8lkQovFgqrVqhFDEzONCCoB5OSk7qMl0Gw2w/Lo9/vmVMUBnGi0zi3Loul0SpVKJXRDmphvF0BOS049+n46nW5sHRVAXMAuiTZObcxnRVA5IN4DJHnXdU3dc+OLP/V63Vhd5haLRVM+0jg1MZ/dPI9XCZDUsbmuxc6SkGxKHCDzGJ2j0cj0A/7Mwti2fUOWR2Km2bxagHgt83sUgfcEkN4RLx0phfjvgEdi/psAaRf+lHmqEviUTWjygAC4EcKNEG6EcCOk6aJZnwsKgAKgACgACmS9k2vyBwVAAVAAFAAFNF0063NBAVAAFAAFQIGsd3JN/qBA3inwDTUHcp+19ttaAAAAAElFTkSuQmCC'></a>"
                                                    var contenido = "<div class='media well-small'>"
                                                            + "<a class='pull-left' href='editarDocumento.php?idDocumento=" + v.idDocumento + "'><img class='media-object' data-src='holder.js/120x120' alt='120x120' src='../../Files/img/Archivos Icon/" + v.formato + ".png'></a>"
                                                            + "<div class='media-body'>"
                                                            + "<h5 class='media-heading'><a href='editarDocumento.php?idDocumento=" + v.idDocumento + "'><b>" + v.nombre + "</b></a></h5>" + v.descripcion + "</div></div>";
                                                    $("#resultado-busqueda").append(contenido);
                                                });
                                            }
                                    );
                                }

    </script>
</body>
</html>

