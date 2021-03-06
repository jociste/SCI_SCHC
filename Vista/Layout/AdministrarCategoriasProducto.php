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
                    <div id="content" class="span9" style="background-color: #fff; width: 90%" >
                        <!-- AQUI VA EL MENU INTERIOR-->
                        <?php
                        if ($perfil == 1) {
                            include '../Menus/directoraMenuInteriorProductos.php';
                        }
                        if ($perfil == 2) {
                            include '../Menus/encargadaMaterialesMenuInteriorProductos.php';
                        }
                        if ($perfil == 4) {
                            include '../Menus/auxiliarMenuInteriorProductos.php';
                        }
                        if ($perfil == 5) {
                            include '../Menus/educadoraMenuInteriorProductos.php';
                        }
                        ?>
                        <!-- FIN MENU INTERIOR-->

                        <hr>
                        <div class="row-fluid">
                            <div class="span12">
                                <div class="header">
                                    <h4>Categorias de Producto</h4>
                                </div>
                                <div class="body" style="text-align: center;">
                                    <div>
                                        <a class="btn btn-success btn-block" style="width: 200px;float: right; margin-bottom: 1%" onClick="location.href = 'agregarCategoriaProducto.php'">
                                            Agregar Categoría <i class="icon-book" ></i>
                                        </a>
                                    </div>
                                    <div class="row-fluid">
                                        <!-- CONTENIDO AQUI -->
                                        <div class="table-responsive">
                                            <table id="tablaCategorias" class="table table-striped table-bordered dt-responsive nowrap">
                                                <thead> 
                                                    <tr>  
                                                        <th>Nombre</th> 
                                                        <th>Descripción</th> 
                                                        <th>Gestionar</th>
                                                    </tr> 
                                                </thead>
                                                <tbody id="grid" class="table table-striped table-bordered dt-responsive nowrap">

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
                                                var url_json = '../Servlet/administrarCategoria.php?accion=LISTADO';
                                                $.getJSON(
                                                        url_json,
                                                        function (datos) {
                                                            $.each(datos, function (k, v) {
                                                                if (v.idCategoria != 5 && v.idCategoria != 1) {
                                                                    var contenido = "<tr>";
                                                                    contenido += "<td>" + v.nombre + "</td>";
                                                                    contenido += "<td>" + v.descripcion + "</td>";
                                                                    if (v.idCategoria > 5 || v.idCategoria < 1) {
                                                                        contenido += "<td>";
                                                                        contenido += "<button type='button' class='btn btn-warning btn-circle icon-pencil'  onclick='editar(" + v.idCategoria + ")'></button>";
                                                                        contenido += "<button type='button' class='btn btn-danger btn-circle icon-trash'  onclick='borrar(" + v.idCategoria + ")'></button>";
                                                                        contenido += "</td>";
                                                                    } else {
                                                                        contenido += "<td>No Permitido</td>";
                                                                    }
                                                                }


                                                                contenido += "</tr>";
                                                                $("#grid").append(contenido);
                                                            });
                                                            $('#tablaCategorias').DataTable(
                                                                    {
                                                                         "aaSorting": [[2, "desc"]],
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
                                                                        },
                                                                    }
                                                            );
                                                        }
                                                );
                                            }
                                            function editar(idCategoria) {
                                                window.location = "editarCategoriaProducto.php?idCategoria=" + idCategoria;
                                            }

                                            function borrar(idCategoria) {
                                                $.messager.confirm('Confirmar', '¿Esta seguro de eliminar la categoria?', function (r) {
                                                    if (r) {
                                                        var url_json = '../Servlet/administrarCategoria.php?accion=BORRAR&idCategoria=' + idCategoria;
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
                                                                        window.location = "AdministrarCategoriasProducto.php";
                                                                    }
                                                                }
                                                        );
                                                    }
                                                });
                                            }
        </script>
    </body>
</html>