<?php
require 'pi-calculator.php';

$numberOfIterations = $_GET['iterations'] ?? 1000;
$pi = calculate($numberOfIterations);

?>
<html>
    <head>
        <title>Pi calculated in $numberOfIterations iterations</title>
    </head>
    <body>
        <h1>Pi calculated in <?= $numberOfIterations ?> iterations</h1>
        <p>Pi <strong><?= $pi ?></strong></p>
    </body>
</html>
