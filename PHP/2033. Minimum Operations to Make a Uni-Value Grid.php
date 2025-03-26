<?php
/*
You are given a 2D integer grid of size m x n and an integer x. 
    In one operation, you can add x to or subtract x from any element in the grid.
A uni-value grid is a grid where all the elements of it are equal.
Return the minimum number of operations to make the grid uni-value. If it is not possible, return -1.
*/
class Solution {

    /**
     * 2033. Minimum Operations to Make a Uni-Value Grid
     * @param Integer[][] $grid
     * @param Integer $x
     * @return Integer
     */
    function minOperations($grid, $x) {
        $flattened = array_merge(...$grid);
        $remainder = $flattened[0] % $x;
        foreach ($flattened as $number) {
            if ($number % $x !== $remainder) {
                return -1;
            }
        }
        sort($flattened);
        $median = $flattened[intdiv(count($flattened), 2)];
        $operations = 0;
        foreach ($flattened as $number) {
            $operations += intdiv(abs($number - $median), $x);
        }
        return $operations;
    }
}

$c = new Solution;
print_r($c->minOperations([[2,4],[6,8]], 2)); // Expect 4
print_r($c->minOperations([[1,5],[2,3]], 1)); // Expect 5
print_r($c->minOperations([[1,2],[3,4]], 2)); // Expect -1
?>