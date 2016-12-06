<?php

include_once '../../Controlador/SCI_SCHC.php';
$control = SCI_SCHC::getInstancia();

$run = $_POST['inputRun'];
$clave = $_POST['inputPassword'];
$success = true;
$mensajes;
$pagina = "";
if (($run != null || $run != "") && ($clave != null || $clave != "")) {
    $run = substr($run, 0, -1);
    $funcionaria = $control->getFuncionariaByID($run);
    if ($funcionaria->getRunFuncionaria() == $run) {
        if ($funcionaria->getClave() == $clave) {
            session_start();
            
            //$nivel = $control->nivelFuncionariaRecienteByRun($run);
            $cargo = $control->cargoFuncionariaRecienteByRun($run);
            
            $_SESSION["autentificado"] = "SI";
            $_SESSION["idCargo"] = $cargo->getIdCargo();
            $_SESSION["run"] = $funcionaria->getRunFuncionaria();
            
            $nombres = split(" ", $funcionaria->getNombres());
            $apellidos = split(" ", $funcionaria->getApellidos());
            $_SESSION["nombre"] = $nombres[0]." ".$apellidos[0];
            $_SESSION["sexo"] = $funcionaria->getSexo();            
            
            if ($cargo->getIdCargo() == 1 || $cargo->getIdCargo() == 2 || $cargo->getIdCargo() == 3 ||$cargo->getIdCargo() == 5) {//administrador
                $pagina = "Vista/Layout/home.php";            
            }
             if ($cargo->getIdCargo() == 4) {//administrador
                $pagina = "Vista/Layout/AdministrarLotesProducto.php";            
            }
             if ($cargo->getIdCargo() == 6) {//administrador
                $pagina = "Vista/Layout/AdministrarFuncionariasHabilitadas.php";            
            }
            $success = true;
            $mensajes = "Iniciando...";
        } else {
            $success = false;
            $mensajes = "La clave ingresada es incorrecta.";
        }
    } else {
        $success = false;
        $mensajes = "Usuario no existe.";
    }
} else {
    $success = false;
    $mensajes = "Ninguna casilla puede estar vacÍa.";
}
echo json_encode(array(
    'success' => $success,
    'mensaje' => $mensajes,
    'pagina' => $pagina
));
?>