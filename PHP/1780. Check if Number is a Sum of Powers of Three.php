<?php
/*
Given an integer n, return true if it is possible to represent n as the sum of distinct powers of three. Otherwise, return false.
An integer y is a power of three if there exists an integer x such that y == 3x.
*/
class Solution {

    /**
     * 1780. Check if Number is a Sum of Powers of Three
     * @param Integer $n
     * @return Boolean
     */
    function checkPowersOfThree($n) {
        while ($n > 0) {
            if ($n % 3 > 1) { return false; }
            $n = intdiv($n, 3);
        }
        return true;
    }
}

$c = new Solution;
//print_r($c->checkPowersOfThree(12)); // Expect true
//print_r($c->checkPowersOfThree(91)); // Expect true
print_r($c->checkPowersOfThree(21)); // Expect false
?>