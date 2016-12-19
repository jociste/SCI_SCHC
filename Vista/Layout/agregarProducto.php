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
        <!-- AQUI VA EL MENU SUPERIROR-->
        <?php
        if ($perfil == 1) {
            include '../Menus/directoraSuperior.php';
        } else if ($perfil == 4) {
            include '../Menus/auxiliarSuperior.php';
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
                    if ($perfil == 4) {
                        include '../Menus/auxiliarLeftInventarioProductos.php';
                    }
                    ?>
                    <!-- FIN MENU LEFT-->
                    <div id="content" class="span9" style="width: 1100px; align-content: center">      
                        <div class="row-fluid" style="align-content: center">
                            <!-- AQUI VA EL MENU LEFT-->
                            <?php
                            if ($perfil == 1) {
                                include '../Menus/directoraAgregaProductos.php';
                            }
                            if ($perfil == 4) {
                                include '../Menus/AuxiliarAgregaProductos.php';
                            }
                            ?>
                            <!-- FIN MENU LEFT-->
                        </div>
                    </div>  
                </div>  
            </div><!--/#content.span19-->

            <div class="clearfix"></div>
            <div class="container-fluid m-t-large">
                <footer>
                    <p>
                        <span class="pull-left">© <a href="" target="_blank">Sala Cuna y Jardín Infantil Hogar de Cristo</a> 2016</span>

                    </p>
                </footer>
            </div>
        </div>
        <script src="../../Files/js/modernizr.custom.js"></script>
        <script src="../../Files/js/toucheffects.js"></script>

        <script>
            $(function () {
                var perfil = document.getElementById("perfil").value;
                if (perfil == 1) {
                    cargarCategorias();
                }
                if (perfil == 4) {
                    cargarCategoriasAuxiliar()
                }

            });

            function cargarCategorias() {
                var url_json = '../Servlet/administrarCategoria.php?accion=LISTADO';
                $.getJSON(
                        url_json,
                        function (datos) {
                            $.each(datos, function (k, v) {
                                var contenido;                                
                                if (v.idCategoria != 1 && v.idCategoria != 5) {
                                     contenido = "<option value='" + v.idCategoria + "'>" + v.nombre + "</option>";
                                }
                                $("#idCategoria").append(contenido);
                            });
                        }
                );
            }
            function cargarCategoriasAuxiliar() {
                var url_json = '../Servlet/administrarCategoria.php?accion=LISTADOAUXILIAR';
                $.getJSON(
                        url_json,
                        function (datos) {
                            $.each(datos, function (k, v) {
                                var contenido;                                
                                if (v.idCategoria != 1 && v.idCategoria != 5) {
                                     contenido = "<option value='" + v.idCategoria + "'>" + v.nombre + "</option>";
                                }
                                $("#idCategoria").append(contenido);
                            });
                        }
                );
            }

            function guardar() {
                document.getElementById("accion").value = "AGREGAR";
                if (validar()) {
                    $('#fm-Categoria').form('submit', {
                        url: "../Servlet/administrarProducto.php",
                        onSubmit: function () {
                            return $(this).form('validate');
                        },
                        success: function (result) {
                            var result = eval('(' + result + ')');
                            if (result.errorMsg) {
                                $.messager.alert('Error', result.errorMsg);
                            } else {
                                $.messager.show({
                                    title: 'Aviso',
                                    msg: result.mensaje
                                });
                                window.location = "AdministrarProductos.php";
                            }
                        }
                    });
                }

            }

            function validar() {
                var nombre = document.getElementById("nombre").value;
                var idCategoria = document.getElementById("idCategoria").value;

                if (nombre == "") {
                    $.messager.alert('Error', "Debe ingresar un nombre de producto");
                    return false;
                }
                if (idCategoria == -1) {
                    $.messager.alert('Error', "Debe seleccionar una categoria");
                    return false;
                }
                return true;
            }
        </script>
    </body>
</html>