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
            <div class="container-fluid">
                <div class="row-fluid">

                    <!-- AQUI VA EL MENU LEFT-->
                    <?php
                    if ($perfil == 1) {
                        include '../Menus/directoraLeftInventarioBienes.php';
                    }
//                    else if ($perfil == 2) {
//                        include '../Menus/educadoraLeft.php';
//                    } else if ($perfil == 3) {
//                        include '../Menus/apoderadoLeft.php';
//                    }
                    ?>
                    <!-- FIN MENU LEFT-->
                    <div id="content" class="span9" style="background-color: #fff; width: 90%" >
                        <!-- AQUI VA EL MENU INTERIOR-->
                        <?php
                        if ($perfil == 1) {
                            include '../Menus/directoraMenuInteriorBien.php';
                        }
                        ?>
                        <!-- FIN MENU INTERIOR-->
                        <hr>
                        <div class="row-fluid" style="align-content: center">
                            <div class="span12" style="align-content: center">
                                <div class="row-fluid" style="align-content: center">
                                    <div class="span12">
                                            <h4 style="width: 550px; align-content: center; margin: 0; padding-left: 34%">Datos Reporte</h4> 
                                            <button type="button" style="float: right" onclick="guardar()" class="btn btn-primary">Guardar Cambios</button><br>
                                      <hr>
                                        <form id="fm-datos-generales" class="form-horizontal well" method="POST" style="height: 430px; align-content: center">

                                            <div class="span12">
                                                <div class="row-fluid" style="align-content: center">
                                                    <div class="span6">
                                                        <div class="control-group">
                                                            <label class="control-label" for="codigoEstablecimiento">Código Establecimiento</label>
                                                            <div class="controls">
                                                                <input class="input-xlarge focused" id="codigoEstablecimiento" name="codigoEstablecimiento" type="text" placeholder="Código Establecimiento" onchange="obtenerDatosGenerales(this.value)" required>
                                                            </div>
                                                        </div>
                                                        <div class="control-group">
                                                            <label class="control-label" for="nombreEstablecimiento">Nombre Establecimiento</label>
                                                            <div class="controls">
                                                                <input class="input-xlarge focused" id="nombreEstablecimiento" name="nombreEstablecimiento" type="text" placeholder="Nombre Establecimiento" required>
                                                            </div>
                                                        </div>
                                                        <div class="control-group">
                                                            <label class="control-label" for="direccionCalleEstablecimiento">Calle</label>
                                                            <div class="controls">
                                                                <input class="input-xlarge focused" id="direccionCalleEstablecimiento" name="direccionCalleEstablecimiento" type="text" placeholder="Calle" required>
                                                            </div>
                                                        </div>
                                                        <div class="control-group">
                                                            <label class="control-label" for="direccionNumeroEstablecimiento">Numero</label>
                                                            <div class="controls">
                                                                <input type="number" class="input-xlarge focused" id="direccionNumeroEstablecimiento" name="direccionNumeroEstablecimiento" placeholder="Numero" required>
                                                            </div>
                                                        </div>
                                                        <div class="control-group">
                                                            <label class="control-label" for="ciudadEstablecimiento">Ciudad Establecimiento</label>
                                                            <div class="controls">
                                                                <input class="input-xlarge focused" id="ciudadEstablecimiento" name="ciudadEstablecimiento" type="text" placeholder="Ciudad Establecimiento" required>
                                                            </div>
                                                        </div>
                                                        <div class="control-group">
                                                            <label class="control-label" for="regionEstablecimiento">Región</label>
                                                            <div class="controls">
                                                                <input class="input-xlarge focused" id="regionEstablecimiento" name="regionEstablecimiento" type="text" placeholder="Región Establecimiento" required>
                                                            </div>
                                                        </div>
                                                        <div class="control-group">
                                                            <label class="control-label" for="telefonoEstablecimiento">Teléfono</label>
                                                            <div class="controls">
                                                                <input class="input-xlarge focused" id="telefonoEstablecimiento" name="telefonoEstablecimiento" type="tel" placeholder="Teléfono" required>
                                                            </div>
                                                        </div>
                                                        <div class="control-group">
                                                            <label class="control-label" for="emailEstablecimiento">E-Mail</label>
                                                            <div class="controls">
                                                                <input class="input-xlarge focused" id="emailEstablecimiento" name="emailEstablecimiento" type="email" placeholder="E-Mail" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="span6">
                                                        <div class="control-group">
                                                            <label class="control-label" for="nombreEntidadAdministradora">Nombre de la Entidad</label>
                                                            <div class="controls">
                                                                <input class="input-xlarge focused" id="nombreEntidadAdministradora" name="nombreEntidadAdministradora" type="text" placeholder="Nombre de la Entidad Administradora" required>
                                                            </div>
                                                        </div>
                                                        <div class="control-group">
                                                            <label class="control-label" for="rutEntidadAdministradora">Rut</label>
                                                            <div class="controls">
                                                                <input class="input-xlarge focused" id="rutEntidadAdministradora" name="rutEntidadAdministradora" type="text" placeholder="Rut Entidad Administradora" required>
                                                            </div>
                                                        </div>
                                                        <div class="control-group">
                                                            <label class="control-label" for="provinciaEntidadAdministradora">Provincia</label>
                                                            <div class="controls">
                                                                <input class="input-xlarge focused" id="provinciaEntidadAdministradora" name="provinciaEntidadAdministradora" type="text" placeholder="Provincia" required>
                                                            </div>
                                                        </div>
                                                        <div class="control-group">
                                                            <label class="control-label" for="regionEntidadAdministradora">Región</label>
                                                            <div class="controls">
                                                                <input class="input-xlarge focused" id="regionEntidadAdministradora" name="regionEntidadAdministradora" type="text" placeholder="Región" required>
                                                            </div>
                                                        </div>
                                                        <div class="control-group">
                                                            <label class="control-label" for="representanteLegal">Nombre Representante</label>
                                                            <div class="controls">
                                                                <input class="input-xlarge focused" id="representanteLegal" name="representanteLegal" type="text" placeholder="Nombre Representante Legal" required>
                                                            </div>
                                                        </div>
                                                        <div class="control-group">
                                                            <label class="control-label" for="rutRepresentanteLegal">Rut Representante</label>
                                                            <div class="controls">
                                                                <input class="input-xlarge focused" id="rutRepresentanteLegal" name="rutRepresentanteLegal" type="text" placeholder="Rut Representante Legal" required>
                                                            </div>
                                                        </div>
                                                        <div class="control-group">
                                                            <label class="control-label" for="telefonoRepresentanteLegal">Teléfono</label>
                                                            <div class="controls">
                                                                <input class="input-xlarge focused" id="telefonoRepresentanteLegal" name="telefonoRepresentanteLegal" type="tel" placeholder="Telefono Representante Legal" required>
                                                            </div>
                                                        </div>
                                                        <div class="control-group">
                                                            <label class="control-label" for="emailRepresentanteLegal">E-Mail</label>
                                                            <div class="controls">
                                                                <input class="input-xlarge focused" id="emailRepresentanteLegal" name="emailRepresentanteLegal" type="email" placeholder="E-Mail Representante Legal" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <input class="input-xlarge focused" id="idEntidadAdministradora" name="idEntidadAdministradora" type="hidden">
                                            <input type="hidden" id="accion" name="accion" value="">

                                        </form>
                                            <div class="form-actions" style="width: 96%; margin-left: 0px;">  
                                                <a onclick="reporte()" class="btn btn-info" style="margin-left: 30%"><i class="icon-group"></i>&nbsp;Inventario de Bienes Inmuebles</a>                                                        
                                                <a onclick="reporteDadosDeBaja()" class="btn btn-info"><i class="icon-group"></i>&nbsp;Bienes Inmuebles Dado de Bajas</a>                                                        

                                            </div>   
                                   

                                        <!-- FIN FORMULARIO-->
                                    </div>
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

        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel">Generar Reporte</h4>
                    </div>
                    <div class="modal-body">
                        <form id="fm-periodo" class="form-horizontal well" >
                            <div class="" style="height: 10%;">
                                <h4 style="width: 80%; align-content: center; margin: 0; padding-left: 0%">Datos Reporte</h4> 
                            </div>
                            <hr>
                            <div class="control-group">
                                <label class="control-label" for="sinFechas">Sin rango de fechas</label>
                                <div class="controls">
                                    <input type="checkbox" class="input-xlarge focused" id="sinFechas" name="sinFechas" onclick="sinPeriodo()">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="fechaInicio">Fecha Inicio</label>
                                <div class="controls">
                                    <input type="date" class="input-xlarge focused" id="fechaInicio" name="fechaInicio">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="fechaTermino">Fecha Termino</label>
                                <div class="controls">
                                    <input type="date" class="input-xlarge focused" id="fechaTermino" name="fechaTermino">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="idNivel">Nivel</label>
                                <div class="controls">
                                    <select class="input-xlarge focused" id="idNivel" name="idNivel" required></select>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="button" onclick="generarReporteInventarioBienesInmuebles()" class="btn btn-primary">Generar</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Fin Modal -->


        <!-- Modal Dados De Baja-->
        <div class="modal fade" id="modalDadosDeBaja" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel">Generar Reporte</h4>
                    </div>
                    <div class="modal-body">
                        <form id="fm-periodo-dados-de-baja" class="form-horizontal well" >
                            <div class="" style="height: 10%;">
                                <h4 style="width: 80%; align-content: center; margin: 0; padding-left: 0%">Datos Reporte</h4> 
                            </div>
                            <hr>
                            <div class="control-group">
                                <label class="control-label" for="sinFechasDadosDeBaja">Sin rango de fechas</label>
                                <div class="controls">
                                    <input type="checkbox" class="input-xlarge focused" id="sinFechasDadosDeBaja" name="sinFechasDadosDeBaja" onclick="sinPeriodoDadosDeBaja()">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="fechaInicioDadosDeBaja">Fecha Inicio</label>
                                <div class="controls">
                                    <input type="date" class="input-xlarge focused" id="fechaInicioDadosDeBaja" name="fechaInicioDadosDeBaja">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="fechaTerminoDadosDeBaja">Fecha Término</label>
                                <div class="controls">
                                    <input type="date" class="input-xlarge focused" id="fechaTerminoDadosDeBaja" name="fechaTerminoDadosDeBaja">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="idNivelDadosBaja">Nivel</label>
                                <div class="controls">
                                    <select class="input-xlarge focused" id="idNivelDadosBaja" name="idNivelDadosBaja" required></select>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="button" onclick="generarReporteInventarioBienesDadosDeBaja()" class="btn btn-primary">Generar</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Fin Modal -->

        <script src="../../Files/js/modernizr.custom.js"></script>
        <script src="../../Files/js/toucheffects.js"></script>
        <!--        <script src="../../Files/Nuevas/jquery.dataTables.min.css"></script>
        <script src="../../Files/Nuevas/jquery.dataTables.min.js"></script>-->

        <script>
                            $(function () {
                                cargarDatosGenerales();
                                cargarNiveles();
                                document.getElementById("myModal").style.display = 'none';
                                document.getElementById("modalDadosDeBaja").style.display = 'none';
                            });

                            function cargarNiveles() {
                                var url_json = '../Servlet/administrarNivel.php?accion=LISTADO';
                                $.getJSON(
                                        url_json,
                                        function (datos) {
                                            $.each(datos, function (k, v) {
                                                var contenido = "<option value='" + v.idNivel + "'>" + v.nombre + "</option>";
                                                $("#idNivel").append(contenido);
                                                $("#idNivelDadosBaja").append(contenido);
                                            });
                                        }
                                );
                            }

                            function cargarDatosGenerales() {
                                var url_json = '../Servlet/administrarEstablecimiento.php?accion=LISTADO';
                                $.getJSON(
                                        url_json,
                                        function (datos) {
                                            if (datos.length > 0) {
                                                document.getElementById("codigoEstablecimiento").value = datos[0].codigoEstablecimiento;
                                                document.getElementById("nombreEstablecimiento").value = datos[0].nombreEstablecimiento;
                                                document.getElementById("direccionCalleEstablecimiento").value = datos[0].direccionCalleEstablecimiento;
                                                document.getElementById("direccionNumeroEstablecimiento").value = datos[0].direccionNumeroEstablecimiento;
                                                document.getElementById("ciudadEstablecimiento").value = datos[0].ciudadEstablecimiento;
                                                document.getElementById("regionEstablecimiento").value = datos[0].regionEstablecimiento;
                                                document.getElementById("telefonoEstablecimiento").value = datos[0].telefonoEstablecimiento;
                                                document.getElementById("emailEstablecimiento").value = datos[0].emailEstablecimiento;

                                                document.getElementById("idEntidadAdministradora").value = datos[0].entidadAdministradora.idEntidadAdministradora;
                                                document.getElementById("nombreEntidadAdministradora").value = datos[0].entidadAdministradora.nombreEntidadAdministradora;
                                                document.getElementById("rutEntidadAdministradora").value = datos[0].entidadAdministradora.rutEntidadAdministradora;
                                                document.getElementById("provinciaEntidadAdministradora").value = datos[0].entidadAdministradora.provinciaEntidadAdministradora;
                                                document.getElementById("regionEntidadAdministradora").value = datos[0].entidadAdministradora.regionEntidadAdministradora;
                                                document.getElementById("representanteLegal").value = datos[0].entidadAdministradora.representanteLegal;
                                                document.getElementById("rutRepresentanteLegal").value = datos[0].entidadAdministradora.rutRepresentanteLegal;
                                                document.getElementById("telefonoRepresentanteLegal").value = datos[0].entidadAdministradora.telefonoRepresentanteLegal;
                                                document.getElementById("emailRepresentanteLegal").value = datos[0].entidadAdministradora.emailRepresentanteLegal;
                                            }
                                        }
                                );
                            }

                            function obtenerDatosGenerales(codigoEstablecimiento) {
                                var url_json = '../Servlet/administrarDatos_generales.php?accion=BUSCAR_BY_ID&codigoEstablecimiento=' + codigoEstablecimiento;
                                $.getJSON(
                                        url_json,
                                        function (datos) {
                                            document.getElementById("codigoEstablecimiento").value = datos.codigoEstablecimiento;
                                            document.getElementById("nombreEstablecimiento").value = datos.nombreEstablecimiento;
                                            document.getElementById("direccionCalleEstablecimiento").value = datos.direccionCalleEstablecimiento;
                                            document.getElementById("direccionNumeroEstablecimiento").value = datos.direccionNumeroEstablecimiento;
                                            document.getElementById("ciudadEstablecimiento").value = datos.ciudadEstablecimiento;
                                            document.getElementById("regionEstablecimiento").value = datos.regionEstablecimiento;
                                            document.getElementById("telefonoEstablecimiento").value = datos.telefonoEstablecimiento;
                                            document.getElementById("emailEstablecimiento").value = datos.emailEstablecimiento;

                                            document.getElementById("nombreEntidadAdministradora").value = datos.nombreEntidadAdministradora;
                                            document.getElementById("rutEntidadAdministradora").value = datos.rutEntidadAdministradora;
                                            document.getElementById("provinciaEntidadAdministradora").value = datos.provinciaEntidadAdministradora;
                                            document.getElementById("regionEntidadAdministradora").value = datos.regionEntidadAdministradora;
                                            document.getElementById("representanteLegal").value = datos.representanteLegal;
                                            document.getElementById("rutRepresentanteLegal").value = datos.rutRepresentanteLegal;
                                            document.getElementById("telefonoRepresentanteLegal").value = datos.telefonoRepresentanteLegal;
                                            document.getElementById("emailRepresentanteLegal").value = datos.emailRepresentanteLegal;
                                        }
                                );
                            }

                            function guardar() {
                                document.getElementById("accion").value = "AGREGAR";
                                if (validar()) {
                                    $('#fm-datos-generales').form('submit', {
                                        url: "../Servlet/administrarEstablecimiento.php",
                                        onSubmit: function () {
                                            return $(this).form('validate');
                                        },
                                        success: function (result) {
                                            var result = eval('(' + result + ')');
                                            if (result.success) {
                                                $.messager.show({
                                                    title: 'Aviso',
                                                    msg: result.mensaje
                                                });
                                                cargarDatosGenerales();
                                            } else {
                                                $.messager.alert('Error', result.errorMsg);
                                            }
                                        }
                                    });
                                }
                            }

                            function validar() {
                                var codigoEstablecimiento = document.getElementById("codigoEstablecimiento").value;
                                var nombreEstablecimiento = document.getElementById("nombreEstablecimiento").value;
                                var direccionCalleEstablecimiento = document.getElementById("direccionCalleEstablecimiento").value;
                                var direccionNumeroEstablecimiento = document.getElementById("direccionNumeroEstablecimiento").value;
                                var ciudadEstablecimiento = document.getElementById("ciudadEstablecimiento").value;
                                var regionEstablecimiento = document.getElementById("regionEstablecimiento").value;
                                var telefonoEstablecimiento = document.getElementById("telefonoEstablecimiento").value;
                                var emailEstablecimiento = document.getElementById("emailEstablecimiento").value;

                                var nombreEntidadAdministradora = document.getElementById("nombreEntidadAdministradora").value;
                                var rutEntidadAdministradora = document.getElementById("rutEntidadAdministradora").value;
                                var provinciaEntidadAdministradora = document.getElementById("provinciaEntidadAdministradora").value;
                                var regionEntidadAdministradora = document.getElementById("regionEntidadAdministradora").value;
                                var representanteLegal = document.getElementById("representanteLegal").value;
                                var rutRepresentanteLegal = document.getElementById("rutRepresentanteLegal").value;
                                var telefonoRepresentanteLegal = document.getElementById("telefonoRepresentanteLegal").value;
                                var emailRepresentanteLegal = document.getElementById("emailRepresentanteLegal").value;


                                if (codigoEstablecimiento == "") {
                                    $.messager.alert('Error', "Debe ingresar el codigo del establecimiento.");
                                    return false;
                                }
                                if (nombreEstablecimiento == "") {
                                    $.messager.alert('Error', "Debe ingresar el nombre del establecimiento.");
                                    return false;
                                }
                                if (direccionCalleEstablecimiento == "") {
                                    $.messager.alert('Error', "Debe ingresar la direccion del establecimiento.");
                                    return false;
                                }
                                if (direccionNumeroEstablecimiento == "") {
                                    $.messager.alert('Error', "Debe ingresar el numero de direccion del establecimiento.");
                                    return false;
                                }
                                if (isNaN(direccionNumeroEstablecimiento)) {
                                    $.messager.alert('Error', "El numero de direccion del establecimiento tiene caracteres no validos.");
                                    return false;
                                }
                                if (ciudadEstablecimiento == "") {
                                    $.messager.alert('Error', "Debe ingresar la ciudad del establecimiento.");
                                    return false;
                                }
                                if (regionEstablecimiento == "") {
                                    $.messager.alert('Error', "Debe ingresar la región del establecimiento.");
                                    return false;
                                }
                                if (telefonoEstablecimiento == "") {
                                    $.messager.alert('Error', "Debe ingresar el telefono del establecimiento.");
                                    return false;
                                }
                                if (isNaN(telefonoEstablecimiento)) {
                                    $.messager.alert('Error', "El telefono del establecimiento ingresado, tiene caracteres no validos.");
                                    return false;
                                }
                                if (emailEstablecimiento == "") {
                                    $.messager.alert('Error', "Debe ingresar el E-mail del establecimiento.");
                                    return false;
                                }

                                if (nombreEntidadAdministradora == "") {
                                    $.messager.alert('Error', "Debe ingresar el nombre de la entidad administradora.");
                                    return false;
                                }
                                if (rutEntidadAdministradora == "") {
                                    $.messager.alert('Error', "Debe ingresar el rut de la entidad administradora.");
                                    return false;
                                }
                                if (provinciaEntidadAdministradora == "") {
                                    $.messager.alert('Error', "Debe ingresar la provincia de la entidad administradora.");
                                    return false;
                                }
                                if (regionEntidadAdministradora == "") {
                                    $.messager.alert('Error', "Debe ingresar la región de la entidad administradora.");
                                    return false;
                                }
                                if (representanteLegal == "") {
                                    $.messager.alert('Error', "Debe ingresar el nombre del representante legal.");
                                    return false;
                                }
                                if (rutRepresentanteLegal == "") {
                                    $.messager.alert('Error', "Debe ingresar el rut del representante legal.");
                                    return false;
                                }
                                if (telefonoRepresentanteLegal == "") {
                                    $.messager.alert('Error', "Debe ingresar el telefono del representante legal.");
                                    return false;
                                }
                                if (isNaN(telefonoRepresentanteLegal)) {
                                    $.messager.alert('Error', "El telefono del representante legal tiene caracteres no validos.");
                                    return false;
                                }
                                if (emailRepresentanteLegal == "") {
                                    $.messager.alert('Error', "Debe ingresar el E-mail del representante legal.");
                                    return false;
                                }
                                return true;
                            }

                            function reporte() {
                                $('#myModal').modal('show');
                            }
                            function reporteDadosDeBaja() {
                                $('#modalDadosDeBaja').modal('show');
                            }
                            function generarReporteInventarioBienesInmuebles() {
                                var fechaInicio = $("#fechaInicio").val();
                                var fechaTermino = $("#fechaTermino").val();

                                var meses = new Array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
                                var f = new Date();
                                var fechaActual = f.getDate() + " de " + meses[f.getMonth()] + " de " + f.getFullYear();

                                if (!document.getElementById("sinFechas").checked) {
                                    if (fechaInicio == "") {
                                        $.messager.alert('Error', "Debe ingresar la fecha de inicio.");
                                        return false;
                                    }
                                    if (fechaTermino == "") {
                                        $.messager.alert('Error', "Debe ingresar la fecha de termino.");
                                        return false;
                                    }
                                    if (fechaInicio >= fechaTermino) {
                                        $.messager.alert('Error', "La fecha de termino debe ser mayor a la fecha de inicio.");
                                        return false;
                                    }
                                }
                                window.open("generarReporteInventarioBienes.php?" + $("#fm-datos-generales").serialize() + " & " + $("#fm-periodo").serialize() + " &fechaActual=" + fechaActual);
                            }

                            function generarReporteInventarioBienesDadosDeBaja() {
                                var fechaInicio = $("#fechaInicioDadosDeBaja").val();
                                var fechaTermino = $("#fechaTerminoDadosDeBaja").val();

                                var meses = new Array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
                                var f = new Date();
                                var fechaActual = f.getDate() + " de " + meses[f.getMonth()] + " de " + f.getFullYear();

                                if (!document.getElementById("sinFechasDadosDeBaja").checked) {
                                    if (fechaInicio == "") {
                                        $.messager.alert('Error', "Debe ingresar la fecha de inicio.");
                                        return false;
                                    }
                                    if (fechaTermino == "") {
                                        $.messager.alert('Error', "Debe ingresar la fecha de termino.");
                                        return false;
                                    }
                                    if (fechaInicio >= fechaTermino) {
                                        $.messager.alert('Error', "La fecha de termino debe ser mayor a la fecha de inicio.");
                                        return false;
                                    }
                                }
                                window.open("generarReporteInmueblesDadosDeBaja.php?" + $("#fm-datos-generales").serialize() + " & " + $("#fm-periodo-dados-de-baja").serialize() + " &fechaActual=" + fechaActual);
                            }

                            function sinPeriodo() {
                                if (document.getElementById("sinFechas").checked) {
                                    document.getElementById("fechaInicio").disabled = true;
                                    document.getElementById("fechaTermino").disabled = true;
                                } else {
                                    document.getElementById("fechaInicio").disabled = false;
                                    document.getElementById("fechaTermino").disabled = false;
                                }
                            }

                            function sinPeriodoDadosDeBaja() {
                                if (document.getElementById("sinFechasDadosDeBaja").checked) {
                                    document.getElementById("fechaInicioDadosDeBaja").disabled = true;
                                    document.getElementById("fechaTerminoDadosDeBaja").disabled = true;
                                } else {
                                    document.getElementById("fechaInicioDadosDeBaja").disabled = false;
                                    document.getElementById("fechaTerminoDadosDeBaja").disabled = false;
                                }
                            }

        </script>
    </body>
</html>

