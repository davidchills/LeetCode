<?php
/*
You are given a string s, which contains stars *.
In one operation, you can:
Choose a star in s.
Remove the closest non-star character to its left, as well as remove the star itself.
Return the string after all stars have been removed.
Note:
The input will be generated such that the operation is always possible.
It can be shown that the resulting string will always be unique.
*/
class Solution {

    /**
     * 2390. Removing Stars From a String
     * @param String $s
     * @return String
     */
    function removeStars($s) {
        $n = strlen($s);
        $stack = [];
        
        for ($i = 0; $i < $n; $i++) {
            if ($s[$i] !== '*') {
                $stack[] = $s[$i];
            }
            else { array_pop($stack); }
        }
        return implode("", $stack);
    }
}

$c = new Solution;
print_r($c->removeStars("leet**cod*e")); // Expect "lecoe"
//print_r($c->removeStars("erase*****")); // Expect ""
?>