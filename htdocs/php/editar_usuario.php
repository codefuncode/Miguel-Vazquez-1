<?php
include "coneccion.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="UTF-8"/>

  <title>Editar</title>
  <link href="../img/144100970_1017876292074905_5821562716646159982_n.png" rel="icon"/>
  <meta content="width=device-width, initial-scale=1" name="viewport"/>
  <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
  <link href="../css/carrito.css" rel="stylesheet"/>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <script src="../js/jquery.min.js" type="text/javascript">
  </script>
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
          <li class="nav-item active">
            <a class="nav-link" href="#" style="cursor:default; color:white;">
              <!-- echo "Bienvenido " . $_SESSION["nombre"];  -->
            </a>
          </li>
          <a class="btn btn-danger" href="cooke.php">
            Salir
          </a>
        </div>
      </div>
    </nav>
    <div class="" style="padding: 10px;">
        <?php

echo $_POST['idusuario'];
echo $_POST['nombre'];
echo $_POST['usuario'];
echo $_POST['correo'];
echo $_POST['pass'];
echo $_POST['tipo_usuario'];

if ((isset($_POST['idusuario'])) &&
    (isset($_POST['nombre'])) &&
    (isset($_POST['usuario'])) &&
    (isset($_POST['correo'])) &&
    (isset($_POST['pass'])) &&
    (isset($_POST['tipo_usuario']))) {
    // Recupera  los valores y hace update de los campos
    try {

        $idusuario    = $_POST['idusuario'];
        $nombre       = $_POST['nombre'];
        $usuario      = $_POST['usuario'];
        $correo       = $_POST['correo'];
        $pass         = $_POST['pass'];
        $tipo_usuario = $_POST['tipo_usuario'];

        // $idclasificacion = intval($_POST['idclasificacion']);
        // $idplataforma    = intval($_POST['idplataforma']);
        // $cantidad        = intval($_POST['cantidad']);
        // $precio          = bcadd($_POST['precio'], '0', 2);

        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "UPDATE usuario
                SET nombre = :nombre  ,
                usuario = :usuario ,
                correo = :correo ,
                pass = :pass ,
                tipo_usuario = :tipo_usuario
                WHERE idusuario= :idusuario ";

        $stmt = $conn->prepare($sql);
        //  Consulta preparada exige parámetros  con la funcion "bindParam"
        $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
        $stmt->bindParam(':usuario', $usuario, PDO::PARAM_STR);
        $stmt->bindParam(':correo', $correo, PDO::PARAM_STR);
        $stmt->bindParam(':pass', $pass, PDO::PARAM_STR);
        $stmt->bindParam(':tipo_usuario', $tipo_usuario, PDO::PARAM_STR);
        $stmt->bindParam(':idusuario', $idusuario, PDO::PARAM_INT);

        $stmt->execute();

        // cantidad
        // estado
        // fecha
        // idclasificacion
        // idjuego
        // idplataforma
        // nombre
        // precio

        $count = $stmt->rowCount();
        // Respuesta si se modifico o no el registro
        if ($count == 1) {
            echo '<a href="../pag/inventario.php" class="w3-button w3-green">Regresar</a><div class="w3-panel w3-pale-green w3-bottombar w3-border-green w3-border w3-padding-large""><p>';
            echo 'El registro actualizado';
            echo '</p>
            </div>';
        } else {
            echo '<a href="../pag/inventario.php" class="w3-button w3-red">Regresar</a>
            <div class="w3-panel w3-pale-yellow w3-bottombar w3-border-yellow w3-border w3-padding-large"><p>';
            echo 'No se ha modificado ningún registro en la base de datos ';
            echo '</p>
           </div>';
        }

    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }

    $conn = null;
}

?>

    </div>

</body>
</html>

