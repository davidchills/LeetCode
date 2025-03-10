<?php
/*
You are given a string word and a non-negative integer k.
Return the total number of substrings of word that contain every vowel ('a', 'e', 'i', 'o', and 'u') at least once and exactly k consonants.
*/
class Solution {

    /**
     * 3306. Count of Substrings Containing Every Vowel and K Consonants II
     * @param String $word
     * @param Integer $k
     * @return Integer
     */
    function countOfSubstrings($word, $k) {
        $vowels = ['a' => true, 'e' => true, 'i' => true, 'o' => true, 'u' => true];
        $n = strlen($word);
        $subs = 0;
        $length = 5 + $k;
        $start = 0;
        while ($start + $length <= $n) {
            $currentLength = $length;
            $part = substr($word, $start, $length);
            $sub = array_count_values(str_split($part));
            foreach($vowels as $key => $v) {
                if (isset($sub[$key])) {
                    $currentLength -= $sub[$key];
                }
                
            }
            if ($currentLength === $k) { $subs++; }
            $start++;            
        }
        return $subs;
    }
}

$c = new Solution;
//print_r($c->countOfSubstrings("aeioqq", 1)); // Expect 0
//print_r($c->countOfSubstrings("aeiou", 0)); // Expect 1
//print_r($c->countOfSubstrings("ieaouqqieaouqq", 1)); // Expect 3
print_r($c->countOfSubstrings("iqeaouqi", 2)); // Expect 3
?>