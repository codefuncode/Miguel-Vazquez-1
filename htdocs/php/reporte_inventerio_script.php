
<?php

if ((isset($_POST['estado'])) &&
    (isset($_POST['idclasificacion'])) &&
    (isset($_POST['idplataforma']))) {

    include "../php/coneccion.php";

    $estado          = $_POST['estado'];
    $idclasificacion = $_POST['idclasificacion'];
    $idplataforma    = $_POST['idplataforma'];
    try {

        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql  = "";
        $stmt = $conn->prepare("SELECT * FROM `inventario` WHERE  estado= :estado AND  idclasificacion= :idclasificacion AND  idplataforma= :idplataforma;");

        $stmt->bindParam(":estado", $estado, PDO::PARAM_STR);
        $stmt->bindParam(":idclasificacion", $idclasificacion, PDO::PARAM_STR);
        $stmt->bindParam(":idplataforma", $idplataforma, PDO::PARAM_STR);
        $stmt->execute();

        echo '<table class="w3-table-all w3-hoverable">';
        echo '<thead>';
        echo '
            <tr class="w3-black">
            <th>Nombre</th>
            <th>Correo</th>
            <th>Tipo de usuario</th>
            <th>Nombre de usuario</th>
            </tr>';
        echo '</thead>';
        while ($data = $stmt->fetch(PDO::FETCH_ASSOC)) {

            $nombre       = $data['nombre'];
            $correo       = $data['correo'];
            $tipo_usuario = $data['tipo_usuario'];
            $usuario      = $data['usuario'];

            echo "<tr>";
            echo "<td> $nombre </td>";
            echo "<td> $correo </td>";
            echo "<td> $tipo_usuario </td>";
            echo "<td> $usuario </td>";
            echo "</tr>";

        }
        echo '</table>';
    } catch (PDOException $e) {

    }
    $conn = null;

}
// ======================
// inventario.

// inventario.cantidad
// inventario.estado
// inventario.idclasificacion
// inventario.idplataforma
// inventario.nombre
// inventario.precio
// ======================

// ==========================
// clasificacion

// clasificacion.idclasificacion
// clasificacion.nombreColumna
// ==========================

// ===========================
// plataforma

// plataforma.idplataforma
// plataforma.nombre
// ===========================

// SELECT name, price, details, type,  FROM food, food_order  WHERE breakfast.id = 'breakfast_id'

$sql =
    "SELECT
        inventario.cantidad,
        inventario.estado,
        inventario.nombre,
        inventario.precio,
        clasificacion.nombre,
        plataforma.nombre
    FROM inventario , clasificacion , plataforma
    WHERE clasificacion.idclasificacion = $variable
    AND inventario.estado = $variable
    AND plataforma.idplataforma = $variable

    group by  anuncio.idanuncio";
