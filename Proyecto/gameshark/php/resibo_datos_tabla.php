<?php
$valores = implode(' , ', $videojuegos_id);
seleccionar_juegos($valores, $videojuegos_qty);

$indice         = 0;
$indices_juegos = "";

function por_cantidad($precio, $cantidad)
{
    $total = floatval($precio) * intval($cantidad);
    echo $total;
}
function seleccionar_juegos($param_id, $videojuegos_qty)
{
    include 'coneccion.php';
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare("SELECT * FROM inventario WHERE idjuego IN ($param_id)");

        $stmt->execute();

        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);

        for ($i = 0; $i < count($row); $i++) {

            echo "<tr>";
            echo "<td style='text-align: center;'>";
            echo $videojuegos_qty[$i];
            echo "</td>";
            echo "<td>";
            echo $row[$i]["nombre"];
            echo "<td class='precio_cu'style='text-align: center;'>";
            echo $row[$i]["precio"];
            echo "</td>";
            echo "<td class='precio_total'style='text-align: right;''>";
            por_cantidad($row[$i]["precio"], $videojuegos_qty[$i]);
            echo "</td>";
            echo "</tr>";

        }

        // ============================================

    } catch (PDOException $e) {


    }
    $conn = null;
}
