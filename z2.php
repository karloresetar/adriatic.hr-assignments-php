<?php

function find($arrayA, $arrayB, $arrayC): void {
    
    $common = array_intersect($arrayA, $arrayB, $arrayC);
    
    
    $onlyInA = array_diff($arrayA, $arrayB, $arrayC);
    
    
    $onlyInB = array_diff($arrayB, $arrayA, $arrayC);
    
    
    $onlyInC = array_diff($arrayC, $arrayA, $arrayB);
    
    
    echo "In all three arrays: [" . implode(",",($common)) ."]" . "</br>";
    echo "Only in array \$arrayA = [" . implode(",",($onlyInA)) ."]" . "</br>";
    echo "Only in array \$arrayB = [" . implode(",",($onlyInB)) ."]" . "</br>";
    echo "Only in array \$arrayC = [" . implode(",",($onlyInC)) ."]" . "</br>";
}

$arrayA = ['a','b','c','dd','234','22','rc'];
$arrayB = ['a','b2','c','dad','rc','24','222'];
$arrayC = ['222','a','be','rc','dd','234','22','pp'];

find($arrayA, $arrayB, $arrayC);



?>