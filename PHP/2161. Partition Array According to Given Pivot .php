<?php
/*
You are given a 0-indexed integer array nums and an integer pivot. Rearrange nums such that the following conditions are satisfied:
Every element less than pivot appears before every element greater than pivot.
Every element equal to pivot appears in between the elements less than and greater than pivot.
The relative order of the elements less than pivot and the elements greater than pivot is maintained.
More formally, consider every pi, pj where pi is the new position of the ith element and pj is the new position of the jth element. 
    If i < j and both elements are smaller (or larger) than pivot, then pi < pj.
Return nums after the rearrangement.
*/
class Solution {

    /**
     * 2161. Partition Array According to Given Pivot
     * @param Integer[] $nums
     * @param Integer $pivot
     * @return Integer[]
     */
    function pivotArray($nums, $pivot) {
        /* One loop, 3 smaller arrays
        $n = count($nums);
        $lower = [];
        $mid = [];
        $higher = [];
        
        for ($i = 0; $i < $n; $i++) {
            if ($nums[$i] < $pivot) { $lower[] = $nums[$i]; }
            elseif ($nums[$i] === $pivot) { $mid[] = $nums[$i]; }
            else { $higher[] = $nums[$i]; }
        }
        return array_merge($lower, $mid, $higher);
        */
        // One additional array, but multiple loops
        $n = count($nums);
        $result = [];
        $pivotCount = 0;
        
        foreach ($nums as $num) {
            if ($num < $pivot) {
                $result[] = $num;
            }
            elseif ($num === $pivot) {
                $pivotCount++;
            }
        }
        while ($pivotCount > 0) {
            $result[] = $pivot;
            $pivotCount--;
        }
        foreach ($nums as $num) {
            if ($num > $pivot) {
                $result[] = $num;
            }
        }
        return $result;
    }
}

$c = new Solution;
//print_r($c->pivotArray([9,12,5,10,14,3,10], 10)); // Expect [9,5,3,10,10,12,14]
print_r($c->pivotArray([-3,4,3,2], 2)); // Expect [-3,2,4,3]
?>