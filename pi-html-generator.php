<?php

require 'pi-calculator.php';

$numberOfIterations = (int) (getenv('ITERATIONS') ? getenv('ITERATIONS') : 1000);
$filename = getenv('FILENAME') ? getenv('FILENAME') : 'index.html';

$pi = calculate($numberOfIterations);

$html = <<<HTML
<html>
<head>
<title>Pi calculated in $numberOfIterations iterations</title>
</head>
<body>
<h1>Pi calculated in $numberOfIterations iterations</h1>
<p>Pi <strong>$pi</strong></p>
</body>
</html>
HTML;

file_put_contents($filename, $html);
