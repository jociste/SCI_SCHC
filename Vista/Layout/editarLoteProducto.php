<!DOCTYPE html>
<?php
session_start();
if ($_SESSION['autentificado'] != "SI") {
    header("Location: ../../../index.php");
}
$perfil = $_SESSION["idCargo"];
$idLote = $_REQUEST["idLote"];
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
                    <div id="content" class="span9" style="width: 1100px; align-content: center">
                        <hr><div class="row-fluid" style="align-content: center">
                            <div class="span12" style="align-content: center">
                                <div class="row-fluid" style="align-content: center">
                                    <form id="fm-Lotes" class="form-horizontal well" style="align-content: center">

                                        <div class="form-actions" style="height: 30px;">
                                            <h4 style="width: 550px; align-content: center; margin: 0; padding-left: 30%">Datos Lote Producto</h4> 
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="numeroBoleta">Numero Boleta</label>
                                            <div class="controls">
                                                <input class="input-xlarge focused" id="numeroBoleta" name="numeroBoleta" type="text" placeholder="Numero Boleta" required>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="idProducto">Producto</label>
                                            <div class="controls">
                                                <select  class="input-xlarge focused" id="idProducto" name="idProducto" required>                                                    
                                                </select>
                                            </div>
                                        </div>
                                        <!--                                        <div class="control-group">
                                                                                    <label class="control-label" for="cantidad">Cantidad</label>
                                                                                    <div class="controls">
                                                                                        <input class="input-xlarge focused" id="cantidad" name="cantidad" type="number" placeholder="Cantidad" required>
                                                                                    </div>
                                                                                </div>-->
                                        <div class="control-group">
                                            <label class="control-label" for="proveedor">Proveedor</label>
                                            <div class="controls">
                                                <input class="input-xlarge focused" id="proveedor" name="proveedor" type="text" placeholder="Proveedor" required>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="fechaVencimiento">Fecha Vencimiento</label>
                                            <div class="controls">
                                                <input class="input-xlarge focused" id="fechaVencimiento" name="fechaVencimiento" type="date" placeholder="Fecha Vencimiento" required>
                                                <input type="checkbox" id="deshabilitaFechaVencimiento" name="deshabilitaFechaVencimiento" onclick="deshabilitaCampoVencimiento()">&nbsp;Sin Fecha Vencimiento&nbsp;&nbsp;
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="fechaIngreso">Fecha Ingreso</label>
                                            <div class="controls">
                                                <input class="input-xlarge focused" id="fechaIngreso" name="fechaIngreso" type="date" placeholder="Fecha Ingreso" required>
                                            </div>
                                        </div>
                                        <div class="form-actions" style="align-content: center">
                                            <button type="button" onclick="guardar()" class="btn btn-primary">Guardar Cambios</button>
                                            <button type="button" onClick="location.href = 'AdministrarLotesProducto.php'" class="btn">Cancelar</button>
                                        </div>
                                        <input type="hidden" id="accion" name="accion" value="">
                                        <input type="hidden" id="idLote" name="idLote" value="<?= $idLote ?>">
                                    </form>
                                    <!-- FIN FORMULARIO-->
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

        <script>

                                                $(function () {
                                                    cargarProductos();
                                                });

                                                function cargarProductos() {
                                                    var url_json = '../Servlet/administrarProducto.php?accion=LISTADO';
                                                    $.getJSON(
                                                            url_json,
                                                            function (datos) {
                                                                $.each(datos, function (k, v) {
                                                                    var contenido = "<option value='" + v.idProducto + "'>" + v.nombre + "</option>";
                                                                    $("#idProducto").append(contenido);
                                                                });
                                                                cargar();
                                                            }
                                                    );
                                                }

                                                function cargar() {
                                                    var idLote = document.getElementById("idLote").value;
                                                    var url_json = '../Servlet/administrarLote_producto.php?accion=BUSCAR_BY_ID&idLote=' + idLote;
                                                    $.getJSON(
                                                            url_json,
                                                            function (datos) {
                                                                document.getElementById("idLote").value = datos.idLote;
                                                                document.getElementById("idProducto").value = datos.idProducto;
                                                                document.getElementById("numeroBoleta").value = datos.numeroBoleta;
                                                                document.getElementById("proveedor").value = datos.proveedor;
                                                                //document.getElementById("cantidad").value = datos.cantidad;
                                                                document.getElementById("fechaIngreso").value = datos.fechaIngreso;

                                                                //document.getElementById("fechaVencimiento").value = datos.fechaVencimiento;
                                                                
                                                                 if (datos.fechaVencimiento != '0000-00-00' && datos.fechaVencimiento != null && datos.fechaVencimiento != '') {
                                                                    document.getElementById("fechaVencimiento").value = datos.fechaVencimiento;

                                                                } else {
                                                                    document.getElementById("deshabilitaFechaVencimiento").checked = true;
                                                                    deshabilitaCampoVencimiento();
                                                                }

                                                            }
                                                    );
                                                }

                                                function guardar() {
                                                    document.getElementById("accion").value = "ACTUALIZAR";
                                                    if (validar()) {
                                                        $('#fm-Lotes').form('submit', {
                                                            url: "../Servlet/administrarLote_producto.php",
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
                                                                    window.location = "AdministrarLotesProducto.php";
                                                                }
                                                            }
                                                        });
                                                    }

                                                }

                                                function validar() {
                                                    var numeroBoleta = document.getElementById("numeroBoleta").value;
                                                    // var cantidad = document.getElementById("cantidad").value;
                                                    var proveedor = document.getElementById("proveedor").value;
                                                    var fechaVencimiento = document.getElementById("fechaVencimiento").value;
                                                    var fechaIngreso = document.getElementById("fechaIngreso").value;

                                                    if (numeroBoleta == "") {
                                                        $.messager.alert('Error', "Debe ingresar un numero de boleta");
                                                        return false;
                                                    }
//                                                    if(cantidad == ""){
//                                                        $.messager.alert('Error', "Debe ingresar una cantidad");
//                                                        return false;
//                                                    }
                                                    if (proveedor == "") {
                                                        $.messager.alert('Error', "Debe ingresar un proveedor");
                                                        return false;
                                                    }
                                                    var estaDesabilitada = document.getElementById("deshabilitaFechaVencimiento").checked;
                                                    if (estaDesabilitada == false && fechaVencimiento == "") {
                                                        $.messager.alert('Error', "Debe ingresar una fecha de vencimiento o seleccionar el campo 'Sin Fecha Vencimiento'.");
                                                        return false;
                                                    }
                                                    if (fechaIngreso == "") {
                                                        $.messager.alert('Error', "Debe ingresar una fecha de ingreso");
                                                        return false;
                                                    }
                                                    return true;
                                                }
                                                  function deshabilitaCampoVencimiento() {
                                                    if (document.getElementById("deshabilitaFechaVencimiento").checked == true) {
                                                        document.getElementById("fechaVencimiento").disabled = 'disabled';
                                                        document.getElementById("fechaVencimiento").value = '';
                                                    } else {
                                                        document.getElementById("fechaVencimiento").disabled = false;
                                                    }
                                                }
        </script>
    </body>
</html>