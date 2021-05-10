
<?php
include "coneccion.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"/>


  <title>Eliminar</title>
      <link href="../img/144100970_1017876292074905_5821562716646159982_n.png" rel="icon"/>
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="../css/carrito.css" rel="stylesheet"/>
      <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <script src="../js/jquery.min.js" type="text/javascript">
    </script>
</head>
<body style="padding: 50px;">
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
              <?php echo "Bienvenido " . $_SESSION["nombre"]; ?>
            </a>
          </li>
          <a class="btn btn-danger" href="cooke.php">
            Salir
          </a>
        </div>
      </div>
    </nav>
<?php

//  Elimina el usuario  con el id  y verifica que el tipo de
// usuario no sea administrador y lo borrará
if (isset($_GET["tipo_usuario"]) && $_GET["tipo_usuario"] !== 'admin') {

    if (isset($_GET["idusuario"])) {

        $id = $_GET["idusuario"];
        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql  = "DELETE FROM usuario WHERE idusuario=$id";
            $stmt = $conn->prepare($sql);

            $stmt->execute();
            $count = $stmt->rowCount();
            //  Respuesta
            if ($count == 1) {
                echo '<div class="w3-panel w3-pale-green w3-bottombar w3-border-green w3-border"><p>';
                echo 'El registro se elimino exitosamente';
                echo '</p></div>';
            } else {
                echo '<div class="w3-panel w3-pale-yellow w3-bottombar w3-border-yellow w3-border"><p>';
                echo 'No se ha eliminada nada en la base de datos ';
                echo '</p></div>';
            }

        } catch (PDOException $e) {

        }

        $conn = null;

    }
}

if ($_GET["tipo_usuario"] == "admin") {
    echo 'Esto es una administrador ';
}

?>

 <button class="w3-button w3-green">
<a href="ver_usuarios.php"> Regresar</a>
</button>

</body>
</html>
