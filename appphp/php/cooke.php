<?php
<<<<<<< HEAD
<<<<<<< HEAD

session_start();

session_unset();

session_destroy();

//  Importante declarar la raíz  o el fichero en especifico en el segundo parámetro
=======
//Si la pagina no detecta el cookie, redirije al usuario al inicio, de lo contrario, la pagina se ira al inventario.
>>>>>>> 3c3e5ada54a812c13ae17c1d61a3585a45f9bd84
=======
//Si la pagina no detecta el cookie, redirije al usuario al inicio, de lo contrario, la pagina se ira al inventario.
>>>>>>> 3c3e5ada54a812c13ae17c1d61a3585a45f9bd84
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
