<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <!-- icono dela pagina -->
    <link href="../img/144100970_1017876292074905_5821562716646159982_n.png" rel="icon"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="../css/css.css" rel="stylesheet" type="text/css"/>
    <!-- Librerías  -->
    <script src="../js/jquery.min.js" type="text/javascript">
    </script>
    <!--     <script src="js/jquery.dataTables.min.js" type="text/javascript">
    </script> -->
    <script src="../js/sweetalert.min.js" type="text/javascript">
    </script>
    <!-- -->
    <title>
      GameShark
    </title>
  </head>
  <link href="../css/inicio.css" rel="stylesheet" type="text/css"/>
  <body>
    <!--  Panel de navegación  negro  usando clases de Boostrap para dar estilo al HTML -->
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="#">
            GameShark
          </a>
        </li>
      </ul>
    </nav>


    <?php

include_once '../php/coneccion.php';

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

                if (!isset($_COOKIE[$cookie_name])) {
                    setcookie($cookie_name, $cookie_value, time() + 60 * 60 * 24 * 30, "/");
                    echo "Cookie '" . $cookie_name . "' no set!<br>";
                    echo "Value is: " . $_COOKIE[$cookie_name];
                    header("Location: inventario.php");
                } else {

                    header("Location: inventario.php");

                }

                // header("Location: inventario.php");

            } else {

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

?>

    <form action="inicio.php" method="post">
      <div class="imgcontainer">
        <img alt="Avatar" class="avatar" src="../img/144100970_1017876292074905_5821562716646159982_n.png"/>
      </div>
      <div class="container">
        <label for="uname">
          <b>
            Usuario
          </b>
        </label>
        <input name="uname" placeholder="Enter Username" required="" type="text"/>
        <label for="psw">
          <b>
            Contraseña
          </b>
        </label>
        <input name="psw" placeholder="Enter Password" required="" type="password"/>
        <button type="submit">
          Inicio
        </button>
      </div>
      <div class="container" style="background-color:#f1f1f1">
        <button class="cancelbtn" type="button">
          <a href="registro.php">
            Registrase
          </a>
        </button>
      </div>
    </form>
  </body>
</html>