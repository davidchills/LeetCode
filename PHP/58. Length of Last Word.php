<?php
class Solution {

    /**
     * 58. Length of Last Word
     * @param String $s
     * @return Integer
     */
    function lengthOfLastWord($s) {
        $words = explode(" ", trim($s));
        return strlen(end($words));
    }
}

$c = new Solution;
print_r($c->lengthOfLastWord("   fly me   to   the moon  "));
?>