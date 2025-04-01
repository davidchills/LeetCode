<?php
/*
You are given an m x n integer matrix matrix with the following two properties:
• Each row is sorted in non-decreasing order.
• The first integer of each row is greater than the last integer of the previous row.
Given an integer target, return true if target is in matrix or false otherwise.
You must write a solution in O(log(m * n)) time complexity.
*/
class Solution {

    /**
     * 74. Search a 2D Matrix
     * @param Integer[][] $matrix
     * @param Integer $target
     * @return Boolean
     */
    function searchMatrix($matrix, $target) {
        if (empty($matrix) || empty($matrix[0])) {
            return false;
        }
        $rows = count($matrix);
        $cols = count($matrix[0]);
        if ($target < $matrix[0][0] || $target > $matrix[$rows - 1][$cols - 1]) {
            return false;
        }
        $left = 0;
        $right = $rows * $cols - 1;
        while ($left <= $right) {
            $mid = $left + intdiv($right - $left, 2);
            $row = intdiv($mid, $cols);
            $col = $mid % $cols;
            $value = $matrix[$row][$col];
            
            if ($value === $target) { return true; } 
            elseif ($value < $target) { $left = $mid + 1; } 
            else { $right = $mid - 1; }
        }
        
        return false;
    }
}

$c = new Solution;
print_r($c->searchMatrix([[1,3,5,7],[10,11,16,20],[23,30,34,60]], 3)); // Expect true
print "\n";
print_r($c->searchMatrix([[1,3,5,7],[10,11,16,20],[23,30,34,60]], 13)); // Expect false

?>