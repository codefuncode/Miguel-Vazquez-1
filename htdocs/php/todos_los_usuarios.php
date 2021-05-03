<?php
include_once "coneccion.php";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT * FROM  usuario");
    $stmt->execute();

    while ($data = $stmt->fetch(PDO::FETCH_ASSOC)) {

        $idusuario    = $data['idusuario'];
        $tipo_usuario = $data['tipo_usuario'];

        echo '</tr>';

        echo '<td>';
        echo $data['nombre'];
        echo '</td>';

        echo '<td>';
        echo $data['usuario'];
        echo '</td>';

        echo '<td>';
        echo $data['correo'];
        echo '</td>';

        echo '<td>';
        echo $data['pass'];
        echo '</td>';

        echo '<td>';
        echo $data['tipo_usuario'];
        echo '</td>';
        echo '<td>';
        echo '<form  action="editar.php" method="get">';
        echo "<input type='hidden'name='idusuario'value='$idusuario'/>";
        echo "<input type='hidden'name='tipo_usuario'value='$tipo_usuario'/>";
        echo "<input type='submit' class='btn btn-warning'value='Editar'> ";

        echo '</form>';
        echo '</td>';
        echo '<td>';
        echo '<form  action="eliminar.php" method="get">';
        echo "<input type='hidden'name='idusuario'value='$idusuario'/>";
        echo "<input type='hidden'name='tipo_usuario'value='$tipo_usuario'/>";
        echo "<input type='submit' class='btn btn-danger'value='Eliminar'> ";
        echo '</form>';
        echo '</td>';

        echo '</tr>';
    }

} catch (PDOException $e) {
    echo "Error:" . $e->getMessage();
}
$conn = null;
