<?php

$cities = require __DIR__.'/citiesArray.php';
require __DIR__.'/function_sort.php';

$sorted = citiesSort($cities);
print_r ($sorted);