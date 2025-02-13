<?php
/*
You are given a 0-indexed integer array nums, and an integer k.

In one operation, you will:

Take the two smallest integers x and y in nums.
Remove x and y from nums.
Add min(x, y) * 2 + max(x, y) anywhere in the array.
Note that you can only apply the described operation if nums contains at least two elements.

Return the minimum number of operations needed so that all elements of the array are greater than or equal to k.
*/
class Solution {

    /**
     * 3066. Minimum Operations to Exceed Threshold Value II
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer
     */
    function minOperations($nums, $k) {
        $heap = new SplMinHeap();
        $operations = 0;
        
        foreach ($nums as $num) {
            $heap->insert($num);
        }
    
        // Continue processing while the smallest element is less than k.
        while ($heap->top() < $k && $heap->count() > 1) {
            $x = $heap->extract(); // Smallest element
            $y = $heap->extract(); // Second smallest element
    
            // Apply the operation: (min(x, y) * 2 + max(x, y)).
            $newValue = min($x, $y) * 2 + max($x, $y);
            $heap->insert($newValue);
    
            $operations++;
        }
    
        // Return operations unless top is less than k, then return -1.
        return ($heap->top() >= $k) ? $operations : -1;        
    }
}

$c = new Solution;
//print_r($c->minOperations([2,11,10,1,3], 10)); // Expect 2
print_r($c->minOperations([1,1,2,4,9], 20)); // Expect 4
?>