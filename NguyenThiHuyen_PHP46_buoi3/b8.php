<?php
$array = ['programming', 'php', 'basic', 'dev', 'is', 'program is PHP'];

$string = $array[0];
$countt = strlen($array[0]);
foreach ($array as $key => $value) {

    if ($countt <= strlen($array[$key])) {
        $string = $array[$key];
        $countt = strlen($array[$key]);
    }
}

echo "chuoi lon nhat la: " . $string . " co do dai la: " . $countt;
echo "<br/>";

$string = $array[0];
$countt = strlen($array[0]);
foreach ($array as $key => $value) {

    if ($countt >= strlen($array[$key])) {
        $string = $array[$key];
        $countt = strlen($array[$key]);
    }
}

echo "chuoi nho nhat la: " . $string . " co do dai la: " . $countt;