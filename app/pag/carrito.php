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
      <script src="../js/jquery.min.js" type="text/javascript">
      </script>
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
            <a class="nav-link" href="#">
              inventario
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              Link
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
    <div class="container-fluid">
      <div class="row">
        <div class="col-7 pt-5">
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
            </tbody>
          </table>
        </div>
        <div class="col-5">
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
                      <!--   <p class="itemNumber">
                        #QUE-007544-002
                      </p> -->
                      <h3>
                        Item Name 1
                      </h3>
                      <p>
                        <input class="qty" placeholder="3" type="text" style="width: 50px" />
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
                      <a class="remove" href="#">
                        x
                      </a>
                    </div>
                  </div>
                </li>
                <!--    <li class="items ">
                  <div class="infoWrap">
                    <div class="cartSection">
                      <img alt="" class="itemImg" src="technics-q-c-300-300-4.jpg"/>
                      <p class="itemNumber">
                        #QUE-007544-002
                      </p>
                      <h3>
                        Item Name 1
                      </h3>
                      <p>
                        <input class="qty" placeholder="3" type="text"/>
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
                      <a class="remove" href="#">
                        x
                      </a>
                    </div>
                  </div>
                </li>
                <li class="items">
                  <div class="infoWrap">
                    <div class="cartSection">
                      <img alt="" class="itemImg" src="technics-q-c-300-300-4.jpg"/>
                      <p class="itemNumber">
                        #QUE-007544-002
                      </p>
                      <h3>
                        Item Name 1
                      </h3>
                      <p>
                        <input class="qty" placeholder="3" type="text"/>
                        x $5.00
                      </p>
                      <p class="stockStatus out">
                        Out of Stock
                      </p>
                    </div>
                    <div class="prodTotal cartSection">
                      <p>
                        $15.00
                      </p>
                    </div>
                    <div class="cartSection removeWrap">
                      <a class="remove" href="#">
                        x
                      </a>
                    </div>
                  </div>
                </li>
                <li class="items ">
                  <div class="infoWrap">
                    <div class="cartSection info">
                      <img alt="" class="itemImg" src="technics-q-c-300-300-4.jpg"/>
                      <p class="itemNumber">
                        #QUE-007544-002
                      </p>
                      <h3>
                        Item Name 1
                      </h3>
                      <p>
                        <input class="qty" placeholder="3" type="text"/>
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
                      <a class="remove" href="#">
                        x
                      </a>
                    </div>
                  </div>
                  <div class="special">
                    <div class="specialContent">
                      Free gift with purchase!, gift wrap, etc!!
                    </div>
                  </div>
                </li> -->
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
    <script src="../js/carrito.js">
    </script>
  </body>
</html>
