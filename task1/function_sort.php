<?php

function citiesSort(array $arr): array
{
    usort($arr, static function ($a, $b) {
        if ($a['sort'] === $b['sort']) {
            return strcmp($a['name'], $b['name']);
        }
        return ($a['sort'] - $b['sort']);
    });
    return $arr;
}
