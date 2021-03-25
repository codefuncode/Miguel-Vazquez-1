
    <?php

if (!isset($_COOKIE["ID"])) {
    header("Location: inicio.php");
} else {
    // echo "Value is: " . $_COOKIE['ID'];
    // setcookie("ID", "", time() - 3600, "/");
    // header("Location: inventario.php");
    include_once '../php/inventario.php';
}

?>

    <!--  Contenedor para encerar todos los elementos del formulario  -->


