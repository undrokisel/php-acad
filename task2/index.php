<?php

$arr1 = require __DIR__ . '/data/array1.php';
$arr2 = require __DIR__ . '/data/array2.php';
require __DIR__ . '/getStrValuesFromArray.php';


print_r(getStrValuesFromArray($arr1));
print_r(getStrValuesFromArray($arr2));