<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <!-- icono dela pagina -->
    <link href="../img/144100970_1017876292074905_5821562716646159982_n.png" rel="icon"/>
    <!--bootstrap del html-->
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="../css/css.css" rel="stylesheet" type="text/css"/>
    <link href="https://www.w3schools.com/w3css/4/w3.css" rel="stylesheet"/>
    <!-- Librerías  -->
    <script src="../js/jquery.min.js" type="text/javascript">
    </script>
    <script src="../js/reporte.js" type="text/javascript">
    </script>
    <!--     <script src="js/jquery.dataTables.min.js" type="text/javascript">
    </script> -->
    <script src="../js/sweetalert.min.js" type="text/javascript">
    </script>
    <!-- -->
    <title>
      GameShark
    </title>
  </head>
  <link href="../css/inicio.css" rel="stylesheet" type="text/css"/>
  <body>
    <!--  Panel de navegación  negro  usando clases de Boostrap para dar estilo al HTML -->
    <?php include "../comp/nav.php";?>
    <?php
//Establece la conexión de la base de datos
include_once '../php/coneccion.php';
//  Verifica sis existe  una cooke  y ademas  y establece variables de inicio de sesión

?>
    <div class="container-fluid">
      <div class="">
        <div class="">
          <h3>
            Seleccione al tabla
          </h3>
          <input name="tabla" type="radio" value="usuario"/>
          <label>
            Usuarios
          </label>
          <br/>
          <input name="tabla" type="radio" value="innventario"/>
          <label>
            Inventario
          </label>
          <br/>
        </div>
        <div class="w3-light-grey" style="margin-top: 15px;">
          <div class="w3-grey" style="height:24px;width:100%">
          </div>
        </div>
      </div>
      <div class="" style="padding: 20px;">
        <div class="menu_usuarios">
          <form action="reporte_usuarios.php" method="post">
            <h3>
              Usuarios
            </h3>
            <select class="form-control" id="clasificacion" name="tipo_usuario" required="">
              <option selected="" value="0">
              </option>
              <option value="usuario">
                Usuarios
              </option>
              <option value="admin">
                Administradores
              </option>
            </select>
            <div class="w3-panel" style="padding:0">
              <div class="w3-right w3-padding">
                <input class="w3-btn w3-green" type="submit" value="Buscar resultados"/>
              </div>
            </div>
          </form>
        </div>
        <div class="menu_inventario">
          <form action="reporte_inventario.php" method="post">
            <h3>
              Selecciona el estado
            </h3>
            <input name="estado" type="radio" value="nuevo"/>
            <label>
              nuevo
            </label>
            <br/>
            <input name="estado" type="radio" value="usado"/>
            <label>
              usado
            </label>
            <br/>
            <div class="form-group">
              <label for="clasificacion">
                Clasificación:
              </label>
              <select class="form-control" id="clasificacion" name="idclasificacion" required="">
                <?php include_once '../php/clasificacion.php'?>
              </select>
            </div>
            <br/>
            <div class="form-group">
              <label for="plataforma">
                Plataforma:
              </label>
              <select class="form-control" id="plataforma" name="idplataforma" required="">
                <?php include_once '../php/plataforma.php'?>
              </select>
            </div>
            <div class="w3-panel" style="padding:0">
              <div class="w3-right w3-padding">
                <input class="w3-btn w3-green" type="submit" value="Buscar resultados"/>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <script type="text/javascript">
      reportes_fun();
    </script>
  </body>
</html>
