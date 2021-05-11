<?php
include "../php/check_cooke.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <title>
      Carrito de compras
    </title>
    <link href="../img/144100970_1017876292074905_5821562716646159982_n.png" rel="icon"/>
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="https://www.w3schools.com/w3css/4/w3.css" rel="stylesheet"/>
    <link href="../css/carrito.css" rel="stylesheet"/>
    <script src="../js/jquery.min.js" type="text/javascript">
    </script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js">
    </script>
  </head>
  <body>
    <?php include "../comp/nav.php";?>
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
              <!--  
                Instrucciones encargadas de conectar y construir una tabla con los datos almacenados en el servidor.  
                -->
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
                  <!--
                    Formulario  encargado  recopilar y  los datos de las selecciones del usuario. Estas selecciones son los juegos que desea comprar. Los mismos son generados con JavaScript  de manera dinámica.
                    No los vemos aquí, pero se generarán a medida que el usuario interactúa con la interfaz
                    -->
                  <form action="../php/comprar.php" id="form_carrito" method="post">
                    <!-- <form> -->
                    <input class="carritobtn continue w3-button w3-green w3-round-xxlarge w3-padding-large" id="carritobtn" type="submit" value="Comprar Ahora"/>
                    <div class="datos_hide">
                    </div>
                  </form>
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
