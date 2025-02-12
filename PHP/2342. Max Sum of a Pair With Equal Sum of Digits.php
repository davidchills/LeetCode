<?php
/*
You are given a 0-indexed array nums consisting of positive integers. You can choose two indices i and j, such that i != j, and the sum of digits of the number nums[i] is equal to that of nums[j].

Return the maximum value of nums[i] + nums[j] that you can obtain over all possible indices i and j that satisfy the conditions.
*/
class Solution {

    /**
     * 2342. Max Sum of a Pair With Equal Sum of Digits
     * @param Integer[] $nums
     * @return Integer
     */
    function maximumSum($nums) {
        $n = count($nums);
        $maxSum = -1;
        $sumMap = [];

        foreach ($nums as $num) {
            // Split the number into digits and add them together.
            $digitSum = array_sum(str_split($num));
            if (!isset($sumMap[$digitSum])) {
                //Use MaxHeap so we can pull off the top two later.
                // A lot of other solutions assumed there would be only 2 matches.
                $sumMap[$digitSum] = new SplMaxHeap();
            }
            $sumMap[$digitSum]->insert($num);
        }

        foreach($sumMap as $heap) {
            // If is at least 2 numbers with the same sum, extract the highest two.
            if ($heap->count() > 1) {
                $maxSum = max($maxSum, $heap->extract() + $heap->extract());
            }
        }
        return $maxSum;
    }
}

$c = new Solution;
//print_r($c->maximumSum([18,43,36,13,7])); // Expect 54
//print_r($c->maximumSum([10,12,19,14])); // Expect -1
//print_r($c->maximumSum([51, 42, 33, 60, 24])); // Expect 111
print_r($c->maximumSum([99, 11, 77, 22, 88])); // Expect -1    
?>