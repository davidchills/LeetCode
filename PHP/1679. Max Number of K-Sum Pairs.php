<?php
/*
You are given an integer array nums and an integer k.

In one operation, you can pick two numbers from the array whose sum equals k and remove them from the array.

Return the maximum number of operations you can perform on the array.
*/
class Solution {

    /**
     * 1679. Max Number of K-Sum Pairs
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer
     */
    function maxOperations($nums, $k) {
        sort($nums);
        $left = 0;
        $right = count($nums) - 1;
        $result = 0;
        
        while ($left < $right) {
            $sum = $nums[$left] + $nums[$right];
            if ($sum === $k) {
                $result++;
                $left++;
                $right--;
            }
            elseif ($sum < $k) { $left++; }
            else { $right--; }
        }
        return $result;
    }
}

$c = new Solution;
//print_r($c->maxOperations([1,2,3,4], 5)); // Expect 2
print_r($c->maxOperations([3,1,3,4,3], 6)); // Expect 1
?>