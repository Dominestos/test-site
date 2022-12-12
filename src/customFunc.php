<?php

function cutString($line, $length = 13, $appends = '...')
{
    if (strlen($line) > $length) {
        return substr($line, 0, $length) . $appends;
    }

    return $line;
}

function arraySort(array $array, $key = 'sort',$sort = SORT_ASC): array
{
    $secondArr = [];

    foreach ($array as $num => $value) {
        $secondArr[$num] = $value[$key];
    }
    array_multisort($secondArr, $sort, $array);

    return $array;

}