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


    </head>
    <body >
        <!-- AQUI VA EL MENU SUPERIOR-->
        <?php
        if ($perfil == 1) {
            include '../Menus/directoraSuperior.php';
        } else if ($perfil == 4) {
            include '../Menus/auxiliarSuperior.php';
        }
        else if ($perfil == 6) {
            include '../Menus/adminSuperior.php';
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
                        include '../Menus/directoraLeftInventarioProductos.php';
                    }
                    else if ($perfil == 4) {
                        include '../Menus/auxiliarLeftInventarioProductos.php';
                    }
                     else if ($perfil == 6) {
                        include '../Menus/adminLeftPersonal.php';
                    }
                    ?>
                    <!-- FIN MENU LEFT-->
                    <div id="content" class="span9" >
                        <!-- AQUI VA EL MENU INTERIOR-->
                        <?php
                        if ($perfil == 1) {
                            include '../Menus/directoraMenuInteriorProductos.php';
                        }
                        if ($perfil == 4) {
                            include '../Menus/auxiliarMenuInteriorProductos.php';
                        }
                        ?>
                        <!-- FIN MENU INTERIOR-->
                        <hr>
                        <div class="row-fluid">
                            <!-- AQUI VA La tabla segun el perfil-->
                        <?php
                        if ($perfil == 1) {
                            include '../Menus/directoraVisualizaLoteProductos.php';
                        }
                        if ($perfil == 4) {
                            include '../Menus/auxiliarVisualizaLoteProductos.php';
                        }
                        ?>
                        <!-- FIN tabla segun el perfil-->                

                        </div>
                    </div>

                </div>  

            </div><!--/#content.span19-->

            <div class="clearfix"></div>
            <div class="container-fluid m-t-large">
                <footer>
                    <p>
                        <span class="pull-left">© <a href="" target="_blank">Sala Cuna y Jardin Infantil Hogar de Cristo</a> 2016</span>
                    </p>
                </footer>
            </div>
        </div>
        <script src="../../Files/js/modernizr.custom.js"></script>
        <script src="../../Files/js/toucheffects.js"></script>

        <script>
                                                $(function () {
                                                    var perfil = document.getElementById("perfil").value;
                                                    if(perfil == 1){
                                                         cargarLotes();
                                                    }
                                                    if(perfil == 4){
                                                         cargarLotesAuxiliar();
                                                    }                                                   
                                                });

                                                function cargarLotes() {
                                                    $("#tablaLotes").empty();
                                                    var url_json = '../Servlet/administrarLote_producto.php?accion=LISTADO';
                                                    $.getJSON(
                                                            url_json,
                                                            function (datos) {
                                                                $.each(datos, function (k, v) {
                                                                    var contenido = "<tr>";
                                                                    contenido += "<td>" + v.numeroBoleta + "</td>";
                                                                    contenido += "<td>" + v.nombre + "</td>";
                                                                    contenido += "<td>" + v.cantidad + "</td>";
                                                                    contenido += "<td>" + v.proveedor + "</td>";
                                                                    if (v.fechaVencimiento == '0000-00-00') {
                                                                        contenido += "<td>Sin Fecha Vencimiento</td>";
                                                                    } else {
                                                                        contenido += "<td>" + v.fechaVencimiento + "</td>";
                                                                    }
                                                                    contenido += "<td>" + v.fechaIngreso + "</td>";
                                                                    contenido += "<td>";
                                                                    contenido += "<button type='button' class='btn btn-warning btn-circle icon-pencil'  onclick='editar(" + v.idLote + ")'></button>";
                                                                    //contenido += "<button type='button' class='btn btn-danger btn-circle icon-trash'  onclick='borrar(" + v.idLote + ")'></button>";
                                                                    contenido += "</td>";
                                                                    contenido += "</tr>";
                                                                    $("#tablaLotes").append(contenido);
                                                                });
                                                            }
                                                    );
                                                }
                                                 function cargarLotesAuxiliar() {
                                                    $("#tablaLotesAuxiliar").empty();
                                                    var url_json = '../Servlet/administrarLote_producto.php?accion=LISTADOAUXILIAR';
                                                    $.getJSON(
                                                            url_json,
                                                            function (datos) {
                                                                $.each(datos, function (k, v) {
                                                                    var contenido = "<tr>";
                                                                    contenido += "<td>" + v.numeroBoleta + "</td>";
                                                                    contenido += "<td>" + v.nombre + "</td>";
                                                                    contenido += "<td>" + v.cantidad + "</td>";
                                                                    contenido += "<td>" + v.proveedor + "</td>";
                                                                    if (v.fechaVencimiento == '0000-00-00') {
                                                                        contenido += "<td>Sin Fecha Vencimiento</td>";
                                                                    } else {
                                                                        contenido += "<td>" + v.fechaVencimiento + "</td>";
                                                                    }
                                                                    contenido += "<td>" + v.fechaIngreso + "</td>";
                                                                    contenido += "<td>";
                                                                    contenido += "<button type='button' class='btn btn-warning btn-circle icon-pencil'  onclick='editar(" + v.idLote + ")'></button>";
                                                                    //contenido += "<button type='button' class='btn btn-danger btn-circle icon-trash'  onclick='borrar(" + v.idLote + ")'></button>";
                                                                    contenido += "</td>";
                                                                    contenido += "</tr>";
                                                                    $("#tablaLotesAuxiliar").append(contenido);
                                                                });
                                                            }
                                                    );
                                                }
                                                function editar(idLote) {
                                                    window.location = "editarLoteProducto.php?idLote=" + idLote;
                                                }

                                                function borrar(idLote) {
                                                    $.messager.confirm('Confirmar', '¿Esta seguro de eliminar el lote de producto?', function (r) {
                                                        if (r) {
                                                            var url_json = '../Servlet/administrarLote_producto.php?accion=BORRAR&idLote=' + idLote;
                                                            $.getJSON(
                                                                    url_json,
                                                                    function (datos) {
                                                                        if (datos.errorMsg) {
                                                                            $.messager.alert('Error', datos.errorMsg, 'error');
                                                                        } else {
                                                                            $.messager.show({
                                                                                title: 'Aviso',
                                                                                msg: datos.mensaje
                                                                            });
                                                                            cargarLotes();
                                                                        }
                                                                    }
                                                            );
                                                        }
                                                    });
                                                }
        </script>
    </body>
</html>