


<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <!-- icono dela pagina -->
    <link href="../img/144100970_1017876292074905_5821562716646159982_n.png" rel="icon"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <!-- <link href="../css/css.css" rel="stylesheet" type="text/css"/> -->
    <link href="../css/registro.css" rel="stylesheet" type="text/css">
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
    </link>
  </head>
  <body>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="#">
            GameShark
          </a>
        </li>
      </ul>
    </nav>
    <form action="registro.php" method="post">

<?php

include_once '../php/coneccion.php';

if ((isset($_POST['nombre'])) && ($_POST['nombre'] != "") &&
    (isset($_POST['usuario'])) && ($_POST['usuario'] != "") &&
    (isset($_POST['mail'])) && ($_POST['mail'] != "") &&
    (isset($_POST['pass'])) && ($_POST['pass'] != "")) {

    $nombre  = $_POST['nombre'];
    $usuario = $_POST['usuario'];
    $mail    = $_POST['mail'];
    $pass    = $_POST['pass'];

//condicional en el cual verifica si el nombre de usuario o el correo ya existe dentro de la base de datos.
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = $conn->prepare("SELECT * FROM usuario WHERE correo= '$mail' OR usuario= '$usuario'");
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

            header("Location: inicio.php");

        }


    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $conn = null;

} else {

}

?>

      <div class="container">
        <h1>
          Registrarse
        </h1>
        <p>
          Complete este formulario para crear una cuenta.
        </p>
        <hr/>
        <label for="nombre">
          <b>
            Nombre real
          </b>
        </label>
        <input id="nombre" name="nombre" placeholder="Escribe tu nombre" type="text"/>
        <!-- ========================= -->
        <label for="usuario">
          <b>
            Nombre de usuario
          </b>
        </label>
        <input id="usuario" name="usuario" placeholder="Escribe tu nombre de usuario" required="" type="text"/>
        <label for="mail">
          <b>
            Coreo electrónico
          </b>
        </label>
        <input id="mail" name="mail" placeholder="Escribe tu coreo electronico" required="" type="text"/>
        <label for="pass">
          <b>
            Contraseña
          </b>
        </label>
        <input id="pass" name="pass" placeholder="Escribe tu Contraseña" required="" maxlength="49" type="password"/>
        <hr/>
        <button class="registerbtn" type="submit">
          Registrarme
        </button>
      </div>
    </form>
    <div class="container signin">
      <p>
        Ya tienes cuenta?
        <!--Redirijira al usuario al inicio o "Login"-->
        <a href="../pag/inicio.php">
          Inicio
        </a>
        .
      </p>
    </div>
    <script src="../js/registro.js" type="text/javascript">
    </script>
  </body>
</html>
