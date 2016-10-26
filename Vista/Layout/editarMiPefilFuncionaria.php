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

                        <!-- AQUI VA EL MENU INTERIOR-->

                        <!-- FIN MENU INTERIOR-->
                                                <hr>
                        <div class="row-fluid">
                            <div class="span12">
                                <div class="social-box social-bordered social-blue">
                                    <div class="header">
                                        <h4>Mi perfil</h4>
                                    </div>
                                    <div class="body" style="text-align: center;">
                                        <div class="row-fluid">
                                            <!-- CONTENIDO AQUI -->

                                            <!-- INICIO FORMULARIO -->
                                            <form id="fm-funcionaria" class="form-horizontal well">
                                                <fieldset>
                                                    <legend>Mis Datos</legend>

                                                    <div class="control-group">
                                                        <label class="control-label" for="telefono">Telefono</label>
                                                        <div class="controls">
                                                            <input type="text" class="input-xlarge" id="telefono" name="telefono">
                                                        </div>
                                                    </div> 
                                                    <div class="control-group">
                                                        <label class="control-label" for="direccion">Direccion</label>
                                                        <div class="controls">
                                                            <input type="text" name="direccion" class="input-xlarge" id="direccion">
                                                        </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label" for="clave">Clave</label>
                                                        <div class="controls">
                                                            <input type="password" name="clave" class="input-xlarge" id="clave">
                                                        </div>
                                                    </div>  
                                                    <div class="control-group">
                                                        <label class="control-label" for="claveRepetida">Repetir Clave</label>
                                                        <div class="controls">
                                                            <input type="password" name="claveRepetida" class="input-xlarge" id="claveRepetida">
                                                        </div>
                                                    </div>  
                                                    <div class="form-actions">
                                                        <button type="button" onclick="guardarCambios()" class="btn btn-primary">Guardar Cambios</button>
                                                        <button type="button" onClick="location.href = 'administrarApoderadoDirectora.php'" class="btn">Cancelar</button>
                                                    </div>
                                                </fieldset>

                                                <input type="hidden" id="accion" name="accion" value="">
                                                <input type="hidden" id="runFuncionariaEditar" name="runFuncionariaEditar" value="<?php echo $runFuncionaria; ?>">
                                            </form>



                                            <!-- FIN FORMULARIO-->
                                        </div>
                                    </div>
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
            //APODERADOS
            $(function () {
                obtenerDatosFuncionaria();
            });

            function obtenerDatosFuncionaria() {
                var runEditar = document.getElementById("runFuncionariaEditar").value;
                var url_json = '../Servlet/administrarFuncionaria.php?accion=BUSCAR_BY_ID&runFuncionaria=' + runEditar;                
                $.getJSON(
                        url_json,
                        function (dato) {  
                            //console.log(dato);
                            document.getElementById("telefono").value = dato.telefono;
                            document.getElementById("direccion").value = dato.direccion;                            
                            document.getElementById("clave").value = dato.clave;
                            document.getElementById("claveRepetida").value = dato.clave;
                        }
                );
            }

            function guardarCambios() {
                document.getElementById("accion").value = "ACTUALIZAR_MI_PERFIL_FUNCIONARIA";
               // if (validar()) {
                    $('#fm-funcionaria').form('submit', {
                        url: "../Servlet/administrarFuncionaria.php",
                        onSubmit: function () {
                            return $(this).form('validate');
                        },
                        success: function (result) {
                            //console.log(result);
                            var result = eval('(' + result + ')');
                            if (result.errorMsg) {
                                $.messager.alert('Error', result.errorMsg);
                            } else {
                                window.location = "MiPerfil.php";
                            }
                        }
                    });
               // }
            }

            function validar() {                
                if (document.getElementById('Direccion').value != "") {
                    var telefono = document.getElementById('Telefono').value;
                    if (telefono != "" && telefono.length > 5) {
                        if (!isNaN(telefono)) {
                            var cadenaPass = document.getElementById('Clave').value;
                            if (cadenaPass.length >= 4) {
                                if (cadenaPass == document.getElementById('ClaveRepetida').value) {
                                    return true;
                                } else {
                                    $.messager.alert("Alerta", "Las contraseñas no coinciden");
                                }
                            } else {
                                $.messager.alert("Alerta", "La contraseña debe tener minimo 4 caracteres");
                            }
                        } else {
                            $.messager.alert("Alerta", "El telefono contiene caracteres no validos");
                        }
                    } else {
                        $.messager.alert("Alerta", "Debe ingresar una telefono de contacto con al menos 6 digitos");
                    }
                } else {
                    $.messager.alert("Alerta", "Debe ingresar una direccion");
                }
                return false;
            }

        </script>
    </body>
</html>