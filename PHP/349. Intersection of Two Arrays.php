<?php
class Solution {

    /**
     * 349. Intersection of Two Arrays
     * @param Integer[] $nums1
     * @param Integer[] $nums2
     * @return Integer[]
     */
    function intersection($nums1, $nums2) {
        $out = [];
        // Make sure that $nums1 is always the shortest array.
        if (count($nums1) > count($nums2)) {
            list($nums1, $nums2) = [$nums2, $nums1];
        }

        $keys = array_flip($nums2);
        
        foreach ($nums1 as $num) {
            if (isset($keys[$num])) {
                $out[$num] = true;
            }
        }

        return array_keys($out);
    }
}

$c = new Solution;
//print_r($c->intersection([1,2,2,1], [2,2])); // Expect [2]
print_r($c->intersection([4,9,5], [9,4,9,8,4])); // Expect [4,9]
?>