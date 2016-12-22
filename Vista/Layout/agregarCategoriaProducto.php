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
                        include '../Menus/directoraLeftInventarioProductos.php';
                    }
                    if ($perfil == 2) {
                        include '../Menus/encargadaMaterialesLeftInventarioProductos.php';
                    }
                    if ($perfil == 4) {
                        include '../Menus/auxiliarLeftInventarioProductos.php';
                    }
                    if ($perfil == 5) {
                        include '../Menus/educadoraLeftInventarioProductos.php';
                    }
                    ?>
                    <!-- FIN MENU LEFT-->
                    <div id="content" class="span9" style="width: 1100px; align-content: center">
                        <div class="row-fluid" style="align-content: center">
                            <div class="span12" style="align-content: center">
                                <div class="row-fluid" style="align-content: center">                                   
                                    <div class="form-actions" style="height: 30px;">
                                        <h4 style="width: 550px; align-content: center; margin: 0; padding-left: 30%">Datos Categoría Producto</h4> 
                                    </div>  
                                    <form id="fm-Categoria" class="form-horizontal well" style="align-content: center">                                                                                             
                                        <div class="control-group">
                                            <label class="control-label" for="nombre">Nombre *</label>
                                            <div class="controls">
                                                <input class="input-xlarge focused" id="nombre" name="nombre" type="text" placeholder="Nombre" required>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="descripcion">Descripción *</label>
                                            <div class="controls">
                                                <input type="text" class="input-xlarge" id="descripcion" name="descripcion" placeholder="Descripción" required>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="idCargo">Permiso de Visualización *</label>
                                            <div class="controls">
                                                <select class="input-xlarge" id="idCargo" name="idCargo[]" multiple size="6" required style="width: 286px"></select>
                                            </div>
                                        </div>
                                        <div class="controls">
                                            (*) campos Obligatorios
                                        </div>
                                        <div class="form-actions" style="align-content: center">
                                            <button type="button" onclick="guardarCategoria()" class="btn btn-primary">Guardar Cambios</button>
                                            <button type="button" onClick="location.href = 'AdministrarCategoriasProducto.php'" class="btn">Cancelar</button>
                                        </div>
                                        <input type="hidden" id="accion" name="accion" value="">
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

                                                    cargarCargos();
                                                });

                                                function cargarCargos() {
                                                    var url_json = '../Servlet/administrarCargo.php?accion=LISTADO';
                                                    $.getJSON(
                                                            url_json,
                                                            function (datos) {
                                                                $.each(datos, function (k, v) {
                                                                    var idCargo = v.idCargo;
                                                                    var cargo = v.nombre;
                                                                    if (idCargo == 3) {
                                                                        cargo = "Técnico";
                                                                    }
                                                                    var contenido = "<option value='" + v.idCargo + "'>" + cargo + "</option>";
                                                                    $("#idCargo").append(contenido);
                                                                });
                                                            }
                                                    );
                                                }

                                                function guardarCategoria() {
                                                    document.getElementById("accion").value = "AGREGAR";
                                                    if (validar()) {
                                                        console.log("validado");
                                                        $('#fm-Categoria').form('submit', {
                                                            url: "../Servlet/administrarCategoria.php",
                                                            onSubmit: function () {
                                                                return $(this).form('validate');
                                                            },
                                                            success: function (result) {
                                                                console.log(result);
                                                                var result = eval('(' + result + ')');
                                                                if (result.errorMsg) {
                                                                    $.messager.alert('Error', result.errorMsg);
                                                                } else {
                                                                    $.messager.show({
                                                                        title: 'Aviso',
                                                                        msg: result.mensaje
                                                                    });
                                                                    window.location = "AdministrarCategoriasProducto.php";
                                                                }
                                                            }
                                                        });
                                                    }

                                                }

                                                function validar() {
                                                    var nombre = document.getElementById("nombre").value;
                                                    var descripcion = document.getElementById("descripcion").value;
                                                    var idCargo = document.getElementById("idCargo").selectedIndex;


                                                    if (nombre == "") {
                                                        $.messager.alert('Error', "Debe ingresar un nombre");
                                                        return false;
                                                    }
                                                    if (descripcion == "") {
                                                        $.messager.alert('Error', "Debe ingresar una descripcion");
                                                        return false;
                                                    }
                                                    if (idCargo == -1) {
                                                        $.messager.alert('Error', "Debe seleccionar al menos un cargo ");
                                                        return false;
                                                    }
                                                    return true;
                                                }
        </script>
    </body>
</html>