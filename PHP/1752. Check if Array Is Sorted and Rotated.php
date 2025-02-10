<?php
class Solution {

    /**
     * 1752. Check if Array Is Sorted and Rotated
     * @param Integer[] $nums
     * @return Boolean
     */
    function check($nums) {
        $n = count($nums);
        $startIndex = 0;
        $longer = array_merge($nums, $nums);
        for ($i = 1; $i < $n; $i++) {
            if ($nums[$i] < $nums[$i-1]) {
                $startIndex = $i;
                break;
            }
        }
        for ($x = $startIndex+1; $x < $n+$startIndex; $x++) {
            if ($longer[$x-1] > $longer[$x]) { return false; }
        }
        return true;
    }
}

$c = new Solution;
//print_r($c->check([3,4,5,1,2])); // Expect true
//print_r($c->check([2,1,3,4])); // Expect false
print_r($c->check([1,2,3])); // Expect true
?>