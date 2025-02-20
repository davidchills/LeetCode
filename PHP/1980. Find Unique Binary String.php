<?php
/*
Given an array of strings nums containing n unique binary strings each of length n, 
    return a binary string of length n that does not appear in nums. If there are multiple answers, you may return any of them.
*/
class Solution {

    /**
     * 1980. Find Unique Binary String
     * @param String[] $nums
     * @return String
     */
    function findDifferentBinaryString($nums) {
        $n = count($nums);
        $set = array_flip($nums);
    
        for ($i = 0; $i < (1 << $n); $i++) {
            $binary = str_pad(decbin($i), $n, '0', STR_PAD_LEFT);
            if (!isset($set[$binary])) {
                return $binary;
            }
        }
    
        return "";        
    }
}

$c = new Solution;
//print_r($c->findDifferentBinaryString(["01","10"])); // Expect 11 or 00
//print_r($c->findDifferentBinaryString(["00","01"])); // Expect 11 or 10
print_r($c->findDifferentBinaryString(["111","011","001"])); // Expect 000, 010, 100, 101 or 110
?>