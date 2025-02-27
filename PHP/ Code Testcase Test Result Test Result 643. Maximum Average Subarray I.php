<?php
/*
You are given an integer array nums consisting of n elements, and an integer k.
Find a contiguous subarray whose length is equal to k that has the maximum average value and return this value. 
    Any answer with a calculation error less than 10-5 will be accepted.
*/
class Solution {

    /**
     * 643. Maximum Average Subarray I
     * @param Integer[] $nums
     * @param Integer $k
     * @return Float
     */
    function findMaxAverage($nums, $k) {
        $n = count($nums);
        $windowSum = array_sum(array_slice($nums, 0, $k));
        $maxSum = $windowSum;
        for ($i = $k; $i < $n; $i++) {
            $windowSum += $nums[$i] - $nums[$i -$k];
            $maxSum = max($maxSum, $windowSum);            
        }
        return $maxSum / $k;
    }
}

$c = new Solution;
//print_r($c->findMaxAverage([1,12,-5,-6,50,3], 4)); // Expect 12.75
//print_r($c->findMaxAverage([5], 1)); // Expect 5.0
print_r($c->findMaxAverage([7,4,5,8,8,3,9,8,7,6], 7)); // Expect 7.0    
?>