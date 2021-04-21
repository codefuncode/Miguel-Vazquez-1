<!-- ==================================================================== -->
<!--  Id se emplea para jugar con las secciones datos de la tarjeta
  y  esta misma sección  -->
<!-- ==================================================================== -->
<div id="seccion_resibo" style="margin-top: 100px; margin-bottom: 100px;">
  <div class="w3-container w3-center resibo">
    <div class="">
      <div class="w3-container cabecera borde">
        <div class="">
          <div class="" style="display: inline-block; width: 45%; float: left;">
            <img alt="" src="../img/144100970_1017876292074905_5821562716646159982_n.png" style="width: 70px; height: 70px; border-radius: 50px; float: left;"/>
            <h2 style="text-align: left; margin-top: 15px; padding-top: 10px; font-size: 50px;">
              GameShark
            </h2>
          </div>
          <div class="" style="display: inline-block; width: 45%; float: right; ">
            <div class="zona_fecha borde" style="text-align: left; padding: 10px;">
              <span>
                Fecho:
                <span>
                  12/10/20221
                </span>
              </span>
              <br/>
              <span>
                hora:
                <span>
                  3:00pm
                </span>
              </span>
            </div>
          </div>
        </div>
        <div class="" style="clear: both;text-align: left; padding-top: 20px;">
          <p style="border-bottom: 1px solid gray;">
            Vendido a:
            <span>
              xxxx
            </span>
          </p>
          <p style="border-bottom: 1px solid gray;">
            Email:
            <span>
              xxxx
            </span>
          </p>
          <p>
          </p>
        </div>
      </div>
      <div class="w3-container cuerpo borde">
        <div class="">
          <table style="width:100%">
            <tr>
              <th style="width: 10%">
                cant.
              </th>
              <th style="width: 50%">
                Nombre
              </th>
              <th style="width: 20%">
                Precio c/u
              </th>
              <th style="width: 20%">
                Precio total
              </th>
            </tr>
            <!--  Se incorpora codigo php para escribir los datos  -->
            <?php include_once "../php/resibo_datos_tabla.php";?>
          </table>
          <div class="" style="height: 50px;">
            <div class="borde" style="float: right; width: 25%; margin-top: 10px; border-radius: 100px; margin-right: 20px; margin-top: 20px;">
              <span id="resibo_preciototal" style="text-align: center; margin: 0px 40px 0px 0px;float: right; font-size: 20px;">
              </span>
            </div>
            <h3 style="float: right; margin-right: 20px;margin-top: 20px;">
              Total
            </h3>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
