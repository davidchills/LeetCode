<?php
/*
The XOR total of an array is defined as the bitwise XOR of all its elements, or 0 if the array is empty.
For example, the XOR total of the array [2,5,6] is 2 XOR 5 XOR 6 = 1.
Given an array nums, return the sum of all XOR totals for every subset of nums. 
Note: Subsets with the same elements should be counted multiple times.
An array a is a subset of an array b if a can be obtained from b by deleting some (possibly zero) elements of b.
*/
class Solution {

    /**
     * 1863. Sum of All Subset XOR Totals
     * @param Integer[] $nums
     * @return Integer
     */
    function subsetXORSum($nums) {
        return $this->dfs($nums, 0, 0);
    }
    
    private function dfs($nums, $index, $currentXOR) {
        if ($index == count($nums)) {
            return $currentXOR;
        }
        $with = $this->dfs($nums, $index + 1, $currentXOR ^ $nums[$index]);
        $without = $this->dfs($nums, $index + 1, $currentXOR);
        return $with + $without;
    }    
}

$c = new Solution;
print $c->subsetXORSum([1,3])."\n"; // Expect 6
print $c->subsetXORSum([5,1,6])."\n"; // Expect 28
print $c->subsetXORSum([3,4,5,6,7,8])."\n"; // Expect 480

?>