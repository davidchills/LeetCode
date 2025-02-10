<?php
class Solution {

    /**
     * 3427. Sum of Variable Length Subarrays
     * @param Integer[] $nums
     * @return Integer
     * Stuoid question. I still don't understand what it wants.
     */
    function subarraySum($nums) {
        $n = count($nums);
        $prefixSum = array_fill(0, $n + 1, 0);
        
        // Compute prefix sum array
        for ($i = 0; $i < $n; $i++) {
            $prefixSum[$i + 1] = $prefixSum[$i] + $nums[$i];
        }
        
        $totalSum = 0;

        // Calculate sum using prefix sum array
        for ($i = 0; $i < $n; $i++) {
            $start = max(0, $i - $nums[$i]);
            $totalSum += $prefixSum[$i + 1] - $prefixSum[$start];
        }

        return $totalSum;        
    }
}

$c = new Solution;
//print_r($c->subarraySum([2,3,1])); // Expect 11
print_r($c->subarraySum([3,1,1,2])); // Expect 13
?>