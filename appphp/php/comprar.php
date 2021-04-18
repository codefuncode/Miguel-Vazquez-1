<?php

$videojuegos_id = [];
$indice         = 0;

// =================================================================
//  https://www.w3schools.com/php/php_arrays_sort.asp
foreach ($_POST["arraydatos"] as $value) {

    $matriz                  = json_decode($value, true);
    $videojuegos_id[$indice] = $matriz['idjuego'];
    $indice++;
    // actualizar_cantidad($matriz['idjuego'], $matriz['qty']);

}

// =================================================================

$valores = implode(' , ', $videojuegos_id);
seleccionar_juegos($valores);
// echo '<br/>';
// echo 'Valores de llos id dce juego;';
// echo '<br/>';
// echo $valores;
// echo '<br/>';
$indice         = 0;
$indices_juegos = "";

//  Uso  DE  WHERE IN
//  SELECT * FROM `members` WHERE `membership_number` IN (1,2,3);
function actualizar_cantidad($id, $cantidad)
{
    include 'coneccion.php';

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare("SELECT cantidad FROM inventario WHERE idjuego = $id");

        $stmt->execute();
        $result         = $stmt->fetchAll();
        $nueva_cantidad = $result[0]['cantidad'] - $cantidad;
        // echo $result[0]['cantidad'];
        // echo " - ";
        // echo $cantidad;
        // echo " = ";
        // echo $nueva_cantidad;
        $stmt->closeCursor();
        $stmt2 = $conn->prepare("UPDATE inventario SET cantidad = $nueva_cantidad WHERE idjuego = $id");
        $stmt2->execute();

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $conn = null;
}

function seleccionar_juegos($param_id)
{
    include 'coneccion.php';
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare("SELECT * FROM inventario WHERE idjuego IN ($param_id)");

        $stmt->execute();
        // $result = $stmt->fetch(PDO::FETCH_ASSOC);
        // $result = $stmt->fetchAll();
        // for ($i = 0; $i < count($result); $i++) {
        //     $row[$i]["idjuego"];
        //     $row[$i]"nombre"];
        //     $row[$i]["estado"];
        //     $row[$i]["fecha"];
        //     $row[$i]["idclasificacion"];
        //     $row[$i]["idplataforma"];
        //    $row[$i]["cantidad"];
        //    $row[$i]["precio"];

        //     // => 1 [0] => 1 [nombre] => nombre [1] => nombre [estado] => usado [2] => usado [fecha] => 2020-01-10 [3] => 2020-01-10 [idclasificacion] => 2 [4] => 2 [idplataforma] => 1 [5] => 1 [cantidad] => 3 [6] => 3 [precio] => 3.99 [7] => 3.99

        // }
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);

        for ($i = 0; $i < count($row); $i++) {
            echo '<br/>';
            echo $row[$i]["idjuego"];
            echo '<br/>';
            echo $row[$i]["nombre"];
            echo '<br/>';
            echo $row[$i]["estado"];
            echo '<br/>';
            echo $row[$i]["fecha"];
            echo '<br/>';
            echo $row[$i]["idclasificacion"];
            echo '<br/>';
            echo $row[$i]["idplataforma"];
            echo '<br/>';
            echo $row[$i]["cantidad"];
            echo '<br/>';
            echo $row[$i]["precio"];
            echo '<br/>';
            echo '===========================';
            echo '<br/>';
        }

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $conn = null;
}
// $sth = $dbh->prepare('SELECT name, colour, calories
//     FROM fruit
//     WHERE calories < ? AND colour = ?');
// $sth->execute(array(150, 'red'));
// $red = $sth->fetchAll();
// $sth->execute(array(175, 'yellow'));
// $yellow = $sth->fetchAll();
