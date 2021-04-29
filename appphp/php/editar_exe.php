<?php
include "coneccion.php";
?>
<!DOCTYPE html>
<html lang="en">
	<head>
	<meta charset="UTF-8"/>

	<title>Document</title>
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

if (isset($_GET['idusuario'])) {

    try {

        $idusuario    = $_GET["idusuario"];
        $nombre       = $_GET['nombre'];
        $usuario      = $_GET['usuario'];
        $correo       = $_GET['correo'];
        $pass         = $_GET['pass'];
        $tipo_usuario = $_GET['tipo_usuario'];

        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "UPDATE usuario SET nombre= :nombre  , usuario= :usuario , correo= :correo , pass= :pass , tipo_usuario= :tipo_usuario WHERE idusuario= :idusuario ";

        // UPDATE `usuario` SET `usuario` = 'pepito25', `pass` = 'pepitopass' WHERE `usuario`.`idusuario` = 1
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':idusuario', $idusuario, PDO::PARAM_INT);
        $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
        $stmt->bindParam(':usuario', $usuario, PDO::PARAM_STR);
        $stmt->bindParam(':correo', $correo, PDO::PARAM_STR);
        $stmt->bindParam(':pass', $pass, PDO::PARAM_STR);
        $stmt->bindParam(':tipo_usuario', $tipo_usuario, PDO::PARAM_STR);

        $stmt->execute();

        $count = $stmt->rowCount();

        if ($count == 1) {
            echo '<div class="w3-panel w3-pale-green w3-bottombar w3-border-green w3-border"><p>';
            echo 'El registroactualizado';
            echo '</p></div>';
        } else {
            echo '<div class="w3-panel w3-pale-yellow w3-bottombar w3-border-yellow w3-border"><p>';
            echo 'No se ha modificado ningun registro en la base de datos ';
            echo '</p></div>';
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

