<?php
$numbers = [78, 60, 62, 68, 71, 68, 73, 85, 66, 64, 76, 63, 75, 76, 73, 68, 62, 73, 72, 65, 74, 62, 62, 65, 64, 68, 73, 75, 79, 73];

//---array sum
$arrNew = array_sum($numbers);
print_r($arrNew);
echo "<br/>";

//array_key_exists($key, $value)
$array = ['class' => 'PHP40', 'count' => 25];
if (array_key_exists('class', $array)) {
    echo "ton tai";
} else
    echo "khong ton tai";
echo "<br/>";
//array_merge($array1, $array2)
$arrNew = array_merge($numbers, $array);
print_r($arrNew);
echo "<br/>";
//array_search($keyword, $array)
$arrNew = array_search(25, $array);
print_r($arrNew);
echo "<br/>";

//array_slice($array, $begin, $length)
$arrNew = array_slice($numbers, 2, 2);
print_r($arrNew);
echo "<br/>";

//array_unique($array)
$arrNew = array_unique($numbers);
print_r($arrNew);
echo "<br/>";

//array_values($array)
$arrNew = array_values($array);
print_r($arrNew);
echo "<br/>";

//array_keys($array)
$arrNew = array_keys($array);
print_r($arrNew);
echo "<br/>";

//array_pop($array)
$arrNew = array_pop($array);
print_r($arrNew);
echo "<br/>";

//array_push($array, $var, $var..)
$arrNew = array_push($numbers, 9999999);
print_r($arrNew);
echo "<br/>";

//array_shift($array)
$arrNew = array_shift($numbers);
print_r($arrNew);
echo "<br/>";

//array_unshift($array, $var, $var ...)
$arrNew = array_unshift($numbers, 78);
print_r($arrNew);
echo "<br/>";

//array_flip($arrray)
$arrNew = array_flip($numbers);
print_r($arrNew);
echo "<br/>";

//count($array)
$arrNew = array_flip($numbers);
print_r($arrNew);
echo "<br/>";

//explode($character, $string)
$string = "B,o,nn,nnn,nn,nnn";
$arrNew = explode(',', $string);
print_r($arrNew);
echo "<br/>";

//end($array)
$arrNew = end($array);
print_r($arrNew);
echo "<br/>";

//is_array($array)
if (is_array($array)) {
    echo "la mang";
} else
    echo "khong phai mang";
echo "<br/>";

//sort($array)

sort($numbers);
print_r($numbers);
echo "<br/>";

//rsort($array)
rsort($numbers);
print_r($numbers);
echo "<br/>";

//asort($array)
asort($array);
print_r($array);
echo "<br/>";

//ksort($array)
ksort($array);
print_r($array);
echo "<br/>";

//implode($character, $array)
$arrNew = implode(', ', $numbers);
print_r($arrNew);
echo "<br/>";

//...........

//STRING

//strlen($string)
$count = strlen($string);
echo $count;
echo "<br/>";
//str_word_count($string, $format, $charlist)
print_r(str_word_count($string, 2));
echo "<br/>";

//strtoupper($string)
print_r(strtoupper($string));
echo "<br/>";

//strtolower($string)
print_r(strtolower($string));
echo "<br/>";

//strtolower($string)
print_r(strtolower($string));
echo "<br/>";

//ucwords($string)
print_r(ucwords($string));
echo "<br/>";

//trim($string, $character)
print_r(trim($string));
echo "<br/>";

//ltrim($string, $character)
print_r(ltrim($string));
echo "<br/>";

//rtrim($string, $character)
print_r(rtrim($string));
echo "<br/>";

//str_replace($search, $replace, $string)
print_r(str_replace('o', 'iiiiiiii', $string));
echo "<br/>";

//preg_replace($pattern, $replace, $string)
print_r(preg_replace('/(n)/', 'iiiiiiii', $string));
echo "<br/>";

//substring($string, $start, $length)
print_r(substr($string, 2, 5));
echo "<br/>";

//strstr($string, $needle)
print_r(strstr($string, 'n'));
echo "<br/>";

//NUMBER

//max($var1, $var2, ...)
print_r(max(2, 5, 9));
echo "<br/>";

//abs($number)
echo (abs(-5));
echo "<br/>";

//.....