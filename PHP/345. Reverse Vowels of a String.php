<?php
/*
Given a string s, reverse only all the vowels in the string and return it.

The vowels are 'a', 'e', 'i', 'o', and 'u', and they can appear in both lower and upper cases, more than once.
*/
class Solution {

    /**
     * 345. Reverse Vowels of a String
     * @param String $s
     * @return String
     */
    function reverseVowels($s) {
        $chars = str_split($s);
        $vowels = ['a','e','i','o','u','A','E','I','O','U'];
        $left = 0;
        $right = count($chars) - 1;
        while ($left < $right) {
            while ($left < $right && !in_array($chars[$left], $vowels)) {
                $left++;
            }
            while ($left < $right && !in_array($chars[$right], $vowels)) {
                $right--;
            }  
            [$chars[$left], $chars[$right]] = [$chars[$right], $chars[$left]];
            $left++;
            $right--;
        }
        return implode("", $chars);
    }
}

$c = new Solution;
//print_r($c->reverseVowels("IceCreAm")); // Expect "AceCreIm"
print_r($c->reverseVowels("leetcode")); // Expect "leotcede"
?>