<?php
include_once '../php/coneccion.php';
// include_once '../php/checkinicio.php';

?>
<?php if (!isset($_COOKIE["ID"])): ?>
<?php header("Location: inicio.php");?>
<?php else: ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
      <title>
        Carrito de compras
      </title>
      <!--    <script src="modernizr.min.js" type="text/javascript">
      </script> -->
      <link href="../img/144100970_1017876292074905_5821562716646159982_n.png" rel="icon"/>
      <meta content="width=device-width, initial-scale=1" name="viewport"/>
      <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
      <link href="../css/carrito.css" rel="stylesheet"/>
      <link href="https://www.w3schools.com/w3css/4/w3.css" rel="stylesheet"/>
        <script src="../js/jquery.min.js" type="text/javascript">
        </script>
<style type="text/css">

  @media screen and (max-width: 600px) {
    .myclassnone {
        display:  none !important;
    }
}
</style>
    </meta>
  </head>
  <body>
    <!-- partial:index.partial.html -->
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
          <a class="" href="../php/cooke.php" style="margin-right: 20px;">
            <img alt="" src="../img/PikPng.com_quote-symbol-png_3667953.png" style="width: 40px; height: 35px;"/>
          </a>
          <a class="btn btn-danger" href="../php/cooke.php">
            Salir
          </a>
        </div>
      </div>
    </nav>
    <div class="w3-sidebar w3-bar-block w3-border-right" id="mySidebar" style="display:none; width:90%;">
      <button class="w3-bar-item w3-large" onclick="w3_close()">
        Close ×
      </button>
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <table class="table table-dark table-striped display table-responsive" id="example" style="font-size: 10px!important;">
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
                <?php include '../php/datostabla.php';?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <!--   <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius explicabo, vel perspiciatis debitis eligendi optio vitae delectus, consectetur nisi? Beatae unde placeat, amet autem rem fugiat consectetur totam corrupti commodi!</p> -->
    </div>
    <!-- Page Content -->
    <div class="">
      <button class="w3-button w3-xlarge d-lg-none d-sm-block" onclick="w3_open()">
        ☰
      </button>
      <div class="container-fluid">
        <div class="row">
          <div class="div">
          </div>
          <!-- <div class="col-7 pt-5 d-sm-none">    -->
          <!-- <div class="col-lg-9 d-sm-none d-lg-block"> -->
          <div class="col-lg-9 d-sm-none pt-5 d-lg-block myclassnone">
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
                <?php include '../php/datostabla.php';?>
              </tbody>
            </table>
          </div>
          <!-- <div class="col-5 col-sm-12"> -->
          <!-- <div class="col-lg-3 col-sm-12"> -->
          <!-- <div class="col-sm-12"> -->
          <div class="col-lg-3 col-sm-12">
            <div class="wrap cf">
              <div class="heading cf">
                <h1>
                  My Cart
                </h1>
                <a class="continue" href="#">
                  Continue Shopping
                </a>
              </div>
              <div class="cart">
                <ul class="cartWrap" id="cartWrap">
                  <li class="items">
                    <div class="infoWrap">
                      <div class="cartSection">
                        <img alt="" class="itemImg" src="../img/technics-q-c-300-300-4.jpg"/>
                        <h3>
                          Item Name 1
                        </h3>
                        <p>
                          <input class="qty" placeholder="3" style="width: 50px" type="text"/>
                          x $5.00
                        </p>
                        <p class="stockStatus">
                          In Stock
                        </p>
                      </div>
                      <div class="prodTotal cartSection">
                        <p>
                          $15.00
                        </p>
                      </div>
                      <div class="cartSection removeWrap">
                        <!--  se debe agregar con javascript para que funcione -->
                        <a class="remove" href="#">
                          x
                        </a>
                      </div>
                    </div>
                  </li>
                </ul>
              </div>
              <div class="promoCode">
              </div>
              <div class="subtotal cf">
                <ul>
                  <li class="totalRow">
                    <span class="label">
                      Subtotal
                    </span>
                    <span class="value">
                      $35.00
                    </span>
                  </li>
                  <li class="totalRow">
                    <span class="label">
                      Impuestos
                    </span>
                    <input id="taxes" style="text-align: right;  font-size: 1.2em; width: 30%; margin-left: 5px;" type="text"/>
                  </li>
                  <li class="totalRow final">
                    <span class="label">
                      Total
                    </span>
                    <span class="value">
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
    </div>
    <script src="../js/carrito.js">
    </script>
    <script>
      function w3_open() {
  document.getElementById("mySidebar").style.display = "block";
}

function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
}
    </script>
  </body>
</html>
<?php endif;?>
