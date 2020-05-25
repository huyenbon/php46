<?php

$numbers = [
    'key1' => 12,
    'key2' => 30,
    'key3' => 4,
    'key4' => -123,
    'key5' => 1234,
    'key6' => -12565,
];
$keys = array_keys($numbers);
// echo $keys;
// print_r($keys);
$arraySize = count($numbers);

for ($i = 0; $i < $arraySize; $i++) {
    echo $keys[$i] . " => " . $numbers[$keys[$i]] . "<br/>";
    // echo '<option value="' . $keys[$i] . '">' . $numbers[$keys[$i]] . '</option>';
}