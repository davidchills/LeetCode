<?php
/*
Given a string s and an integer k, return the maximum number of vowel letters in any substring of s with length k.
Vowel letters in English are 'a', 'e', 'i', 'o', and 'u'.
*/
class Solution {

    /**
     * 1456. Maximum Number of Vowels in a Substring of Given Length
     * @param String $s
     * @param Integer $k
     * @return Integer
     */
    function maxVowels($s, $k) {
        $n = strlen($s);
        $vowels = ['a' => true, 'e' => true, 'i' => true, 'o' => true, 'u' => true];
        if ($n < $k) { return 0; }
        $maxVowels = 0;
        $currentVowelCount = 0;

        for ($i = 0; $i < $k; $i++) {
            if (isset($vowels[$s[$i]])) {
                $currentVowelCount++;
            }
        }
        $maxVowels = $currentVowelCount;
        
        for ($i = $k; $i < $n; $i++) {
            if (isset($vowels[$s[$i - $k]])) {
                $currentVowelCount--;
            }
            if (isset($vowels[$s[$i]])) {
                $currentVowelCount++;
            }
            $maxVowels = max($maxVowels, $currentVowelCount);
        }
        
        return $maxVowels;
    }
}

$c = new Solution;
print_r($c->maxVowels("abciiidef", 3)); // Expect 3
//print_r($c->maxVowels("aeiou", 2)); // Expect 2
//print_r($c->maxVowels("leetcode", 3)); // Expect 2
?>