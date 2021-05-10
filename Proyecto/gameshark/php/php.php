
<?php

//  Nesesario
include_once 'coneccion.php';
include_once 'funciones.php';

if (isset($_POST['fun']) && $_POST['fun'] == "clasificacion") {

    //  Recuperación los datos de la tabla clasificación

    clasificacion($servername, $username, $password, $dbname);

} elseif (isset($_POST['fun']) && $_POST['fun'] == "plataforma") {

    //  Recuperación los datos de la tabla plataforma

    plataforma($servername, $username, $password, $dbname);

} elseif (isset($_POST['fun']) && $_POST['fun'] == "guardar") {

    //  Guarda el registro  del los juegos

    guardar($servername, $username, $password, $dbname);

} elseif (isset($_POST['fun']) && $_POST['fun'] == "devuelveinventario") {

    //  Recuperación de los juegos previamente insertados en la base de datos



    devuelveinventario($servername, $username, $password, $dbname);

}

?>
