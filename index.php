<html>
    <head>
        <meta charset="UTF-8">
        <title>Sala Cuna Hogar De Cristo</title>        
        <link id="page_favicon" href="Files/img/logo.png" rel="icon" type="image/x-icon" />
        <!-- start: CSS -->
        <link href="Files/Complementos/bootstrap/css/bootstrap-flat.css" rel="stylesheet">
        <link href="Files/Complementos/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
        <link id="base-style" href="Files/css/style.css" rel="stylesheet">
        <link id="base-style" href="Files/css/style-responsive.css" rel="stylesheet">            
        <script type="text/javascript" src="Files/Complementos/lib/jquery-easyui-1.4.2/jquery.min.js"></script>
        <script type="text/javascript" src="Files/Complementos/lib/jquery-easyui-1.4.2/jquery.easyui.min.js"></script>
        <script type="text/javascript" src="Files/Complementos/lib/jquery-easyui-1.4.2/plugins/jquery.datagrid.js"></script>
    
        <link rel="stylesheet" type="text/css" href="Files/Complementos/lib/jquery-easyui-1.4.2/themes/default/easyui.css">
        <link rel="stylesheet" type="text/css" href="Files/Complementos/lib/jquery-easyui-1.4.2/themes/icon.css">
        <link rel="stylesheet" type="text/css" href="Files/Complementos/lib/jquery-easyui-1.4.2/demo/demo.css">
    </head>
    <body style="background-image: url('Files/img/a1.jpg');  background-repeat: no-repeat; background-size: 100%;" >
        <div class="wrap">
            <div class="container-fluid">
                <div class="row-fluid" >
                    <!-- end: Main Menu -->
                    <div class="span4 offset4">
                        <header style="background-color: #24574e" class="panel-heading btn-inverse text-center">
                            <h4> <img src="Files/img/logo.png"> Sala Cuna Hogar De Cristo </h4>
                        </header>
                        <section class="panel" style="background-color: #d9f9f4">
                            <form id="fmlogin" method="post" style="background-color: #d9f9f4">
                                <label class="control-label"><strong>Run</strong></label>
                                <input id="inputRun" name="inputRun" type="text" placeholder="112223337" class="span12">
                                <label class="control-label"><strong>Contraseña</strong></label>
                                <input type="password" id="inputPassword" name="inputPassword" placeholder="Contraseña" class="span12">
                                <a id="boton" onclick="validarLogin()" class="btn btn-block btn-info" style="margin-top: 10px; background-color: #008364"><i class="icon-lock"> </i> Ingresar</a>
                                <!--<a href="#" class="pull-right"><small>Olvido su contraseña</small></a>-->
                                
                            </form>
                        </section>
                    </div>
                </div>
            </div>
        </div>
        <script>
            function validarLogin() {
                $('#fmlogin').form('submit', {
                    url: "Vista/Servlet/login.php",
                    onSubmit: function () {
                        return $(this).form('validate');
                    },
                    success: function (result) {
                        console.log(result);
                        var result = eval('(' + result + ')');
                        if (!result.success) {
                            $.messager.alert('Error', result.mensaje);
                        } else {
                            location.href = result.pagina;
                        }
                    }
                });
            }
        </script>
    </body>
</html>
