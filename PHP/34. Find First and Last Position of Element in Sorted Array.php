<?php
/*
Given an array of integers nums sorted in non-decreasing order, find the starting and ending position of a given target value.
If target is not found in the array, return [-1, -1].
You must write an algorithm with O(log n) runtime complexity.
*/
class Solution {

    /**
     * 34. Find First and Last Position of Element in Sorted Array
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[]
     */
    function searchRange(array $nums, int $target): array {
        $leftIndex = $this->findLeft($nums, $target);
        if ($leftIndex === -1) {
            return [-1, -1];
        }
        $rightIndex = $this->findRight($nums, $target);
        return [$leftIndex, $rightIndex];
    }
    
    private function findLeft(array $nums, int $target): int {
        $left = 0;
        $right = count($nums) - 1;
        $index = -1;
        while ($left <= $right) {
            $mid = $left + intdiv($right - $left, 2);
            if ($nums[$mid] >= $target) {
                if ($nums[$mid] === $target) { $index = $mid; }
                $right = $mid - 1;
            } 
            else { $left = $mid + 1; }
        }
        return $index;
    }
    
    private function findRight(array $nums, int $target): int {
        $left = 0;
        $right = count($nums) - 1;
        $index = -1;
        while ($left <= $right) {
            $mid = $left + intdiv($right - $left, 2);
            if ($nums[$mid] <= $target) {
                if ($nums[$mid] === $target) { $index = $mid; }
                $left = $mid + 1;
            } 
            else { $right = $mid - 1; }
        }
        return $index;
    }
}

$c = new Solution;
print_r($c->searchRange([5,7,7,8,8,10], 8)); // Expect [3,4]
print_r($c->searchRange([5,7,7,8,8,10], 6)); // Expect [-1,-1]
print_r($c->searchRange([], 0)); // Expect [-1,-1]

?>