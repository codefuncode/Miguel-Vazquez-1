<?php

if ((isset($_COOKIE['ID'])) &&
    (isset($_COOKIE['tipo_usuario'])) &&
    (isset($_COOKIE['nombre']))) {

    $_SESSION["ID"]           = $_COOKIE['ID'];
    $_SESSION["tipo_usuario"] = $_COOKIE['tipo_usuario'];
    $_SESSION["nombre"]       = $_COOKIE['nombre'];

    // setcookie("ID", $cookie_id, time() + 60 * 60 * 24 * 30, "/");
    // setcookie("tipo_usuario", $tipo_usuario, time() + 60 * 60 * 24 * 30, "/");
    // setcookie("nombre ", $cookie_nombre, time() + 60 * 60 * 24 * 30, "/");
} else {
    header("Location: inicio.php");
}

$_SESSION["ID"]           = $cookie_id;
$_SESSION["tipo_usuario"] = $tipo_usuario;
