<!DOCTYPE html>
<html lang="en">
<?php include_once '../comp/heder.php';?>

  <body>
    <!--  Panel de navegación  negro  usando clases de Boostrap para dar estilo al HTML -->
  <?php include_once 'comp/nav.php';?>
  <div class="container-fluid mb-5 pb-5">
      <div class="row mt-5 ">
        <div class="col-3">
          <div class="row">
            <div class="col-12 pb-1">
              <div class="form-group">
                <label for="nombre">
                  Nombre del Juego:
                </label>
                <!--  Elemento de entrada de texto input  -->
                <input class="form-control" id="nombre" name="nombre" type="text"/>
              </div>
            </div>
            <div class="col-12 pb-4 pt-3">
              <label>
                Estado del Juego:
              </label>
              <br/>
              <!--  Dos elementos input radio para seleccionar opción nuevo o usado  -->
              <div class="form-check-inline">
                <label class="form-check-label">
                  <input class="form-check-input" id="estado1" name="estado" type="radio" value="nuevo"/>
                  Nuevo
                </label>
              </div>
              <div class="form-check-inline">
                <label class="form-check-label">
                  <input class="form-check-input" id="estado2" name="estado" type="radio" value="usado"/>
                  Usado
                </label>
              </div>
            </div>
            <div class="col-12 pb-1">
              <!--  Elemento  select para  que el usuario enliga la clasificación del producto -->
              <div class="form-group">
                <label for="clasificacion">
                  Clasificación:
                </label>
                <select class="form-control" id="clasificacion" name="clasificacion">
                </select>
              </div>
            </div>
            <div class="col-12 pb-4">
              <!--  Elemento input para  la fecha  -->
              <label for="fecha">
                Fecha de lanzamiento:
              </label>
              <input class="form-control" id="fecha" name="fecha" type="date"/>
            </div>
            <div class="col-12 pb-1">
              <!--  Elemento select para que el usuario pueda seleccionar la plataforma donde corre el juego  -->
              <div class="form-group">
                <label for="plataforma">
                  Plataforma:
                </label>
                <select class="form-control" id="plataforma" name="plataforma">
                </select>
              </div>
            </div>
            <!--  Elemento input para que el usuario entre la cantidad de juegos  -->
            <div class="col-12 pb-3">
              <label for="cantidad">
                Cantidad de artículos:
              </label>
              <input class="form-control" id="cantidad" max="99" min="1" name="cantidad" type="number"/>
            </div>
            <!--  Elemento para registrar el precio por unidad del producto -->
            <div class="col-12 pb-4">
              <label for="precio">
                Precio por unidad:
              </label>
              <input class="form-control" id="precio" max="300" min="1" name="precio" step=".01" type="number"/>
            </div>
            <div class="col-12">
              <button class="btn btn-success" id="guardar" style="width: 100%;" type="button">
                Guardar
              </button>
            </div>
          </div>
        </div>
        <div class="col-9">
          <div class="row">
            <div class="col-12">
              <div class="container">
                <h2>
                  Artículos en almacén
                </h2>
                <p>
                  Vídeo juegos disponibles en la tienda:
                </p>
                <!--  BOtones de accion para la tabla -->
                <div class="row">
                  <div class="col-12 pb-4">
                    <button class="btn btn-success" type="button">
                      Guardar
                    </button>
                    <button class="btn btn-warning" type="button">
                      Editar
                    </button>
                    <button class="btn btn-danger" type="button">
                      Borrar
                    </button>
                  </div>
                  <div class="col-12">
                  </div>
                </div>
                <table class="table table-dark table-striped display" id="example">
                  <!-- <table class="table  table-striped"> -->
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
            <!--       <tfoot>
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
                  </tfoot> -->
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script src="../js/funciones.js" type="text/javascript">
    </script>
    <script src="../js/js.js" type="text/javascript">
    </script>
  </body>
</html>
