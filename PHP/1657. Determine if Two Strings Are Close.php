<?php
/*
Two strings are considered close if you can attain one from the other using the following operations:
Operation 1: Swap any two existing characters.
For example, abcde -> aecdb
Operation 2: Transform every occurrence of one existing character into another existing character, and do the same with the other character.
For example, aacabb -> bbcbaa (all a's turn into b's, and all b's turn into a's)
You can use the operations on either string as many times as necessary.
Given two strings, word1 and word2, return true if word1 and word2 are close, and false otherwise.
*/
class Solution {

    /**
     * 1657. Determine if Two Strings Are Close
     * @param String $word1
     * @param String $word2
     * @return Boolean
     */
    function closeStrings($word1, $word2) {
        if (strlen($word1) !== strlen($word2)) {
            return false;
        }

        $count1 = count_chars($word1, 1);
        $count2 = count_chars($word2, 1);

        if (array_keys($count1) !== array_keys($count2)) {
            return false;
        }

        sort($count1);
        sort($count2);

        return $count1 === $count2;
        /*
        if (strlen($word1) !== strlen($word2)) { return false; }
        $charSet1 = [];
        $charSet2 = [];    
        $freq1 = array_fill(0, 26, 0);
        $freq2 = array_fill(0, 26, 0);
    
        for ($i = 0; $i < strlen($word1); $i++) {
            $freq1[ord($word1[$i]) - ord('a')]++;
            $freq2[ord($word2[$i]) - ord('a')]++;
        }
    
        for ($i = 0; $i < 26; $i++) {
            if ($freq1[$i] > 0) $charSet1[] = chr($i + ord('a'));
            if ($freq2[$i] > 0) $charSet2[] = chr($i + ord('a'));
        }
    
        if ($charSet1 !== $charSet2) { return false; }
    
        sort($freq1);
        sort($freq2);
    
        return $freq1 === $freq2;   
        */
    }
}

$c = new Solution;
//print_r($c->closeStrings("abc", "bca")); // Expect true
//print_r($c->closeStrings("a", "aa")); // Expect false
print_r($c->closeStrings("cabbba", "abbccc")); // Expect true
?>