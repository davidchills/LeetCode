<?php
/*
The Tribonacci sequence Tn is defined as follows: 
T0 = 0, T1 = 1, T2 = 1, and Tn+3 = Tn + Tn+1 + Tn+2 for n >= 0.
Given n, return the value of Tn.
*/
class Solution {

    /**
     * 1137. N-th Tribonacci Number
     * @param Integer $n
     * @return Integer
     */
    function tribonacci($n) {
        if ($n === 0) { return 0; }
        if ($n < 3) { return 1; }
        $x = 0;
        $y = 1;
        $z = 1;
        for ($i = 3; $i <= $n; ++$i) {
            [$x, $y, $z] = [$y, $z, $x + $y + $z];
        }
        return $z;        
    }
}

$c = new Solution;
//print_r($c->tribonacci(4)); // Expect 4
print_r($c->tribonacci(25)); // Expect 1389537
?>