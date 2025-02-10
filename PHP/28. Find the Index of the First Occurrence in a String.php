<?php
class Solution {

    /**
     * 28. Find the Index of the First Occurrence in a String
     * @param String $haystack
     * @param String $needle
     * @return Integer
     */
    function strStr($haystack, $needle) {
        $found = strpos($haystack, $needle);
        return (!$found && $found !== 0) ? -1 : $found;
    }
}

$c = new Solution;
print_r($c->strStr("sadbutsad", "xsad"));
?>