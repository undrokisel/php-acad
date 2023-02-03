<?php

function findStringsByPrefix(string $prefix, array $arr): array
{
    $result = [];
    foreach ($arr as $str) {
        if (is_string($str) && str_starts_with(trim($str), trim($prefix) . '_')) {
            $result [] = $str;
        }
    }

    return $result;
}