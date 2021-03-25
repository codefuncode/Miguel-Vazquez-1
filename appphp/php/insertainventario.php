<?php

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $nombre          = $_POST['nombre'];
    $estado          = $_POST['estado'];
    $fecha           = $_POST['fecha'];
    $idclasificacion = intval($_POST['idclasificacion']);
    $idplataforma    = intval($_POST['idplataforma']);
    $cantidad        = intval($_POST['cantidad']);
    $precio          = bcadd($_POST['precio'], '0', 2);

    $sql = "INSERT INTO inventario (nombre, estado, fecha, idclasificacion, idplataforma, cantidad, precio)
            VALUES (:nombre, :estado , :fecha , :idclasificacion , :idplataforma , :cantidad, :precio)";
    $stmt = $conn->prepare($sql);

    $stmt->bindParam(":nombre", $nombre, PDO::PARAM_STR);
    $stmt->bindParam(":estado", $estado, PDO::PARAM_STR);
    $stmt->bindParam(":fecha", $fecha, PDO::PARAM_STR);

    $stmt->bindParam(":idclasificacion", $idclasificacion, PDO::PARAM_STR);
    $stmt->bindParam(":idplataforma", $idplataforma, PDO::PARAM_STR);
    $stmt->bindParam(":cantidad", $cantidad, PDO::PARAM_STR);
    $stmt->bindParam(":precio", $precio, PDO::PARAM_STR);

    $stmt->execute();
    $respuesta = array("respuesta" => "si");

    $respuesta = json_encode($respuesta);

    echo $respuesta;

} catch (PDOException $e) {
    $respuesta = array("respuesta" => "ni");

    $respuesta = json_encode($respuesta);

    echo $respuesta;
}

$conn = null;
