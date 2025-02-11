<?php
/*
Given two strings s and part, perform the following operation on s until all occurrences of the substring part are removed:

Find the leftmost occurrence of the substring part and remove it from s.
Return s after removing all occurrences of part.

A substring is a contiguous sequence of characters in a string.
*/
class Solution {

    /**
     * 1910. Remove All Occurrences of a Substring
     * @param String $s
     * @param String $part
     * @return String
     */
    function removeOccurrences($s, $part) {
        //$new = preg_replace("/{$part}/", "", $s, 1);
        //if ($new !== $s) { return $this->removeOccurrences($new, $part); }
        //else { return $new; }        
        while (str_contains($s, $part)) {
            $s = preg_replace("/{$part}/", "", $s, 1);
        }
        return $s;
    }
}

$c = new Solution;
print_r($c->removeOccurrences("daabcbaabcbc", "abc")); // Expect "dab"
//print_r($c->removeOccurrences("axxxxyyyyb", "xy")); // Expect "ab"
//print_r($c->removeOccurrences("aabababa", "aba")); // Expect "ba"
?>