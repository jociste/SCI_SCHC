<!DOCTYPE html>
<?php
session_start();
if ($_SESSION['autentificado'] != "SI") {
    header("Location: ../../index.php");
}
$perfil = $_SESSION["idCargo"];
$runFuncionaria = htmlspecialchars($_REQUEST['runFuncionaria']);
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
        } else if ($perfil == 6) {
            include '../Menus/adminSuperior.php';
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
            <div class="container-fluid" style="align-content: center">
                <div class="row-fluid">
                    <!-- AQUI VA EL MENU LEFT-->
                    <?php
                    if ($perfil == 1) {
                        include '../Menus/directoraLeftPersonal.php';
                    } else if ($perfil == 6) {
                        include '../Menus/adminLeftPersonal.php';
                    }
                    ?>
                    <!-- FIN MENU LEFT-->
                    <div id="content" class="span9" style="width: 1100px; align-content: center">
                        <div class="row-fluid" style="align-content: center">
                            <div class="span12" style="align-content: center">
                                <div class="row-fluid" style="align-content: center">
                                    <div class="form-actions" style="height: 30px;">
                                        <h4 style="width: 200px; align-content: center; margin: 0; padding-left: 30%">Editar Funcionaria</h4> 
                                    </div> 
                                    <form id="fm-Funcionaria" class="form-horizontal well" style="align-content: center">
                                        <div class="control-group">
                                            <label class="control-label" for="runFuncionaria">Run *</label>
                                            <div class="controls">
                                                <input class="input-xlarge focused" id="runFuncionaria" name="runFuncionaria" type="text" placeholder="112223334" onkeyup="eliminarCaracteres()" readonly>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="nombres">Nombres *</label>
                                            <div class="controls">
                                                <input type="text" class="input-xlarge" id="nombres" name="nombres" >
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="apellidos">Apellidos *</label>
                                            <div class="controls">
                                                <input type="text" class="input-xlarge" id="apellidos" name="apellidos" >
                                            </div>
                                        </div>    

                                        <div class="control-group">
                                            <label class="control-label" for="sexo">Sexo *</label>
                                            <div class="controls">
                                                <label class="checkbox">
                                                    <input type="radio" id="sexoM" name="sexo" value="Masculino">&nbsp;Masculino &nbsp;&nbsp;
                                                    <input type="radio" id="sexoF" name="sexo" value="Femenino">&nbsp;Femenino
                                                </label>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="fechaNacimiento">Fecha Nacimiento *</label>
                                            <div class="controls">
                                                <input type="date" class="input-xlarge" id="fechaNacimiento" name="fechaNacimiento"  >
                                            </div>
                                        </div> 
                                        <div class="control-group">
                                            <label class="control-label" for="telefono">Telefono *</label>
                                            <div class="controls">
                                                <input type="text" class="input-xlarge" id="telefono" name="telefono">
                                            </div>
                                        </div> 
                                        <div class="control-group">
                                            <label class="control-label" for="direccion">Dirección *</label>
                                            <div class="controls">
                                                <input type="text" class="input-xlarge" id="direccion" name="direccion">
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="profesion">Profesión *</label>
                                            <div class="controls">
                                                <input type="text" class="input-xlarge" id="profesion" name="profesion">
                                            </div>
                                        </div>    
                                        <div class="control-group">
                                            <label class="control-label" for="idCargo">Cargo *</label>
                                            <div class="controls">
                                                <select  class="input-xlarge focused" id="idCargo" name="idCargo" required style="height: 32px; width: 286px" onchange="cambiarCargo()">
                                                    <option value="-1">Seleccionar...</option>
                                                </select>
                                            </div>
                                        </div> 
                                        <div class="control-group">
                                            <label class="control-label" for="fechaInicio">Fecha Inicio Cargo *</label>
                                            <div class="controls">
                                                <input type="date" class="input-xlarge" id="fechaInicio" name="fechaInicio">
                                            </div>
                                        </div> 
                                        <div class="control-group">
                                            <label class="control-label" for="fechaTermino">Fecha Término Cargo </label>
                                            <div class="controls">
                                                <input type="date" class="input-xlarge" id="fechaTermino" name="fechaTermino">
                                                <input type="checkbox" id="deshabilitaFecha" name="deshabilitaFecha" onclick="deshabilitaCampo()">&nbsp;Indefinido &nbsp;&nbsp;
                                            </div>
                                        </div> 

                                        <div class="control-group">
                                            <label class="control-label" for="idNivel">Nivel *</label>
                                            <div class="controls">
                                                <select  class="input-xlarge focused" id="idNivel" name="idNivel" required style="height: 32px; width: 286px" onchange="cambiarNivel()">
                                                    <option value="-1">Seleccionar...</option>
                                                </select>
                                            </div>
                                        </div> 

                                        <div class="control-group">
                                            <label class="control-label" for="fechaInicioNivel">Fecha Inicio en Nivel *</label>
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
                                            <label class="control-label" for="clave">Clave *</label>
                                            <div class="controls">
                                                <input type="password" class="input-xlarge" id="clave" name="clave"  >
                                            </div>
                                        </div>  
                                        <div class="control-group">
                                            <label class="control-label" for="claveRepetida">Repetir Clave *</label>
                                            <div class="controls">
                                                <input type="password" class="input-xlarge" id="claveRepetida" name="claveRepetida"  >
                                            </div>
                                        </div>  
                                        <div class="controls">
                                            (*) campos Obligatorios
                                        </div>
                                        <div class="form-actions" style="align-content: center">
                                            <button type="button" onclick="guardarFuncionaria()" class="btn btn-primary">Guardar Cambios</button>
                                            <button type="button" onClick="location.href = 'AdministrarFuncionariasHabilitadas.php'" class="btn">Cancelar</button>
                                        </div>
                                        <input type="hidden" id="accion" name="accion" value="">
                                        <input type="hidden" id="runEditar" name="runEditar" value="<?php echo $runFuncionaria; ?>">
                                        <input type="hidden" id="idNivelFuncionariaEditar" name="idNivelFuncionariaEditar" value="">
                                        <input type="hidden" id="idCargoFuncionariaEditar" name="idCargoFuncionariaEditar" value="">
                                        <input type="hidden" id="idNivelEditar" name="idNivelEditar" value="">
                                        <input type="hidden" id="idCargoEditar" name="idCargoEditar" value="">
                                        <input type="hidden" id="fechaInicioCargoEditar" name="fechaInicioCargoEditar" value="">
                                        <input type="hidden" id="fechaInicioNivelEditar" name="fechaInicioNivelEditar" value="">
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
                     <span class="pull-left">© <a href="" target="_blank">Sala Cuna y Jardín Infantil Hogar de Cristo</a> 2016</span>
                </p>
            </footer>
        </div>
    </div>
    <script src="../../Files/js/modernizr.custom.js"></script>
    <script src="../../Files/js/toucheffects.js"></script>
    <!-- Libreria para Validar Rut-->
    <script src="../../Files/js/validarut.js"></script>
    <script src="../../Files/js/ValidaCamposFormulario.js"></script>
    <script>
                                                //APODERADOS
                                                $(function () {

                                                    cargarCargos();
                                                    cargarNiveles();
                                                    obtenerDatosFuncionaria();

                                                })

                                                function obtenerDatosFuncionaria() {
                                                    var runEditar = document.getElementById("runEditar").value;
                                                    var url_json = '../Servlet/administrarFuncionaria.php?accion=BUSCAR_BY_ID&runFuncionaria=' + runEditar;
                                                    $.getJSON(
                                                            url_json,
                                                            function (dato) {
                                                                console.log(jQuery.calculaDigitoVerificador(dato.runFuncionaria));
                                                                document.getElementById("runFuncionaria").value = dato.runFuncionaria + "" + jQuery.calculaDigitoVerificador(dato.runFuncionaria);
                                                                document.getElementById("nombres").value = dato.nombres;
                                                                document.getElementById("apellidos").value = dato.apellidos;
                                                                document.getElementById("fechaNacimiento").value = dato.fechaNacimiento;
                                                                document.getElementById("telefono").value = dato.telefono;
                                                                document.getElementById("direccion").value = dato.direccion;
                                                                document.getElementById("profesion").value = dato.profesion;
                                                                document.getElementById("clave").value = dato.clave;
                                                                document.getElementById("claveRepetida").value = dato.clave;
                                                                if (dato.sexo.localeCompare("Femenino") == 0) {
                                                                    document.getElementById("sexoF").checked = true;
                                                                } else {
                                                                    document.getElementById("sexoM").checked = true;
                                                                }
                                                                document.getElementById("idCargo").value = dato.idCargo;
                                                                document.getElementById("idCargoEditar").value = dato.idCargo;
                                                                document.getElementById("idCargoFuncionariaEditar").value = dato.idCargoFuncionaria;
                                                                document.getElementById("fechaInicio").value = dato.fechaInicio;
                                                                document.getElementById("fechaInicioCargoEditar").value = dato.fechaInicio;
                                                                if (dato.fechaTermino != '0000-00-00' && dato.fechaTermino != null && dato.fechaTermino != '') {
                                                                    document.getElementById("fechaTermino").value = dato.fechaTermino;

                                                                } else {
                                                                    document.getElementById("deshabilitaFecha").checked = true;
                                                                    deshabilitaCampo();
                                                                }
                                                                document.getElementById("idNivel").value = dato.idNivel;
                                                                document.getElementById("idNivelEditar").value = dato.idNivel;
                                                                document.getElementById("idNivelFuncionariaEditar").value = dato.idNivelFuncionaria;
                                                                document.getElementById("fechaInicioNivel").value = dato.fechaInicioNivel;
                                                                document.getElementById("fechaInicioNivelEditar").value = dato.fechaInicioNivel;
                                                                if (dato.fechaTerminoNivel != '0000-00-00' && dato.fechaTerminoNivel != null && dato.fechaTerminoNivel != '') {
                                                                    document.getElementById("fechaTerminoNivel").value = dato.fechaTerminoNivel;
                                                                } else {
                                                                    document.getElementById("deshabilitaFecha2").checked = true;
                                                                    deshabilitaCampo2();
                                                                }
                                                            }
                                                    );
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

                                                /*
                                                 * Calcula digito verificador
                                                 */
                                                $.calculaDigitoVerificador = function (rut) {
                                                    // type check
                                                    if (!rut || !rut.length || typeof rut !== 'string') {
                                                        return -1;
                                                    }
                                                    // serie numerica
                                                    var secuencia = [2, 3, 4, 5, 6, 7, 2, 3];
                                                    var sum = 0;
                                                    //
                                                    for (var i = rut.length - 1; i >= 0; i--) {
                                                        var d = rut.charAt(i)
                                                        sum += new Number(d) * secuencia[rut.length - (i + 1)];
                                                    }
                                                    ;
                                                    // sum mod 11
                                                    var rest = 11 - (sum % 11);
                                                    // si es 11, retorna 0, sino si es 10 retorna K,
                                                    // en caso contrario retorna el numero
                                                    return rest === 11 ? 0 : rest === 10 ? "K" : rest;
                                                };

                                                function guardarFuncionaria() {
                                                    document.getElementById("accion").value = "ACTUALIZAR";                                                   
                                                    if (validarFuncionaria() && validarCargoNivelFuncionaria()) {
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
                                                                    window.location = "AdministrarFuncionariasHabilitadas.php";
                                                                }
                                                            }
                                                        });
                                                    }
                                                }
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
                                                
                                                function cambiarCargo() {
                                                    $("#fechaInicio").val("");
                                                    $("#fechaInicioNivel").val("");
                                                }
                                                
                                                function cambiarNivel() {
                                                    $("#fechaInicioNivel").val("");
                                                }

    </script>
</body>
</html>