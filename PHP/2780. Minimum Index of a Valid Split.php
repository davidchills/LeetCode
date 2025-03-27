<?php
/*
An element x of an integer array arr of length m is dominant if more than half the elements of arr have a value of x.
You are given a 0-indexed integer array nums of length n with one dominant element.
You can split nums at an index i into two arrays nums[0, ..., i] and nums[i + 1, ..., n - 1], but the split is only valid if:
0 <= i < n - 1
nums[0, ..., i], and nums[i + 1, ..., n - 1] have the same dominant element.
Here, nums[i, ..., j] denotes the subarray of nums starting at index i and ending at index j, 
    both ends being inclusive. Particularly, if j < i then nums[i, ..., j] denotes an empty subarray.
Return the minimum index of a valid split. If no valid split exists, return -1.
*/
class Solution {

    /**
     * 2780. Minimum Index of a Valid Split
     * @param Integer[] $nums
     * @return Integer
     */
    function minimumIndex($nums) {
        $n = count($nums);
        $candidate = null;
        $count = 0;
        $total = 0;
        $leftCount = 0;
        
        foreach ($nums as $num) {
            if ($count === 0) {
                $candidate = $num;
                $count = 1;
            } 
            elseif ($num === $candidate) { $count++; } 
            else { $count--; }
        }

        foreach ($nums as $num) {
            if ($num === $candidate) { $total++; }
        }

        for ($i = 0; $i < $n - 1; $i++) {
            if ($nums[$i] === $candidate) {
                $leftCount++;
            }
            $leftSize = $i + 1;
            $rightSize = $n - $leftSize;
            $rightCount = $total - $leftCount;

            if ($leftCount * 2 > $leftSize && $rightCount * 2 > $rightSize) {
                return $i;
            }
        }
        return -1;        
    }
}

$c = new Solution;
print_r($c->minimumIndex([1,2,2,2])); // Expect 2
print "\n";
print_r($c->minimumIndex([2,1,3,1,1,1,7,1,2,1])); // Expect 4
print "\n";
print_r($c->minimumIndex([3,3,3,3,7,2,2])); // Expect -1

?>