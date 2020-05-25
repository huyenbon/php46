<?php

$numbers = [78, 60, 62, 68, 71, 68, 73, 85, 66, 64, 76, 63, 75, 76, 73, 68, 62, 73, 72, 65, 74, 62, 62, 65, 64, 68, 73, 75, 79, 73];
$keys = array_keys($numbers);
$arraySize = count($numbers);

$numberNew = "";
$numberNew2 = "";
$sum = 0;

for ($i = 0; $i < $arraySize; $i++) {
    $sum += $numbers[$i];
}

$avg = $sum / $arraySize;

for ($i = 0; $i < $arraySize; $i++) {
    $numberNew = "";
    $numberNew2 = "";
    if ($numbers[$keys[$i]] > $avg) {
        $numbersNew .= $numbers[$keys[$i]];
    }
    if ($numbers[$keys[$i]] <= $avg) {
        $numbersNew2 .= $numbers[$keys[$i]];
    }
    if ($i == ($arraySize - 1)) {
        break;
    }
    $numberNew .= ", ";
    $numberNew2 .= ", ";
}
echo $numberNew;
echo "Gia tri trung binh cua mang la: " . $avg . "<br/>";
echo "Cac so co gia tri lon hon gia tri TB la: " . $numbersNew . "<br/>";
echo "Cac so co gia tri lon hon gia tri TB la: " . $numbersNew2 . "<br/>";