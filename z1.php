<?php

function getClosestNumbers($options, $number): array
{
    sort($options);

    $closestNumbers = [];
    $minDiff = PHP_INT_MAX;

    foreach ($options as $value) {
        $diff = abs($number - $value);
        if ($diff < $minDiff) {
            $closestNumbers = [$value];
            $minDiff = $diff;
        } elseif ($diff == $minDiff) {
            $closestNumbers[] = $value;
        } else {
            break;
        }
    }

    return $closestNumbers;
}

$options = [-908, -852, -475, -355, -102, -100, -55, -25, -18, -7, -6, -5, 0, 1, 7, 8, 99, 101, 122, 147, 5025, 5334, 7410];

$number1 = 90;
$number2 = 100;
$number3 = -101;
$number4 = 7;

echo "ARRAY: [";
echo implode(", ", $options);
echo "]<br><br>";

echo "Najblizi broj broju $number1: " . implode(", ", getClosestNumbers($options, $number1)) . "</br>";
echo "Najblizi broj broju $number2: " . implode(", ", getClosestNumbers($options, $number2)) . "</br>";
echo "Najblizi broj broju $number3: " . implode(", ", getClosestNumbers($options, $number3)) . "</br>";
echo "Najblizi broj broju $number4: " . implode(", ", getClosestNumbers($options, $number4)) . "</br>";

?>
