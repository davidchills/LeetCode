<?php
/*
You are given a 0-indexed integer array nums.
Return the maximum value over all triplets of indices (i, j, k) such that i < j < k. If all such triplets have a negative value, return 0.
The value of a triplet of indices (i, j, k) is equal to (nums[i] - nums[j]) * nums[k].
*/
class Solution {

    /**
     * 2874. Maximum Value of an Ordered Triplet II
     * @param Integer[] $nums
     * @return Integer
     */
    function maximumTripletValue($nums) {
        $n = count($nums);
        if ($n < 3) { return 0; }
        // Build Prefix & Suffix max arrays
        $prefixMax = array_fill(0, $n, 0);
        $suffixMax = array_fill(0, $n, 0);
        $prefixMax[0] = $nums[0];
        $suffixMax[$n - 1] = $nums[$n - 1];
        $maxValue = PHP_INT_MIN;
        
        for ($i = 1; $i < $n; $i++) {
            $prefixMax[$i] = max($prefixMax[$i - 1], $nums[$i]);
        }
        
        for ($i = $n - 2; $i >= 0; $i--) {
            $suffixMax[$i] = max($suffixMax[$i + 1], $nums[$i]);
        }
        
        for ($j = 1; $j < $n - 1; $j++) {
            $candidate = ($prefixMax[$j - 1] - $nums[$j]) * $suffixMax[$j + 1];
            $maxValue = max($maxValue, $candidate);
        }

        return max($maxValue, 0);    
    }
}

$c = new Solution;
print $c->maximumTripletValue([12,6,1,2,7])."\n"; // Expect 77
print $c->maximumTripletValue([1,10,3,4,19])."\n"; // Expect 133
print $c->maximumTripletValue([1,2,3])."\n"; // Expect 0

?>