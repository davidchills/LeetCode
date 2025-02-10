<?php
class Solution {

    /**
     * 674. Longest Continuous Increasing Subsequence
     * @param Integer[] $nums
     * @return Integer
     */
    function findLengthOfLCIS($nums) {
        $longest = 1;
        $current = 1;
        $n = count($nums);
        for ($i = 1; $i < $n; $i++) {
            if ($nums[$i] > $nums[$i-1]) {
                $current++;
                $longest = max($longest, $current);
            }
            else { $current = 1; }
        }
        return $longest;
    }
}

$c = new Solution;
//print_r($c->findLengthOfLCIS([1,3,5,4,7])); // Expect 3
print_r($c->findLengthOfLCIS([2,2,2,2,2])); // Expect 1
?>