
<?php

$_POST['estado']          = "usado";
$_POST['idclasificacion'] = 1;
$_POST['idplataforma']    = 1;

if ((isset($_POST['estado'])) &&
    (isset($_POST['idclasificacion'])) &&
    (isset($_POST['idplataforma']))) {

    include "coneccion.php";

    $estado          = $_POST['estado'];
    $idclasificacion = $_POST['idclasificacion'];
    $idplataforma    = $_POST['idplataforma'];

    try {

        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // $sql =
        //     "SELECT inventario.idjuego,
        //     inventario.cantidad,
        //     inventario.estado,
        //     inventario.nombre as nombre_inventario,
        //     inventario.precio,
        //     clasificacion.nombre as nombre_clasificacion,
        //     plataforma.nombre as nombre_plataforma
        //     FROM inventario , clasificacion , plataforma
        //     WHERE clasificacion.idclasificacion = $idclasificacion
        //     AND inventario.estado = '$estado'
        //     AND plataforma.idplataforma = $idplataforma
        //     group by inventario.idjuego";

        $sql =
            "SELECT inventario.idjuego,
            inventario.cantidad,
            inventario.estado,
            inventario.nombre as nombre_inventario,
            inventario.precio,
            clasificacion.nombre as nombre_clasificacion,
            plataforma.nombre as nombre_plataforma
            FROM inventario , clasificacion , plataforma
            WHERE inventario.idclasificacion = :idclasificacion
            AND inventario.estado = :estado
            AND inventario.idplataforma = :idplataforma
            group by inventario.idjuego";

        $stmt = $conn->prepare($sql);

        $stmt->bindParam(":estado", $estado, PDO::PARAM_STR);
        $stmt->bindParam(":idclasificacion", $idclasificacion, PDO::PARAM_INT);
        $stmt->bindParam(":idplataforma", $idplataforma, PDO::PARAM_INT);
        $stmt->execute();

        echo '<table class="w3-table-all w3-hoverable">';
        echo '<thead>';
        echo '
            <tr class="w3-black">
            <th>id</th>
            <th>Nombe del juego</th>
            <th>Estado</th>
            <th>Plataforma</th>
            <th>Clasificacion</th>
            <th>Cantidad</th>
            <th>Precio</th>
            </tr>';
        echo '</thead>';
        while ($data = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $id                   = $data['idjuego'];
            $nombre_inventario    = $data['nombre_inventario'];
            $nombre_clasificacion = $data['nombre_clasificacion'];
            $nombre_plataforma    = $data['nombre_plataforma'];
            // $idjuego              = $data['idjuego'];
            $cantidad = $data['cantidad'];
            $estado   = $data['estado'];
            $precio   = $data['precio'];

            echo "<tr>";
            echo "<td> $id </td>";
            echo "<td> $nombre_inventario </td>";
            echo "<td> $estado </td>";
            echo "<td> $nombre_plataforma </td>";
            echo "<td> $nombre_clasificacion </td>";
            echo "<td> $cantidad </td>";
            echo "<td> $precio </td>";
            echo "</tr>";

        }
        echo '</table>';
    } catch (PDOException $e) {

    }
    $conn = null;

}
