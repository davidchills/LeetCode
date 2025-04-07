<?php
/*
Given an integer array nums, return true if you can partition the array into two subsets 
    such that the sum of the elements in both subsets is equal or false otherwise.
*/
class Solution {

    /**
     * 416. Partition Equal Subset Sum
     * @param Integer[] $nums
     * @return Boolean
     */
    function canPartition($nums) {
        $arraySum = array_sum($nums);
        if ($arraySum % 2 !== 0) { return false; }
        $target = $arraySum / 2;
        $dp = array_fill(0, $target + 1, false);
        $dp[0] = true;

        foreach ($nums as $num) {
            for ($i = $target; $i >= $num; $i--) {
                $dp[$i] = $dp[$i] || $dp[$i - $num];
            }
        }

        return $dp[$target];
    }
}

$c = new Solution;
print ($c->canPartition([1,5,11,5])) ? "true\n" : "false\n"; // Expect true
print ($c->canPartition([1,2,3,5])) ? "true\n" : "false\n"; // Expect false

?>