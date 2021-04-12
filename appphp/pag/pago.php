<?php
if (!isset($_COOKIE["ID"])):
    header("Location: inicio.php");

    ?>
<?php else: ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <link href="../img/144100970_1017876292074905_5821562716646159982_n.png" rel="icon"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <title>
      Document
    </title>
    <style type="text/css">
      .input-group{
        margin-bottom: 25px !important;
      }
    </style>
  </head>
  <body>
    <div class="container-fluid" style="padding: 20px 10px 0px 20px;">
      <div class="row">
        <div class="col-12" style="margin-bottom: 20px;">
          <h2>
            Ingrese los datos de su tarjeta de crédito
          </h2>
        </div>
        <div class="col-6">
          <label style="display: block !important;">
            Nombre
          </label>
          <div class="input-group">
            <input aria-label="Text input with dropdown button" class="form-control" type="text"/>
          </div>
          <label style="display: block !important;">
            NUmero de la tarjeta
          </label>
          <div class="input-group">
            <input aria-label="Text input with dropdown button" class="form-control" type="text"/>
          </div>
          <label style="display: block !important;">
            Nombre
          </label>
          <div class="input-group">
            <input aria-label="Text input with dropdown button" class="form-control" type="date"/>
          </div>
          <label style="display: block !important;">
            Código de seguridad
          </label>
          <div class="input-group">
            <input aria-label="Text input with dropdown button" class="form-control" type="text"/>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
<?php endif;?>
