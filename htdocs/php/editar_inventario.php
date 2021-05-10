

<!-- En proseso TODO -->

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
      <form  action="editar_exe.php" method="post">
    <div class="col-4 botones_ver-usuarios">
      <?php

if (isset($_POST["id_inventario"])) {

    $id_inventario = $_POST["id_inventario"];

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // $sql =
        //     "SELECT inventario.idjuego,
        //     inventario.cantidad,
        //     inventario.estado,
        //     inventario.nombre as nombre_inventario,
        //     inventario.precio,
        //     clasificacion.nombre as nombre_clasificacion,
        //     plataforma.nombre as nombre_plataforma
        //     FROM inventario , clasificacion , plataforma
        //     WHERE clasificacion.idclasificacion = $idclasificacion
        //     AND inventario.estado = '$estado'
        //     AND plataforma.idplataforma = $idplataforma
        //     group by inventario.idjuego";

        $sql =
            "SELECT inventario.idjuego,
            inventario.cantidad,
            inventario.estado,
            inventario.fecha,
            inventario.nombre as nombre_inventario,
            inventario.precio,
            clasificacion.idclasificacion,
            clasificacion.nombre as nombre_clasificacion,
            plataforma.idplataforma,
            plataforma.nombre as nombre_plataforma
            FROM inventario , clasificacion , plataforma
            WHERE inventario.idjuego = :id_inventario
            AND inventario.idclasificacion=clasificacion.idclasificacion
            AND inventario.idplataforma=plataforma.idplataforma";

        $stmt = $conn->prepare($sql);

        $stmt->bindParam(":id_inventario", $id_inventario, PDO::PARAM_INT);

        $stmt->execute();

        //  Construye el formulario de edición  para los datos de los usuarios
        while ($data = $stmt->fetch(PDO::FETCH_ASSOC)) {

            $nombre_inventario    = $data['nombre_inventario'];
            $nombre_clasificacion = $data['nombre_clasificacion'];
            $idclasificacion      = $data['idclasificacion'];
            $nombre_plataforma    = $data['nombre_plataforma'];
            $idplataforma         = $data['idplataforma'];
            $idjuego              = $data['idjuego'];
            $cantidad             = $data['cantidad'];
            $estado               = $data['estado'];
            $precio               = $data['precio'];
            $fecha                = $data['fecha'];
            $nuevo                = "";
            $usado                = "";
            if ($estado == "nuevo") {
                $nuevo = "checked";
                $usado = "";
            } else if ($estado == "usado") {
                $nuevo = "";
                $usado = "checked";
            }
            // =============================================================
            echo "<div class='input-group flex-nowrap'>";
            echo "<label for='nombre_inventario'>
            Nombre:
            </label>";
            echo "
            <input name='nombre_inventario'
            aria-describedby='addon-wrapping'
            class='form-control'
            placeholder='Nombre del juego'
            type='text' value='$nombre_inventario'/>";
            echo "</div>";

            echo "<div>";
            echo "
            <input type='radio'  name='estado' value='nuevo' $nuevo>
            <label >Nuevo</label><br>";

            echo "
            <input type='radio'  name='estado' value='usado' $usado>
            <label >Usado</label><br>";
            echo '</div>';

            // =============================================================
            echo '<hr/>';
            echo "<div class='input-group flex-nowrap'>";
            echo "<p> Nombre actual de la clasificacion: $nombre_clasificacion</p>";
            echo "</div>";

            // =====================
            //  Trataminto TODO
            echo "
            <div class='form-group'>
            <label for='clasificacion'>
            Selecciona una nueva clasificación:
            </label><br/>
            <select class='form-control'
            id='clasificacion'
            name='idclasificacion'required=''>";
            // ------
            include 'clasificacion.php';
            // ------
            echo "</select></div>";
            // =====================
            echo '<hr/>';

            // ===========================

            echo "
            <p>Fecha</p>
            <input type='date' id='fecha' name='fecha' value='$fecha'>";
            echo '<hr/>';
            // ===========================

            echo "<div class='input-group flex-nowrap' style='margin-top:10px;'>";
            echo "<p> Nombre actual de la plataforma: $nombre_plataforma</p>";
            echo "</div>";

            // =====================
            //  Trataminto TODO
            echo "
            <div class='form-group'>
            <label for='clasificacion'>
            Selecciona una nueva plataforma:
            </label><br/>
            <select class='form-control'
            id='plataforma'
            name='idplataforma' required=''>";
            // ------
            include 'plataforma.php';
            // ------
            echo "</select></div>";
            // =====================

            echo '<hr/>';

            echo "<div class='form-group'>";
            echo "<label >Cantidad de articulos:</label>";
            echo "<input class='form-control' id='cantidad' max='99' min='0' name='cantidad' required='' step='1' type='number'value='$cantidad' />";

            echo "</div>";
            echo '<hr/>';

            echo "<div class='form-group'>";
            echo "<label >Precio por unidad:</label>";
            echo "<input value='$precio' class='form-control' id='precio' max='300' min='1' name='precio' required='' step='.01' type='number'/>";
            echo "</div>";

        }

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $conn = null;
}
echo "<input type='hidden'  name='idjuego' value='$idjuego'>";
?>
<br/>
    <input type="submit" class="w3-button w3-green" value="Guardar" >
    </div>
</form>

  </body>
</html>

   <!--  <div class="form-group">
                  <label for="plataforma">
                    Plataforma:
                  </label><br/>
                  <select class="form-control" id="plataforma" name="idplataforma" required="">
                    <?php //include_once '../php/plataforma.php'?>
                  </select>
                </div>
 -->
