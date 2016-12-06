<?php
//session_start();
$nombre = $_SESSION["nombre"];
$sexo = $_SESSION["sexo"];
?>
<!-- start: Header -->
<div class="navbar  navbar-fixed-top">
    <div class="navbar-inner" >
        <div class="container-fluid" >
            <img src="../../Files/img/logo.png" class="pull-left nav_logo" alt='universal admin logo'>
            <a class="brand" href="home.php"><span> Sala Cuna Hogar de Cristo</span></a>
            <div class="nav-collapse collapse header-nav">
                <ul class="nav ">
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="icon-group"></i>&nbsp;Inventario Productos</a>
                        <ul class="dropdown-menu">
                            <li><a href="AdministrarLotesProducto.php">Lotes de Productos</a></li>                                    
                            <li><a href="MostrarLoteProductosUsados.php">Productos Usados</a></li>
<!--                            <li><a href="AdministrarCategoriasProducto.php">Gestionar Categorias</a></li>-->
                            <li><a href="AdministrarProductos.php">Gestionar Productos</a></li>                            
                            <li><a href="RetirarProducto.php">Retirar Productos</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class=" dropdown-toggle" data-toggle="dropdown" href="#"><i class="icon-archive"></i>&nbsp;Consultar Productos</a>
                        <ul class="dropdown-menu">                            
                            <li><a href="MostrarLoteProductosOrdenadosPorStock.php">Productos Bajo Stock</a></li>
                            <li><a href="MostrarLoteProductosOrdenadosPorVencer.php">Productos Por Vencer</a></li>
                            <li><a href="AdministrarReportesProductos.php">Generar Reportes</a></li>
                        </ul>
                    </li>
                </ul>                      
            </div>
            <!-- start: Header Menu -->
            <div class="nav-collapse collapse header-nav">
                <ul class="nav  pull-right" style="height: 50px; ">                                        

                    <li class="dropdown" style="">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#" style="height: 23px;">
                            <img  width="27" height="27"  class="img-circle" src="../../Files/img/<?php echo $sexo; ?>.jpg" alt='amdin user'>&nbsp;<?php echo $nombre; ?>
                        </a>
                        <ul class="dropdown-menu" style="margin-top: 6px; ">
                            <li ><a href="MiPerfil.php"><i class="icon-user icon-white"></i> Mi Perfil</a></li>
                            <li><a href="../Servlet/loginOFF.php"><i class="icon-off icon-white"></i> Salir</a></li>
                        </ul>
                    </li>
                </ul>

            </div>
            <!-- end: Header Menu -->
        </div>
    </div>
</div>