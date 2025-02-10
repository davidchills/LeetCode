<?php
class Solution {

    /**
     * 242. Valid Anagram
     * @param String $s
     * @param String $t
     * @return Boolean
     */
    function isAnagram($s, $t) {
        $sl = strlen($s);
        $tl = strlen($t);
        if ($sl !== $tl) { return false; }
        $sa = array_count_values(str_split($s));
        $ta = array_count_values(str_split($t));
        foreach ($sa as $k => $v) {
            if (!isset($ta[$k]) || $ta[$k] !== $v) { return false; }
        }
        return true;
    }
}

$c = new Solution;
print_r($c->isAnagram("anagram", "nagaram")); // Expect true
//print_r($c->isAnagram("rat", "car")); // Expect false
?>