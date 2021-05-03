<?php

//  Destrucción de cooke  y sección

session_start();

session_unset();

session_destroy();

setcookie("ID", "", time() - 3600, "/");
setcookie("tipo_usuario", "", time() - 3600, "/");
setcookie("nombre", "", time() - 3600, "/");

if ((!isset($_COOKIE["ID"])) &&
    (!isset($_COOKIE["tipo_usuario"])) &&
    (!isset($_COOKIE["nombre"]))) {
    header("Location: ../pag/inicio.php");

} else {

    header("Location: ../pag/inventario.php");

}
