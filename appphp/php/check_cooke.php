<?php

if (!isset($_COOKIE["ID"])) {
    echo "<h1> ahhahahahah</h1/>";
    header("Location: inicio.php");

} else {
    session_start();

    include_once 'coneccion.php';
}
