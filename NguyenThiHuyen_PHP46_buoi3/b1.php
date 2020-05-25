<?php
$arr = [2, 5, 6, 9, 2, 5, 6, 12, 5];
$sum = 0;
$tich = 1;
$hieu = $arr[0];
$thuong = $arr[0];
for ($key = 0; $key < count($arr); $key++) {
    $sum += $arr[$key];
    echo "$arr[$key]";
    if ($key == count($arr) - 1) {
        break;
    }
    echo " + ";
}
echo " = $sum";
echo "<br/>";

//hiệu
for ($key = 0; $key < count($arr); $key++) {
    $hieu -= $arr[$key];
    echo "$arr[$key]";
    if ($key == count($arr) - 1) {
        break;
    }
    echo " - ";
}
echo " = $hieu";
echo "<br/>";
//tích
for ($key = 0; $key < count($arr); $key++) {
    $tich *= $arr[$key];
    echo "$arr[$key]";
    if ($key == count($arr) - 1) {
        break;
    }
    echo " * ";
}
echo " = $tich";
echo "<br/>";
//thươnng
for ($key = 0; $key < count($arr); $key++) {
    $thuong /= $arr[$key];
    echo "$arr[$key]";
    if ($key == count($arr) - 1) {
        break;
    }
    echo " / ";
}
echo " = $thuong";
