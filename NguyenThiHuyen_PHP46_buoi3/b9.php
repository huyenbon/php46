<?php

function arr($arr)
{
    $arrsNew = [];
    foreach ($arr as $value) {
        if (is_string($value)) {
            $valuenew = strtolower($value);
            $arrsNew[] =  $valuenew;
        } else
            $arrsNew[] = $value;
    }
    return $arrsNew;
}

$arrs = ['1', 'B', 'C', 'E'];
$arrN = arr($arrs);
print_r($arrN);

$arrs2 = ['a', 0, null, false];

$arrN = arr($arrs2);
print_r($arrN);