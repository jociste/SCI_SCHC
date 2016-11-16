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
                        include '../Menus/directoraLeftInventarioProductos.php';
                    }
//                    else if ($perfil == 2) {
//                        include '../Menus/educadoraLeft.php';
//                    } else if ($perfil == 3) {
//                        include '../Menus/apoderadoLeft.php';
//                    }
                    ?>
                    <!-- FIN MENU LEFT-->

                    <div id="content" class="span9" >
                         <!-- AQUI VA EL MENU INTERIOR-->
                            <?php
                            if ($perfil == 1) {
                                include '../Menus/directoraMenuInteriorProductos.php';
                            }
                            ?>
                            <!-- FIN MENU INTERIOR-->
                            <hr>
                        <div class="row-fluid">
                            <div class="social-box social-bordered social-blue" id="vista-solicitud">

                                <fieldset>
                                    <div class="span12 content-panels  content-tab2" style="width: 100%">
                                        <a href="#" class="pull-right btn btn-warning" onclick="retirarProductos()"><i class="icon-check"></i> Confirmar Retiro</a>
                                        <a href="#" class="pull-right btn btn-primary" onclick="agregarProducto()"><i class="icon-plus"></i> Otro Producto</a>
                                        <h4>Retirar Lote de Productos</h4><hr>
                                        <form id="fm" method="POST">
                                            <div class="basic-info" id="lista-productos" style="width: 100%">  
                                                <div class="row-fluid">
                                                    <div class="span3">
                                                        <label class="sr-only">Categoria</label>
                                                    </div>
                                                    <div class="span3">
                                                        <label class="sr-only">Producto</label>
                                                    </div>
                                                    <div class="span1">
                                                        <label class="sr-only">Cantidad</label>
                                                    </div>
                                                    <div class="span2">
                                                        <label class="sr-only">Fecha Retiro</label>
                                                    </div>
                                                    <div class="span3">
                                                        <label class="sr-only">Destino</label>
                                                    </div>
                                                </div>
                                                <div class="row-fluid">
                                                    <div class="span3">
                                                        <select  class="form-control" id="idCategoria_1" name="idCategoria_1" required onchange="obtenerProductos(1)">                                                    
                                                        </select>
                                                    </div>
                                                    <div class="span3">
                                                        <select class="form-control" id="idProducto_1" name="idProducto_1" required>                                                    
                                                        </select>
                                                    </div>
                                                    <div class="span1">
                                                        <input class="form-control" id="cantidad_1" name="cantidad_1" type="number" min="1" placeholder="Cantidad" style="width: 90%;" required>
                                                    </div>
                                                    <div class="span2">
                                                        <input class="form-control" id="fechaRetiro_1" name="fechaRetiro_1" type="date" placeholder="Fecha Retiro" style="width: 90%;" required>
                                                    </div>
                                                    <div class="span3">
                                                        <input class="form-control" id="destino_1" name="destino_1" type="text" placeholder="Destino" required>
                                                    </div>
                                                </div>

                                            </div>
                                            <a href="AdministrarLotesProducto.php" class="pull-right btn btn-info"><i class="icon-trash"></i>Cancelar</a>
                                            <input type="hidden" id="cantidadProductos" name="cantidadProductos" value="1">
                                            <input type="hidden" id="accion" name="accion" value="RETIRAR_PRODUCTOS">
                                        </form>
                                    </div>
                                </fieldset>
                                <!-- FIN FORMULARIO-->
                            </div>

                            <div class="social-box social-bordered social-blue" id="vista-disponibles" style="display: none;">
                                <fieldset>
                                    <div class="span12 content-panels  content-tab2" style="width: 100%">
                                        <a href="RetirarProducto.php" class="pull-right btn btn-default">Volver atras</a>
                                        <h4>Productos Listo para Retirar</h4><hr>
                                        <div class="basic-info" id="lista-productos-retirados" style="width: 100%">  
                                            <div class="row-fluid">
                                                <div class="span3">
                                                    <label class="sr-only">Producto</label>
                                                </div>
                                                <div class="span1">
                                                    <label class="sr-only">Cantidad</label>
                                                </div>
                                                <div class="span2">
                                                    <label class="sr-only">Numero Boleta</label>
                                                </div>
                                                <div class="span3">
                                                    <label class="sr-only">Fecha Vencimiento</label>
                                                </div>
                                                <div class="span3">
                                                    <label class="sr-only">Fecha Ingreso</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                            
                            <div class="social-box social-bordered social-blue" id="vista-no-disponibles" style="display: none;">
                                <fieldset>
                                    <div class="span12 content-panels  content-tab2" style="width: 100%">
                                        <a href="RetirarProducto.php" class="pull-right btn btn-default">Volver atras</a>
                                        <h4>Productos No Disponibles</h4><hr>
                                        <div class="basic-info" id="lista-productos-sin-stock" style="width: 100%">  
                                            <div class="row-fluid">
                                                <div class="span3">
                                                    <label class="sr-only">Producto</label>
                                                </div>
                                                <div class="span3">
                                                    <label class="sr-only">Cantidad</label>
                                                </div>
                                                <div class="span3">
                                                    <label class="sr-only">Estado</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
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
                                                            var categorias;
                                                            $(function () {
                                                                cargarCategorias();
                                                            });

                                                            function cargarCategorias() {
                                                                var url_json = '../Servlet/administrarCategoria.php?accion=LISTADO';
                                                                $.getJSON(
                                                                        url_json,
                                                                        function (datos) {
                                                                            categorias = datos;
                                                                            $("#idCategoria_1").append("<option value='-1'>Seleccionar</option>");
                                                                            $.each(datos, function (k, v) {
                                                                                var contenido = "<option value='" + v.idCategoria + "'>" + v.nombre + "</option>";
                                                                                $("#idCategoria_1").append(contenido);
                                                                            });
                                                                        }
                                                                );
                                                            }

                                                            function obtenerProductos(pos) {
                                                                var codigoCategoria = $("#idCategoria_" + pos).val();
                                                                var url_json = '../Servlet/administrarProducto.php?accion=BUSCAR_BY_ID_CATEGORIA&idCategoria=' + codigoCategoria;
                                                                $.getJSON(
                                                                        url_json,
                                                                        function (datos) {
                                                                            $("#idProducto_" + pos).empty()
                                                                            $.each(datos, function (k, v) {
                                                                                var contenido = "<option value='" + v.idProducto + "'>" + v.nombre + "</option>";
                                                                                $("#idProducto_" + pos).append(contenido);
                                                                            });
                                                                        }
                                                                );
                                                            }

                                                            function agregarProducto() {
                                                                var cantidadProductos = document.getElementById("cantidadProductos").value;
                                                                cantidadProductos++;
                                                                var contenido = "<div class='row-fluid'>"
                                                                        + "<div class='span3'>"
                                                                        + "<select  class='form-control' id='idCategoria_" + cantidadProductos + "' name='idCategoria_" + cantidadProductos + "' onchange='obtenerProductos(" + cantidadProductos + ")' required>"
                                                                        + "</select>"
                                                                        + "</div>"
                                                                        + "<div class='span3'>"
                                                                        + "<select class='form-control' id='idProducto_" + cantidadProductos + "' name='idProducto_" + cantidadProductos + "' required>"
                                                                        + "</select>"
                                                                        + "</div>"
                                                                        + "<div class='span1'>"
                                                                        + "<input class='form-control' id='cantidad_" + cantidadProductos + "' name='cantidad_" + cantidadProductos + "' type='number' min='1' placeholder='Cantidad' style='width: 90%;' required>"
                                                                        + "</div>"
                                                                        + "<div class='span2'>"
                                                                        + "<input class='form-control' id='fechaRetiro_" + cantidadProductos + "' name='fechaRetiro_" + cantidadProductos + "' type='date' placeholder='Fecha Retiro' style='width: 90%;' required>"
                                                                        + "</div>"
                                                                        + "<div class='span3'>"
                                                                        + "<input class='form-control' id='destino_" + cantidadProductos + "' name='destino_" + cantidadProductos + "' type='text' placeholder='Destino' required>"
                                                                        + "</div>"
                                                                        + "</div>";
                                                                $("#lista-productos").append(contenido);
                                                                document.getElementById("cantidadProductos").value = cantidadProductos;
                                                                $("#idCategoria_" + cantidadProductos).append("<option value='-1'>Seleccionar</option>");
                                                                $.each(categorias, function (k, v) {
                                                                    var contenido = "<option value='" + v.idCategoria + "'>" + v.nombre + "</option>";
                                                                    $("#idCategoria_" + cantidadProductos).append(contenido);
                                                                });
                                                            }

                                                            function retirarProductos() {
                                                                if (validar()) {
                                                                    $('#fm').form('submit', {
                                                                        url: "../Servlet/administrarLote_producto.php",
                                                                        onSubmit: function () {
                                                                            return $(this).form('validate');
                                                                        },
                                                                        success: function (result) {
                                                                            var result = eval('(' + result + ')');
                                                                            mostrarProductoDisponible(result.lotesUtilizados)
                                                                            mostrarProductoSinDisponiblilidad(result.productosNoDisponibles);
                                                                            
                                                                            if (result.errorMsg) {
                                                                                $.messager.alert('Error', result.errorMsg);
                                                                            } else {
                                                                                document.getElementById("vista-solicitud").style.display = "none";
                                                                                $.messager.show({
                                                                                    title: 'Aviso',
                                                                                    msg: result.mensaje
                                                                                });
                                                                            }
                                                                        }
                                                                    });
                                                                }
                                                            }

                                                            function validar() {
                                                                var cantidadProductos = document.getElementById("cantidadProductos").value;
                                                                for (var i = 1; i <= cantidadProductos; i++) {
                                                                    var idCategoria = document.getElementById("idCategoria_" + i).value;
                                                                    var idProducto = document.getElementById("idProducto_" + i).value;
                                                                    var cantidad = document.getElementById("cantidad_" + i).value;
                                                                    var fechaRetiro = document.getElementById("fechaRetiro_" + i).value;
                                                                    var destino = document.getElementById("destino_" + i).value;
                                                                    if (idCategoria == "" || idCategoria == -1) {
                                                                        $.messager.alert('Error', "Debe seleccionar una categoria en la fila " + i);
                                                                        $("#idCategoria_" + i).focus();
                                                                        return false;
                                                                    } else if (idProducto == "") {
                                                                        $.messager.alert('Error', "Debe seleccionar un producto en la fila " + i);
                                                                        $("#idProducto_" + i).focus();
                                                                        return false;
                                                                    } else if (cantidad == "") {
                                                                        $.messager.alert('Error', "Debe ingresar una cantidad en la fila " + i);
                                                                        $("#cantidad_" + i).focus();
                                                                        return false;
                                                                    } else if (fechaRetiro == "") {
                                                                        $.messager.alert('Error', "Debe ingresar una fecha de retiro en la fila " + i);
                                                                        $("#fechaRetiro_" + i).focus();
                                                                        return false;
                                                                    } else if (destino == "") {
                                                                        $.messager.alert('Error', "Debe ingresar un destino en la fila " + i);
                                                                        $("#destino_" + i).focus();
                                                                        return false;
                                                                    }
                                                                }
                                                                return true;
                                                            }

                                                            function mostrarProductoDisponible(lotesUtilizados) {
                                                                var count = 0;
                                                                $.each(lotesUtilizados, function (k, v) {
                                                                    var contenido = "<div class='row-fluid'>"
                                                                            + " <div class='span3'>"
                                                                            + "     <input class='form-control' type='text' placeholder='Producto' value='"+v.nombre+"' readonly>"
                                                                            + " </div>"
                                                                            + " <div class='span1'>"
                                                                            + "     <input class='form-control' type='text' placeholder='Cantidad' value='"+v.cantidad+"' readonly style='width: 90%;'>"
                                                                            + " </div>"
                                                                            + " <div class='span2'>"
                                                                            + "     <input class='form-control' type='text' placeholder='Numero Boleta' value='"+v.numeroBoleta+"' readonly style='width: 90%;'>"
                                                                            + " </div>"
                                                                            + " <div class='span3'>"
                                                                            + "     <input class='form-control' type='text' placeholder='Fecha Vencimiento' value='"+v.fechaVencimiento+"' readonly>"
                                                                            + " </div>"
                                                                            + " <div class='span3'>"
                                                                            + "     <input class='form-control' type='text' placeholder='Fecha Ingreso' value='"+v.fechaIngreso+"' readonly>"
                                                                            + " </div>"
                                                                            + " </div>";

                                                                    $("#lista-productos-retirados").append(contenido);
                                                                    count++;
                                                                });
                                                                if(count == 0){
                                                                    document.getElementById("vista-disponibles").style.display = "none";
                                                                }else{
                                                                    document.getElementById("vista-disponibles").style.display = "block";
                                                                }
                                                            }
                                                            
                                                            function mostrarProductoSinDisponiblilidad(productosNoDisponibles) {
                                                                var count = 0;
                                                                $.each(productosNoDisponibles, function (k, v) {
                                                                    var contenido = "<div class='row-fluid'>"
                                                                            + " <div class='span3'>"
                                                                            + "     <input class='form-control' type='text' placeholder='Producto' value='"+v.nombre+"' readonly>"
                                                                            + " </div>"
                                                                            + " <div class='span3'>"
                                                                            + "     <input class='form-control' type='text' placeholder='Cantidad' value='"+v.cantidad+"' readonly>"
                                                                            + " </div>"
                                                                            + " <div class='span3'>"
                                                                            + "     <input class='form-control' type='text' placeholder='Estado' value='Stock Agotado' readonly>"
                                                                            + " </div>"
                                                                            + " </div>";

                                                                    $("#lista-productos-sin-stock").append(contenido);
                                                                    count++;
                                                                });
                                                                if(count == 0){
                                                                    document.getElementById("vista-no-disponibles").style.display = "none";
                                                                }else{
                                                                    document.getElementById("vista-no-disponibles").style.display = "block";
                                                                }
                                                            }

    </script>
</body>
</html>