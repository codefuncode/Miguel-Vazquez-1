<?php

//  Necesario
//Usa una condicional en el cual si puede detectar un cookie en el navegador.
if (!isset($_COOKIE['ID'])) {
    if ((isset($_POST['uname'])) && ($_POST['uname'] != "") &&
        (isset($_POST['psw'])) && ($_POST['psw'] != "")) {

        $usuario = $_POST['uname'];
        $pass    = $_POST['psw'];

        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = $conn->prepare("SELECT * FROM usuario WHERE  usuario= '$usuario' AND pass= '$pass'");
            $sql->execute();
            $count = $sql->rowCount();

            if ($count == 1) {
                $result = $sql->fetchAll(PDO::FETCH_ASSOC);
                echo $result[0]['idusuario'];
                $cookie_name  = "ID";
                $cookie_value = $result[0]['idusuario'];

                //determina si el cookie esta disponible. de estar disponible, redirijira al usuario al inventario. De lo contrario, lo envia al inicio.
                if (!isset($_COOKIE[$cookie_name])) {
                    setcookie($cookie_name, $cookie_value, time() + 60 * 60 * 24 * 30, "/");
                    echo "Cookie '" . $cookie_name . "' no set!<br>";
                    echo "Value is: " . $_COOKIE[$cookie_name];
                    header("Location: inventario.php");
                } else {
                    //Redirijira el usuario al inventario de poder detectar el cookie.
                    header("Location: inventario.php");

                }

                // header("Location: inventario.php");

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
