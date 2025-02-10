<?php
class Solution {

    /**
     * 3423. Maximum Difference Between Adjacent Elements in a Circular Array
     * @param Integer[] $nums
     * @return Integer
     */
    function maxAdjacentDistance($nums) {
        $numsLength = count($nums);
        $maxDistance = abs($nums[$numsLength - 1] - $nums[0]);
        for ($i = 0; $i < $numsLength - 1; $i++) {
            $maxDistance = max($maxDistance, abs($nums[$i] - $nums[$i+1]));
        }
        return $maxDistance;
    }
}

$c = new Solution;
print_r($c->maxAdjacentDistance([1,2,4])); // Expect 3
//print_r($c->maxAdjacentDistance([-5,-10,-5])); // Expect 5
//print_r($c->maxAdjacentDistance([-4,-2,-3])); // Expect 2
?>