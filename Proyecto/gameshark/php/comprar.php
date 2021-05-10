<?php

if (!isset($_COOKIE["ID"])) {

    header("Location: ../pag/inicio.php");

} else {
    session_start();

    include_once 'coneccion.php';
}

// include "funciones.php";
$videojuegos_id  = [];
$videojuegos_qty = [];
$indice          = 0;

// =================================================================
//  https://www.w3schools.com/php/php_arrays_sort.asp
//  REcompilamos los datos de los input ocultos generados con javascript  por la funcion "datos_compra" ubicada en el fichero carrito.js en la línea  340 espesificamente valores declarados en la línea 364
foreach ($_POST["arraydatos"] as $value) {

    $matriz                   = json_decode($value, true);
    $videojuegos_id[$indice]  = $matriz['idjuego'];
    $videojuegos_qty[$indice] = $matriz['qty'];
    $indice++;
    actualizar_cantidad($matriz['idjuego'], $matriz['qty']);

}
function actualizar_cantidad($id, $cantidad)
{
    include 'coneccion.php';

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare("SELECT cantidad FROM inventario WHERE idjuego = $id");

        $stmt->execute();
        $result = $stmt->fetchAll();
        if ($result[0]['cantidad'] > 0) {
            $nueva_cantidad = $result[0]['cantidad'] - $cantidad;
        } else {
            $nueva_cantidad = 0;
        }

        $stmt->closeCursor();
        $stmt2 = $conn->prepare("UPDATE inventario SET cantidad = $nueva_cantidad WHERE idjuego = $id");
        $stmt2->execute();

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $conn = null;
}
// =================================================================
// **************************************************************
//  Uso  DE  WHERE IN
//  SELECT * FROM `members` WHERE `membership_number` IN (1,2,3);
// **************************************************************
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <link href="../img/144100970_1017876292074905_5821562716646159982_n.png" rel="icon"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <link href="https://www.w3schools.com/w3css/4/w3.css" rel="stylesheet"/>
    <script type="text/javascript" src="../js/comprar.js"></script>
     <link href="../css/resibo.css" rel="stylesheet" type="text/css"/>
     <link href="../css/print.css" rel="stylesheet" media="print" type="text/css" />
     <style type="text/css">

     </style>
    <title>
      Comprar
    </title>
    <style type="text/css">
      .input-group{
        margin-bottom: 25px !important;
      }
      .borde{

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
      <?php if ($_SESSION["tipo"] == "admin"): ?>
      <li class="nav-item active">
        <a class="nav-link" href="ver_usuarios.php" style="cursor:default; color:white;">
          Administrar usuarios
        </a>
      </li>
      <?php else: ?>
      <?php endif;?>
    </ul>
    <div class="d-flex">
      <?php if ($_SESSION["tipo"]): ?>
      <li class="nav-item active">
        <a class="nav-link" href="#" style="cursor:default; color:white;">
          <?php echo "Bienvenido " . $_SESSION["nombre"]; ?>
        </a>
      </li>
      <?php else: ?>
      <?php endif;?>
      <a class="btn btn-danger" href="cooke.php">
        Salir
      </a>
    </div>
  </div>
</nav>
<?php include "../pag/pago.php";?>

<?php include "../pag/resibo.php";?>


  </body>
  <script type="text/javascript">
 comprar_seccion();
  </script>
</html>
