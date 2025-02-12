<?php
/*
Given a sorted array of distinct integers and a target value, return the index if the target is found. If not, return the index where it would be if it were inserted in order.

You must write an algorithm with O(log n) runtime complexity.
*/
class Solution {

    /**
     * 35. Search Insert Position
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer
     */
    function searchInsert($nums, $target) {
        if ($target < $nums[0]) { return 0; }
        if ($target > $nums[count($nums) - 1]) { return count($nums); }
        $start = 0;
        $end = (count($nums) - 1);
        while ($start <= $end) {
            $mid = floor(($start + $end) / 2);
            if ($target > $nums[$mid]) { $start = $mid + 1; }
            elseif ($target < $nums[$mid]) { $end = ($mid - 1); }
            else { return $mid; }
        }
        return $start;
    }
}

$c = new Solution;
print_r($c->searchInsert([1,3,5,6], 5)); // Expect 2
//print_r($c->searchInsert([1,3,5,6], 2)); // Expect 1
//print_r($c->searchInsert([1,3,5,6], 7)); // Expect 4
?>