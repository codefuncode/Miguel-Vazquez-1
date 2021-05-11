<?php session_start();?>
<!DOCTYPE html>
<html lang="es">
  <head>
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
    <style type="text/css">
      .table thead{
        background-color: #343A40;
        color: white;
      }
      .botones_ver-usuarios > div{
        margin-bottom: 20px;
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
            <a class="nav-link" href="../php/ver_usuarios.php" style="cursor:default; color:white;">
              Administrar usuarios
            </a>
          </li>
            </li> <li class="nav-item active">
        <a class="nav-link" href="../pag/reporte.php" style="cursor:default; color:white;">
          Reportes
        </a>
      </li>
          <?php else: ?>
          <?php endif;?>
        </ul>
        <div class="d-flex">
          <li class="nav-item active">
            <a class="nav-link" href="#" style="cursor:default; color:white;">
              <?php echo "Bienvenido " . $_SESSION["nombre"]; ?>
            </a>
          </li>
          <a class="btn btn-danger" href="../php/cooke.php">
            Salir
          </a>
        </div>
      </div>
    </nav>
    <div class="container-fluid" style="margin-top: 20px;">
      <div class="row">
        <div class="col-12">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">
                  nombre
                </th>
                <th scope="col">
                  usuario
                </th>
                <th scope="col">
                  correo
                </th>
                <th scope="col">
                  pass
                </th>
                <th scope="col">
                  tipo_usuario
                </th>
                <th colspan="2" scope="col">
                </th>
              </tr>
            </thead>
            <tbody>
              <!-- ====================================== -->
              <!--
                Sección incluye el fichero encargado de mostrar todos los usuarios y adicionalmente se le agregó botones para edición y eliminación de artículos.
               -->
              <?php include "todos_los_usuarios.php"?>
              <!-- ====================================== -->
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <script src="../js/fun_ver_usuarios.js" type="text/javascript">
    </script>
  </body>
</html>
