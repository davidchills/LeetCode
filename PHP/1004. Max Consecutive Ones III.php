<?php
/*
Given a binary array nums and an integer k, return the maximum number of consecutive 1's in the array if you can flip at most k 0's.
*/
class Solution {

    /**
     * 1004. Max Consecutive Ones III
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer
     */
    function longestOnes($nums, $k) {
        $n = count($nums);
        $left = 0;
        $zeroCount = 0;
        $maxLength = 0;
        
        for ($right = 0; $right < $n; $right++) {            
            if ($nums[$right] === 0) { 
                $zeroCount++; 
            }
            while ($zeroCount > $k) {
                if ($nums[$left] === 0) {
                    $zeroCount--;
                }
                $left++;
            }
            
            $maxLength = max($maxLength, $right - $left + 1);
        }
        return $maxLength;
    }
}

$c = new Solution;
//print_r($c->longestOnes([1,1,1,0,0,0,1,1,1,1,0], 2)); // Expect 6
print_r($c->longestOnes([0,0,1,1,0,0,1,1,1,0,1,1,0,0,0,1,1,1,1], 3)); // Expect 10
?>