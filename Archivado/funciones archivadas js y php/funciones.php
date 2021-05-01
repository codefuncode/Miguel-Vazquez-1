<?php

//  Nesesarias
//funcion que enseña los datos disponibles en la tabla de inventario
function devuelveinventario($servername, $username, $password, $dbname)
{
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql  = "SELECT inventario.idjuego ,inventario.nombre,inventario.estado,inventario.fecha, clasificacion.nombre as cnombre, plataforma.nombre as pnombre,inventario.cantidad , inventario.precio FROM inventario,clasificacion, plataforma WHERE inventario.idclasificacion=clasificacion.idclasificacion AND inventario.idplataforma=plataforma.idplataforma ";
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $result = json_encode($result);

        echo $result;

    } catch (PDOException $e) {

        $respuesta = array("respuesta" => "no");

        $respuesta = json_encode($respuesta);

        echo $respuesta;

    }
    $conn = null;
}
//funcion que muestra las clasificaciones en inventario.
function clasificacion($servername, $username, $password, $dbname)
{

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("SELECT * FROM clasificacion");
        // $stmt = $conn->prepare("SELECT * FROM clasificacion");
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $result = json_encode($result);

        echo $result;
    } catch (PDOException $e) {
        $respuesta = array("respuesta" => "no");

        $respuesta = json_encode($respuesta);

        echo $respuesta;
    }
    $conn = null;

}
//funcion que muestra las plataformas en inventario.
function plataforma($servername, $username, $password, $dbname)
{
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare("SELECT * FROM plataforma");
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $result = json_encode($result);

        echo $result;

    } catch (PDOException $e) {

        $respuesta = array("respuesta" => "no");

        $respuesta = json_encode($respuesta);

        echo $respuesta;

    }
    $conn = null;
}
//funcion que guarda lo que se escribe en los campos de input y se almacena en la base de datos para enseñarlo en el inventario.
function guardar($servername, $username, $password, $dbname)
{
    // $servername = "sql201.epizy.com";

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

}

// ===================================================================
//  Funcion exclusiva para el ficvhero comprar php
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

        $stmt->closeCursor();
        $stmt2 = $conn->prepare("UPDATE inventario SET cantidad = $nueva_cantidad WHERE idjuego = $id");
        $stmt2->execute();

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $conn = null;
}
// ===================================================================
