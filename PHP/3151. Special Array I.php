<?php
class Solution {

    /**
     * 3151. Special Array I
     * @param Integer[] $nums
     * @return Boolean
     */
    function isArraySpecial($nums) {
        $numsLength = count($nums);
        if ($numsLength < 2) { return true; }
        for ($i = 0; $i < $numsLength - 1; $i++) {
            if (($nums[$i] + $nums[$i+1])%2 === 0) { return false; }
        }
        return true;
    }
}

$c = new Solution;
print_r($c->isArraySpecial([1])); // Expect true
//print_r($c->isArraySpecial([2,1,4])); // Expect true
//print_r($c->isArraySpecial([4,3,1,6])); // Expect false
?>