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
        }
        if ($perfil == 2) {
            include '../Menus/encargadaMaterialesSuperior.php';
        }
        if ($perfil == 3) {
            include '../Menus/tecnicoSuperior.php';
        }
        if ($perfil == 4) {
            include '../Menus/auxiliarSuperior.php';
        }
        if ($perfil == 5) {
            include '../Menus/educadoraSuperior.php';
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
                        include '../Menus/directoraLeftInventarioBienes.php';
                    }
                    ?>
                    <!-- FIN MENU LEFT-->
                    <div id="content" class="span9" style="width: 1100px; align-content: center">
                         <!-- AQUI VA EL MENU INTERIOR-->
                        <?php
                        if ($perfil == 1) {
                            include '../Menus/directoraMenuInteriorBien.php';
                        }
                        ?>
                        <!-- FIN MENU INTERIOR-->
                        <div class="row-fluid" style="align-content: center">
                            <div class="span12" style="align-content: center">
                                <div class="row-fluid" style="align-content: center; padding-top: 0%">
                                    <div class="form-actions" style="height: 30px; align-content: center;" >
                                        <h4 style="width: 550px; align-content: center; margin: 0; padding-left: 40%"><b>Agregar Bien</b></h4> 
                                    </div>
                                    <form id="fm-Categoria" class="form-horizontal well" style="align-content: center; padding-left: 15%">   
                                        <h5><b>Datos de la Compra del Bien</b></h5><hr>
                                        <div class="control-group">
                                            <label class="control-label" for="numeroBoleta">Número Boleta *</label>
                                            <div class="controls">
                                                <input class="input-xlarge focused" id="numeroBoleta" name="numeroBoleta" type="text" placeholder="Numero Boleta" required>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="nombreBien">Nombre del Bien *</label>
                                            <div class="controls">
                                                <input class="input-xlarge focused" id="nombreBien" name="nombreBien" type="text" placeholder="Nombre Bien" required>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="idCategoria">Nombre del Bien *</label>
                                            <div class="controls">
                                                <select class="input-xlarge focused" id="idCategoria" name="idCategoria" required style="height: 32px; width: 286px">
                                                    <option value="1">Materiales didácticos y de enseñanza</option>
                                                    <option value="5">Bienes/Muebles</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="descripcion">Descripción del Bien *</label>
                                            <div class="controls">
                                                <input class="input-xlarge focused" id="descripcion" name="descripcion" type="text" placeholder="descripcion" required>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="cantidad">Cantidad *</label>
                                            <div class="controls">
                                                <input class="input-xlarge focused" id="cantidad" name="cantidad" type="number" placeholder="Cantidad" required>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="proveedor">Proveedor *</label>
                                            <div class="controls">
                                                <input class="input-xlarge focused" id="proveedor" name="proveedor" type="text" placeholder="Proveedor" required>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="precio">Precio Unitario*</label>
                                            <div class="controls">
                                                <input class="input-xlarge focused" id="precio" name="precio" type="number" placeholder="Precio" required>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="fechaIngreso">Fecha Compra *</label>
                                            <div class="controls">
                                                <input class="input-xlarge focused" id="fechaIngreso" name="fechaIngreso" type="date" placeholder="Fecha Ingreso" required>
                                            </div>
                                        </div>
                                        <hr> <h5><b>Datos de Asignación del Bien en la Institución</b></h5><hr>

                                        <div class="control-group">
                                            <label class="control-label" for="idNivel">Ubicación en Nivel *</label>
                                            <div class="controls">
                                                <select  class="input-xlarge focused" id="idNivel" name="idNivel" required style="height: 32px; width: 286px">
                                                    <option value="-1">Seleccionar...</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="fechaInicio">Fecha Incorporación en nivel *</label>
                                            <div class="controls">
                                                <input type="date" class="input-xlarge" id="fechaInicio" name="fechaInicio">
                                            </div>
                                        </div>
                                        <div class="controls">
                                            (*) campos Obligatorios
                                        </div>
                                        
                                        <input type="hidden" id="accion" name="accion" value="">
                                    </form>
                                    <div   class="form-actions" style="align-content: center; padding-left: 30%">
                                            <button type="button" onclick="guardar()" class="btn btn-primary">Guardar Cambios</button>
                                            <button type="button" onClick="location.href = 'AdministrarBienes.php'" class="btn">Cancelar</button>
                                        </div>
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
                                                    cargarNiveles();
                                                });

                                                function guardar() {
                                                    document.getElementById("accion").value = "AGREGAR";
                                                    if (validar()) {
                                                        $('#fm-Categoria').form('submit', {
                                                            url: "../Servlet/administrarBien.php",
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
                                                                    window.location = "AdministrarBienes.php";
                                                                }
                                                            }
                                                        });
                                                    }

                                                }

                                                function validar() {
                                                    var numeroBoleta = document.getElementById("numeroBoleta").value;
                                                    var nombreBien = document.getElementById("nombreBien").value;
                                                    var cantidad = document.getElementById("cantidad").value;
                                                    var proveedor = document.getElementById("proveedor").value;
                                                    var precio = document.getElementById("precio").value;
                                                    var fechaIngreso = document.getElementById("fechaIngreso").value;
                                                    var idNivel = document.getElementById("idNivel").value;
                                                    var descripcion = document.getElementById("descripcion").value;
                                                    var fechaInicio = document.getElementById("fechaInicio").value;
                                                    if (numeroBoleta == "") {
                                                        $.messager.alert('Error', "Debe ingresar un numero de boleta");
                                                        return false;
                                                    }
                                                    if (descripcion == "") {
                                                        $.messager.alert('Error', "Debe ingresar la descripcion del bien");
                                                        return false;
                                                    }
                                                    if (nombreBien == "") {
                                                        $.messager.alert('Error', "Debe ingresar el nombre del bien");
                                                        return false;
                                                    }
                                                    if (cantidad == "") {
                                                        $.messager.alert('Error', "Debe ingresar una cantidad");
                                                        return false;
                                                    }
                                                    if (proveedor == "") {
                                                        $.messager.alert('Error', "Debe ingresar un proveedor");
                                                        return false;
                                                    }
                                                    if (idNivel == "") {
                                                        $.messager.alert('Error', "Debe ingresar la ubicación que tendra el bien");
                                                        return false;
                                                    }
                                                    if (fechaIngreso == "") {
                                                        $.messager.alert('Error', "Debe ingresar la fecha de ingreso del bien");
                                                        return false;
                                                    }
                                                    if (fechaInicio == "") {
                                                        $.messager.alert('Error', "Debe ingresar la fecha de ingreso en el nivel");
                                                        return false;
                                                    }
                                                    if (fechaInicio < fechaIngreso) {
                                                        $.messager.alert('Error', "La fecha de ingreso al nivel debe ser mayor o igual a la fecha de ingreso");
                                                        return false;
                                                    }
                                                    if (precio == "") {
                                                        $.messager.alert('Error', "Debe ingresar el precio del bien");
                                                        return false;
                                                    }
                                                    return true;
                                                }

                                                function cargarNiveles() {
                                                    var url_json = '../Servlet/administrarNivel.php?accion=LISTADO';
                                                    $.getJSON(
                                                            url_json,
                                                            function (datos) {
                                                                $.each(datos, function (k, v) {
                                                                    var contenido = "<option value='" + v.idNivel + "'>" + v.nombre + "</option>";
                                                                    $("#idNivel").append(contenido);
                                                                });
                                                            }
                                                    );
                                                }
        </script>
    </body>
</html>