<?php

include_once 'coneccion.php';

if ((isset($_POST['nombre'])) && ($_POST['nombre'] != "") &&
    (isset($_POST['usuario'])) && ($_POST['usuario'] != "") &&
    (isset($_POST['mail'])) && ($_POST['mail'] != "") &&
    (isset($_POST['pass'])) && ($_POST['pass'] != "")) {

    $nombre  = $_POST['nombre'];
    $usuario = $_POST['usuario'];
    $mail    = $_POST['mail'];
    $pass    = $_POST['pass'];
    global $cuentdeusuario;

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = $conn->prepare("SELECT * FROM usuario WHERE correo= '$mail' AND usuario= '$usuario'");
        $sql->execute();
        $count = $sql->rowCount();

        if ($count > 0) {
            echo '<div class="alert alert-info"><strong>Info!</strong> El correo o el usuario esta en uso .</div>';
        } else {

            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql2 = "INSERT INTO usuario (nombre, usuario, correo,pass )
                VALUES ('$nombre','$usuario','$mail','$pass')";
            // use exec() because no results are returned
            $conn->exec($sql2);

            $cuentdeusuario = "si";
            echo $cuentdeusuario;

            // header("Location: ../pag/inicio.php");

        }
        // $filas = $sql->rowCount();
        // set the resulting array to associative
        // $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $conn = null;

} else {
    header("Location: ../pag/registro.php");
}
