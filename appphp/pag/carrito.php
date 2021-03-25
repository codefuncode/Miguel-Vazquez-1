<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include_once '../php/coneccion.php';?>
    <?php if (!isset($_COOKIE["ID"])): ?>
    <?php header("Location: inicio.php");?>
    <?php else: ?>
    <meta charset="utf-8"/>
    <title>
      Carrito de compras
    </title>
    <link href="../img/144100970_1017876292074905_5821562716646159982_n.png" rel="icon"/>
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="../css/carrito.css" rel="stylesheet"/>
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
            <a class="nav-link" href="inventario.php">
              Inventario
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="carrito.php">
              Carrito
            </a>
          </li>
        </ul>
        <div class="d-flex">
          <a class="btn btn-danger" href="../php/cooke.php">
            Salir
          </a>
        </div>
      </div>
    </nav>
    <div class="container-fluid">
      <div class="row">
        <div class="div">
        </div>
        <div class="col-7 pt-5 ">
          <table class="table table-dark table-striped display table-responsive" id="example" style="font-size: 12px!important;">
            <thead>
              <tr>
                <th>
                  Nombre
                </th>
                <th>
                  Estado
                </th>
                <th>
                  Clasificación
                </th>
                <th>
                  Fecha de lanzamiento
                </th>
                <th>
                  Plataforma
                </th>
                <th>
                  Cantidad  disponible
                </th>
                <th>
                  Precio por unidad
                </th>
              </tr>
            </thead>
            <tbody id="displaydatos">
              <?php include_once '../php/datostabla.php';?>
            </tbody>
          </table>
        </div>
        <div class="col-5">
          <div class="wrap cf">
            <div class="heading cf">
              <h1>
                Carrito de compras
              </h1>
            </div>
            <div class="cart">
              <ul class="cartWrap" id="cartWrap">
              </ul>
            </div>
            <div class="subtotal cf">
              <ul>
                <li class="totalRow">
                  <span class="label ">
                    Subtotal
                  </span>
                  <span class="value subtotalvalue">
                    $35.00
                  </span>
                </li>
                <li class="totalRow">
                  <span class="label">
                    Impuestos
                    <span style="font-size: 17px; font-weight: bold;">
                      %
                    </span>
                  </span>
                  <input id="taxes" style="text-align: right;  font-size: 1.2em; width: 30%; margin-left: 5px;" type="text"/>
                </li>
                <li class="totalRow final">
                  <span class="label">
                    Total
                  </span>
                  <span class="value total">
                    $44.00
                  </span>
                </li>
                <li class="totalRow">
                  <a class="carritobtn continue" href="#">
                    Comprar ahora
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="../js/carrito.js">
    </script>
  </body>
</html>
<?php endif;?>
