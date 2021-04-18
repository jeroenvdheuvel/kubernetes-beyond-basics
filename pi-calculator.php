<?php

function calculate(int $numberOfIterations)
{
    $pi = 0;
    $top = 4.0;

    for ($i= 1; $i<=$numberOfIterations; ++$i){
        $bottom = $i * 2 - 1;

        if ($i % 2 === 1) {
            $pi += $top / $bottom;
        } else {
            $pi -= $top / $bottom;
        }
    }

    return $pi;
}
