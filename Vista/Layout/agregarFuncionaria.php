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
        /* else if ($perfil == 2) {
          include '../Menus/educadoraSuperior.php';
          } else if ($perfil == 3) {
          include '../Menus/apoderadoSuperior.php';
          } */
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
            <div class="container-fluid" style="align-content: center">
                <div class="row-fluid">
                    <!-- AQUI VA EL MENU LEFT-->
                    <?php
                    if ($perfil == 1) {
                        include '../Menus/directoraLeftPersonal.php';
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
                                    <form id="fm-Funcionaria" class="form-horizontal well" style="align-content: center">
                                        <div class="form-actions" style="height: 30px;">
                                            <h4 style="width: 200px; align-content: center; margin: 0; padding-left: 30%">Datos Funcionaria</h4> 
                                        </div>                                                                                               
                                        <div class="control-group">
                                            <label class="control-label" for="runFuncionaria">Run</label>
                                            <div class="controls">
                                                <input class="input-xlarge focused" id="runFuncionaria" name="runFuncionaria" type="text" placeholder="112223334" onkeyup="eliminarCaracteres()">
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="nombres">Nombres</label>
                                            <div class="controls">
                                                <input type="text" class="input-xlarge" id="nombres" name="nombres" >
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="apellidos">Apellidos</label>
                                            <div class="controls">
                                                <input type="text" class="input-xlarge" id="apellidos" name="apellidos" >
                                            </div>
                                        </div>    
                                        <div class="control-group">
                                            <label class="control-label" for="sexo">Sexo</label>
                                            <div class="controls">
                                                <label class="checkbox">
                                                    <input type="radio" id="sexoM" name="sexo" value="Masculino">&nbsp;Masculino &nbsp;&nbsp;
                                                    <input type="radio" id="sexoF" name="sexo" value="Femenino">&nbsp;Femenino
                                                </label>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="fechaNacimiento">Fecha Nacimiento</label>
                                            <div class="controls">
                                                <input type="date" class="input-xlarge" id="fechaNacimiento" name="fechaNacimiento"  >
                                            </div>
                                        </div> 
                                        <div class="control-group">
                                            <label class="control-label" for="telefono">Telefono</label>
                                            <div class="controls">
                                                <input type="text" class="input-xlarge" id="telefono" name="telefono">
                                            </div>
                                        </div> 
                                        <div class="control-group">
                                            <label class="control-label" for="direccion">Direccion</label>
                                            <div class="controls">
                                                <input type="text" class="input-xlarge" id="direccion" name="direccion">
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="profesion">Profesión</label>
                                            <div class="controls">
                                                <input type="text" class="input-xlarge" id="profesion" name="profesion">
                                            </div>
                                        </div>     
                                        <div class="control-group">
                                            <label class="control-label" for="idCargo">Cargo</label>
                                            <div class="controls">
                                                <select class="input-xlarge" id="idCargo" name="idCargo" style="height: 32px; width: 286px">
                                                    <option value="1">Directora</option>
                                                    <option value="2">Encargada Materiales</option>
                                                    <option value="3">Educadora/Técnico</option>
                                                    <option value="4">Auxiliar</option>                                                                
                                                </select>
                                            </div>
                                        </div> 
                                        <div class="control-group">
                                            <label class="control-label" for="fechaInicio">Fecha Inicio Cargo</label>
                                            <div class="controls">
                                                <input type="date" class="input-xlarge" id="fechaInicio" name="fechaInicio">
                                            </div>
                                        </div> 
                                        <div class="control-group">
                                            <label class="control-label" for="fechaTermino">Fecha Término Cargo</label>
                                            <div class="controls">
                                                <input type="date" class="input-xlarge" id="fechaTermino" name="fechaTermino">
                                                <input type="checkbox" id="deshabilitaFecha" name="deshabilitaFecha" onclick="deshabilitaCampo()">&nbsp;Indefinido &nbsp;&nbsp;
                                            </div>
                                        </div> 
                                        <div class="control-group">
                                            <label class="control-label" for="idNivel">Nivel</label>
                                            <div class="controls">
                                                <select class="input-xlarge" id="idNivel" name="idNivel" style="height: 32px; width: 286px" >
                                                    <option value="2">Menor</option>
                                                    <option value="3">Medio Menor</option>
                                                    <option value="1">Heterogéneo</option>
                                                    <option value="4">Medio Mayor</option>
                                                    <option value="5">Mayor</option>                                                                 
                                                </select>
                                            </div>
                                        </div> 
                                        <div class="control-group">
                                            <label class="control-label" for="fechaInicioNivel">Fecha Inicio en Nivel</label>
                                            <div class="controls">
                                                <input type="date" class="input-xlarge" id="fechaInicioNivel" name="fechaInicioNivel">
                                            </div>
                                        </div> 
                                        <div class="control-group">
                                            <label class="control-label" for="fechaTerminoNivel">Fecha Término en Nivel</label>
                                            <div class="controls">
                                                <input type="date" class="input-xlarge" id="fechaTerminoNivel" name="fechaTerminoNivel">
                                                <input type="checkbox" id="deshabilitaFecha2" name="deshabilitaFecha2" onclick="deshabilitaCampo2()">&nbsp;Indefinido &nbsp;&nbsp;
                                            </div>
                                        </div> 
                                        <div class="control-group">
                                            <label class="control-label" for="clave">Clave</label>
                                            <div class="controls">
                                                <input type="password" class="input-xlarge" id="clave" name="clave"  >
                                            </div>
                                        </div>  
                                        <div class="control-group">
                                            <label class="control-label" for="claveRepetida">Repetir Clave</label>
                                            <div class="controls">
                                                <input type="password" class="input-xlarge" id="claveRepetida" name="claveRepetida"  >
                                            </div>
                                        </div>  
                                        <div class="form-actions" style="align-content: center">
                                            <button type="button" onclick="guardarFuncionaria()" class="btn btn-primary">Guardar Cambios</button>
                                            <button type="button" onClick="location.href = 'AdministrarFuncionariashabilitadas.php'" class="btn">Cancelar</button>
                                        </div>
                                        <input type="hidden" id="accion" name="accion" value="">
                                    </form>
                                    <!-- FIN FORMULARIO-->
                                </div>
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
                    <span class="pull-left">© <a href="" target="_blank">Sala Cuna Hogar De Cristo</a> 2016</span>
                    <span class="hidden-phone pull-right">Powered by: <a href="#">uAdmin Dashboard</a></span>
                </p>
            </footer>
        </div>
        <script src="../../Files/js/modernizr.custom.js"></script>
        <script src="../../Files/js/toucheffects.js"></script>
        <!-- Libreria para Validar Rut-->
        <script src="../../Files/js/validarut.js"></script>
        <script src="../../Files/js/ValidaCamposFormulario.js"></script>
        <script type="text/javascript">

                                                $(function () {
                                                });
                                                function guardarFuncionaria() {
                                                    document.getElementById("accion").value = "AGREGAR";
                                                    if (validarFuncionaria() && validarCargoNivelFuncionaria()) {
                                                        //console.log("validado");
                                                        $('#fm-Funcionaria').form('submit', {
                                                            url: "../Servlet/administrarFuncionaria.php",
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
                                                                    window.location = "AdministrarFuncionariashabilitadas.php";
                                                                }
                                                            }
                                                        });
                                                    }
                                                }                                              

        </script>
    </body>
</html>