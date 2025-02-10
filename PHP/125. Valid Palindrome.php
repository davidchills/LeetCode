<?php
class Solution {

    /**
     * 125. Valid Palindrome
     * @param String $s
     * @return Boolean
     */
    function isPalindrome($s) {
        $s = preg_replace('/[^a-z0-9]/', '', strtolower($s));
        return $s === strrev($s);
    }
    
}

$c = new Solution;
print_r($c->isPalindrome("0P"));
?>