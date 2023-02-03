<?php

$arr1 = require __DIR__.'/data/array1.php';
require __DIR__ . '/findStringsByPrefix.php';


// не знаю, что такое префикс в строках, так как терминология разнится
// исходил из того, что префикс - это начало слова, после котого следует знак "underscore"
print_r(findStringsByPrefix('mr', $arr1));
print_r(findStringsByPrefix('Mr', $arr1));
