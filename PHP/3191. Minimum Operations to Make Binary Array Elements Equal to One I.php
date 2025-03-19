<?php
/*
You are given a binary array nums.
You can do the following operation on the array any number of times (possibly zero):
Choose any 3 consecutive elements from the array and flip all of them.
Flipping an element means changing its value from 0 to 1, and from 1 to 0.
Return the minimum number of operations required to make all elements in nums equal to 1. If it is impossible, return -1.
*/
class Solution {

    /**
     * 3191. Minimum Operations to Make Binary Array Elements Equal to One I
     * @param Integer[] $nums
     * @return Integer
     */
    function minOperations($nums) {
        $n = count($nums);
        $flips = 0;
    
        for ($i = 0; $i <= $n - 3; $i++) {
            if ($nums[$i] == 0) {
                for ($j = 0; $j < 3; $j++) {
                    $nums[$i + $j] ^= 1;
                }
                $flips++;
            }
        }
    
        foreach ($nums as $num) {
            if ($num == 0) { return -1; }
        }
    
        return $flips;        
    }
}

$c = new Solution;
//print_r($c->minOperations([0,1,1,1,0,0])); // Expect 3
print_r($c->minOperations([0,1,1,1])); // Expect -1

?>