<?php
class Solution {

    /**
     * 228. Summary Ranges
     * @param Integer[] $nums
     * @return String[]
     */
    function summaryRanges($nums) {
        $n = count($nums);
        if ($n === 0) { return []; }
        $out = [];
        $start = $nums[0];
        for ($i = 1; $i < $n; $i++) {
            if ($nums[$i] !== $nums[$i - 1] + 1) {
                if ($start === $nums[$i - 1]) {
                    $out[] = (string) $start;
                }
                else {
                    $out[] = (string) $start.'->'.$nums[$i - 1];
                }
                $start = $nums[$i];
            }
        }
            
        if ($start === $nums[$n - 1]) {
            $out[] = (string) $start;
        } 
        else {
            $out[] = (string) $start.'->'.$nums[$n - 1];
        }
    
        return $out;
    }
}

$c = new Solution;
//print_r($c->summaryRanges([0,1,2,4,5,7])); // Expect ["0->2","4->5","7"]
print_r($c->summaryRanges([0,2,3,4,6,8,9])); // Expect ["0","2->4","6","8->9"]
?>