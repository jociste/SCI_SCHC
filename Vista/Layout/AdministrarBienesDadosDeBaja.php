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
                    <div id="content" class="span9" >
                        <!-- AQUI VA EL MENU INTERIOR-->
                        <?php
                        if ($perfil == 1) {
                            include '../Menus/directoraMenuInteriorBien.php';
                        }
                        ?>
                        <!-- FIN MENU INTERIOR-->

                        <hr>
                        <div class="row-fluid">
                            <div class="span12">
                                <div class="body" style="text-align: center;">
                                    <div>
                                        <a class="btn btn-success btn-block" style="width: 200px;float: right; margin-bottom: 1%" onClick="location.href = 'agregarBien.php'">
                                            Agregar Bien <i class="icon-book" ></i>
                                        </a>
                                    </div>
                                    <div class="row-fluid">
                                        <!-- CONTENIDO AQUI -->
                                        <div class="table-responsive">
                                            <table id="tablaLotes" class="table table-striped table-bordered dt-responsive nowrap">
                                                <thead>
                                                    <tr>
                                                        <th>idBaja</th> 
                                                        <th>$fechaBaja</th>  
                                                        <th>$motivo</th>
                                                        <th>$nombreCategoria</th>                                                            
                                                        <th>$nombreBien</th>
                                                        <th>$fechaComprobante</th>
                                                        <th>accion</th> 
                                                    </tr>
                                                </thead>
                                                <tbody id="tablaLotes" class="table table-striped table-bordered dt-responsive nowrap">
                                                </tbody>
                                            </table>
                                            <input type="hidden" id="accion" name="accion" value="">
                                        </div>
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
        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel">Dar de Baja Bien</h4>
                    </div>
                    <div class="modal-body">
                        <form id="fm-baja" class="form-horizontal well" >
                            <div class="control-group">
                                <label class="control-label" for="motivo">Motivo</label>
                                <div class="controls">
                                    <textarea class="input-xlarge focused" id="motivo" name="motivo" type="text" style="height: 70px" placeholder="motivo producto" required></textarea>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="fechaBaja">Fecha Baja</label>
                                <div class="controls">
                                    <input class="input-xlarge focused" id="fechaBaja" name="fechaBaja" type="date"  required>
                                </div>
                            </div>
                            <hr>
                            <input type="hidden" id="idBaja" name="idBaja" value="">
                            <input type="hidden" id="idBien" name="idBien" value="">
                            <input type="hidden" id="idNivelBien" name="idNivelBien" value="">
                            <input type="hidden" id="accionBien" name="accion" value="">
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="button" onclick="darDeBaja()" class="btn btn-primary">Guardar</button>
                    </div>
                </div> 
            </div>
        </div>
        <script src="../../Files/js/modernizr.custom.js"></script>
        <script src="../../Files/js/toucheffects.js"></script>

        <script>
                            $(function () {
                                cargarLotes();
                            });

                            function cargarLotes() {
                                var url_json = '../Servlet/administrarBien.php?accion=LISTADODESHABILITADOS';
                                $.getJSON(
                                        url_json,
                                        function (datos) {
                                            $.each(datos, function (k, v) {
                                                var contenido = "<tr>";
                                                contenido += "<td>" + v.idBien + "</td>";
                                                contenido += "<td>" + v.fechaBaja + "</td>";
                                                contenido += "<td>" + v.motivo + "</td>";
                                                contenido += "<td>" + v.nombreCategoria + "</td>";
                                                contenido += "<td>" + v.nombreBien + "</td>";
                                                contenido += "<td>" + v.fechaComprobante + "</td>";
                                                contenido += "<td>";
                                                contenido += "<button type='button' class='btn btn-warning btn-circle icon-pencil'  onclick='editar(" + v.idBien + ")'></button>";
                                                contenido += "</td>";
                                                contenido += "</tr>";
                                                $("#tablaLotes").append(contenido);
                                            });
                                            $('#tablaLotes').DataTable();
                                        }
                                );
                            }
                            function editar(idBien) {
                                window.location = "editarBien.php?idBien=" + idBien;
                            }
                            function abrirModaldarDeBaja(idBien, idNivelBien) {
                                $('#myModal').modal('toggle');
                                document.getElementById('myModal').style.display = 'block';
                                document.getElementById('idBien').value = idBien;
                                document.getElementById('idNivelBien').value = idNivelBien;

                            }

                            function darDeBaja() {
                                $.messager.confirm('Confirmar', '¿Esta seguro dar de baja el bien?', function (r) {
                                    if (r) {
                                        document.getElementById("accionBien").value = "DARDEBAJA";
                                        $('#fm-baja').form('submit', {
                                            url: "../Servlet/administrarBien.php",
                                            onSubmit: function () {
                                                return $(this).form('validate');
                                            },
                                            success: function (result) {
                                                console.log('result (' + result + ")");
                                                var result = eval('(' + result + ')');
                                                if (result.errorMsg) {
                                                    console.log('aqui');
                                                    $.messager.alert('Error', result.errorMsg);
                                                } else {
                                                    document.getElementById("fm-baja").reset();
                                                    $('#myModal').modal('toggle');
                                                    cargarLotes();
                                                    $.messager.show({
                                                        title: 'Aviso',
                                                        msg: result.mensaje
                                                    });
                                                }
                                            }
                                        });
                                    }

                                });
                            }
                            //
                            //                                            function darDeBaja(idBien) {
                            //                                                $.messager.confirm('Confirmar', '¿Esta seguro dar de baja el bien?', function (r) {
                            //                                                    if (r) {
                            //                                                        var url_json = '../Servlet/administrarLote_producto.php?accion=BORRAR&idBien=' + idBien;
                            //                                                        $.getJSON(
                            //                                                                url_json,
                            //                                                                function (datos) {
                            //                                                                    if (datos.errorMsg) {
                            //                                                                        $.messager.alert('Error', datos.errorMsg, 'error');
                            //                                                                    } else {
                            //                                                                        $.messager.show({
                            //                                                                            title: 'Aviso',
                            //                                                                            msg: datos.mensaje
                            //                                                                        });
                            //                                                                        cargarLotes();
                            //                                                                    }
                            //                                                                }
                            //                                                        );
                            //                                                    }
                            //                                                });
                            //                                            }
        </script>
    </body>
</html>