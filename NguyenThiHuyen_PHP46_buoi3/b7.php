<?php
$array = [12, 5, 200, 10, 125, 60, 90, 345, -123, 100,  -125, 0];
foreach ($array as $value) {
    if (100 <= $value && $value <= 200 && $value % 5 == 0) {
        echo $value;
        echo "<br/>";
    }
}