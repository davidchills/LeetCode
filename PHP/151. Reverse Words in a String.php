<?php
class Solution {

    /**
     * 151. Reverse Words in a String
     * @param String $s
     * @return String
     */
    function reverseWords($s) {
        $words = array_reverse(explode(" ", preg_replace('/\s+/', " ", trim($s))));
        return implode(" ", $words);
    }
}

$c = new Solution;
print_r($c->reverseWords(" a    0 good   example "));
?>