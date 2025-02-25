<?php
/*
Given an array of integers arr, return the number of subarrays with an odd sum.

Since the answer can be very large, return it modulo 10^9 + 7.
*/
class Solution {

    /**
     * 1524. Number of Sub-arrays With Odd Sum
     * @param Integer[] $arr
     * @return Integer
     */
    function numOfSubarrays($arr) {
        $mod = pow(10,9)+7;
        $oddCount = 0;
        $evenCount = 1;
        $prefixSum = 0;
        $result = 0;
        
        foreach ($arr as $num) {
            $prefixSum += $num;
            if ($prefixSum % 2 === 1) {
                $result = ($result + $evenCount) % $mod;
                $oddCount++;
            }
            else {
                $result = ($result + $oddCount) % $mod;
                $evenCount++;
            }
        }
        return $result;
    }
}

$c = new Solution;
//print_r($c->numOfSubarrays([1,3,5])); // Expect 4
//print_r($c->numOfSubarrays([2,4,6])); // Expect 0
print_r($c->numOfSubarrays([1,2,3,4,5,6,7])); // Expect 16
?>