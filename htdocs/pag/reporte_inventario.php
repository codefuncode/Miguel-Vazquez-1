<?php
include "../php/check_cooke.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <link href="https://www.w3schools.com/w3css/4/w3.css" rel="stylesheet"/>
    <link href="../img/144100970_1017876292074905_5821562716646159982_n.png" rel="icon"/>
    <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="../css/css.css" rel="stylesheet" type="text/css"/>
    <link href="../css/print_reporte.css" media="print" rel="stylesheet" type="text/css"/>
    <style type="text/css">
      .reporte_tabla_contenedor {
    padding: 30px 200px 10px 200px;
}
    </style>
    <title>
      Document
    </title>
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
            <a class="nav-link" href="inventario.php">
              Inventario
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="carrito.php">
              Carrito
            </a>
          </li>
          <?php if ($_SESSION["tipo"] == "admin"): ?>
          <li class="nav-item active">
            <a class="nav-link" href="../php/ver_usuarios.php" style="cursor:default; color:white;">
              Administrar usuarios
            </a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="reporte.php" style="cursor:default; color:white;">
              Reportes
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
          <a class="btn btn-danger" href="../php/cooke.php">
            Salir
          </a>
        </div>
      </div>
    </nav>
    <div class="" style="padding-top: 10px;">
      <div class="w3-container w3-center">
        <button class="w3-btn w3-black recibo_btn_print" onclick="window.print()">
          <i class="fa fa-print">
          </i>
          Imprimir
        </button>
      </div>
    </div>
    <div class="reporte_tabla_contenedor" id="reporte_tabla_contenedor">
      <?php include "../php/reporte_inventerio_script.php";?>
    </div>
  </body>
</html>
