<?php
class Solution {

    /**
     * 209. Minimum Size Subarray Sum
     * @param Integer $target
     * @param Integer[] $nums
     * @return Integer
     */
    function minSubArrayLen($target, $nums) {
        $currentSum = 0;
        $n = count($nums);
        $minLength = PHP_INT_MAX;
        $left = 0;
        
        for ($right = 0; $right < $n; $right++) {
            $currentSum += $nums[$right];
            while ($currentSum >= $target) {
                $minLength = min($minLength, (($right - $left) + 1));
                $currentSum -= $nums[$left];
                $left++;
            }
        }
        return $minLength === PHP_INT_MAX ? 0 : $minLength;
    }
}

$c = new Solution;
print_r($c->minSubArrayLen(7, [2,3,1,2,4,3])); // Expect 2
//print_r($c->minSubArrayLen(4, [1,4,4])); // Expect 1
//print_r($c->minSubArrayLen(11, [1,1,1,1,1,1,1,1])); // Expect 0
//print_r($c->minSubArrayLen(11, [1,2,3,4,5])); // Expect 3
?>