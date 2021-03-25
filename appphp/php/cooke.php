<?php
setcookie("ID", "", time() - 3600, "/");
if (!isset($_COOKIE["ID"])) {
    header("Location: ../pag/inicio.php");
} else {

    header("Location: ../pag/inventario.php");

}
