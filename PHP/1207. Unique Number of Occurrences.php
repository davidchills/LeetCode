<?php
/*
Given an array of integers arr, return true if the number of occurrences of each value in the array is unique or false otherwise.
*/
class Solution {

    /**
     * 1207. Unique Number of Occurrences
    * @param Integer[] $arr
     * @return Boolean
     */
    function uniqueOccurrences($arr) {
        /* 
         * This way works and is the way we should be doing it for the challenge but isn't as fast.
        $n = count($arr);
        $hash = [];
        $uniques = [];
        foreach ($arr as $num) {
            if (!isset($hash[$num])) { $hash[$num] = 1; }
            else { $hash[$num]++; }
        }
        return count($hash) === count(array_unique($hash));
        */
        $hash = array_count_values($arr);
        return count($hash) === count(array_unique($hash));
    }
}

$c = new Solution;
print_r($c->uniqueOccurrences([1,2,2,1,1,3])); // Expect true
//print_r($c->uniqueOccurrences([1,2])); // Expect false
//print_r($c->uniqueOccurrences([-3,0,1,-3,1,1,1,-3,10,0])); // Expect true
?>