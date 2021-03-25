<?php
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare("SELECT * FROM plataforma");
    $stmt->execute();

    while ($data = $stmt->fetch(PDO::FETCH_ASSOC)) {

        $id = $data['idplataforma'];

        echo "<option value=" . '"' . $id . '"' . ">";
        echo $data['nombre'];
        echo '</option>';
    }

} catch (PDOException $e) {

}
$conn = null;
