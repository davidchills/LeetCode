<?php
/*
Description
*/
class Solution {

    /**
     * 394. Decode String
     * @param String $s
     * @return String
     */
    function decodeString($s) {

    }
}

$c = new Solution;
//print_r($c->decodeString("3[a]2[bc]")); // Expect "aaabcbc"
//print_r($c->decodeString("3[a2[c]]")); // Expect "accaccacc"
//print_r($c->decodeString("2[abc]3[cd]ef")); // Expect "abcabccdcdcdef"
print_r($c->decodeString("99[99[99[99[99[99[a]]]]]]")); // Expect "Output too large! Skipping expansion."
?>