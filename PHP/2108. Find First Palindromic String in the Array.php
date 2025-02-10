<?php
class Solution {

    /**
     * @param String[] $words
     * @return String
     */
    function firstPalindrome($words) {
        foreach ($words as $word) {
			if (strrev($word) == $word) { return $word; }
		}
		return "";
    }
}
$s = new Solution();
print "'".$s->firstPalindrome(["def","ghi"])."'";
?>