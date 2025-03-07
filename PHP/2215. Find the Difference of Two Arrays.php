<?php
/*
Given two 0-indexed integer arrays nums1 and nums2, return a list answer of size 2 where:
answer[0] is a list of all distinct integers in nums1 which are not present in nums2.
answer[1] is a list of all distinct integers in nums2 which are not present in nums1.
Note that the integers in the lists may be returned in any order.
*/
class Solution {

    /**
     * 2215. Find the Difference of Two Arrays
     * @param Integer[] $nums1
     * @param Integer[] $nums2
     * @return Integer[][]
     */
    function findDifference($nums1, $nums2) {
        /*
        return [
            array_values(array_diff(array_unique($nums1), array_unique($nums2))),
            array_values(array_diff(array_unique($nums2), array_unique($nums1)))
        ];
        */
        $left = [];
        $right = [];
        $nums1 = array_unique($nums1);
        $nums2 = array_unique($nums2);
        $keys1 = array_flip($nums1);
        $keys2 = array_flip($nums2);
        
        foreach ($nums1 as $num) {
            if (!isset($keys2[$num])) {
                $left[] = $num;
            }
        }
        
        foreach ($nums2 as $num) {
            if (!isset($keys1[$num])) {
                $right[] = $num;
            }
        }        
        
        return [$left, $right];
    }
}

$c = new Solution;
//print_r($c->findDifference([1,2,3], [2,4,6])); // Expect [[1,3],[4,6]]
print_r($c->findDifference([1,2,3,3], [1,1,2,2])); // Expect [[3],[]]
?>