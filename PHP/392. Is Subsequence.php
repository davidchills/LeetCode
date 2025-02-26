<?php
/*
Given two strings s and t, return true if s is a subsequence of t, or false otherwise.

A subsequence of a string is a new string that is formed from the original string by deleting some (can be none) 
    of the characters without disturbing the relative positions of the remaining characters. 
    (i.e., "ace" is a subsequence of "abcde" while "aec" is not).
*/
class Solution {

    /**
     * 392. Is Subsequence
     * @param String $t
     * @return Boolean
     */
    function isSubsequence($s, $t) {
        if ($s === "") { return true; }
        $i = 0;
        $j = 0;
        $sLen = strlen($s);
        $tLen = strlen($t);
        
        while ($i < $sLen && $j < $tLen) {
            if ($s[$i] === $t[$j]) { $i++; }
            $j++;
        }
        return $i === $sLen;
    }
}

$c = new Solution;
//print_r($c->isSubsequence("abc", "ahbgdc")); // Expect true
print_r($c->isSubsequence("aaaaaa", "bbaaaa")); // Expect false    
?>