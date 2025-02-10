<?php
class Solution {

    /**
     * 1800. Maximum Ascending Subarray Sum
     * @param Integer[] $nums
     * @return Integer
     */
    function maxAscendingSum($nums) {
        $n = count($nums);
        if ($n === 0) { return 0; }
        $maxOut = $nums[0];
        $currentMax = $nums[0];
        
        for ($i = 1; $i < $n; $i++) {
            if ($nums[$i-1] < $nums[$i]) {
                $currentMax += $nums[$i];
            }
            else { 
                $maxOut = max($maxOut, $currentMax);
                $currentMax = $nums[$i]; 
            }
        }
        return max($maxOut, $currentMax);
    }
}

$c = new Solution;
//print_r($c->maxAscendingSum([10,20,30,5,10,50])); // Expect 65
//print_r($c->maxAscendingSum([10,20,30,40,50])); // Expect 150
print_r($c->maxAscendingSum([12,17,15,13,10,11,12])); // Expect 33
?>