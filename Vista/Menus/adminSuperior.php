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
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="icon-group"></i>&nbsp;Personal</a>
                        <ul class="dropdown-menu">
                            <li><a href="AdministrarFuncionariasHabilitadas.php">Gestionar Funcionarias</a></li>	
                            <li><a href="FuncionariasHistoricas.php">Funcionarias Historicas</a></li>	
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