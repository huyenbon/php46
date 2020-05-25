<?php
$keys = array(
    "field1" => "first",
    "field2" => "second",
    "field3" => "third"
);
$values = array(
    "field1value" => "dinosaur",
    "field2value" => "pig",
    "field3value" => "platypus"
);
print_r($values);

$keys = array_keys($keys);
$arraySize = count($keys);
$keys2 = array_keys($values);
$arraySize2 = count($values);

$keyAndValues = [];
for ($i = 0; $i < $arraySize; $i++) {
    for ($j = 0; $j < $arraySize2; $j++) {
        if ($i == $j) {
            $keyAndValues[] = $keys[$i] . " => " . $values[$keys2[$j]];
        }
    }
}
print_r($keyAndValues);