<?php
/*
Given a binary array nums, you should delete one element from it.
Return the size of the longest non-empty subarray containing only 1's in the resulting array. Return 0 if there is no such subarray.
*/
class Solution {

    /**
     * 1493. Longest Subarray of 1's After Deleting One Element
     * @param Integer[] $nums
     * @return Integer
     */
    function longestSubarray($nums) {
        $n = count($nums);
        $left = 0;
        $zeroCount = 0;
        $maxLength = 0;
        
        for ($right = 0; $right < $n; $right++) {
            if ($nums[$right] === 0) {
                $zeroCount++;
            }
            while ($zeroCount > 1) {
                if ($nums[$left] === 0) {
                    $zeroCount--;
                }
                $left++;
            } 
            $maxLength = max($maxLength, $right - $left);
        }
        return $maxLength;
    }
}

$c = new Solution;
//print_r($c->longestSubarray([1,1,0,1])); // Expect 3
//print_r($c->longestSubarray([0,1,1,1,0,1,1,0,1])); // Expect 5
print_r($c->longestSubarray([1,1,1])); // Expect 2
?>