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
      </li> <li class="nav-item active">
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
