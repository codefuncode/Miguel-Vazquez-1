<?php
// https://www.facebook.com/groups/programadorespuertorico/permalink/1755440004617053/
// $matriz = [];

// foreach ($_POST as $key => $value) {
//     // echo "$key=$value";

//     echo json_encode($value, true);
//     echo json_decode($value, true);

//     echo '<br/>';
// }

// echo $_POST['datos'];
// echo '<br>';
// echo '========================';
// echo '<br>';
// $test = json_encode($_POST['datos']);

// echo json_decode($test);
// $datos = array();

// <div class="datos_hide">
// <input type="hidden" name="dato0" value="{&quot;idjuego&quot;:&quot;1&quot;,&quot;qty&quot;:&quot;1&quot;}">
// <input type="hidden" name="dato0" value="{&quot;idjuego&quot;:&quot;1&quot;,&quot;qty&quot;:&quot;1&quot;}">
// <input type="hidden" name="dato1" value="{&quot;idjuego&quot;:&quot;2&quot;,&quot;qty&quot;:&quot;1&quot;}">
// <input type="hidden" name="dato0" value="{&quot;idjuego&quot;:&quot;1&quot;,&quot;qty&quot;:&quot;1&quot;}">
// <input type="hidden" name="dato1" value="{&quot;idjuego&quot;:&quot;2&quot;,&quot;qty&quot;:&quot;1&quot;}">
// <input type="hidden" name="dato2" value="{&quot;idjuego&quot;:&quot;3&quot;,&quot;qty&quot;:&quot;1&quot;}">
// </div>
echo '<br/>';
echo $_POST['arraydatos'][0];
echo '<br/>';
var_dump(json_decode($_POST['arraydatos'][0], true));
echo '<br/>';
$matriz = json_decode($_POST['arraydatos'][0], true);
echo $matriz['idjuego'];
echo '<br/>';
echo $matriz['qty'];
// foreach ($_POST as $key => $value) {
//     // $arr[3] will be updated with each value from $arr...
//     // echo "{$key} => {$value}";
//     echo $value;

//     echo '<br/>';
// }

// echo count($datos);
