<?php
/*
You are given a 0-indexed array nums of size n consisting of non-negative integers.
You need to apply n - 1 operations to this array where, in the ith operation (0-indexed), 
    you will apply the following on the ith element of nums:
If nums[i] == nums[i + 1], then multiply nums[i] by 2 and set nums[i + 1] to 0. Otherwise, you skip this operation.
After performing all the operations, shift all the 0's to the end of the array.
For example, the array [1,0,2,0,0,1] after shifting all its 0's to the end, is [1,2,1,0,0,0].
Return the resulting array.
Note that the operations are applied sequentially, not all at once.
*/
class Solution {

    /**
     * 28. Find the Index of the First Occurrence in a String
     * @param Integer[] $nums
     * @return Integer[]
     */
    function applyOperations($nums) {
        $n = count($nums);
        if ($n < 2) { return $nums; }
        
        for ($i = 1; $i < $n; $i++) {
            if ($nums[$i - 1] === $nums[$i]) {
                $nums[$i - 1] *= 2;
                $nums[$i] = 0;
            }
        }
        $nonZeroIndex = 0;
        for ($i = 0; $i < $n; $i++) {
            if ($nums[$i] !== 0) {
                $nums[$nonZeroIndex++] = $nums[$i];
            }
        }
        while ($nonZeroIndex < $n) {
            $nums[$nonZeroIndex++] = 0;
        }        
        return $nums;
    }
}

$c = new Solution;
print_r($c->applyOperations([1,2,2,1,1,0])); // Expect [1,4,2,0,0,0]
//print_r($c->applyOperations([0,1])); // Expect [1,0]
?>