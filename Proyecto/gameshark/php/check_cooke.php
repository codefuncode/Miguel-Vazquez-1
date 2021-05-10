<?php

if (!isset($_COOKIE["ID"])) {

    header("Location: inicio.php");

} else {
    session_start();

    include_once 'coneccion.php';
}
