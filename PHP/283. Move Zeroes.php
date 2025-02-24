<?php
/*
Given an integer array nums, move all 0's to the end of it while maintaining the relative order of the non-zero elements.

Note that you must do this in-place without making a copy of the array.
*/
class Solution {

    /**
     * 283. Move Zeroes
     * @param Integer[] $nums
     * @return NULL
     */
    function moveZeroes(&$nums) {
        $n = count($nums);
        $index = 0;
        /*
        for ($i = 0; $i < $n; $i++) {
            if ($nums[$i] !== 0) {
                $nums[$index++] = $nums[$i];
            }
        }
        while ($index < $n) {
            $nums[$index++] = 0;
        }
        */
        for ($i = 0; $i < $n; $i++) {
            if ($nums[$i] !== 0) {
                if ($i !== $index) {
                    [$nums[$index], $nums[$i]] = [$nums[$i], $nums[$index]];
                }
                $index++;
            }
        }
    }
}

$c = new Solution;
//$nums = [0,1,0,3,12]; // Expect [1,3,12,0,0]
//$nums = [0]; // Expect [0] 
//$nums = [0,0,0]; // Expect [0,0,0]
$nums = [1,2,3,0,0,2,3,0]; // Expect [1,2,3,2,3,0,0,0]
$c->moveZeroes($nums);
print_r($nums);

?>