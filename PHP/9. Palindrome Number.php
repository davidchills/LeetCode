<?php
/*
Given an integer x, return true if x is a 
palindrome
, and false otherwise.
*/
class Solution {

    /**
     * 9. Palindrome Number
     * @param Integer $x
     * @return Boolean
     */
    function isPalindrome($x) {
        if ($x < 0) { return false; }
        if ($x < 10) { return true; }        
        return (intval(strrev($x)) === $x);
    }
}

$c = new Solution;
print_r($c->isPalindrome(121)); // Expect true
//print_r($c->isPalindrome(-121)); // Expect false
//print_r($c->isPalindrome(10)); // Expect false    

?>