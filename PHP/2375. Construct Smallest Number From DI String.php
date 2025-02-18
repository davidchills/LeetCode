<?php
/*
You are given a 0-indexed string pattern of length n consisting of the characters 'I' meaning increasing and 'D' meaning decreasing.

A 0-indexed string num of length n + 1 is created using the following conditions:

num consists of the digits '1' to '9', where each digit is used at most once.
If pattern[i] == 'I', then num[i] < num[i + 1].
If pattern[i] == 'D', then num[i] > num[i + 1].
Return the lexicographically smallest possible string num that meets the conditions.


*/
class Solution {

    /**
     * 2375. Construct Smallest Number From DI String
     * @param String $pattern
     * @return String
     */
    function smallestNumber($pattern) {
        $n = strlen($pattern);
        $stack = [];
        $result = [];
    
        for ($i = 0; $i <= $n; $i++) {
            // Start collecting numbers from 1.
            $stack[] = $i + 1;     
            // When we reach the end or find 'I', we pop from the stack and append to result.
            if ($i === $n || $pattern[$i] === 'I') {
                while (!empty($stack)) {
                    $result[] = array_pop($stack);
                }
            }
        }
    
        return implode('', $result);
    }
}

$c = new Solution;
print_r($c->smallestNumber("IIIDIDDD")); // Expect "123549876"
//print_r($c->smallestNumber("DDD")); // Expect "4321"
?>