<?php
/*
You are given a 0-indexed 2D integer matrix grid of size n * n with values in the range [1, n2]. 
    Each integer appears exactly once except 'a' which appears twice and 'b' which is missing. 
    The task is to find the repeating and missing numbers a and b.
Return a 0-indexed integer array ans of size 2 where ans[0] equals to a and ans[1] equals to b.
*/
class Solution {

    /**
     * 2965. Find Missing and Repeated Values
     * @param Integer[][] $grid
     * @return Integer[]
     */
    function findMissingAndRepeatedValues($grid) {
        $n = count($grid);
        $vector = array_fill_keys(range(1, $n ** 2), 0);
        
        foreach ($grid as $number) {
            foreach ($number as $num) {
                $vector[$num]++;
            }
        }
        
        [$duplicate, $missing] = [0, 0];
        foreach ($vector as $num => $freq) {
            if ($freq > 1) {
                $duplicate = $num;
            }
            if ($freq === 0) {
                $missing = $num;
            }
            if ($duplicate && $missing) {
                return [$duplicate, $missing];
            }
        }
        return [$duplicate, $missing];
    }
}

$c = new Solution;
print_r($c->findMissingAndRepeatedValues([[1,3],[2,2]])); // Expect [2,4]
//print_r($c->findMissingAndRepeatedValues([[9,1,7],[8,9,2],[3,4,6]])); // Expect [9,5]
?>