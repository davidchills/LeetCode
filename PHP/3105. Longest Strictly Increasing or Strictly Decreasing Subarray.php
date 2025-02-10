<?php
class Solution {

    /**
     * 3105. Longest Strictly Increasing or Strictly Decreasing Subarray
     * @param Integer[] $nums
     * @return Integer
     */
    function longestMonotonicSubarray($nums) {
        $n = count($nums);
        $max = 1;
        $currDec = 1;
        $currInc = 1;
        if ($n < 2) { return $n; }
        for ($i = 1; $i < $n; $i++) {
            if ($nums[$i-1] < $nums[$i]) {
                $currInc++;
                $currDec = 1;
            }
            elseif ($nums[$i-1] > $nums[$i]) {
                $currDec++;
                $currInc = 1;
            } 
            else {
                $currInc = 1;
                $currDec = 1;
            }
            $max = max($max, $currDec, $currInc);
        }
        return $max;
    }
}

$c = new Solution;
//print_r($c->longestMonotonicSubarray([1,4,3,3,2])); // Expect 2
//print_r($c->longestMonotonicSubarray([3,3,3,3])); // Expect 1
print_r($c->longestMonotonicSubarray([3,2,1])); // Expect 3
?>