<?php
/*
Given a non-negative integer x, return the square root of x rounded down to the nearest integer. 
    The returned integer should be non-negative as well.

You must not use any built-in exponent function or operator.

For example, do not use pow(x, 0.5) in c++ or x ** 0.5 in python.
*/
class Solution {

    /**
     * 69. Sqrt(x)
     * @param Integer $x
     * @return Integer
     */
    function mySqrt($x) {
        if ($x < 0) { return null; }
        if ($x == 0 || $x == 1) { return $x; }
    
        $guess = $x;
        while (abs($guess * $guess - $x) > 0.5) {
            $guess = ($guess + $x / $guess) / 2;
        }
        return (int)$guess;
    }
}

$c = new Solution;
print_r($c->mySqrt(2)); // Expect 1
//print_r($c->mySqrt(4)); // Expect 2
//print_r($c->mySqrt(8)); // Expect 2
//print_r($c->mySqrt(10)); // Expect 3
//print_r($c->mySqrt(25)); // Expect 5    
?>