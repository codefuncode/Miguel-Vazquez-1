<?php
// echo '<br/>';
// echo $_POST['arraydatos'][0];
// echo '<br/>';
// var_dump(json_decode($_POST['arraydatos'][0], true));
// echo '<br/>';
// $matriz = json_decode($_POST['arraydatos'][0], true);
// echo $matriz['idjuego'];
// echo '<br/>';
// echo $matriz['qty'];
foreach ($_POST["arraydatos"] as $key => $value) {
    echo $key;
    echo '<br/>';
    echo $value;
}
echo '<br/>';
echo '<br/>';
echo '<br/>';
echo '<br/>';
echo '<br/>';
foreach ($_POST["arraydatos"] as $value) {
    echo '<br/>';
    // echo $value;
    $matriz = json_decode($value, true);
    echo $matriz['idjuego'];
    echo '<br/>';
    echo $matriz['qty'];
    echo '<br/>';
}

$servername = "localhost";
$username   = "username";
$password   = "password";
$dbname     = "myDBPDO";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT id, firstname, lastname FROM MyGuests");
    $stmt->execute();

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
