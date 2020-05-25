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
$arraySize = count($numbers);
// echo $arraySize;
$min = $numbers[$keys[0]];
$max = $numbers[$keys[0]];
$sum = 0;

for ($i = 0; $i < $arraySize; $i++) {
    //lay phan tu dau tien va cuoi cung
    if ($i == 0 || $i == ($arraySize - 1)) {
        echo  $keys[$i] . " => " . $numbers[$keys[$i]] . "<br/>";
    }
    //tim min
    if ($min >= $numbers[$keys[$i]]) {
        $min = $numbers[$keys[$i]];
    }
    //tim max
    if ($max <= $numbers[$keys[$i]]) {
        $max = $numbers[$keys[$i]];
    }
    //tinh tong
    $sum += $numbers[$keys[$i]];
}
//so be nhat
echo "so be nhat la: " . $min . "<br/>";

//so lon nhat
echo "so lon nhat la: " . $max . "<br/>";

//tong
echo "tong bang: " . $sum . "<br/>";

//sap xep theo gia tri
//---tang dan
asort($numbers);
print_r($numbers);
echo "<br/>";
//---giam dan
arsort($numbers);
print_r($numbers);
echo "<br/>";

//sap xep theo key
ksort($numbers);
print_r($numbers);
echo "<br/>";
//---giam dan
krsort($numbers);
print_r($numbers);
echo "<br/>";