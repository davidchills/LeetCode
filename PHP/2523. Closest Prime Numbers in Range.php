<?php
/*
Given two positive integers left and right, find the two integers num1 and num2 such that:
left <= num1 < num2 <= right .
Both num1 and num2 are prime numbers.
num2 - num1 is the minimum amongst all other pairs satisfying the above conditions.
Return the positive integer array ans = [num1, num2]. 
    If there are multiple pairs satisfying these conditions, return the one with the smallest num1 value. 
    If no such numbers exist, return [-1, -1].
*/
class Solution {

    /**
     * 2523. Closest Prime Numbers in Range
     * @param Integer $left
     * @param Integer $right
     * @return Integer[]
     */
    function closestPrimes($left, $right) {
        if ($right - $left < 1) { return [-1, -1]; }
        $isPrime = array_fill(0, $right + 1, true);
        $isPrime[0] = false;
        $isPrime[1] = false;
        $primes = [];
        
        for ($i = 2; $i * $i <= $right; $i++) {
            if ($isPrime[$i]) {
                for ($j = $i * $i; $j <= $right; $j += $i) {
                    $isPrime[$j] = false;
                }
            }
        }
        for ($i = max(2, $left); $i <= $right; $i++) {
            if ($isPrime[$i]) {
                $primes[] = $i;
            }
        }
        $n = count($primes);
        if ($n < 2) { return [-1, -1]; }
        $minGap = PHP_INT_MAX;
        $closestPair = [-1, -1];
        for ($i = 1; $i < count($primes); $i++) {
            $gap = $primes[$i] - $primes[$i - 1];
            if ($gap < $minGap) {
                $minGap = $gap;
                $closestPair = [$primes[$i - 1], $primes[$i]];
            }
        }
        return $closestPair;
    }
}

$c = new Solution;
print_r($c->closestPrimes(10, 19)); // Expect [11,13]
//print_r($c->closestPrimes(4, 6)); // Expect [-1,-1]
?>