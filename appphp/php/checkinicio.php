<?php

//  Necesario
//Usa una condicional en el cual si puede detectar lo que esta escrito en el campo de input y verifica si el usuario existe en la base de datos.

if (!isset($_COOKIE['ID'])) {

    if ((isset($_POST['uname'])) && ($_POST['uname'] != "") &&
        (isset($_POST['psw'])) && ($_POST['psw'] != "")) {

        $usuario = $_POST['uname'];
        $pass    = $_POST['psw'];
        include 'coneccion.php';
        try {

            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = $conn->prepare("SELECT * FROM usuario WHERE  usuario= '$usuario' AND pass= '$pass'");
            $sql->execute();
            $count = $sql->rowCount();

            if ($count == 1) {
                $result = $sql->fetchAll(PDO::FETCH_ASSOC);
                // echo $result[0]['idusuario'];
                $tipo_usuario  = $result[0]['tipo_usuario'];
                $cookie_id     = $result[0]['idusuario'];
                $cookie_nombre = $result[0]['nombre'];

                setcookie("ID", $cookie_id, time() + 60 * 60 * 24 * 30, "/");
                setcookie("tipo_usuario", $tipo_usuario, time() + 60 * 60 * 24 * 30, "/");
                setcookie("nombre ", $cookie_nombre, time() + 60 * 60 * 24 * 30, "/");

                $_SESSION["tipo"]   = $tipo_usuario;
                $_SESSION["id"]     = $cookie_id;
                $_SESSION["nombre"] = $cookie_nombre;

                header("Location: inventario.php");

            } else {
                //Redirijira al usuario al inicio
                header("Location: inicio.php");

            }
            // $filas = $sql->rowCount();
            // set the resulting array to associative
            // $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        $conn = null;

    } else {
        // header("Location: registro.php");
    }
} else {

    header("Location: inventario.php");

}
