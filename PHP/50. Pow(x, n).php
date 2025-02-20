<?php
/*
Implement pow(x, n), which calculates x raised to the power n (i.e., xn).
*/
class Solution {

    /**
     * 50. Pow(x, n)
     * @param Float $x
     * @param Integer $n
     * @return Float
     */
    function myPow($x, $n) {
        if ($n === 0) { return 1; }
        if ($x === 0) { return 0; }
        if (abs($x) < PHP_FLOAT_MIN && $n < 0) {
            return INF; // Avoid division by zero
        }
        
        $isNegative = $n < 0;
        $n = abs($n);
        $result = 1;
        $base = $x;

        while ($n > 0) {
            if ($n % 2 === 1) {
                $result *= $base;
            }
            $base *= $base;
            $n = intdiv($n, 2);
            if (abs($result) < PHP_FLOAT_MIN && $isNegative) {
                return 0;
            }            
        }
        return $isNegative ? 1 / $result : $result;
    }
}

$c = new Solution;
//print_r($c->myPow(2, 10)); // Expect 1024
//print_r($c->myPow(2.1, 3)); // Expect 9.261
//print_r($c->myPow(2, -2)); // Expect 0.25
//print_r($c->myPow(-2, 3)); // Expect -8
//print_r($c->myPow(0.000001, -2147483647)); // 0
print_r($c->myPow(-3.0, -5)); // -0.00412
?>