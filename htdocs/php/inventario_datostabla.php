<?php
//  Necesario
//Muestra los datos que estaran presentes en las tablas de inventario.
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT inventario.idjuego ,inventario.nombre,inventario.estado,inventario.fecha, clasificacion.nombre as cnombre, plataforma.nombre as pnombre,inventario.cantidad , inventario.precio FROM inventario,clasificacion, plataforma WHERE inventario.idclasificacion=clasificacion.idclasificacion AND inventario.idplataforma=plataforma.idplataforma ORDER BY inventario.idjuego ASC";

    $stmt = $conn->prepare($sql);
    $stmt->execute();

    while ($data = $stmt->fetch(PDO::FETCH_ASSOC)) {

        $id = $data['idjuego'];

        echo "<tr idjuego=" . '"' . $id . '"' . ">";

        echo '<td>';
        echo $data['nombre'];
        echo '</td>';

        echo '<td>';
        echo $data['estado'];
        echo '</td>';

        echo '<td>';
        echo $data['cnombre'];
        echo '</td>';

        echo '<td>';
        echo $data['fecha'];
        echo '</td>';

        echo '<td>';
        echo $data['pnombre'];
        echo '</td>';

        echo '<td>';
        echo $data['cantidad'];
        echo '</td>';

        echo '<td>';
        echo $data['precio'];
        echo '</td>';

        echo '<td>';
        echo '<form  action="../php/editar_inventario.php" method="post">';
        echo "<input type='hidden'name='id_inventario'value='$id'/>";

        echo "<input type='submit' class='btn btn-warning'value='Editar'> ";

        echo '</form>';
        echo '</td>';
        echo '<td>';
        echo '<form  action="../php/elimina_record_juego.php" method="post">';
        echo "<input type='hidden'name='id_inventario'value='$id'/>";

        echo "<input type='submit' class='btn btn-danger'value='Eliminar'> ";
        echo '</form>';
        echo '</td>';

        echo '</tr>';
    }

} catch (PDOException $e) {

}
$conn = null;
