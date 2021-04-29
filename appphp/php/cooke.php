<?php

session_start();

session_unset();

session_destroy();

//  Importante declarar la raíz  o el fichero en especifico en el segundo parámetro
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

// setcookie("ID", $cookie_id, time() + 60 * 60 * 24 * 30, "/");
// setcookie("tipo_usuario", $tipo_usuario, time() + 60 * 60 * 24 * 30, "/");
// setcookie("nombre ", $cookie_nombre, time() + 60 * 60 * 24 * 30, "/");

// $_SESSION["tipo"]   = $tipo_usuario;
// $_SESSION["id"]     = $cookie_id;
// $_SESSION["nombre"] = $cookie_nombre;
