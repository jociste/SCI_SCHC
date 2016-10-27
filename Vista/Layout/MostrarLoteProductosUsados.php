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


        <link rel="stylesheet" type="text/css" href="../../Files/Complementos/lib/datatables/css/jquery.dataTables.css">
        <script type="text/javascript" charset="utf8" src="../../Files/Complementos/lib/datatables/jquery.dataTables.js"></script>

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
            <div class="container-fluid" style="background-color: #ebeced" >
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

                <div class="span12"  style="width: 90%">       
                    <div class="body">

                        <div class="clearfix"></div>
                        <div id="content" class="span9" style="background-color: #fff; width: 90%" >
                            <!-- AQUI VA EL MENU INTERIOR-->
                            <?php
                            if ($perfil == 1) {
                                include '../Menus/directoraMenuInteriorProductos.php';
                            }
                            ?>
                            <!-- FIN MENU INTERIOR-->
                            <hr>
                            <h4>Detalle de productos usados</h4>

                            <div class="table-responsive">
                                <table id="grid" class="table table-striped table-bordered dt-responsive nowrap">
                                    <thead>
                                        <tr>
<!--                                            <th></th> -->
                                            <th>Fecha Retiro</th> 
                                            <th>Destino</th> 
                                            <th>Funcionaria</th>
                                            <th>Nombre Producto</th>
                                            <th>Cantidad</th>
                                            <!--<th>Accion</th>-->
                                        </tr>
                                    </thead>
                                    <tbody id="grid" class="table table-striped table-bordered dt-responsive nowrap">
                                    </tbody>
                                </table>
                                <input type="hidden" id="accion" name="accion" value="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>                  
        </div>
        <div class="clearfix"></div>
        <div class="container-fluid m-t-large">
            <footer>
                <p>
                    <span class="pull-left">© <a href="" target="_blank">Sala Cuna y Jardín Infantil Hogar de Cristo</a> 2016</span>
                    <span class="hidden-phone pull-right">Powered by: <a href="#">uAdmin Dashboard</a></span>
                </p>
            </footer>
        </div>
        <script src="../../Files/js/modernizr.custom.js"></script>
        <script src="../../Files/js/toucheffects.js"></script>
        <!--        <script src="../../Files/Nuevas/jquery.dataTables.min.css"></script>
        <script src="../../Files/Nuevas/jquery.dataTables.min.js"></script>-->

        <script>
            $(function () {
                cargarFuncionarias();
            })

            function cargarFuncionarias() {
                $("#tablaFuncionarias").empty();
                var url_json = '../Servlet/administrarLote_producto_usados.php?accion=LISTADOPRODUCTOSUSADOS';
                $.getJSON(
                        url_json,
                        function (datos) {
                            $.each(datos, function (k, v) {
                                var contenido = "<tr>";
                                var nombre = v.nombres + " " + v.apellidos;
                                contenido += "<td>" + v.fechaRetiro + "</td>";
                                contenido += "<td>" + v.destino + "</td>";
                                contenido += "<td>" + nombre + "</td>";
                                contenido += "<td>" + v.nombreProducto + "</td>";
                                contenido += "<td>" + v.cantidad + "</td>";
                                //                                                        contenido += "<td>";
                                ////                                                        contenido += "<button type='button' class='btn btn-warning btn-circle icon-pencil'  onclick='editar(" + v.runFuncionaria + ")'></button>";
                                ////                                                        contenido += "<button type='button' class='btn btn-danger btn-circle icon-trash'  onclick='borrarFuncionaria(" + v.runFuncionaria + ")'></button>";
                                //                                                        contenido += "</td>";
                                contenido += "</tr>";
                                $("#grid").append(contenido);
                            });
                            $('#grid').DataTable();
                        }
                );
            }
            //
            //                                    function editar(runFuncionaria) {
            //                                        window.location = "editarFuncionaria.php?runFuncionaria=" + runFuncionaria;
            //                                    }
            //
            //                                    function borrarFuncionaria(runFuncionaria) {
            //                                        $.messager.confirm('Despedir Funcionaria', '¿Está Segura(o) que desea eliminar a la funcionaria del sistema?', function (r) {
            //                                            if (r) {
            //                                                var url_json = '../Servlet/administrarFuncionaria.php?accion=BORRAR&runFuncionaria=' + runFuncionaria;
            //                                                $.getJSON(
            //                                                        url_json,
            //                                                        function (datos) {
            //                                                            if (datos.errorMsg) {
            //                                                                $.messager.alert('Error', datos.errorMsg, 'error');
            //                                                            } else {
            //                                                                window.location = "FuncionariasHistoricas.php";
            //                                                            }
            //                                                        }
            //                                                );
            //                                            } else {
            //
            //                                            }
            //                                        });
            //                                    }
        </script>
    </body>
</html>
