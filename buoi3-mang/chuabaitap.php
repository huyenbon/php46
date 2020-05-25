<?php
// chữa bài tập 5/11

function doExpress($n)
{
    $string = "S($n)= ";
    $sum = 0;
    for ($i = 1; $i <= $n; $i++) {
        $string .= "1/$i";
        $sum += 1 / $i;
        if ($i == $n) {
            break;
        }
        $string .= " + ";
    }
    $string .= " = " . $sum;

    return $string;
}
$string = doExpress(10);
echo $string;