<?php


function getStrValuesFromArray($arr)
{
    $result = [];
    array_walk_recursive($arr, static function ($item) use (&$result) {
        if (is_string($item)) {
            $result[] = $item;
        }
    });
    return $result;
}