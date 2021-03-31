<?php

$matriz = [];
foreach ($_POST as $key => $value) {
    // echo "$key=$value";

    echo json_encode($value, true);
    echo json_decode($value, true);

    echo '<br/>';
}
