<?php
require_once('../modelos/loginModelo.php');


$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$cuil = $_POST["cuil"];


$loginModel = new LoginModelo();


if ($loginModel->login($nombre, $apellido, $cuil) == 0) {
    session_start();
    header("Location: ../index.php?pagina=ingreso");
    $_SESSION['datosMal'] = true;
} else {
    session_start();
    $mdlLogin = new LoginModelo();
    $dni = $mdlLogin->verificarDni($cuil);
    $rol = $mdlLogin->verificarRol($dni);

    switch ($rol) {
        case "Administrador":
            $_SESSION['ingreso'] = true;
            $_SESSION['cuil'] = $cuil;
            $_SESSION['rol'] = $rol;
            $_SESSION['userName'] = $mdlLogin->mostrarUserName($dni);
            header("Location: ../index.php?pagina=principal");
            break;
        case "Profesor":
            $_SESSION['ingreso'] = true;
            $_SESSION['cuil'] = $cuil;
            $_SESSION['rol'] = $rol;
            $_SESSION['userName'] = $mdlLogin->mostrarUserName($dni);
            header("Location: ../index.php?pagina=principal");
            break;

    }
}
