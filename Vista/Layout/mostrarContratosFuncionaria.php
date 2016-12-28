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

        <link rel="stylesheet" type="text/css" href="../../Files/Complementos/lib/datatables/css/jquery.dataTables.css">
        <script type="text/javascript" charset="utf8" src="../../Files/Complementos/lib/datatables/jquery.dataTables.js"></script>
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
            <div class="container-fluid">
                <div class="row-fluid">
                    <!-- AQUI VA EL MENU LEFT-->
                    <?php
                    if ($perfil == 1) {
                        include '../Menus/directoraLeftPersonal.php';
                    } else if ($perfil == 4) {
                        include '../Menus/auxiliarLeftInventarioProductos.php';
                    } else if ($perfil == 6) {
                        include '../Menus/adminLeftPersonal.php';
                    }
                    ?>
                    <!-- FIN MENU LEFT-->
                    <div id="content" class="span9" style="background-color: #fff; width: 90%" >
                        <!-- AQUI VA EL MENU interior-->
                        <?php
                        if ($perfil == 1) {
                            include '../Menus/directoraMenuInteriorFuncionarias.php';
                        }
                        if ($perfil == 6) {
                            include '../Menus/adminMenuInteriorFuncionarias.php';
                        }
                        ?>
                        <!-- FIN MENU interior-->
                        <hr>                           
                        <div class="span6 content-panels  content-tab5" style="width: 94%;">
                            <h4><b>Antecedentes: </b></h4>
                            
                            <hr>
                            <div class="basic-info">
                                <ul>
                                    <li>
                                    <h5 id="titulo"></h5>
                                    </li>
                                    <li>
                                        <h5 id="run"></h5>
                                    </li>
                                    <li>
                                        <h5 id="profesion"></h5>
                                    </li>                                   
                                </ul>
                                <div class="clearfix"></div>                                
                                <hr>
                                <h5><b>Contratos :</b> </h5>
                                <div class="table-responsive">
                                    <table id="grid" class="table table-striped table-bordered dt-responsive nowrap">
                                        <thead>
                                            <tr>                                                
                                                <th>Cargo</th>
                                                <th>Fecha Inicio</th>
                                                <th>Fecha Termino</th>
                                                <th>Estado</th>
                                            </tr>
                                        </thead>
                                        <tbody id="grid" class="table table-striped table-bordered dt-responsive nowrap">
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                        <input type="hidden" id="accion" name="accion" value="">
                        <input type="hidden" id="runEditar" name="runEditar" value="<?php echo $runFuncionaria; ?>">

                        <!-- FIN FORMULARIO-->
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
            $(function () {
                obtenerDatosFuncionaria();
                cargarFuncionarias();

            })

            function obtenerDatosFuncionaria() {
                var runEditar = document.getElementById("runEditar").value;
                var url_json = '../Servlet/administrarFuncionaria.php?accion=BUSCAR_BY_ID&runFuncionaria=' + runEditar;
                $.getJSON(
                        url_json,
                        function (dato) {
                            document.getElementById("run").innerHTML = "<b>Run: </b>"+dato.runFuncionaria + "-" + jQuery.calculaDigitoVerificador(dato.runFuncionaria);
                            document.getElementById("titulo").innerHTML = "<b>Nombre Completo: </b>"+dato.nombres + " " + dato.apellidos;
                            document.getElementById("profesion").innerHTML = "<b>Profesión: </b>"+dato.profesion;
                        }
                );
            }
            function cargarFuncionarias() {
                var runEditar = document.getElementById("runEditar").value;
                var url_json = '../Servlet/administrarFuncionaria_cargo.php?accion=LISTADOCARGOSFUNCIONARIA&runFuncionaria=' + runEditar;
                console.log(url_json);
                $.getJSON(
                        url_json,
                        function (datos) {
                            console.log(datos);
                            $.each(datos, function (k, v) {
                                console.log(v.nombreCargo);
                                var contenido = "<tr>";
                                contenido += "<td>" + v.nombreCargo + "</td>";
                                contenido += "<td>" + v.fechaInicio + "</td>";
                                if (v.fechaTermino == "0000-00-00") {
                                    contenido += "<td>Contrato Indefinido</td>";
                                } else {
                                    contenido += "<td>" + v.fechaTermino + "</td>";
                                }
                                if (v.fechaTermino == "0000-00-00") {
                                    contenido += "<td>" + "Vigente" + "</td>";
                                } else {
                                    if (v.fechaTermino < fechaActual()) {
                                        contenido += "<td>" + " No Vigente" + "</td>";
                                    } else {
                                        contenido += "<td>" + "Vigente" + "</td>";
                                    }
                                }
                                contenido += "</tr>";
                                $("#grid").append(contenido);
                            });
                            $('#grid').DataTable(
                                    {
                                        "aaSorting": [[1, "desc"]],
                                        "oLanguage": {
                                            "oPaginate": {
                                                "sNext": "Siguiente",
                                                "sPrevious": "Anterior"
                                            },
                                            "sLengthMenu": "Mostrar _MENU_ Resultados",
                                            "sSearch": "Buscar",
                                            "sZeroRecords": "No se encontraron Resultados",
                                            "sInfo": "Mostrar desde el _START_ hasta el _END_ de un total de _TOTAL_ Resultados",
                                            "sInfoEmpty": "Mostrar desde el 0 Hasta el 0 de un total de 0 Resultados",
                                            "sInfoFiltered": "(Filtrado desde un total de _MAX_ Resultados)"
                                        }
                                    }
                            );
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
            }
            ;
            function fechaActual() {
    var hoy = new Date();
    var dd = hoy.getDate();
    var mm = hoy.getMonth() + 1; //hoy es 0!
    var yyyy = hoy.getFullYear();
    if (dd < 10) {
        dd = '0' + dd
    }
    if (mm < 10) {
        mm = '0' + mm
    }
    hoy = yyyy + "-" + mm + "-" + dd;
    return hoy;
}
        </script>
    </body>
</html>