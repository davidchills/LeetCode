<?php
class Solution {

    /**
     * 4. Median of Two Sorted Arrays
     * @param Integer[] $nums1
     * @param Integer[] $nums2
     * @return Float
     */
    function findMedianSortedArrays($nums1, $nums2) {
        $nums = array_merge($nums1, $nums2);
        sort($nums);
        $n = count($nums);
        $middle = floor($n/2);
        if ($n%2===0) { return (($nums[$middle] + $nums[$middle-1])/2); }
        else { return $nums[$middle]; }
        return $nums;
    }
}

$c = new Solution;
//print_r($c->findMedianSortedArrays([1,3], [2])); // Expect 2.00000
print_r($c->findMedianSortedArrays([1,2], [3,4])); // Expect 2.50000
?>