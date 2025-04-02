<?php
/*
A peak element is an element that is strictly greater than its neighbors.
Given a 0-indexed integer array nums, find a peak element, and return its index. 
    If the array contains multiple peaks, return the index to any of the peaks.
You may imagine that nums[-1] = nums[n] = -∞. In other words, 
    an element is always considered to be strictly greater than a neighbor that is outside the array.
You must write an algorithm that runs in O(log n) time.
*/
class Solution {

    /**
     * 162. Find Peak Element
     * @param Integer[] $nums
     * @return Integer
     */
    function findPeakElement($nums) {
        $left = 0;
        $right = count($nums) - 1;
        while ($left < $right) {
            $mid = $left + intval(($right - $left) / 2);
            if ($nums[$mid] > $nums[$mid + 1]) { $right = $mid; } 
            else { $left = $mid + 1; }
        }
        return $left;        
    }
}

$c = new Solution;
print $c->findPeakElement([1,2,3,1])."\n"; // Expect 2
print $c->findPeakElement([1,2,1,3,5,6,4])."\n"; // Expect 5

?>