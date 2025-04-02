<?php
/*
You are given a 0-indexed integer array nums.
Return the maximum value over all triplets of indices (i, j, k) such that i < j < k. If all such triplets have a negative value, return 0.
The value of a triplet of indices (i, j, k) is equal to (nums[i] - nums[j]) * nums[k].
*/
class Solution {

    /**
     * 2873. Maximum Value of an Ordered Triplet I
     * @param Integer[] $nums
     * @return Integer
     */
    function maximumTripletValue($nums) {
        $n = count($nums);
        $maxVal = 0;
        for ($i = 0; $i < $n - 2; $i++) {
            for ($j = $i + 1; $j < $n - 1; $j++) {
                for ($k = $j + 1; $k < $n; $k++) {
                    $value = ($nums[$i] - $nums[$j]) * $nums[$k];
                    $maxVal = max($maxVal, $value);
                }
            }
        }
        return $maxVal;        
    }
}

$c = new Solution;
print $c->maximumTripletValue([12,6,1,2,7])."\n"; // Expect 77
print $c->maximumTripletValue([1,10,3,4,19])."\n"; // Expect 133
print $c->maximumTripletValue([1,2,3])."\n"; // Expect 0

?>