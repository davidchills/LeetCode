<?php
/** 
  * 2425. Bitwise XOR of All Pairings
  * You are given two 0-indexed arrays, nums1 and nums2, consisting of non-negative integers. There exists another array, nums3, which contains the bitwise XOR of all pairings of integers between nums1 and nums2 (every integer in nums1 is paired with every integer in nums2 exactly once).
  * Return the bitwise XOR of all integers in nums3.
  */
class Solution {

    /**
     * @param Integer[] $nums1
     * @param Integer[] $nums2
     * @return Integer
     */
    function xorAllNums($nums1, $nums2) {
        $xor1 = 0;
        $xor2 = 0;   
        
        foreach ($nums1 as $num) { $xor1 ^= $num; }
        foreach ($nums2 as $num) { $xor2 ^= $num; }
    
        $n1 = count($nums1);
        $n2 = count($nums2);
    
        $result = 0;
        if ($n2 % 2 == 1) { $result ^= $xor1; }
        if ($n1 % 2 == 1) { $result ^= $xor2; }
    
        return $result;        
    }
}

$c = new Solution;
print_r($c->xorAllNums([1,2], [3,4]));
?>