<!DOCTYPE html>
<?php
session_start();
if ($_SESSION['autentificado'] != "SI") {
    header("Location: ../../index.php");
}
$perfil = $_SESSION["idCargo"];

$idDocumento = $_REQUEST["idDocumento"];

include_once '../../Controlador/SCI_SCHC.php';

$control = SCI_SCHC::getInstancia();
$documento = $control->getDocumentoByID($idDocumento);
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
                        include '../Menus/directoraLeftDocumentos.php';
                    }
                    if ($perfil == 2) {
                        include '../Menus/encargadaMaterialesLeftDocumentos.php';
                    }
                    if ($perfil == 3) {
                        include '../Menus/tecnicoLeftDocumentos.php';
                    }
                    if ($perfil == 5) {
                        include '../Menus/educadoraLeftDocumentos.php';
                    }
                    ?>
                    <!-- FIN MENU LEFT-->
                    <div id="content" class="span9" style="width: 1100px; align-content: center">
                          <div class="row-fluid" style="align-content: center">
                            <div class="span12" style="align-content: center">
                                <div class="row-fluid" style="align-content: center">
                                      <div class="form-actions" style="height: 30px;">
                                            <h4 style="width: 550px; align-content: center; margin: 0; padding-left: 30%">Datos Documento</h4> 
                                        </div>
                                    <form id="fm-documento" class="form-horizontal well" enctype="multipart/form-data" method="POST" style="align-content: center">

                                      
                                        <div class="control-group">
                                            <label class="control-label" for="idTipoDocumento">Categoria Documento</label>
                                            <div class="controls">
                                                <select class="input-xlarge focused" id="idTipoDocumento" name="idTipoDocumento" readonly><option value="-1">Seleccionar...</option></select>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="nombre">Nombre</label>
                                            <div class="controls">
                                                <input class="input-xlarge focused" id="nombre" name="nombre" type="text" placeholder="Nombre producto" readonly>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="descripcion">Descripción</label>
                                            <div class="controls">
                                                <textarea class="input-xlarge focused" id="descripcion" name="descripcion" placeholder="Descripción del documento" readonly></textarea>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="fechaRegistro">Fecha Registro</label>
                                            <div class="controls">
                                                <input class="input-xlarge focused" id="fechaRegistro" name="fechaRegistro" type="date" readonly>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="documento">Documento</label>
                                            <div class="controls">
                                                <div class='media well-small'>
                                                    <a class='pull-left' href='#'><img class='media-object' data-src='holder.js/120x120' alt='120x120' src='../../Files/img/Archivos Icon/<?= $documento->getFormato() ?>.png'></a>
                                                    <div class='media-body'>
                                                        <h5 class='media-heading'><a href='#'><b><?= $documento->getNombre() ?></b></a></h5>
                                                        <?= $documento->getTamano() ?>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="form-actions" style="align-content: center">
                                            <button type="button" onclick="restaurar()" class="btn btn-primary">Restaurar</button>
                                            <button type="button" onclick="borrar()" class="btn btn-danger">Eliminar Definitivamente</button>
                                            <input type="hidden" id="idDocumento" name="idDocumento" value="<?= $idDocumento ?>">
                                            <button type="button" onClick="location.href = 'AdministrarPapeleraDocumentos.php'" class="btn">Volver Atras</button>
                                        </div>
                                        <input type="hidden" id="accion" name="accion" value="">
                                        <input type="hidden" id="perfil" name="perfil" value="<?php echo $perfil; ?>">
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
                        <span class="pull-left">© <a href="" target="_blank">Sala Cuna y Jardín Infantil Hogar de Cristo</a> 2016</span>
                    </p>
                </footer>
            </div>
        </div>
        <script src="../../Files/js/modernizr.custom.js"></script>
        <script src="../../Files/js/toucheffects.js"></script>

        <script>
                                                $(function () {
                                                    cargarCategorias();
                                                });

                                                function cargarCategorias() {
                                                    var perfil = document.getElementById("perfil").value;
                                                    var url_json = '../Servlet/administrarTipo_documento.php?accion=LISTADO&perfil=' + perfil;
                                                    $.getJSON(
                                                            url_json,
                                                            function (datos) {
                                                                $.each(datos, function (k, v) {
                                                                    var contenido = "<option value='" + v.idTipoDocumento + "'>" + v.nombre + "</option>";
                                                                    $("#idTipoDocumento").append(contenido);
                                                                });
                                                                cargar();
                                                            }
                                                    );
                                                }
                                                function cargar() {
                                                    var idDocumento = document.getElementById("idDocumento").value;
                                                    var url_json = '../Servlet/administrarDocumento.php?accion=BUSCAR_BY_ID&idDocumento=' + idDocumento;
                                                    $.getJSON(
                                                            url_json,
                                                            function (datos) {
                                                                $("#idTipoDocumento").val(datos.idTipoDocumento);
                                                                $("#nombre").val(datos.nombre);
                                                                $("#descripcion").val(datos.descripcion);
                                                                $("#fechaRegistro").val(datos.fechaRegistro);
                                                            }
                                                    );
                                                }

                                                function restaurar() {
                                                    document.getElementById("accion").value = "RESTAURAR_PAPELERA";
                                                    $('#fm-documento').form('submit', {
                                                        url: "../Servlet/administrarDocumento.php",
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
                                                                window.location = "AdministrarPapeleraDocumentos.php";
                                                            }
                                                        }
                                                    });

                                                }

                                                function borrar() {
                                                    $.messager.confirm('Confirmar', '¿Esta seguro de eliminar el documento?', function (r) {
                                                        if (r) {
                                                            var idDocumento = document.getElementById("idDocumento").value;
                                                            var url_json = '../Servlet/administrarDocumento.php?accion=BORRAR&idDocumento=' + idDocumento;
                                                            $.getJSON(
                                                                    url_json,
                                                                    function (datos) {
                                                                        if (datos.errorMsg) {
                                                                            $.messager.alert('Error', datos.errorMsg, 'error');
                                                                        } else {
                                                                            $.messager.show({
                                                                                title: 'Aviso',
                                                                                msg: datos.mensaje
                                                                            });
                                                                            window.location = "AdministrarPapeleraDocumentos.php";
                                                                        }
                                                                    }
                                                            );
                                                        }
                                                    });
                                                }
        </script>
    </body>
</html>