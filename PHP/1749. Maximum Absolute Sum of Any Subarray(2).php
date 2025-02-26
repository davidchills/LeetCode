<?php
/*
You are given an integer array nums. 
    The absolute sum of a subarray [numsl, numsl+1, ..., numsr-1, numsr] is abs(numsl + numsl+1 + ... + numsr-1 + numsr).
Return the maximum absolute sum of any (possibly empty) subarray of nums.
Note that abs(x) is defined as follows:
If x is a negative integer, then abs(x) = -x.
If x is a non-negative integer, then abs(x) = x.
*/
class Solution {

    /**
     * 1749. Maximum Absolute Sum of Any Subarray
     * @param Integer[] $nums
     * @return Integer
     */
    // Using Kadane’s Algorithm, Faster on large array sets.
    function maxAbsoluteSum($nums) {
        $maxSum = 0;
        $minSum = 0;
        $currMax = 0;
        $currMin = 0;
        
        foreach ($nums as $num) {            
            $currMax = max($num, $currMax + $num);
            $maxSum = max($maxSum, $currMax);
            
            $currMin = min($num, $currMin + $num);
            $minSum = min($minSum, $currMin);
        }
        return max($maxSum, abs($minSum));
    }
}

$c = new Solution;
//print_r($c->maxAbsoluteSum([1,-3,2,3,-4])); // Expect 5
//print_r($c->maxAbsoluteSum([2,-5,1,-4,3,-2])); // Expect 8
//print_r($c->maxAbsoluteSum([-3,-2,-5,-1])); // Expect 11
print_r($c->maxAbsoluteSum([3,2,1,0,-1,-2,-3])); // Expect 6
?>