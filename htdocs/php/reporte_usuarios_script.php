
<?php
// Despliega una tabla  con los datos  de los usuarios
if (
    (isset($_POST['tipo_usuario'])) &&
    (!($_POST['tipo_usuario'] == "0"))
) {

    include "../php/coneccion.php";

    $tipo_usuario = $_POST['tipo_usuario'];
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("SELECT * FROM `usuario`WHERE  tipo_usuario= :tipo_usuario;");

        $stmt->bindParam(":tipo_usuario", $tipo_usuario, PDO::PARAM_STR);
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
