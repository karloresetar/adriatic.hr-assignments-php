<?php

function binarySearch($arr, $target) {
    $left = 0;
    $right = count($arr) - 1;

    while ($left <= $right) {
        $mid = $left + floor(($right - $left) / 2);

        if ($arr[$mid] == $target) {
            return $mid;
        } elseif ($arr[$mid] < $target) {
            $left = $mid + 1;
        } else {
            $right = $mid - 1;
        }
    }

    return $left;
}

function getClosestNumbers($options, $number): array {
    sort($options);

    $closestNumbers = [];

    $index = binarySearch($options, $number);


    if ($index == 0) {
        $closestNumbers[] = $options[$index];
    } elseif ($index == count($options)) {
        $closestNumbers[] = $options[$index - 1];
    } else {
        $diff1 = abs($number - $options[$index]);
        $diff2 = abs($number - $options[$index - 1]);

        if ($diff1 < $diff2) {
            $closestNumbers[] = $options[$index];
        } elseif ($diff1 > $diff2) {
            $closestNumbers[] = $options[$index - 1];
        } else {
            $closestNumbers[] = $options[$index - 1];
            $closestNumbers[] = $options[$index];
        }
    }

    return $closestNumbers;
}


$options = [-908, -852, -475, -355, -102, -100, -55, -25, -18, -7, -6, -5, 0, 1, 7, 8, 99, 101, 122, 147, 5025, 5334, 7410];

$number1 = 90;
$number2 = 100;

echo "Closest numbers to $number1: " . implode(", ", getClosestNumbers($options, $number1)) . "\n";
echo "Closest numbers to $number2: " . implode(", ", getClosestNumbers($options, $number2)) . "\n";



?>