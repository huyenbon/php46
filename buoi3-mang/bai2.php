<?php
function isPrime($number)
{
    $is_prime = true;
    //xu ly logic

    if ($number < 2) {
        return false;
    }
    for ($i = 2; $i <= sqrt($number); $i++) {
        if ($number % $i == 0) {
            $is_prime = false;
            break;
        }
    }
    return $is_prime;
}