<?php
/*
Given a string s consisting only of characters a, b and c.
Return the number of substrings containing at least one occurrence of all these characters a, b and c.
*/
class Solution {

    /**
     * 1358. Number of Substrings Containing All Three Characters
     * @param String $s
     * @return Integer
     */
    function numberOfSubstrings($s) {
        $n = strlen($s);
        $ltrs = array('a' => 0, 'b' => 0, 'c' => 0);
        $subs = 0;
        $left = 0;

        for ($right = 0; $right < $n; $right++) {
            $ltrs[$s[$right]]++;
            while ($ltrs['a'] > 0 && $ltrs['b'] > 0 && $ltrs['c'] > 0) {
                $subs += $n - $right;
                $ltrs[$s[$left]]--;
                $left++;
            }
        }
        return $subs;
    }
}

$c = new Solution;
//print_r($c->numberOfSubstrings("abcabc")); // Expect 10
//print_r($c->numberOfSubstrings("aaacb")); // Expect 3
print_r($c->numberOfSubstrings("abc")); // Expect 1
?>