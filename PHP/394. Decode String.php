<?php
/*
Given an encoded string, return its decoded string.
The encoding rule is: k[encoded_string], where the encoded_string inside the square brackets is being repeated exactly k times. 
    Note that k is guaranteed to be a positive integer.
You may assume that the input string is always valid; there are no extra white spaces, square brackets are well-formed, etc. 
    Furthermore, you may assume that the original data does not contain any digits and that digits are only for those repeat numbers, k. 
    For example, there will not be input like 3a or 2[4].
The test cases are generated so that the length of the output will never exceed 105.
*/
class Solution {

    /**
     * 394. Decode String
     * @param String $s
     * @return String
     */
    function decodeString($s) {
        $n = strlen($s);
        $stack = [];
        $num = 0;
        $builtString = "";
        
        for ($i = 0; $i < $n; $i++) {
            $char = $s[$i];
    
            if (is_numeric($char)) {
                $num = $num * 10 + intval($char);
            } 
            elseif ($char == '[') {
                array_push($stack, [$builtString, $num]);
                $builtString = "";
                $num = 0;
            } 
            elseif ($char == ']') {
                list($prevStr, $repeatTimes) = array_pop($stack);
                if (strlen($builtString) > 1000000) {
                    return "Output too large! Skipping expansion.";
                }                
                $builtString = $prevStr . str_repeat($builtString, $repeatTimes);
            } 
            else { $builtString .= $char; }
        }
    
        return $builtString;
    }
}

$c = new Solution;
//print_r($c->decodeString("3[a]2[bc]")); // Expect "aaabcbc"
//print_r($c->decodeString("3[a2[c]]")); // Expect "accaccacc"
//print_r($c->decodeString("2[abc]3[cd]ef")); // Expect "abcabccdcdcdef"
print_r($c->decodeString("99[99[99[99[99[99[a]]]]]]")); // Expect "Output too large! Skipping expansion."
?>