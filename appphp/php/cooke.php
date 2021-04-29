<?php
//Si la pagina no detecta el cookie, redirije al usuario al inicio, de lo contrario, la pagina se ira al inventario.
setcookie("ID", "", time() - 3600, "/");
if (!isset($_COOKIE["ID"])) {
    header("Location: ../pag/inicio.php");
} else {

    header("Location: ../pag/inventario.php");

}
