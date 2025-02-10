<?php
class Solution {

    /**
     * 3. Longest Substring Without Repeating Characters
     * @param String $s
     * @return Integer
     */
    function lengthOfLongestSubstring($s) {
        $length = strlen($s);
        if ($length === 1) { return 1; }
        $seen = [];
        $longest = 0;
        $left = 0;
        for ($right = 0; $right < $length; $right++) {
            $char = $s[$right];
            while (isset($seen[$char])) {
                unset($seen[$s[$left]]);
                $left++;
            }
            $seen[$char] = $char;
            $longest = max($longest, $right - $left + 1);
        }
        return $longest;
    }
}

$c = new Solution;
print_r($c->lengthOfLongestSubstring("abcabcbb")); // Expect 3
//print_r($c->lengthOfLongestSubstring("bbbbb")); // Expect 1
//print_r($c->lengthOfLongestSubstring("pwwkew")); // Expect 3
//print_r($c->lengthOfLongestSubstring("")); // Expect 0 
//print_r($c->lengthOfLongestSubstring("a")); // Expect 1
//print_r($c->lengthOfLongestSubstring("au")); // Expect 2 
//print_r($c->lengthOfLongestSubstring("dvdf")); // Expect 3     
?>