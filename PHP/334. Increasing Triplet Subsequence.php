<?php
/*
Given an integer array nums, return true if there exists a triple of indices (i, j, k) such that i < j < k and nums[i] < nums[j] < nums[k]. 
    If no such indices exists, return false.
The pattern does not need to be contiguous. Not included in instructions.
*/
class Solution {

    /**
     * 334. Increasing Triplet Subsequence
     * @param Integer[] $nums
     * @return Boolean
     */
    function increasingTriplet($nums) {
        $n = count($nums);
        if ($n < 3) { return false; }
        $first = PHP_INT_MAX;
        $second = PHP_INT_MAX;
        
        foreach ($nums as $num) {
            if ($num <= $first) { $first = $num; }
            elseif ($num <= $second) { $second = $num; }
            else { return true; }
        }
        return false;
    }
}

$c = new Solution;
//print ($c->increasingTriplet([1,2,3,4,5])) ? "True" : "False"; // Expect true
print ($c->increasingTriplet([5,4,3,2,1])) ? "True" : "False"; // Expect false
//print ($c->increasingTriplet([2,1,5,0,4,6])) ? "True" : "False"; // Expect true
//print ($c->increasingTriplet([20,100,10,12,5,13])) ? "True" : "False"; // Expect true 
//print ($c->increasingTriplet([1,2,0,3])) ? "True" : "False"; // Expect true 
?>