<?php
// https://www.facebook.com/groups/programadorespuertorico/permalink/1755440004617053/

// https://www.php.net/manual/en/pdostatement.closecursor.php
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
// echo '<br/>';
// echo $_POST['arraydatos'][0];
// echo '<br/>';
// echo $_POST['arraydatos'][1];
// echo '<br/>';
// echo $_POST['arraydatos'][2];
// echo '<br/>';
// echo $_POST['arraydatos'][3];
// echo '<br/>';

foreach ($_POST['arraydatos'] as $key => $value) {
    $value = json_decode($value, true);
    echo '<br/>';
    echo $value['idjuego'];
    echo '<br/>';
    echo $value['qty'];
    echo '<br/>';
}
include_once 'coneccion.php';
$servername = "localhost";
$username   = "username";
$password   = "password";
$dbname     = "myDBPDO";
function conectdb($value = '')
{
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare("SELECT idjuego  FROM ");
        $stmt->execute();

        // set the resulting array to associative
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $conn = null;
}
