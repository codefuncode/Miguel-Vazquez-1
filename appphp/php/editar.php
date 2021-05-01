<?php
include "coneccion.php";
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <title>
      editar
    </title>
    <link href="../img/144100970_1017876292074905_5821562716646159982_n.png" rel="icon"/>
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="../css/carrito.css" rel="stylesheet"/>
      <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <script src="../js/jquery.min.js" type="text/javascript">
    </script>
    <style type="text/css">
           .botones_ver-usuarios > div{
        margin-bottom: 10px;
      }
    </style>
  </head>
  <body>
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
      <div class="container-fluid">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="#">
              GameShark
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../pag/inventario.php">
              Inventario
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../pag/carrito.php">
              Carrito
            </a>
          </li>
        </ul>
        <div class="d-flex">
          <a class="btn btn-danger" href="cooke.php">
            Salir
          </a>
        </div>
      </div>
    </nav>
<div class="" style="padding: 50px;">

</div>
      <form  action="editar_exe.php" method="get">
    <div class="col-4 botones_ver-usuarios">
      <?php

if (isset($_GET["idusuario"])) {
    try {
        //  Se recibe el id del usuario para editar todos sus campos
        $id = $_GET["idusuario"];
        // echo $id;
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("SELECT * FROM  usuario WHERE idusuario= :idusuario");
        $stmt->bindParam(':idusuario', $id, PDO::PARAM_INT);
        $stmt->execute();
        //  Construye el formulario de edición  para los datos de los usuarios
        while ($data = $stmt->fetch(PDO::FETCH_ASSOC)) {

            $idusuario    = $data['idusuario'];
            $nombre       = $data['nombre'];
            $usuario      = $data['usuario'];
            $correo       = $data['correo'];
            $pass         = $data['pass'];
            $tipo_usuario = $data['tipo_usuario'];

            echo "<div class='input-group flex-nowrap'>";
            echo '<label>nombre </label>';
            echo "<input name='nombre' aria-describedby='addon-wrapping' aria-label='Username' class='form-control' placeholder='Nombre' type='text' value='$nombre'/>";

            echo "</div>";
            echo "<div class='input-group flex-nowrap'>";
            echo '<label>usuario </label>';
            echo " <input name='usuario' aria-describedby='addon-wrapping' aria-label='Username' class='form-control' placeholder='Nombre' type='text' value='$usuario'/>";

            echo "</div>";
            echo "<div class='input-group flex-nowrap'>";
            echo '<label>correo </label>';
            echo " <input name='correo' aria-describedby='addon-wrapping' aria-label='Username' class='form-control' placeholder='Nombre' type='text' value='$correo'/>";

            echo "</div>";
            echo "<div class='input-group flex-nowrap'>";
            echo '<label>pass </label>';
            echo " <input name='pass' aria-describedby='addon-wrapping' aria-label='Username' class='form-control' placeholder='Nombre' type='text' value='$pass'/>";

            echo " </div>";
            echo "<div class='input-group flex-nowrap'>";
            echo '<label>tipo_usuario </label>';
            echo " <input name='tipo_usuario' aria-describedby='addon-wrapping' aria-label='Username' class='form-control' placeholder='Nombre' type='text' value='$tipo_usuario'/>";
            echo "<input type='hidden'name='idusuario'value='$idusuario'/>";
            echo " </div>";
        }

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $conn = null;
}

?>
<br/>
    <input type="submit" class="w3-button w3-green" value="Guardar" >
    </div>
</form>

  </body>
</html>
