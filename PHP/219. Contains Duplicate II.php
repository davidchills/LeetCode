<?php
class Solution {

    /**
     * 219. Contains Duplicate II
     * @param Integer[] $nums
     * @param Integer $k
     * @return Boolean
     */
    function containsNearbyDuplicate($nums, $k) {
        if ($k < 1) { return false; }
        $map = [];
        foreach ($nums as $i => $num) {
            // If number previously seen and the diff of the index are less than $k, return true
            if (isset($map[$num]) && ($i - $map[$num]) <= $k) {
                return true;
            }
            $map[$num] = $i;
        }
        return false;
    }
}

$c = new Solution;
//print_r($c->containsNearbyDuplicate([1,2,3,1], 3)); // Expect true
//print_r($c->containsNearbyDuplicate([1,0,1,1], 1)); // Expect true
print_r($c->containsNearbyDuplicate([1,2,3,1,2,3], 2)); // Expect false
?>