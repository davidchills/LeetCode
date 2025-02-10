<?php
class Solution {

    /**
     * 290. Word Pattern
     * @param String $pattern
     * @param String $s
     * @return Boolean
     */
    function wordPattern($pattern, $s) {
        $pa = str_split($pattern);
        $sa = explode(" ", $s);
        $map = [];
        $revMap = [];
        if (count($pa) !== count($sa)) { return false; }
        for ($i = 0; $i < count($pa); $i++) {
            
            if (isset($map[$pa[$i]])) {
                if ($map[$pa[$i]] !== $sa[$i]) { return false; }
            }
            else { $map[$pa[$i]] = $sa[$i]; }
            
            if (isset($revMap[$sa[$i]])) {
                if ($revMap[$sa[$i]] !== $pa[$i]) { return false; }
            }
            else { $revMap[$sa[$i]] = $pa[$i]; }            
        }
        return true;
    }
}

$c = new Solution;
print_r($c->wordPattern("abba", "dog cat cat dog")); // Expect true
//print_r($c->wordPattern("abba", "dog cat cat fish")); // Expect false
//print_r($c->wordPattern("aaaa", "dog cat cat dog")); // Expect false
//print_r($c->wordPattern("abba", "dog dog dog dog")); // Expect false


?>