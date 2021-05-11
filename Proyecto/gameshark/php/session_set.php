<?php

//  Establece Sesiones con valores de las Cookes
if ((isset($_COOKIE['ID'])) &&
    (isset($_COOKIE['tipo_usuario'])) &&
    (isset($_COOKIE['nombre']))) {

    $_SESSION["ID"]           = $_COOKIE['ID'];
    $_SESSION["tipo_usuario"] = $_COOKIE['tipo_usuario'];
    $_SESSION["nombre"]       = $_COOKIE['nombre'];

} else {
    header("Location: inicio.php");
}

$_SESSION["ID"]           = $cookie_id;
$_SESSION["tipo_usuario"] = $tipo_usuario;
