<?php
// $matriz    = [];
// $matriz[0] = 0;
// $matriz[1] = 1;
// $matriz[2] = 2;
// echo $matriz[0];
// echo $matriz[1];
// echo $matriz[2];

// $parametros = '';
// for ($i = 0; $i < count($matriz); $i++) {
//     if ($i == 0) {
//         $parametros = $matriz[$i];
//     } else {
//         $parametros = $parametros . " , " . $matriz[$i];
//     }

// }
// echo '<br/>';
// echo $parametros;

// $List = implode(' , ', $matriz);

// echo '<br/>';
// echo $List;

// Testing $_POST
$_POST['A'] = 'B';

$nonReferencedPostVar      = $_POST;
$nonReferencedPostVar['A'] = 'C';

echo 'POST: ' . $_POST['A'] . ', Variable: ' . $nonReferencedPostVar['A'] . "\n\n";

// Testing Globals
$GLOBALS['A'] = 'B';

$nonReferencedGlobalsVar      = $GLOBALS;
$nonReferencedGlobalsVar['A'] = 'C';

echo 'GLOBALS: ' . $GLOBALS['A'] . ', Variable: ' . $nonReferencedGlobalsVar['A'] . "\n\n";
